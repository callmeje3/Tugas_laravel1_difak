<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Tugas Laravel </title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 24px 16px;
            gap: 16px
        }

        .navbar {
            width: 100%;
            max-width: var(--page-width, 640px);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(255, 255, 255, .14);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, .25);
            border-radius: 14px;
            padding: 14px 22px
        }

        .navbar .brand {
            color: #fff;
            font-weight: 800;
            font-size: 1.05rem;
            text-decoration: none
        }

        .navbar nav {
            display: flex;
            gap: 6px;
            margin: 0
        }

        .navbar a.link {
            padding: 8px 16px;
            border-radius: 999px;
            text-decoration: none;
            color: #fff;
            font-weight: 600;
            font-size: .9rem;
            transition: background .2s ease
        }

        .navbar a.link:hover {
            background: rgba(255, 255, 255, .2)
        }

        .navbar a.link.active {
            background: #fff;
            color: #5b4ec7
        }

        .card {
            background: #fff;
            max-width: var(--page-width, 640px);
            width: 100%;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, .2)
        }

        h1 {
            color: #2d2a4a;
            margin-bottom: 12px;
            font-size: 1.8rem
        }

        p {
            color: #6b7280;
            font-size: 1.05rem;
            line-height: 1.6
        }

        footer {
            color: #fff;
            opacity: .85;
            font-size: .9rem
        }

        nav.pills {
            margin-top: 24px;
            display: flex;
            gap: 12px;
            justify-content: center
        }

        a {
            padding: 10px 22px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 600;
            transition: all .2s ease;
            display: inline-block
        }

        a:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(0, 0, 0, .15)
        }

        button {
            border: none;
            cursor: pointer;
            font-family: inherit;
            font-weight: 600;
            border-radius: 999px;
            padding: 10px 22px;
            font-size: .95rem;
            transition: all .2s ease
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(0, 0, 0, .15)
        }

        a.primary,
        button.primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff
        }

        a.ghost,
        button.ghost {
            background: #f3f4f6;
            color: #374151
        }

        .flash {
            width: 100%;
            max-width: var(--page-width, 640px);
            padding: 14px 18px;
            border-radius: 12px;
            font-weight: 600;
            font-size: .95rem;
            display: flex;
            align-items: center;
            gap: 10px
        }

        .flash.success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0
        }

        .flash.error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca
        }

        @media (max-width: 640px) {
            .card {
                padding: 24px
            }

            .navbar {
                flex-direction: column;
                gap: 10px
            }
        }
    </style>
    <style>
        @yield('styles')
    </style>
</head>

<body>
    <header class="navbar"> 
        <a class="brand" href="{{ route('products.index') }}"> Difak Store</a>
        <nav>
            <a class="link {{ request()->routeIs('products.*') ? 'active' : '' }}"
                href="{{ route('products.index') }}">Produk</a>
            <a class="link {{ request()->is('home') ? 'active' : '' }}" href="/home">Home</a>
            <a class="link {{ request()->is('about') ? 'active' : '' }}" href="/about">About</a>
            <a class="link {{ request()->is('contact') ? 'active' : '' }}" href="/contact">Contact</a>
        </nav>
    </header>

    @if (session('success'))
        <div class="flash success">✅ {{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="flash error">⚠️ {{ session('error') }}</div>
    @endif

    @if ($errors->any())
        <div class="flash error">⚠️ Periksa kembali form berikut:
            {{ implode(', ', $errors->keys()) }}</div>
    @endif

    <main class="card">
        @yield('content')
    </main>
    <footer>© {{ date('Y') }} Difak Juhaidi</footer>
</body>

</html>
