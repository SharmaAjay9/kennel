@extends('layouts.app')
@section('content')

	<!-- Homepage Slider Section -->



	@if( get_setting('show_homepage_slider') == 'on' && get_setting('home_slider_images') != null )
	@php 
		$slider_images = json_decode(get_setting('home_slider_images'), true);  
		$j = 0;
	@endphp
	<section>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
	  	@foreach ($slider_images as $key => $slider_image)
			<li data-target="#myCarousel" data-slide-to="{{$j++}}" class="@if($loop->first) active @endif"></li>
		@endforeach
      </ol>
      <div class="carousel-inner" role="listbox">

		@foreach ($slider_images as $key => $slider_image)
				<div class="item  @if($loop->first) active @endif">
					<img class="first-slide" src="{{ uploaded_asset($slider_image) }}" alt="First slide">
					<div class="container">
						<div class="carousel-caption">
							{!! get_setting('home_slider_text') !!}
						</div>
				</div>
				</div>

		@endforeach       
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->
	</section>
@endif


    <section class="py-9 bg-white">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-10 col-xl-8 col-xxl-6 mx-auto">
    				<div class="text-center section-title mb-5">
    					<h2 class="fw-600 mb-3 text-dark">{{ get_setting('premium_member_section_title') }}</h2>
    					<p class="fw-400 fs-16 opacity-60">{{ get_setting('premium_member_section_sub_title') }}</p>
    				</div>
    			</div>
    		</div>
    		<div class="row">
				<div class="col-md-4">

				</div>	
			</div>
    	</div>
    </section>

	<!-- Trusted by Millions Section -->
@endsection