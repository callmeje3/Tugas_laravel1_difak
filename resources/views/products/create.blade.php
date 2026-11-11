@extends('layouts.app')
@section('title', 'Tambah Produk')

@section('styles')
    :root {
        --page-width: 720px
    }

    .form-grid {
        display: grid;
        gap: 18px;
        margin-top: 22px
    }

    .field label {
        display: block;
        font-weight: 600;
        color: #374151;
        font-size: .9rem;
        margin-bottom: 6px
    }

    .field input,
    .field textarea {
        width: 100%;
        padding: 12px 14px;
        border: 1.5px solid #e3e6f5;
        border-radius: 10px;
        font-family: inherit;
        font-size: .95rem;
        outline: none;
        transition: border-color .2s
    }

    .field textarea {
        resize: vertical;
        min-height: 110px
    }

    .field input:focus,
    .field textarea:focus {
        border-color: #667eea
    }

    .field .error {
        color: #b91c1c;
        font-size: .82rem;
        margin-top: 5px
    }

    .field.has-error input,
    .field.has-error textarea {
        border-color: #ef4444
    }

    .form-actions {
        display: flex;
        gap: 10px;
        margin-top: 8px
    }
@endsection

@section('content')
    <h1>Tambah Produk</h1>
    <p>Isi form berikut untuk menambah produk baru ke database.</p>

    <form class="form-grid" method="POST" action="{{ route('products.store') }}">
        @csrf
        <div class="field {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name">Nama Produk</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="cth: Kopi Arabika Gayo 250g" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field {{ $errors->has('price') ? 'has-error' : '' }}">
            <label for="price">Harga (Rp)</label>
            <input id="price" type="number" name="price" value="{{ old('price') }}" min="0" step="1" placeholder="cth: 85000" required>
            @error('price')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field {{ $errors->has('description') ? 'has-error' : '' }}">
            <label for="description">Deskripsi</label>
            <textarea id="description" name="description" placeholder="Deskripsi singkat produk..." required>{{ old('description') }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="primary">Simpan Produk</button>
            <a class="ghost" href="{{ route('products.index') }}">Batal</a>
        </div>
    </form>
@endsection
