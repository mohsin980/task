<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UnAuthController extends Controller
{
    public function sessionExpired(){
        return response()->json(
            [
                "data" => (Object) array(),
                "message" => "Session Expired.",                    
                "status"  => 401
            ], 
            401
        );
    }

    public function logout(){
        Auth::logout();
    }
}
