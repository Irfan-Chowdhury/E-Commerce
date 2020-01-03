<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class SliderController extends Controller
{
   
    public function index()
    {
        return view('admin.add_slider');
    }

 

    public function store(Request $request)
    {
        $data = array();
        $data['publication_status']  = $request->publication_status;

        $image = $request->file('slider_image');

        if ($image)   //with Image
        {
            $image_name=str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name. '.' .$ext;
            $upload_path= 'image/slider/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path , $image_full_name);
            if ($success) 
            {
                $data['slider_image'] = $image_url; 

                DB::table('slider_tbl')->insert($data);
                Session::put('message','Slider Image Added Succesfully !!');
                return Redirect::to('/add-slider');
            }
        }

        $data['slider_image']= "";  //Without Image

        DB::table('slider_tbl')->insert($data);
        Session::put('message','Slider Image Added Succesfully !!');
        return Redirect::to('/add-slider');
    }




    public function all_slider()
    {
        $all_slider_info=DB::table('slider_tbl')
                            ->orderBy('slider_id', 'desc')        
                            ->get();

        $manage_slider = view('admin.all_slider')
                            ->with('slider_details',$all_slider_info); //ঐ পেজে আইডি ধরে ভ্যালু পাঠাইছে 
        
        return view('admin_layout')   //জোড়া দেয়ার জন্য 
                            ->with('admin.all_slider',$manage_slider);
    }


    public function inactive_slider($slider_id)
    {
        //echo $slider_id;

        DB::table('slider_tbl')
            ->where('slider_id',$slider_id)
            ->update(['publication_status'=>0]);
            
        Session::put('inactive_message','Slider inactive Successfully !!');
        return redirect('/all-slider');
    }


    public function active_slider($slider_id)
    {
        //echo $slider_id;

        DB::table('slider_tbl')
            ->where('slider_id',$slider_id)
            ->update(['publication_status'=>1]);

        Session::put('active_message','Slider active Successfully !!');
        return redirect('/all-slider');
    }


    // ================ D E L E T E ======================

    public function destroy($slider_id)
    {
        
       
        DB::table('slider_tbl')
            ->where('slider_id',$slider_id)
            ->delete();
        
        Session::put('delete_message','Slider Deleted Successfully !!');
        return Redirect::to('/all-slider');
    }

}
