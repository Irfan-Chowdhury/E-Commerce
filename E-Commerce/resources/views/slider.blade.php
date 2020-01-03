<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
            
                    {{-- ========================== Slider Bulet Point Count ===================== --}}
                        <?php 
                            $data = DB::table('slider_tbl')
                                    ->get();
                            $dataCont = $data->count();
                            for ($i=0; $i < $dataCont+1 ; $i++) { 									
                        ?>
                            <li data-target="#slider-carousel" data-slide-to="<?php echo $i; ?>" class="active"></li>
                        <?php } ?>	
                    {{-- =============================== Conut End =============================== --}}
                    </ol>
                    
                    <div class="carousel-inner">

                        <div class="item active">
                            {{-- <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free E-Commerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div> --}}
                            <div class="col-sm-6">
                                <img src="{{asset('frontend/images/home/girl1.jpg')}}" class="girl img-responsive" alt="" />
                                <img src="{{asset('frontend/images/home/pricing.png')}}"  class="pricing" alt="" />
                            </div>
                        </div>

    {{-- ============================ Slider Start ====================== --}}

                    @php
                    $all_publication_status = DB::table('slider_tbl')
                                            ->where('publication_status',1)
                                            ->get();
                    @endphp	
                    @foreach ($all_publication_status as $valueSlider)						
                        <div class="item">
                            {{-- <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free E-Commerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div> --}}
                            <div class="col-sm-6">
                                <img src="{{URL::to($valueSlider->slider_image)}}" class="girl img-responsive" alt="" />
                                <img src="{{asset('frontend/images/home/pricing.png')}}"  class="pricing" alt="" />
                            </div>
                        </div>
                    @endforeach
    {{-- ============================ Slider End ====================== --}}		
                        
                    </div>
                    
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</section><!--/slider-->