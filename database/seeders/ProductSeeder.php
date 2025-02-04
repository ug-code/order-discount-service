<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                "id"       => 100,
                "name"     => "Black&Decker A7062 40 Parça Cırcırlı Tornavida Seti",
                "category" => 1,
                "price"    => "120.75",
                "stock"    => 10,
                "created_at"  => "2021-12-09 21:22:28",
                "updated_at"  => "2021-12-09 21:22:28",
                "deleted_at"  => null,
            ],
            [
                "id"       => 101,
                "name"     => "Reko Mini Tamir Hassas Tornavida Seti 32\'li",
                "category" => 1,
                "price"    => "49.50",
                "stock"    => 10,
                "created_at"  => "2021-12-09 21:22:28",
                "updated_at"  => "2021-12-09 21:22:28",
                "deleted_at"  => null,
            ],
            [
                "id"       => 102,
                "name"     => "Viko Karre Anahtar - Beyaz",
                "category" => 2,
                "price"    => "11.28",
                "stock"    => 10,
                "created_at"  => "2021-12-09 21:22:28",
                "updated_at"  => "2021-12-09 21:22:28",
                "deleted_at"  => null,
            ],
            [
                "id"       => 103,
                "name"     => "Legrand Salbei Anahtar, Alüminyum",
                "category" => 2,
                "price"    => "22.80",
                "stock"    => 10,
                "created_at"  => "2021-12-09 21:22:28",
                "updated_at"  => "2021-12-09 21:22:28",
                "deleted_at"  => null,
            ],
            [
                "id"          => 104,
                "name" => "Schneider Asfora Beyaz Komütatör",
                "category"    => 2,
                "price"       => "12.95",
                "stock"       => 10,
                "created_at"  => "2021-12-09 21:22:28",
                "updated_at"  => "2021-12-09 21:22:28",
                "deleted_at"  => null,
            ],
        ];


        DB::table('products')
          ->insert($products);
    }
}
