<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        $qty = $request->qty;
        $product_id=$request->product_id;

        $product_info = DB::table('products_tbl')
                        ->where('product_id',$product_id)
                        ->first();

                    // echo "<pre>";
                    // print_r($product_info);
                    // echo "</pre>";
        $data['qty']             =$qty;
        $data['id']              =$product_info->product_id;
        $data['name']            =$product_info->product_name;
        $data['price']           =$product_info->product_price;
        $data['options']['image']=$product_info->product_image;

        Cart::add($data);
        return Redirect::to('/show-cart');

    }

    public function show_cart()
    {
        $all_published_category=DB::table('category_tbl')
                                    ->where('publication_status',1)
                                    ->get();

        $manage_published_category = view('pages.add_to_cart')
                            ->with('all_published_category',$all_published_category); //ঐ পেজে আইডি ধরে ভ্যালু পাঠাইছে 
        
        return view('layout')   //জোড়া দেয়ার জন্য 
                            ->with('pages.add_to_cart',$manage_published_category);
    }


    public function delete_to_cart($rowId)
    {
        // echo $rowId;
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }

    public function update_cart(Request $request)
    {
        $qty = $request->qty;
        $rowId = $request->rowId;

        // echo $qty;
        // echo "<br>";
        // echo $rowId;

        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }


}
