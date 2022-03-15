<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    // protected $product;
    // protected $products;

    public function index()
    {
        $products= Product::all();
        return view('Product.view',compact('products'));
    }

    public function newProduct(Request $request){

        Product:: newProduct($request);
        return redirect()->back()->with('message','Product Saved Successfully');
    }

    public  function editProduct($id){
        $products = Product::findOrFail($id);
        return view('Product.edit',compact('products'));
    }

    public function updateProduct(Request $request){
       Product::updateProduct($request);
       Product::find($request->product_id);
       return redirect('/product')->with('message','Product Updated Successfully');
    }

    public function delectProduct($id){
        Product::findOrFail($id)->delete();
        return redirect()->back()->with('message',' Data Delete Successfully');
    }
}
