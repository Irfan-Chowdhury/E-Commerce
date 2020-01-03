@extends('admin_layout')

@section('admin_content')
    
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Order Details</a></li>
</ul>

            {{-- ====================  Show Message ====================== --}}
            @php
                $inactive_message = Session::get('inactive_message');
                $active_message = Session::get('active_message');
                $update_message = Session::get('update_message'); 
                $delete_message = Session::get('delete_message'); 
                
                if ($inactive_message) 
                {
                    echo "<p class='alert alert-success'>".$inactive_message."</p>";
                    Session::put('inactive_message',NULL);
                }
                elseif($active_message) 
                {
                    echo "<p class='alert alert-success'>".$active_message."</p>";
                    Session::put('active_message',NULL);
                }
                elseif ($update_message) 
                {
                    echo "<p class='alert alert-success'>".$update_message."</p>";
                    Session::put('update_message',NULL);
                }
                elseif ($delete_message) 
                {
                    echo "<p class='alert alert-success'>".$delete_message."</p>";
                    Session::put('delete_message',NULL);
                }
            @endphp
            {{-- ====================  // Message ====================== --}}

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Order Details</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Order Total</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>  

                @php  $i=0;   @endphp
                
            @foreach ($all_order_info as $valueOrder)
                @php  $i++;   @endphp                     

                <tbody>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $valueOrder->order_id }}</td>
                        <td class="center">{{$valueOrder->customer_name}}</td>
                        <td class="center">{{$valueOrder->order_total}}</td>
                        <td class="center">{{$valueOrder->order_status}}</td>

                        <td class="center">
                            @if ($valueOrder->order_status=='pending')
                                <span class="label label-danger">Pending</span>
                                                                
                            @else
                                <span class="label label-success">Done</span>
                            @endif                              
                        </td>

                        <td class="center">
                            @if ($valueOrder->order_status=='pending')
                                <a class="btn btn-success" href="{{URL::to('/done-order/'.$valueOrder->order_id )}}">
                                    <i class="halflings-icon white thumbs-up"></i>  
                                </a>
                            @else
                                <a class="btn btn-danger" href="{{URL::to('/pending-order/'.$valueOrder->order_id )}}">
                                    <i class="halflings-icon white thumbs-down"></i>  
                                </a>
                            @endif

                                <a class="btn btn-info" href="{{URL::to('/view-order/'.$valueOrder->order_id )}}">
                                    <i class="halflings-icon white edit"></i>  
                                </a>
                                <a class="btn btn-danger" href="{{URL::to('/delete-order/'.$valueOrder->order_id )}}" onClick="return confirm('Are you to delete?')">
                                    <i class="halflings-icon white trash"></i> 
                                </a>
                        </td>
                    </tr>
                </tbody>
                @endforeach

            </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->



@endsection