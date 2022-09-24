<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderManagmentController extends Controller
{
    public function createOrder(OrderService $orderService, Request $request) {
        return $orderService->createOrder($request);
    }
    
    public function addOrder(OrderService $orderService) {
        return $orderService->addOrder();
    }

    public function listOrders(OrderService $orderService, Request $request) {
        return $orderService->listOrders($request);
    }

    public function checkCustomerPayment(OrderService $orderService, Request $request) {
        return $orderService->checkCustomerPayment($request);
    }
}
