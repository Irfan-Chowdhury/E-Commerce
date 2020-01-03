@extends('layout')

@section('content')
<style>
.paymentWrap {
	padding: 50px;
}

.paymentWrap .paymentBtnGroup {
	max-width: 800px;
	margin: auto;
}

.paymentWrap .paymentBtnGroup .paymentMethod {
	padding: 40px;
	box-shadow: none;
	position: relative;
}

.paymentWrap .paymentBtnGroup .paymentMethod.active {
	outline: none !important;
}

.paymentWrap .paymentBtnGroup .paymentMethod.active .method {
	border-color: #4cd264;
	outline: none !important;
	box-shadow: 0px 3px 22px 0px #7b7b7b;
}

.paymentWrap .paymentBtnGroup .paymentMethod .method {
	position: absolute;
	right: 3px;
	top: 3px;
	bottom: 3px;
	left: 3px;
	background-size: contain;
	background-position: center;
	background-repeat: no-repeat;
	border: 2px solid transparent;
	transition: all 0.5s;
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.visa {
	/* background-image: url("data:image/png;base64,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"); */
	background-image: url("data:image/jpeg;base64,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");
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.master-card {
	/* background-image: url("data:image/png;base64,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"); */
	background-image: url("https://t3n9sm.c2.acecdn.net/wp-content/uploads/2014/06/paypal-logo.png");
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.amex {
	/* background-image: url("http://www.paymentscardsandmobile.com/wp-content/uploads/2015/08/Amex-icon.jpg"); */
    background-image: url("https://s3-ap-southeast-1.amazonaws.com/staging-hifi-digital/wp-content/uploads/sites/2/2018/06/01224652/bkash-01.jpg");

}

.paymentWrap .paymentBtnGroup .paymentMethod .method.ez-cash {
	/* background-image: url("http://www.busbooking.lk/img/carousel/BusBooking.lk_ezCash_offer.png"); */
	background-image: url("https://emishop.com.bd/image/cache/data/image/Rocket-485x193.png");
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.vishwa {
	background-image: url("http://i.imgur.com/VkiM7PL.jpg");
}


.paymentWrap .paymentBtnGroup .paymentMethod .method:hover {
	border-color: #4cd264;
	outline: none !important;
}
</style>



<section id="cart_items">
    <div class="container col-sm-12">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            
            <?php 
                $contents =Cart::content();
                // echo "<pre>";
                //     print_r($contents);
                // echo "</pre>";
            ?>

            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Image</td>
                        <td class="description">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contents as $itemContent) 
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="{{$itemContent->options->image}}" alt="" height="50px" width="60px"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$itemContent->name}}</a></h4>
                                
                            </td>
                            <td class="cart_price">
                                <p>$ {{$itemContent->price}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <form action="{{url('/update-cart')}}" method="post">
                                        {{ csrf_field() }}
                                        <input class="cart_quantity_input" type="text" name="qty" value="{{$itemContent->qty}}" autocomplete="off" size="2">
                                        <input type="hidden" name="rowId" value="{{$itemContent->rowId}}">
                                        <input type="submit" name="submit" value="update" class="btn btn-sm btn-default">
                                    </form>               
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">$ {{$itemContent->total}}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$itemContent->rowId)}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
<div class="container">
    <div class="heading">
        <h3>What would you like to do next?</h3>
        <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
    </div>
    <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Payment method</li>
        </ol>
    </div>
    <div class="paymentCont col-sm-8">
                <div class="headingWrap">
                        <h3 class="headingTop text-center">Select Your Payment Method</h3>	
                        <p class="text-center">Created with bootsrap button and using radio button</p>
                </div>
                <form action="{{url('/order-place')}}" method="POST"> 
                    {{ csrf_field() }}               
                    <div class="paymentWrap">
                        <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
                            <label class="btn paymentMethod active">
                                <div class="method visa"></div>
                                <input type="radio" name="payment_method" value="handcash" checked> 
                            </label>
                            <label class="btn paymentMethod">
                                <div class="method master-card"></div>
                                <input type="radio" name="payment_method" value="paypal"> 
                            </label>
                            <label class="btn paymentMethod">
                                <div class="method amex"></div>
                                <input type="radio" name="payment_method" value="bkash">
                            </label>
                            <label class="btn paymentMethod">
                                <div class="method ez-cash"></div>
                                <input type="radio" name="payment_method" value="rocket"> 
                            </label> 
                            {{-- <label class="btn paymentMethod">
                                <div class="method vishwa"></div>
                                <input type="radio" name="payment_method" value="visa"> 
                            </label> --}}
                        </div>        
                    </div>
                    <div class="footerNavWrap clearfix">
                            <button type="submit" class="btn btn-success pull-left btn-fyi">Done</button>
                    </div>
                </form>
                
            </div>
</div>
</section>
<!--/#do_action-->


@endsection