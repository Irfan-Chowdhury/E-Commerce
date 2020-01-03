<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Cart;

class CheckoutController extends Controller
{
   public function login_check()
   {
        $customer_id = Session::get('customer_id');

        if ($customer_id) 
        {
            return Redirect::to('/checkout')->send();
        }
        else 
        {
            return view('pages.login');
        }
        
    //    return view('pages.login');
   }

   public function customer_registration(Request $request)
   {
       $data= array();
       $data['customer_name']=$request->customer_name;
       $data['customer_email']=$request->customer_email;
       $data['password']=$request->password;
       $data['customer_number']=$request->customer_number;

       $customer_id=DB::table('customer_tbl')
                        ->insertGetId($data);
        
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);

        return Redirect::to('/checkout');
   }

   public function checkout()
   {
       $this->AdminAuthCheck();
       return view('pages.checkout');
     
   }

   public function save_shipping_details(Request $request)
   {
       $data = array();
       $data['shipping_email']        =$request->shipping_email;
       $data['shipping_first_name']   =$request->shipping_first_name;
       $data['shipping_last_name']    =$request->shipping_last_name;
       $data['shipping_address']      =$request->shipping_address;
       $data['shipping_mobile_number']=$request->shipping_mobile_number;
       $data['shipping_city']         =$request->shipping_city;

    //    echo "<pre>";
    //    print_r($data);
    //    echo "</pre>";

    $shipping_id = DB::table('shipping_tbl')
                    ->insertGetId($data);

    Session::put('shipping_id',$shipping_id);
    return Redirect::to('/payment');

   }

   public function payment()
   {
       return view('pages.payment');
   }


   public function order_place(Request $request)
   {
       /*
       $payment_method = $request->payment_method;
       $shipping_id     =Session::get('shipping_id');
       $customer_id     =Session::get('customer_id');

       echo $payment_method;
       echo $customer_id;
       echo "<pre>";
       print_r($shipping_id);
       echo "</pre>";
       */

       // $contents =  Cart::content();

       // echo "<pre>";
       // print_r($contents);
       // echo "</pre>";   

       $payment_method = $request->payment_method;

       $paymentData = array();  //paymentData- payment data
       $paymentData['payment_method'] = $payment_method;
       $paymentData['payment_status'] = 'pending';
       $payment_id = DB::table('payment_tbl')
                    ->insertGetId($paymentData);

        
        $orderData= array(); //orderData = orderdata
        $orderData['customer_id']= Session::get('customer_id');
        $orderData['shipping_id']= Session::get('shipping_id');
        $orderData['payment_id'] = $payment_id;
        $orderData['order_total']= Cart::total();
        $orderData['order_status']='pending';
        $order_id = DB::table('order_tbl')
                    ->insertGetId($orderData);


        $contents= Cart::content();
        $orderDetailsData= array();
        foreach ($contents as  $value) 
        {
            $orderDetailsData['order_id']      = $order_id;
            $orderDetailsData['product_id']    = $value->id;
            $orderDetailsData['product_name']  = $value->name;
            $orderDetailsData['product_price'] = $value->price;
            $orderDetailsData['product_sales_quantity']= $value->qty;

            DB::table('order_details_tbl')
            ->insert($orderDetailsData);
        }  


        if ($payment_method=='handcash') 
        {
            Cart::destroy();
            return view('pages.handcash');
        }
        elseif ($payment_method=='paypal') 
        {   
            Cart::destroy();
            echo "Successfully done by Paypal";
        }
        elseif ($payment_method=='bkash') 
        {
            Cart::destroy();
            echo "Successfully done by Bkash";
        }
        elseif ($payment_method=='rocket') 
        {
            Cart::destroy();
            echo "Successfully done by Rocket";
        }
        else 
        {
            echo "not Selected";
        }

   }




   public function customer_login(Request $request)
   {
        $customer_email    = $request->customer_email;
        $password          = $request->password;
        $result         = DB::table('customer_tbl')
                        ->where('customer_email',$customer_email)
                        ->where('password',$password)
                        ->first();
                
                // echo "<pre>";
                // print_r($result);
                // echo "</pre>";
        if ($result) 
        {
            Session::put('customer_id',$result->customer_id);
            return Redirect::to('/checkout');
        }
        else 
        {
            Session::put('error_message','Email or Password Invalid');
            return Redirect::to('/login-check');
        }
   }


   public function customer_logout()
   {

        Session::flush(); //better for use... এর মানে হল logout দিলে সব কিছু destroy হয়ে যাবে | exmple: without login (access by url link) ডাটাবেজে থেক আসা নাম,id কিছুই শো করবেনা।   
            
        return Redirect::to('/login-check');
   }



   public function AdminAuthCheck()
    {
        $customer_id = Session::get('customer_id');

        if ($customer_id) 
        {
            return;
            //return Redirect::to('/checkout')->send();
        }
        else 
        {
            return Redirect::to('/login-check')->send();
        }
    }
}
