<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ManufactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.add_manufacture');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = array();
        $data['manufacture_id']          = $request->manufacture_id;
        $data['manufacture_name']        = $request->manufacture_name;
        $data['manufacture_description'] = $request->manufacture_description;
        $data['publication_status']      = $request->publication_status;
    
        // echo "<pre>";
        //  print_r($data);
        // echo "</pre>";

        DB::table('manufacture_tbl')->insert($data);
        Session::put('message','Manufacture added Successfully !!');
        return Redirect::to('/add-manufacture');
    }

    // ============================  All Manufacture ============================
    
    public function all_manufacture()
    {
        $all_manufacture_info=DB::table('manufacture_tbl')->get();

        $manage_manufacture = view('admin.all_manufacture')
                            ->with('manufacture_details',$all_manufacture_info); //ঐ পেজে আইডি ধরে ভ্যালু পাঠাইছে 
        
            return view('admin_layout')   //জোড়া দেয়ার জন্য 
                            ->with('admin.all_manufacture',$manage_manufacture);

    }


    public function inactive_manufacture($manufacture_id)
    {

        DB::table('manufacture_tbl')
            ->where('manufacture_id',$manufacture_id)
            ->update(['publication_status'=>0]);
            
        Session::put('inactive_message','Manufacture inactive Successfully !!');
        return redirect('/all-manufacture');
    }


    public function active_manufacture($manufacture_id)
    {
        //echo $manufacture_id;

        DB::table('manufacture_tbl')
            ->where('manufacture_id',$manufacture_id)
            ->update(['publication_status'=>1]);

        Session::put('active_message','Manufacture active Successfully !!');
        return redirect('/all-manufacture');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($manufacture_id)
    {
        $manufacture_info = DB::table('manufacture_tbl')
                        ->where('manufacture_id',$manufacture_id)
                        ->first();
        
        $getManufactureById = view('admin.edit_manufacture')
                        ->with('manufacture_details',$manufacture_info); //ঐ পেজে আইডি ধরে ভ্যালু পাঠাইছে 

        return view('admin_layout')   //জোড়া দেয়ার জন্য 
                        ->with('admin.edit_manufacture',$getManufactureById);
    }


    // ================ U P D A T E ======================
    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $manufacture_id)
    {
        $data = array();
        $data['manufacture_id']          = $request->manufacture_id;
        $data['manufacture_name']        = $request->manufacture_name;
        $data['manufacture_description'] = $request->manufacture_description;

        DB::table('manufacture_tbl')
            ->where('manufacture_id',$manufacture_id)
            ->update($data);

            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            
        Session::put('update_message','Manufacture Updated Successfully !!');
        return Redirect::to('/all-manufacture');
    }

    
    // ================ D E L E T E ======================
    /**
    * Remove the specified resource from storage.
    */
    public function destroy($manufacture_id)
    {
        DB::table('manufacture_tbl')
            ->where('manufacture_id',$manufacture_id)
            ->delete();
        
        Session::put('delete_message','Manufacture Deleted Successfully !!');
        return Redirect::to('/all-manufacture');
    }
}
