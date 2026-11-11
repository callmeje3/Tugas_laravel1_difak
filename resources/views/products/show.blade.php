@extends('layouts.app')
@section('title', 'Detail Produk')

@section('styles')
    :root {
        --page-width: 720px
    }

    .detail-head {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 22px
    }

    .id-note {
        display: inline-block;
        background: #e0e7ff;
        color: #4338ca;
        padding: 4px 12px;
        border-radius: 999px;
        font-size: .8rem;
        font-weight: 600
    }

    .detail-grid {
        display: grid;
        gap: 16px;
        margin-top: 22px
    }

    .detail-item {
        background: #f9fafb;
        border: 1px solid #f0f1f8;
        border-radius: 12px;
        padding: 14px 18px
    }

    .detail-item .label {
        color: #9ca3af;
        font-size: .75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .05em;
        margin-bottom: 4px
    }

    .detail-item .value {
        color: #2d2a4a;
        font-weight: 600;
        line-height: 1.55
    }

    .detail-item .value.price {
        color: #059669;
        font-size: 1.25rem;
        font-weight: 800
    }

    .detail-actions {
        display: flex;
        gap: 10px;
        margin-top: 24px
    }
@endsection

@section('content')
    <div class="detail-head">
        <div>
            <h1>{{ $product->name }}</h1>
            <span class="id-note">ID #{{ $product->id }}</span>
        </div>
    </div>

    <div class="detail-grid">
        <div class="detail-item">
            <div class="label">Harga</div>
            <div class="value price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
        </div>
        <div class="detail-item">
            <div class="label">Deskripsi</div>
            <div class="value">{{ $product->description }}</div>
        </div>
        <div class="detail-item">
            <div class="label">Dibuat</div>
            <div class="value">{{ \Carbon\Carbon::parse($product->created_at)->translatedFormat('d F Y, H:i') }}</div>
        </div>
        <div class="detail-item">
            <div class="label">Terakhir Diubah</div>
            <div class="value">{{ \Carbon\Carbon::parse($product->updated_at)->translatedFormat('d F Y, H:i') }}</div>
        </div>
    </div>

    <div class="detail-actions">
        <a class="primary" href="{{ route('products.edit', $product->id) }}">Edit Produk</a>
        <a class="ghost" href="{{ route('products.index') }}">← Kembali</a>
    </div>
@endsection
