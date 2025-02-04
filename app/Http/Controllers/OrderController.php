<?php

namespace App\Http\Controllers;


use App\Http\Requests\OrderAddRequest;
use App\Http\Requests\OrderCheckDiscountRequest;
use App\Http\Requests\OrderDeleteRequest;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;


class OrderController extends Controller
{

    /**
     * @var OrderService
     */
    private OrderService $orderService;


    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function add(OrderAddRequest $request): JsonResponse
    {
        $customerId = $request->input('customerId');
        $items      = $request->input('items');
        // $total      = (float)$request->input('total');

        $result = $this->orderService->addOrder($customerId, $items);

        return response()->json($result);
    }


    public function delete(OrderDeleteRequest $request): JsonResponse
    {
        $orderId = $request->input('orderId');
        $result  = $this->orderService->delete($orderId);
        return response()->json($result);
    }


    public function list(): JsonResponse
    {
        $orders = $this->orderService->list();

        return response()->json([
            'status' => true,
            'data'   => $orders
        ]);
    }


    public function checkDiscount(OrderCheckDiscountRequest $request): JsonResponse
    {
        $orderId = $request->input('orderId');
        $result  = $this->orderService->checkDiscount($orderId);

        return response()->json($result);
    }


}
