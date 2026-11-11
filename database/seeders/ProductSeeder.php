<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Kopi Arabika Gayo 250g',
                'price' => 85000,
                'description' => 'Biji kopi arabika single origin dari dataran tinggi Gayo, Aceh. Rasa fruity dengan notes cokelat dan aroma yang kuat.',
            ],
            [
                'name' => 'Kopi Arabika Mandailing 250g',
                'price' => 92000,
                'description' => 'Kopi Mandailing Sumatera Utara dengan body tebal, rasa earthy, dan sedikit sentuhan rempah.',
            ],
            [
                'name' => 'Teh Melati Grade A 200g',
                'price' => 45000,
                'description' => 'Teh melati premium dengan aroma bunga melati alami yang menenangkan, cocok dinikmati hangat maupun dingin.',
            ],
            [
                'name' => 'Kopi Robusta Lampung 500g',
                'price' => 68000,
                'description' => 'Robusta asli Lampung dengan kafein tinggi, crema tebal, dan rasa pahit khas yang pas untuk espresso.',
            ],
            [
                'name' => 'Cold Brew Bottled 1L',
                'price' => 55000,
                'description' => 'Kopi cold brew siap minum yang diseduh perlahan selama 18 jam, hasilnya halus, manis alami, dan rendah asam.',
            ],
            [
                'name' => 'French Press 600ml',
                'price' => 185000,
                'description' => 'French press stainless steel tahan panas dengan filter presisi, cara termudah menyeduh kopi full-body di rumah.',
            ],
            [
                'name' => 'V60 Dripper Keramik',
                'price' => 120000,
                'description' => 'Dripper keramik berbentuk kerucut dengan aliran spiral untuk ekstraksi kopi pour-over yang merata dan bersih.',
            ],
            [
                'name' => 'Hand Grinder Stainless',
                'price' => 265000,
                'description' => 'Gilingan kopi manual dengan burr stainless steel, 15 tingkat kehalusan, praktis untuk ngopi di mana saja.',
            ],
            [
                'name' => 'Kopi Bubuk Instant Gula Aren',
                'price' => 28000,
                'description' => 'Kopi susu gula aren instan dalam kemasan sachet, cukup seduh dengan air panas untuk rasa kafe favorit.',
            ],
            [
                'name' => 'Tumbler Kopi 350ml',
                'price' => 98000,
                'description' => 'Tumbler vacuum-sealed yang menjaga suhu minuman hingga 6 jam, ramah lingkungan, dan bebas BPA.',
            ],
        ];

        foreach ($products as $product) {
            DB::table('products')->updateOrInsert(
                ['name' => $product['name']],
                $product + ['created_at' => now(), 'updated_at' => now()]
            );
        }
    }
}
