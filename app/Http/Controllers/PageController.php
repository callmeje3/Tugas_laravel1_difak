<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    private function layout($title, $message) //saya membuat fungsi private untuk menampilkan layout halaman dengan parameter $title dan $message
    {
        return <<<HTML
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Laravel 1 Difak Juhaidi</title>
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'monospace.ttf', monospace;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }
        .card {
            background: #fff;
            padding: 3rem 4rem;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        h1 { margin: 0 0 0.5rem; color: #333; }
        p  { margin: 0; color: #777; font-size: 1.1rem; }
    </style>
</head>
<body>
    <div class="card">
        <h1>$title</h1>
        <p>$message — <i>Difak Juhaidi</i></p>
    </div>
</body>
</html>
HTML;
    }

    public function home()
    {
        return $this->layout('Selamat Datang', 'Anda berada di halaman Home saya');
    }

    public function about()
    {
        return $this->layout('Tentang Saya', 'Ini adalah halaman About');
    }

    public function contact()
    {
        return $this->layout('Kontak', 'Ini adalah halaman Contact');
    }
}
