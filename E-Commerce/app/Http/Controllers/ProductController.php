<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{

    public function index()
    {
        return view('admin.add_product');
    }

    // ========================= Store Product ====================

        // Store a newly created resource in storage.

    public function store(Request $request)
    {
        $data = array();
        $data['product_name']   =$request->product_name;
        $data['category_id']    =$request->category_id;
        $data['manufacture_id'] =$request->manufacture_id;
        $data['product_short_description'] =$request->product_short_description;
        $data['product_long_description']  =$request->product_long_description;
        $data['product_price']  =$request->product_price;
        $data['product_size']   =$request->product_size;
        $data['product_color']  =$request->product_color;
        $data['publication_status']   =$request->publication_status;

        $image = $request->file('product_image');

        if ($image)   //with Image
        {
            $image_name=str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name. '.' .$ext;
            $upload_path= 'image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path , $image_full_name);
            if ($success) 
            {
                $data['product_image'] = $image_url; 

                DB::table('products_tbl')->insert($data);
                Session::put('message','Product Added Succesfully !!');
                return Redirect::to('/add-product');
            }
        }

        $data['product_image']="";  //Without Image

        DB::table('products_tbl')->insert($data);
        Session::put('message','Product Added Succesfully !!');
        return Redirect::to('/add-product');

    }

    // ========================= READ  Products ====================

    public function all_product()
    {
        $all_product_info = DB::table('products_tbl')
                                ->select('products_tbl.*','category_tbl.category_name','manufacture_tbl.manufacture_name')  //select must be use otherwise a problem create in inactive/active part
                                ->join('category_tbl','products_tbl.category_id','=','category_tbl.category_id')
                                ->join('manufacture_tbl','products_tbl.manufacture_id','=','manufacture_tbl.manufacture_id')
                                ->get();

        // echo "<pre>";
        //     print_r($all_product_info);
        // echo "</pre>";
        //     exit();

        $manage_product = view('admin.all_product')
                        ->with('product_details',$all_product_info); //ঐ পেজে আইডি ধরে ভ্যালু পাঠাইছে 
        
        return view('admin_layout')   //জোড়া দেয়ার জন্য 
                        ->with('admin.all_product',$manage_product);
    }


    // ========================= Inactive Product ====================

    public function inactive_product($product_id)
    {
        // echo $product_id;

        DB::table('products_tbl')
            ->where('product_id',$product_id)
            ->update(['publication_status'=> 0]);
            
        Session::put('inactive_message','Product inactive Successfully !!');
        return redirect('/all-product');
    }

    // ========================= Active Product ====================

    public function active_product($product_id)
    {
        //echo $product_id;

        DB::table('products_tbl')
            ->where('product_id',$product_id)
            ->update(['publication_status'=>1]);

        Session::put('active_message','Product active Successfully !!');
        return redirect('/all-product');
    }


    // ========================= D E L E T E ====================
    
        //Remove the specified resource from storage.

    public function destroy($product_id)
    {
        DB::table('products_tbl')
            ->where('product_id',$product_id)
            ->delete();
        
        Session::put('delete_message','Product Deleted Successfully !!');
        return Redirect::to('/all-product');
    }

    








    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    
}
