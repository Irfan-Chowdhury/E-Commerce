<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryController extends Controller
{
    public function index()
    {
        $this->AdminAuthCheck();

        return view('admin.add_category');
    }

    public function all_category()
    {
        $this->AdminAuthCheck();

        $all_category_info=DB::table('category_tbl')->get();

        $manage_category = view('admin.all_category')
                            ->with('category_details',$all_category_info); //ঐ পেজে আইডি ধরে ভ্যালু পাঠাইছে 
        
            return view('admin_layout')   //জোড়া দেয়ার জন্য 
                            ->with('admin.all_category',$manage_category);

        //return view('admin.all_category');
    }


    public function save_category(Request $request)
    {
        $data = array();
        $data['category_id']          = $request->category_id;
        $data['category_name']        = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['publication_status']   = $request->publication_status;
    
        // echo "<pre>";
        //  print_r($data);
        // echo "</pre>";

        DB::table('category_tbl')->insert($data);
        Session::put('message','Category added Successfully !!');
        return Redirect::to('/add-category');
        // return redirect('/add-category');
    }

    public function inactive_category($category_id)
    {
        //echo $category_id;

        DB::table('category_tbl')
            ->where('category_id',$category_id)
            ->update(['publication_status'=>0]);
            
        Session::put('inactive_message','Category inactive Successfully !!');
        return redirect('/all-category');
    }



    public function active_category($category_id)
    {
        //echo $category_id;

        DB::table('category_tbl')
            ->where('category_id',$category_id)
            ->update(['publication_status'=>1]);

        Session::put('active_message','Category active Successfully !!');
        return redirect('/all-category');
    }


    // ================ For Edit ===================

    public function edit_category($category_id)
    {
        $this->AdminAuthCheck();

        $category_info = DB::table('category_tbl')
                        ->where('category_id',$category_id)
                        ->first();
        
        $getCategoryById = view('admin.edit_category')
                        ->with('category_details',$category_info); //ঐ পেজে আইডি ধরে ভ্যালু পাঠাইছে 

        return view('admin_layout')   //জোড়া দেয়ার জন্য 
                        ->with('admin.edit_category',$getCategoryById);
    }


    // ================ U P D A T E ======================

    public function update_category(Request $request, $category_id)
    {
        $data = array();
        $data['category_id']          = $request->category_id;
        $data['category_name']        = $request->category_name;
        $data['category_description'] = $request->category_description;

        DB::table('category_tbl')
            ->where('category_id',$category_id)
            ->update($data);

            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            
        Session::put('update_message','Category Updated Successfully !!');
        return Redirect::to('/all-category');
    }


    // ================ D E L E T E ======================

    public function delete_category($category_id)
    {
        DB::table('category_tbl')
            ->where('category_id',$category_id)
            ->delete();
        
        Session::put('delete_message','Category Deleted Successfully !!');
        return Redirect::to('/all-category');
    }


// ====================== ADMIN Authentication Check ===========
    public function AdminAuthCheck()
    {
        $admin_id = Session::get('admin_id');
        
        if ($admin_id) 
        {
            return;
        }
        else 
        {
            return Redirect::to('/admin')->send();
        }
    }
}
