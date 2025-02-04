<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class DiscountRuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $discountRules = [
            [
                "type"          => "10_PERCENT_OVER_1000",
                "min_price"     => 1000.00,
                "rule"          => "main",
                "category"      => null,
                "product_count" => null,
                "quantity"      => null,
                "rate"          => 10,
                "description"   => null,
            ],
            [
                "type"          => "CAT2_BUY_5_GET_1",
                "min_price"     => null,
                "rule"          => "sub",
                "category"      => 2,
                "product_count" => null,
                "quantity"      => 6,
                "rate"          => 0,
                "description"   => null,
            ],
            [
                "type"          => "20_PERCENT_CAT1_BUY_2_MORE",
                "min_price"     => null,
                "rule"          => "sub",
                "category"      => 1,
                "product_count" => 2,
                "quantity"      => null,
                "rate"          => 20,
                "description"   => null,
            ],
        ];


        DB::table('discount_rules')
          ->insert($discountRules);
    }
}
