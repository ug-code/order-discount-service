<?php

namespace App\Services;

use App\Http\Resources\OrderResource;
use App\Repositories\OrderRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;

class OrderService
{
    private DiscountService    $discountService;
    private ProductService     $productService;
    private OrderRepository    $orderRepository;
    private CustomerRepository $customerRepository;
    private ProductRepository  $productRepository;

    public function __construct(
        DiscountService    $discountService,
        ProductService     $productService,
        OrderRepository    $orderRepository,
        CustomerRepository $customerRepository,
        ProductRepository  $productRepository
    )
    {
        $this->discountService    = $discountService;
        $this->productService     = $productService;
        $this->orderRepository    = $orderRepository;
        $this->customerRepository = $customerRepository;
        $this->productRepository  = $productRepository;
    }

    public function isItemManipulation($product, array $item): false|string
    {
        $itemPrice = (float)$item['unitPrice'] * (int)$item['quantity'];
        if ((float)$itemPrice !== (float)$item['total']) {
            return MessageService::$error['101'];
        }
        $calculateItemPrice = $product->price * $item['quantity'];
        if ((float)$calculateItemPrice !== (float)$item['total']) {
            return MessageService::$error['102'];
        }
        return false;
    }

    public function isTotalManipulation(float $calculateTotal, float $total): false|string
    {
        if ((float)$calculateTotal !== (float)$total) {
            return MessageService::$error['103'];
        }
        return false;
    }

    public function addOrder(int $customerId, array $items): array
    {
        $customer = $this->customerRepository->find($customerId);
        if (!$customer) {
            return ['status'  => false,
                    'message' => MessageService::$error['100']];
        }

        $calculateTotal = 0.00;
        $orderItems     = [];

        foreach ($items as $item) {
            $product = $this->productRepository->find($item['productId']);
            if (!$product) {
                return ['status'  => false,
                        'message' => "productId:" . $item['productId'] . " " . MessageService::$error['107']];
            }

            if (!$this->productService->isStock($product, (int)$item['quantity'])) {
                return ['status'  => false,
                        'message' => "Hatalı productId: " . $product->id . " ; " . MessageService::$error['104']];
            }

            $itemPrice      = (float)$product->price * (int)$item['quantity'];
            $calculateTotal += $itemPrice;

            $orderItems[] = [
                'product_id' => $item['productId'],
                'quantity'   => $item['quantity'],
                'unit_price' => $product->price,
                'total'      => $itemPrice,
            ];
        }

        /*
        if ($this->isTotalManipulation($calculateTotal, $total)) {
            return ['status'  => false,
                    'message' => $this->isTotalManipulation($calculateTotal, $total)];
        }*/

        $order = $this->orderRepository->createOrder($customerId, $calculateTotal, $orderItems);

        return ['status' => true,
                'data'   => ['orderId'    => $order->id,
                             'totalPrice' => $order->total]];
    }

    public function delete(int $orderId): array
    {
        DB::beginTransaction();
        try {
            $order = $this->orderRepository->findOrder($orderId);
            if (!$order) {
                return ['status'  => false,
                        'message' => MessageService::$error['106']];
            }

            $this->orderRepository->deleteOrder($order);
            DB::commit();
            return ['status' => true,
                    'data'   => ['removeOrderId' => $orderId]];
        } catch (\Exception $e) {
            DB::rollback();
            return ['status'  => false,
                    'message' => MessageService::$error['105']];
        }
    }

    public function list()
    {
        return OrderResource::collection($this->orderRepository->getAllOrders());
    }

    public function checkDiscount(int $orderId)
    {
        $order = $this->orderRepository->findOrderWithItems($orderId);
        if (!$order) {
            return ['status'  => false,
                    'message' => MessageService::$error['108']];
        }

        $total    = 0.00;
        $itemList = ['item' => []];

        foreach ($order->orderItems as $item) {
            $product            = $this->productRepository->find($item->product_id);
            $itemPrice          = $product->price * $item->quantity;
            $total              += $itemPrice;
            $itemList['item'][] = [
                'unitPrice' => $product->price,
                'productId' => $product->id,
                'price'     => $itemPrice,
                'category'  => $product->category,
                'quantity'  => $item->quantity,
            ];
        }
        $itemList['total'] = $total;

        $isDiscount = $this->discountService->isDiscount($itemList);

        return ['status' => true,
                'data'   => $isDiscount];
    }
}
