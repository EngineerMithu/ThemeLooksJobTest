<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'product_name',
        'gender',
        'color',
        'size',
        'price'
    ];

    protected static $product;

    public static function newProduct($request){
        self::$product= new Product();
        self::$product->product_name = $request->product_name;
        self::$product->gender       = $request->gender;
        self::$product->color        = $request->color;
        self::$product->size         = $request->size;
        self::$product->price        = $request->price; 
        self::$product->save();
    }
    public static function updateProduct($request){
        
        self::$product= Product::find($request->product_id);

        self::$product->product_name = $request->product_name;
        self::$product->gender       = $request->gender;
        self::$product->color        = $request->color;
        self::$product->size         = $request->size;
        self::$product->price        = $request->price; 
        self::$product->save();
    }
}
