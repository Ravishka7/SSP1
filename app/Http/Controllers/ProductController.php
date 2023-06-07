<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
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
    
    public function createProduct(){
        return view('addproduct');
    }
    public function saveProduct(Request $request){
        $product_names = $request->product_names ;
        $product_price=$request->product_price;
        $discount_price=$request->discount_price;
        $product=new Product();

        $product->product_names=$product_names;

        $product->product_price=$product_price;

        $product->discount_price=$discount_price;
        $product->save();
        return redirect()->back()->with('success','product added successfully');
    }
    public function editProduct($id){
        $product = Product::where('id','=',$id)->first();

        return view('editproduct',compact('product'));
    }
    public function updateProduct(Request $request){
        $id=$request->id;
        $product_names = $request->product_names;
        $product_price=$request->product_price;
        $discount_price=$request->discount_price;
        Product::where('id','=',$id)->update([

             'product_names'=>$product_names,
            
             'product_price'=>$product_price,
            
             'discount_price'=>$discount_price,]);
        return redirect()->back();
    }
    public function deleteProduct($id){
        Product::where('id','=',$id)->delete();
        return redirect()->back()->with('success','product deleted successfully');
               
    }   
}
