<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [
                "id"          => 6,
                "customer_id" => 1,
                "total"       => 112.80,
                "created_at"  => "2021-12-07 20:28:03",
                "updated_at"  => "2021-12-09 21:27:48",
                "deleted_at"  => null,
            ],
            [
                "id"          => 7,
                "customer_id" => 2,
                "total"       => 219.75,
                "created_at"  => "2021-12-07 20:31:15",
                "updated_at"  => "2021-12-07 20:47:51",
                "deleted_at"  => null,
            ],
            [
                "id"          => 8,
                "customer_id" => 2,
                "total"       => 219.75,
                "created_at"  => "2021-12-07 20:31:46",
                "updated_at"  => "2021-12-09 21:26:17",
                "deleted_at"  => null,
            ],
            [
                "id"          => 9,
                "customer_id" => 2,
                "total"       => 219.75,
                "created_at"  => "2021-12-07 21:01:49",
                "updated_at"  => "2021-12-07 21:01:49",
                "deleted_at"  => null,
            ],
            [
                "id"          => 10,
                "customer_id" => 1,
                "total"       => 112.80,
                "created_at"  => "2021-12-09 21:22:28",
                "updated_at"  => "2021-12-09 21:22:28",
                "deleted_at"  => null,
            ],
        ];


        DB::table('orders')
          ->insert($orders);

        $order_items = [
            [
                "id"         => 4,
                "order_id"   => 6,
                "product_id" => 102,
                "quantity"   => 10,
                "unit_price" => 11,
                "total"      => 113,
                "created_at" => "2021-12-07 20:28:03",
                "updated_at" => "2021-12-09 21:27:48",
                "deleted_at" => null,
            ],
            [
                "id"         => 5,
                "order_id"   => 7,
                "product_id" => 101,
                "quantity"   => 2,
                "unit_price" => 50,
                "total"      => 99,
                "created_at" => "2021-12-07 20:31:15",
                "updated_at" => "2021-12-07 20:47:51",
                "deleted_at" => null,
            ],
            [
                "id"         => 6,
                "order_id"   => 7,
                "product_id" => 100,
                "quantity"   => 1,
                "unit_price" => 121,
                "total"      => 121,
                "created_at" => "2021-12-07 20:31:15",
                "updated_at" => "2021-12-07 20:47:51",
                "deleted_at" => null,
            ],
            [
                "id"         => 7,
                "order_id"   => 8,
                "product_id" => 101,
                "quantity"   => 2,
                "unit_price" => 50,
                "total"      => 99,
                "created_at" => "2021-12-07 20:31:46",
                "updated_at" => "2021-12-09 21:26:17",
                "deleted_at" => null,
            ],
            [
                "id"         => 8,
                "order_id"   => 8,
                "product_id" => 100,
                "quantity"   => 1,
                "unit_price" => 121,
                "total"      => 121,
                "created_at" => "2021-12-07 20:31:46",
                "updated_at" => "2021-12-09 21:26:17",
                "deleted_at" => null,
            ],
            [
                "id"         => 9,
                "order_id"   => 9,
                "product_id" => 101,
                "quantity"   => 2,
                "unit_price" => 50,
                "total"      => 99,
                "created_at" => "2021-12-07 21:01:49",
                "updated_at" => "2021-12-07 21:01:49",
                "deleted_at" => null,
            ],
            [
                "id"         => 10,
                "order_id"   => 9,
                "product_id" => 100,
                "quantity"   => 1,
                "unit_price" => 121,
                "total"      => 121,
                "created_at" => "2021-12-07 21:01:49",
                "updated_at" => "2021-12-07 21:01:49",
                "deleted_at" => null,
            ],
            [
                "id"         => 11,
                "order_id"   => 10,
                "product_id" => 102,
                "quantity"   => 10,
                "unit_price" => 11,
                "total"      => 113,
                "created_at" => "2021-12-09 21:22:28",
                "updated_at" => "2021-12-09 21:22:28",
                "deleted_at" => null,
            ],
        ];

        DB::table('order_items')
          ->insert($order_items);
    }
}
