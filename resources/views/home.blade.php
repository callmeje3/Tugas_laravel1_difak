@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <h1>Selamat Datang</h1>
    <p>Anda berada di halaman Home saya — Difak Juhaidi</p>
    <nav class="pills">
        <a class="primary" href="{{ route('products.index') }}">Kelola Produk</a>
        <a class="ghost" href="/about">About</a>
        <a class="ghost" href="/contact">Contact</a>
    </nav>
@endsection
