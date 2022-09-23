<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use DB;
use Faker\Provider\ar_EG\Payment as Ar_EGPayment;
use Illuminate\Support\Facades\Validator;

class OrderService
{
    public function addOrder() {
        if(!Auth::check()){
            return redirect("login");
        }
        $customers = Customer::orderBy('id', 'DESC')->get();
        $products = Product::orderBy('id', 'DESC')->get();  
        return view('orders.create', compact('customers', 'products'));        
    }

    public function createOrder($request) {
        try {
            if(!Auth::check()){
                return redirect("login");
            }
            // Validate create order Request
            $validator = Validator::make($request->all(), [
                'orderDate' => 'required|date',
                'requiredDate' => 'required|date',
                'shippedDate' => 'required|date',
                'status' => 'required',
                'comments' => 'required',
                'customerNumber' => 'required|integer|exists:customers,id',
                'productCode' => 'required|exists:products,productCode',
                'quantityOrdered' => 'required|numeric|gt:0',
                'priceEach' => 'required|numeric|gt:0',
                'orderLineNumber' => 'required|numeric|gt:0',
                'shippedDate' => 'required|date',
            ]);            
            if ($validator->fails()) {
                $response = [
                    'data' => (object) array(),
                    'message' => $validator->errors()->all(),
                    'status' => 422,
                ];
                return response()->json($response, 422);
            }
            if(isset($request->checkNumber) && !empty($request->checkNumber)) {
                if(empty($request->paymentDate)) {
                    return response()->json(
                        [
                            'data'      => $request->all(),
                            'message' => 'Payemnt Date is required.',
                            'status'    => 422
                        ], 
                        422
                    );
                }
            }
            $orderNumber = Order::orderBy('id', 'DESC')->first('orderNumber')['orderNumber'];
            DB::beginTransaction();
            try {
                Order::create(
                        [
                            "orderNumber" => $orderNumber,
                            "orderDate" => $request->orderDate,
                            "requiredDate" => $request->requiredDate,
                            "shippedDate" => $request->shippedDate,
                            "status" => $request->status,
                            "comments" => $request->comments,
                            "customerNumber" => $request->customerNumber,
                        ]
                    );
                OrderDetail::create(
                    [
                        "orderNumber" => $orderNumber,
                        "productCode" => $request->productCode,
                        "quantityOrdered" => $request->quantityOrdered,
                        "priceEach" => $request->priceEach,
                        "orderLineNumber" => $request->orderLineNumber
                    ]
                );
                DB::table('products')
                        ->where('productCode', $request->productCode)
                        ->update(['quantityInStock' => DB::raw('quantityInStock - '.$request->quantityOrdered)]);
                if(isset($request->checkNumber) && !empty($request->checkNumber) ){
                    Payment::create(
                        [
                            "checkNumber" => $request->checkNumber,
                            "customerNumber" => $request->customerNumber,
                            "paymentDate" => $request->paymentDate,
                            "amount" => $request->priceEach * $request->quantityOrdered
                        ]
                    );
                }
                DB::commit();
                return response()->json(
                    [
                        'data'      => (Object) array(),
                        'message' => 'Order Created Successfully.',
                        'status'    => 200
                    ], 
                    200
                );
            } catch (Exception $e) {
                DB::rollBack();
                return response()->json(
                    [
                        'data'      => (Object) array(),
                        'message' => 'Something went wrong, while Creating Order.',
                        'status'    => 422
                    ], 
                    422
                );
            }
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'data'      => (Object) array(),
                    'message'   => $th->getMessage(),
                    'status'    => 422
                ], 
                422
            );
        }
    }

    public function listOrders($request) {
        try {
            if(!Auth::check()){
                return redirect("login");
            }
            $perPage = ($request->perPage) ? $request->perPage : 10;
            $orders = Order::orderBy('id', 'DESC')->take(10)->get();
            $maxSellingProduct = OrderDetail::with('product')
                ->selectRaw('COUNT(productCode) AS noOfOrders, productCode')
                ->groupBy('productCode')
                ->orderBy('noOfOrders', 'DESC')
                ->first();
            $minSellingProduct = OrderDetail::with('product')
                    ->selectRaw('COUNT(productCode) AS noOfOrders, productCode')
                    ->groupBy('productCode')
                    ->orderBy('noOfOrders', 'ASC')
                    ->first();
            $maxSellingCar = $maxSellingProduct['Product']['ProductName'] . '(' . $maxSellingProduct['noOfOrders'] . ')';   
            $minSellingCar = $minSellingProduct['Product']['ProductName'] . '(' . $minSellingProduct['noOfOrders'] . ')';   
            return view('orders.listing', compact('orders', 'maxSellingCar', 'minSellingCar')) ;        
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'data'      => (Object) array(),
                    'message'   => $th->getMessage(),
                    'status'    => 422
                ], 
                422
            );
        }
    }

    public function checkCustomerPayment($request) {
        // Validate user settings Request
        $validator = Validator::make($request->all(), [
            'customerNumber' => 'required|integer|exists:customers,id',
            'checkNumber' => 'required|exists:payments,checkNumber',
        ]);  
        if ($validator->fails()) {
            $response = [
                'data' => (object) array(),
                'message' => $validator->errors()->all(),
                'status' => 422,
            ];
            return response()->json($response, 422);
        }
        $payment = Payment::with('customer')
                ->where('customerNumber', $request->customerNumber)
                ->where('checkNumber', $request->checkNumber)
                ->first();
        if(empty($payment)) {
            return response()->json(
                [
                    'data'      => (Object) array(),
                    'message'   => "Payment does not exist",
                    'status'    => 404
                ],
                404
            ); 
        }
        return response()->json(
            [
                'data'      => $payment,
                'message'   => "Payment Verified against the Customer",
                'status'    => 200
            ], 
            200
        );       
    }
}
