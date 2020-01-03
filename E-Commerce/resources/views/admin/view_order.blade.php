@extends('admin_layout')

@section('admin_content')

<div class="row-fluid sortable">
    <div class="box span6">
        <div class="box-header">
            <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Details</h2>
        </div>
        <div class="box-content">
            <table class="table">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Mobile</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($order_by_id as $item)
                        @endforeach

                        <td>{{$item->customer_name}}</td>
                        <td>{{$item->customer_number}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="box span6">
        <div class="box-header">
            <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Mobile Number</th>
                        <th>Email</th>
                    </tr>
                </thead>

                

                <tbody>
                    <tr>
                        @foreach ($order_by_id as $item)
                            @php
                                $shipping_fullname = $item->shipping_first_name." ".$item->shipping_last_name
                            @endphp
                        @endforeach

                        <td>{{$shipping_fullname}}</td>
                        <td>{{$item->shipping_address}}</td>
                        <td>{{$item->shipping_mobile_number}}</td>
                        <td>{{$item->shipping_email}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="box span6">
        <div class="box-header">
            <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Details</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Sales Quantity</th>
                        <th>Product Sub Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($order_by_id as $item)        
                        <tr>
                            <td>{{$item->product_id}}</td>
                            <td>{{$item->product_name}}</td>
                            <td>{{$item->product_price}}</td>
                            <td>{{$item->product_sales_quantity}}</td>
                            <td>{{$item->product_price * $item->product_sales_quantity}} Tk</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">Total With Vat :</td>
                        <td width="25%"><strong>={{$item->order_total}} Tk</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>
@endsection