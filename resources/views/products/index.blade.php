@extends('layouts.app')
@section('title', 'Data Produk')

@section('styles')
    :root {
        --page-width: 1100px
    }

    .page-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 24px;
        flex-wrap: wrap
    }

    .page-head h1 {
        margin-bottom: 4px
    }

    .page-head p {
        font-size: .95rem
    }

    .stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
        margin-bottom: 22px
    }

    .stat {
        background: linear-gradient(135deg, #f5f6ff, #eef0fb);
        border: 1px solid #e3e6f5;
        border-radius: 12px;
        padding: 16px 18px
    }

    .stat .label {
        color: #6b7280;
        font-size: .8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: .04em;
        margin-bottom: 6px
    }

    .stat .value {
        color: #4338ca;
        font-weight: 800;
        font-size: 1.15rem
    }

    .toolbar {
        display: flex;
        gap: 12px;
        margin-bottom: 18px;
        flex-wrap: wrap
    }

    form.search {
        flex: 1;
        display: flex;
        gap: 8px;
        min-width: 260px
    }

    input.search-input {
        flex: 1;
        padding: 10px 16px;
        border: 1.5px solid #e3e6f5;
        border-radius: 999px;
        font-family: inherit;
        font-size: .95rem;
        outline: none;
        transition: border-color .2s
    }

    input.search-input:focus {
        border-color: #667eea
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: .93rem
    }

    th {
        background: #f5f6ff;
        color: #4b5563;
        text-transform: uppercase;
        font-size: .75rem;
        letter-spacing: .05em;
        padding: 12px 14px;
        text-align: left
    }

    td {
        padding: 14px;
        border-bottom: 1px solid #f0f1f8;
        color: #374151;
        vertical-align: top
    }

    tr:hover td {
        background: #fafbff
    }

    td .name {
        font-weight: 700;
        color: #2d2a4a
    }

    td .desc {
        color: #9ca3af;
        font-size: .85rem;
        margin-top: 4px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden
    }

    .price {
        color: #059669;
        font-weight: 700;
        white-space: nowrap
    }

    .actions {
        display: flex;
        gap: 8px
    }

    .badge {
        display: inline-block;
        padding: 6px 14px;
        border-radius: 999px;
        font-size: .82rem;
        font-weight: 600;
        text-decoration: none;
        transition: all .2s ease
    }

    .badge:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, .12)
    }

    .badge.detail {
        background: #e0e7ff;
        color: #4338ca
    }

    .badge.edit {
        background: #fef3c7;
        color: #b45309
    }

    .badge.delete {
        background: #fee2e2;
        color: #b91c1c;
        border: none;
        cursor: pointer;
        font-family: inherit
    }

    .empty {
        text-align: center;
        padding: 40px 0;
        color: #9ca3af
    }

    .empty .icon {
        font-size: 2.4rem;
        margin-bottom: 8px
    }

    @media (max-width: 760px) {
        .stats {
            grid-template-columns: repeat(2, 1fr)
        }

        table {
            display: block;
            overflow-x: auto
        }
    }
@endsection

@section('content')
    <div class="page-head">
        <div>
            <h1>Data Produk</h1>
        </div>
        <a class="primary" href="{{ route('products.create') }}">+ Tambah Produk</a>
    </div>

    <div class="stats">
        <div class="stat">
            <div class="label">Total Produk</div>
            <div class="value">{{ $stats->total_products }}</div>
        </div>
        <div class="stat">
            <div class="label">Harga Terendah</div>
            <div class="value">Rp {{ number_format($stats->cheapest_price, 0, ',', '.') }}</div>
        </div>
        <div class="stat">
            <div class="label">Harga Tertinggi</div>
            <div class="value">Rp {{ number_format($stats->highest_price, 0, ',', '.') }}</div>
        </div>
        <div class="stat">
            <div class="label">Rata-rata Harga</div>
            <div class="value">Rp {{ number_format($stats->average_price, 0, ',', '.') }}</div>
        </div>
    </div>

    <div class="toolbar">
        <form class="search" method="GET" action="{{ route('products.index') }}">
            <input class="search-input" type="text" name="search" value="{{ $search }}"
                placeholder="Cari nama atau deskripsi produk...">
            <button type="submit" class="ghost">Cari</button>
        </form>
    </div>

    @if ($products->isEmpty())
        <div class="empty">
            <div class="icon">📦</div>
            <p>Tidak ada produk{{ $search ? ' yang cocok dengan "' . $search . '"' : '' }}.</p>
        </div>
    @else
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}</td>
                        <td>
                            <div class="name">{{ $product->name }}</div>
                            <div class="desc">{{ $product->description }}</div>
                        </td>
                        <td><span class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</span></td>
                        <td>
                            <div class="actions">
                                <a class="badge detail" href="{{ route('products.show', $product->id) }}">Detail</a>
                                <a class="badge edit" href="{{ route('products.edit', $product->id) }}">Edit</a>
                                <form method="POST" action="{{ route('products.destroy', $product->id) }}"
                                    onsubmit="return confirm('Hapus produk \'{{ $product->name }}\'?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="badge delete">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $products->links() }}
    @endif
@endsection
