<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class SuperAdminController extends Controller
{
    

    public function dashboard()
    {
        $this->AdminAuthCheck();
        return view('admin.dashboard');
    }

    public function logout()
    {
        // Session::put('admin_name',NULL);
        // Session::put('admin_id',NULL);

        Session::flush(); //better for use... এর মানে হল logout দিলে সব কিছু destroy হয়ে যাবে | exmple: without login (access by url link) ডাটাবেজে থেক আসা নাম,id কিছুই শো করবেনা।   
        
        return Redirect::to('/admin');
    }

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
