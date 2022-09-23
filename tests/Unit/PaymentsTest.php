<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaymentsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function testgetPayemntSuccess() {
        $data = [
            "customerNumber" => "496",
            "checkNumber" => "23432dd4",
        ];

        $response = $this->json('POST', '/api/check-customer-payment', $data);
        $response->assertStatus(200);
        $response->assertJson(['status' => 200]);
    }

    public function testgetPayemntError() {
        $data = [
            "customerNumber" => "497",
            "checkNumber" => "234324",
        ];

        $response = $this->json('POST', '/api/check-customer-payment',$data);
        $response->assertStatus(422);
        $response->assertJson(['status' => 422]);
    }
    
    // public function testCreateOrder() {
    //     $data = [
    //             "orderDate" => "2022-09-14",
    //             "requiredDate" => "2022-09-17",
    //             "shippedDate" => "2022-09-14",
    //             "status" => "recieved",
    //             "comments" => "test it",
    //             "customerNumber" => 119,
    //             "products" => array(
    //                 [
    //                     "productCode" => "S10_1678",
    //                     "quantityOrdered" => "5",
    //                     "priceEach" => "9.00",
    //                     "orderLineNumber" => 1
    //                 ]
    //             )
    //         ];

  
    //         $user = factory(\App\User::class)->create();
    //         $response = $this->actingAs($user, 'api')->json('POST', '/api/create-order',$data);
    //         $response->assertStatus(200);
    //         $response->assertJson(['status' => true]);
    //         $response->assertJson(['message' => "Order Created Successfully"]);
    //         $response->assertJson(['data' => $data]);
    // }
}
