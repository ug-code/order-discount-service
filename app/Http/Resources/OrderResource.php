<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */

    /*
    {
    "id": 6,
    "customer_id": 1,
    "total": 112.8,
    "created_at": "2021-12-07",
    "updated_at": "2021-12-07",
    "deleted_at": null,
    "order_item": [
    {
    "id": 4,
    "order_id": 6,
    "product_id": 102,
    "quantity": 10,
    "unit_price": 11,
    "total": 113,
    "created_at": "2021-12-07",
    "updated_at": "2021-12-07",
    "deleted_at": null
    }
    ]
    },
    "id": 1,
    "customerId": 1,
    "items": [
    {
    "productId": 102,
    "quantity": 10,
    "unitPrice": "11.28",
    "total": "112.80"
    }
    ],
    "total": "112.80"
    */
    public function toArray(Request $request)
    {


        return [
            'id'         => $this->id,
            'customerId' => $this->customer_id,
            'total'      => $this->total,
            'items'      => $this->orderItems->map(fn($item) => [
                'productId' => $item->product_id,
                'orderId'   => $item->order_id,
                'quantity'  => $item->quantity,
                'unitPrice' => $item->unit_price,
                'total'     => $item->total,
            ]),
        ];
    }
}
