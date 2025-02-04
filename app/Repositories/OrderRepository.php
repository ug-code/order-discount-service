<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    public function createOrder(int $customerId, float $total, array $orderItems): Order
    {
        $order              = new Order();
        $order->customer_id = $customerId;
        $order->total       = $total;
        $order->save();
        $order->orderItems()->createMany($orderItems);
        return $order;
    }

    public function findOrder(int $orderId): ?Order
    {
        return Order::find($orderId);
    }

    public function deleteOrder(Order $order): void
    {
        $order->orderItems()->delete();
        $order->delete();
    }

    public function getAllOrders()
    {
        return Order::with('orderItems')->get();
    }

    public function findOrderWithItems(int $orderId): ?Order
    {
        return Order::with('orderItems')->find($orderId);
    }
}
