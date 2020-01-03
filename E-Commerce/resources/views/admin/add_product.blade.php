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
        <a href="#">Add Product</a>
    </li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
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
        <form class="form-horizontal" action="{{url('/store-product')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

              <fieldset>
                
                <div class="control-group">
                  <label class="control-label" for="date01">Product Name</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="product_name">
                  </div>
                </div>

     
                <div class="control-group">
                    <label class="control-label" for="selectError3">Product Category</label>
                    <div class="controls">
                        <select id="selectError3" name="category_id">
                            <option>-- Select Category --</option>
                {{-- ------------------- Category -------------------------- --}}
                            @php
                              $all_publication_status = DB::table('category_tbl')
                                                        ->where('publication_status',1)
                                                        ->get();
                            @endphp	
                            @foreach ($all_publication_status as $valueCat)	
                                <option value="{{$valueCat->category_id}}">{{$valueCat->category_name}}</option>					
                            @endforeach
                {{-- ------------------- Category End --------------------- --}}
                        </select>
                    </div>
                </div>
                         
                <div class="control-group">
                    <label class="control-label" for="selectError3">Product Manufacture</label>
                    <div class="controls">
                        <select id="selectError3" name="manufacture_id">
                            <option>-- Select Manufacture --</option>
                {{-- ------------------- Manufacture -------------------------- --}}
                            @php
                              $all_publication_status = DB::table('manufacture_tbl')
                                                      ->where('publication_status',1)
                                                      ->get();
                            @endphp	
                            @foreach ($all_publication_status as $valueManufacture)	
                                <option value="{{$valueManufacture->manufacture_id}}">{{$valueManufacture->manufacture_name}}</option>					
                            @endforeach
                {{-- ------------------- Manufacture End --------------------- --}}            
                        </select>
                    </div>
                </div>
                         
                <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Product Short Description</label>
                  <div class="controls">
                    <textarea class="cleditor" name="product_short_description" rows="3"></textarea>
                  </div>
                </div>

                <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Product Long Description</label>
                  <div class="controls">
                    <textarea class="cleditor" name="product_long_description" rows="3"></textarea>
                  </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="date01">Product Price</label>
                    <div class="controls">
                        <input type="number" class="input-xlarge" name="product_price">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="fileInput">Image input</label>
                    <div class="controls">
                        <input class="input-file uniform_on" id="fileInput" name="product_image" type="file">
                    </div>
                </div> 

                <div class="control-group">
                    <label class="control-label" for="date01">Product Size</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="product_size">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="date01">Product Color</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="product_color">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="date01">Publication Status</label>
                    <div class="controls">
                      <input type="checkbox" class="input-xlarge" name="publication_status" value="1">
                    </div>
                  </div>

                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Add Product</button>
                  <button type="reset" class="btn">Cancel</button>
                </div>
              </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->

@endsection