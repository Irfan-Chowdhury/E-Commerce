<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ManageorderController extends Controller
{
    public function manage_order()
    {
       $all_order_info = DB::table('order_tbl')
                        ->select('order_tbl.*','customer_tbl.customer_name')
                        ->join('customer_tbl','order_tbl.customer_id','=','customer_tbl.customer_id')
                        ->get();

        $manage_order = view('admin.manage_order')
                        ->with('all_order_info',$all_order_info);

        return view('admin_layout')
                ->with('admin.manage_order',$manage_order);

    }


    public function view_order($order_id)
    {
        $order_by_id = DB::table('order_tbl')
                        ->select('order_tbl.*','customer_tbl.*','order_details_tbl.*','shipping_tbl.*')
                        ->join('customer_tbl','order_tbl.customer_id','=','customer_tbl.customer_id')
                        ->join('order_details_tbl','order_tbl.order_id','=','order_details_tbl.order_id')
                        ->join('shipping_tbl','order_tbl.shipping_id','=','shipping_tbl.shipping_id')
                        ->where('order_tbl.order_id','=',$order_id)
                        ->get();
        
        // echo "<pre>";
        // print_r($order_by_id);
        // echo "</pre>";

        $view_order = view('admin.view_order')
                    ->with('order_by_id',$order_by_id);

        return view('admin_layout')
                    ->with('admin.view_order',$view_order);
    }



    public function done_order($order_id)
    {
        DB::table('order_tbl')
            ->where('order_id',$order_id)
            ->update(['order_status'=>'done']);

        //Session::put('active_message','Slider active Successfully !!');
        return redirect('/manage-order');
    }


    public function pending_order($order_id)
    {
        DB::table('order_tbl')
            ->where('order_id',$order_id)
            ->update(['order_status'=>'pending']);

        //Session::put('active_message','Slider active Successfully !!');
        return redirect('/manage-order');
    }


    // ================ D E L E T E ======================

    public function delete_order($order_id)
    {
        DB::table('order_tbl')
            ->where('order_id',$order_id)
            ->delete();
        
        Session::put('delete_message','Order Deleted Successfully !!');
        return Redirect::to('/manage-order');
    }
}


