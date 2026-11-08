<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Tugas Laravel 2</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
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
            justify-content: center;
            padding: 24px;
            gap: 16px
        }

        .card {
            background: #fff;
            max-width: 640px;
            width: 100%;
            padding: 48px;
            border-radius: 16px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, .2);
            text-align: center
        }

        h1 {
            color: #333;
            margin-bottom: 12px
        }

        p {
            color: #666;
            font-size: 1.1rem;
            line-height: 1.6
        }

        footer {
            color: #fff;
            opacity: .8;
            font-size: .9rem
        }

        nav {
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

        a.primary {
            background: #667eea;
            color: #fff
        }

        a.ghost {
            background: #f3f4f6;
            color: #333
        }
    </style>
</head>

<body>
    <div class="card">
        @yield('content')
    </div>
    <footer>© {{ date('Y') }} Difak Juhaidi</footer>
</body>

</html>
