<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class RoleController extends Controller
{
    public function index(){

        $role=Auth::user()->role;
        
        if($role=='1'){
        $product=Product::get();
        return view('admin',compact('product'));
        
        }
        
        else{
        
        return view('customer');
        
        }
        
        }
}
