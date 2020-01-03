<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        //return view('pages.home_content');
        $all_published_product = DB::table('products_tbl')
                                ->select('products_tbl.*','category_tbl.category_name','manufacture_tbl.manufacture_name')  //select must be use otherwise a problem create in inactive/active part
                                ->join('category_tbl','products_tbl.category_id','=','category_tbl.category_id')
                                ->join('manufacture_tbl','products_tbl.manufacture_id','=','manufacture_tbl.manufacture_id')
                                ->where('products_tbl.publication_status',1)
                                ->limit(6)
                                ->get();


        $manage_published_product = view('pages.home_content')
                        ->with('all_published_product',$all_published_product); //ঐ পেজে আইডি ধরে ভ্যালু পাঠাইছে 
        
        return view('layout')   //জোড়া দেয়ার জন্য 
                        ->with('pages.home_content',$manage_published_product);
    }


    // ============ Show Product By Category =================

    public function showProductByCat($category_id)
    {
        $product_by_cat = DB::table('products_tbl')
                                ->select('products_tbl.*','category_tbl.category_name','manufacture_tbl.manufacture_name')  //select must be use otherwise a problem create in inactive/active part
                                ->join('category_tbl','products_tbl.category_id','=','category_tbl.category_id')
                                ->join('manufacture_tbl','products_tbl.manufacture_id','=','manufacture_tbl.manufacture_id')
                                ->where('category_tbl.category_id',$category_id)
                                ->where('products_tbl.publication_status',1)
                                ->limit(6)
                                ->get();


        $manage_product_by_cat = view('pages.product_by_category')
                        ->with('product_by_cat',$product_by_cat); //ঐ পেজে আইডি ধরে ভ্যালু পাঠাইছে 
        
        return view('layout')   //জোড়া দেয়ার জন্য 
                        ->with('pages.product_by_category',$manage_product_by_cat);
    }


    // ============ Show Product By Manufacture =================

    public function showProductByManufacture($manufacture_id)
    {
        $product_by_manufacture = DB::table('products_tbl')
                                ->select('products_tbl.*','category_tbl.category_name','manufacture_tbl.manufacture_name')  //select must be use otherwise a problem create in inactive/active part
                                ->join('category_tbl','products_tbl.category_id','=','category_tbl.category_id')
                                ->join('manufacture_tbl','products_tbl.manufacture_id','=','manufacture_tbl.manufacture_id')
                                ->where('manufacture_tbl.manufacture_id',$manufacture_id)
                                ->where('products_tbl.publication_status',1)
                                ->limit(6)
                                ->get();


        $manage_product_by_manufacture = view('pages.product_by_manufacture')
                        ->with('product_by_manufacture',$product_by_manufacture); //ঐ পেজে আইডি ধরে ভ্যালু পাঠাইছে 
        
        return view('layout')   //জোড়া দেয়ার জন্য 
                        ->with('pages.product_by_manufacture',$manage_product_by_manufacture);
    }


    public function product_details_by_id($product_id)
    {
        $product_by_details = DB::table('products_tbl')
                                ->select('products_tbl.*','category_tbl.category_name','manufacture_tbl.manufacture_name')  //select must be use otherwise a problem create in inactive/active part
                                ->join('category_tbl','products_tbl.category_id','=','category_tbl.category_id')
                                ->join('manufacture_tbl','products_tbl.manufacture_id','=','manufacture_tbl.manufacture_id')
                                ->where('products_tbl.product_id',$product_id)
                                ->where('products_tbl.publication_status',1)
                                ->limit(6)
                                ->first();


        $manage_product_by_details = view('pages.product_details')
                        ->with('product_by_details',$product_by_details); //ঐ পেজে আইডি ধরে ভ্যালু পাঠাইছে 
        
        return view('layout')   //জোড়া দেয়ার জন্য 
                        ->with('pages.product_details',$manage_product_by_details);
    }
}
