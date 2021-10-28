<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
class MeController extends Controller
{
    public function index(Request $request){
        return response()->json([
            'success'=>true,
            'data'=>$request->user()
        ]);
    }
    public function logout(Request $request){
        JWTAuth::invalidate();
        return response()->json([
            'success'=>true
        ]);
    }
}
