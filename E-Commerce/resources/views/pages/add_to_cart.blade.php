@extends('layout')

@section('content')
    
<section id="cart_items">
    <div class="container col-sm-12">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
        
        {{-- ======================= Cart() =======================   --}}
            <?php 
                $contents =Cart::content();
                // echo "<pre>";
                //     print_r($contents);
                // echo "</pre>";
            ?>
        {{-- ======================= Cart() =======================   --}}

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
        <div class="row">
            <div class="col-sm-8">
                <div class="total_area">
                    <ul>
                    <li>Cart Sub Total <span>$ {{Cart::subtotal()}}</span></li>
                        <li>Eco Tax <span>$ {{Cart::tax()}}</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>$ {{Cart::total()}}</span></li>
                    </ul>
                        <a class="btn btn-default update" href="">Update</a>

	    {{-- ====================================  Checkout  ================================= --}}
                @php
                    $customer_id= Session::get('customer_id');
                    $shipping_id= Session::get('shipping_id');
                        // print_r($customer_id);
                        // print_r($shipping_id);
                @endphp
                    @if ($customer_id != NULL && $shipping_id = NULL)
                        <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Check Out</a>
                    @elseif($customer_id != NULL && $shipping_id != NULL)    
                        <a class="btn btn-default check_out" href="{{URL::to('/payment')}}">Check Out</a>
                    @else
                        <a class="btn btn-default check_out" href="{{URL::to('/login-check')}}">Check Out</a>
                    @endif
        {{-- ====================================  E N D ====================================== --}}
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->

@endsection