@extends('layout')

@section('content')
    
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-sm-offset-1">
                <div class="login-form"><!--login form-->

        <p class="alert-danger">
            @php
                $err_msg = Session::get('error_message');

                if ($err_msg) 
                {
                    echo $err_msg;
                    Session::put('error_message',NULL);
                    // $request->session()->put('error_message', NULL);
                }
            @endphp
        </p>

                    <h2>Login to your account</h2>
                    <form action="{{url('/customer-login')}}">
                        {{ csrf_field() }}
                        <input type="text" name="customer_email" placeholder="Email Address" />
                        <input type="password" name="password" placeholder="Password" />
                        
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form action="{{url('/customer-registration')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="customer_name" placeholder="Customer Name"/>
                        <input type="email" name="customer_email" placeholder="Email Address"/>
                        <input type="password" name="password" placeholder="Password"/>
                        <input type="text" name="customer_number" placeholder="Mobile Number"/>
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->


@endsection