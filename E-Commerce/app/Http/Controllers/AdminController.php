<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();
class AdminController extends Controller
{
    public function index()
    {
        return view('admin_login');
    }


    public function admin_dashboard(Request $request)
    {
        $admin_email    = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $result         = DB::table('admin_tbl')
                          ->where('admin_email',$admin_email)
                          ->where('admin_password',$admin_password)
                          ->first();
                
                // echo "<pre>";
                // print_r($result);
                // exit();
        if ($result) 
        {
            // Session::put('admin_name',$result->admin_name);
            // Session::put('admin_id',$result->admin_id);
            // return Redirect::to('/dashboard');

            $request->session()->put('admin_name', $result->admin_name);
            $request->session()->put('admin_id', $result->admin_id);
            return redirect('/dashboard');
        }
        else 
        {
            Session::put('error_message','Email or Password Invalid');
            return Redirect::to('/admin');
        }
    }
}


