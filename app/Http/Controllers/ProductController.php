<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $products = $query->oldest()->paginate(5)->withQueryString();

        $stats = DB::table('products')
            ->selectRaw('COUNT(*) as total_products')
            ->selectRaw('COALESCE(MIN(price), 0) as cheapest_price')
            ->selectRaw('COALESCE(MAX(price), 0) as highest_price')
            ->selectRaw('COALESCE(ROUND(AVG(price)), 0) as average_price')
            ->first();

        return view('products.index', [
            'products' => $products,
            'search' => $request->search,
            'stats' => $stats,
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'description' => 'required|string',
        ]);

        Product::create($validated);

        return redirect()
            ->route('products.index')
            ->with('success', "Produk \"{$validated['name']}\" berhasil ditambahkan.");
    }

    public function show(string $id)
    {
        $product = DB::table('products')
            ->select('id', 'name', 'price', 'description', 'created_at', 'updated_at')
            ->where('id', $id)
            ->first();

        abort_if($product === null, 404);

        return view('products.show', compact('product'));
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'description' => 'required|string',
        ]);

        $updated = DB::table('products')
            ->where('id', $id)
            ->update($validated + ['updated_at' => now()]);

        if ($updated === 0) {
            return redirect()
                ->route('products.index')
                ->with('error', "Produk dengan ID {$id} tidak ditemukan.");
        }

        return redirect()
            ->route('products.index')
            ->with('success', "Produk \"{$validated['name']}\" berhasil diperbarui.");
    }

    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()
                ->route('products.index')
                ->with('error', "Produk dengan ID {$id} tidak ditemukan.");
        }

        $name = $product->name;
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', "Produk \"{$name}\" berhasil dihapus.");
    }
}
