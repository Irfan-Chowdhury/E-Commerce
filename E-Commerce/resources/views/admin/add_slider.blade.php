@extends('admin_layout')

@section('admin_content')
    
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a>
        <i class="icon-angle-right"></i> 
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="#">Add Slider</a>
    </li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Slider</h2>
        </div>

            {{-- ====================  Show Message ====================== --}}
              @php
                  $success_msg = Session::get('message');
                  if ($success_msg) 
                {
                  echo "<p class='alert alert-success'>".$success_msg."</p>";
                  Session::put('message',NULL);
                  // $request->session()->put('error_message', NULL);
                }
              @endphp
            {{-- ====================  // Message ====================== --}}
            
        <div class="box-content">
        <form class="form-horizontal" action="{{url('/store-slider')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
              <fieldset>

                <div class="control-group">
                    <label class="control-label" for="fileInput">Slider Image</label>
                    <div class="controls">
                        <input class="input-file uniform_on" id="fileInput" name="slider_image" type="file" required>
                    </div>
                </div> 

                <div class="control-group">
                    <label class="control-label" for="date01">Publication Status</label>
                    <div class="controls">
                      <input type="checkbox" class="input-xlarge" name="publication_status" value="1" required>
                    </div>
                  </div>

                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Add Slider</button>
                  <button type="reset" class="btn">Cancel</button>
                </div>
              </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->

@endsection