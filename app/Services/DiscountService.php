<?php

namespace App\Services;

use App\Models\Discount;
use App\Models\DiscountRule;

class DiscountService
{


    /**
     *
     * İndirim Kuralları Nedir?
     * Toplam 1000TL ve üzerinde alışveriş yapan bir müşteri, siparişin tamamından %10 indirim kazanır.
     * 2 ID'li kategoriye ait bir üründen 6 adet satın alındığında, bir tanesi ücretsiz olarak verilir.
     * 1 ID'li kategoriden iki veya daha fazla ürün satın alındığında, en ucuz ürüne %20 indirim yapılır.
     */

    public function isDiscount($itemList)
    {
        /**
         * 10_PERCENT_OVER_1000
         * CAT2_BUY_5_GET_1
         * 20_PERCENT_CAT1_BUY_2_MORE
         */
        $discountRules      = DiscountRule::get();
        $cItemList          = collect($itemList['item']);
        $subdiscountRules   = $discountRules->where('rule', 'sub');
        $mainbdiscountRules = $discountRules->where('rule', 'main');

        $discountList   = [];
        $discountAmount = 0.00;
        $totalPrice     = $itemList['total'];


        foreach ($mainbdiscountRules as $discountRule) {

            if ($discountRule->min_price < $itemList['total']) {


                $discountAmount              = $totalPrice * ($discountRule->rate / 100);
                $totalPrice                  -= $discountAmount;
                $discountList['discounts'][] = [
                    'discountReason' => $discountRule['type'],
                    'discountAmount' => $discountAmount,
                    'subtotal'       => $totalPrice,
                ];
            }

        }

        foreach ($subdiscountRules as $discountRule) {

            /**
             * Category discount
             */
            if ($discountRule->category) {
                $filterItem = $cItemList->where('category', $discountRule->category);
                if ($discountRule->quantity) {
                    $qFilterItem = $filterItem->where('quantity', '>', $discountRule->quantity);
                    foreach ($qFilterItem as $item) {

                        $totalPrice                  -= $item['unitPrice'];
                        $discountList['discounts'][] = [
                            'discountReason' => $discountRule['type'],
                            'discountAmount' => $item['unitPrice'],
                            'subtotal'       => $totalPrice,
                        ];
                    }
                }

                /**
                 * Product discount
                 */
                if ($discountRule->product_count) {
                    $uFilterItem = $filterItem->unique('productId');
                    if ($uFilterItem->count() >= $discountRule->product_count) {
                        $pFilterItem                 = $uFilterItem->min('price');
                        $discountAmount              = $pFilterItem * ($discountRule->rate / 100);
                        $totalPrice                  -= $discountAmount;
                        $discountList['discounts'][] = [
                            'discountReason' => $discountRule['type'],
                            'discountAmount' => $discountAmount,
                            'subtotal'       => $totalPrice,
                        ];

                    }
                }

            }
        }

        $discountList ['totalDiscount']   = collect($discountList['discounts'])->sum('discountAmount');
        $discountList ['discountedTotal'] = $totalPrice;


        return $discountList;
    }

}
