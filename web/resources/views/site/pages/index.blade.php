@extends('site.layout')
@section('title', 'Twining ETSN')

@section('content')
<section id="content">
	<div class="full-width-container block-1">
		<div class="camera_container">
			<div id="camera_wrap">
				<div class="item" data-src="{{asset('public/site_style/images/index_img_slider-1.jpg')}}">
					<div class="camera_caption fadeIn">
						<h3>We'll Give Your Business Fresh Ideas</h3>
						<p>Contact Us by</p>
						<a href="#" class="btn bd-ra"><span class="fa fa-envelope-o"></span></a>
						<a href="#" class="btn bd-ra"><span class="fa fa-phone"></span></a>
						<a href="#" class="btn bd-ra"><span class="fa fa-map-marker"></span></a>
					</div>
				</div>
				<div class="item" data-src="{{asset('public/site_style/images/index_img_slider-2.jpg')}}">
					<div class="camera_caption fadeIn">
						<h3>We'll Make You Noticeable</h3>
						<p>Contact Us by</p>
						<a href="#" class="btn bd-ra"><span class="fa fa-envelope-o"></span></a>
						<a href="#" class="btn bd-ra"><span class="fa fa-phone"></span></a>
						<a href="#" class="btn bd-ra"><span class="fa fa-map-marker"></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="full-width-container block-2">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<header>
						<h2><span>Welcome Twining Project</span></h2>
					</header>
					<h4><a href="#">Nullam Concester Tur Nerto</a></h4>
					<p>Gamus at magna non nunc tristique rhoncuseri tym. Aliquam nibh ante, egestas id dictum aterert commodo re luctus libero. Praesent faucibus malesuada cibuste. Donec laoreet metus id laoreet malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam consectetur orci sed rabitur vel lorem sit amet nulla ullamcorper fermentum. <br><br>In vitae varius augue, eu consectetur ligula. Etiam dui eros, laoreet sit amet est vel, commodo venenatis eros. Donec laoreet metus id laoreet malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					<a href="#" class="btn">more</a>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="full-width-container block-5">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<header>
						<h2><span>News</span></h2>
					</header>
				</div>
				<div class="grid_4">
					<article>
						<h3><a href="#">November 2014</a></h3>
						<p>Gamus at magna non nunc tristique rhoncuseri tym. Aliquam nibh ante, egestas id dictum aterert commodo re luctus libero. Praesent faucibus malesuada cibuste.</p>
						<a href="#" class="btn">More</a>
					</article>
				</div>
				<div class="grid_4">
					<article>
						<h3><a href="#">March 2015</a></h3>
						<p>Damus at magna non nunc tristique rhoncuseri tym. Aliquam nibh ante, egestas id dictum aterert commodo re luctus libero. Praesent faucibus malesuada cibust.</p>
						<a href="#" class="btn">More</a>
					</article>
				</div>
				<div class="grid_4">
					<article>
						<h3><a href="#">June 2015</a></h3>
						<p>Jamus at magna non nunc tristique rhoncuseri tym. Aliquam nibh ante, egestas id dictum aterert commodo re luctus libero. Praesent faucibus malesuadaonec. </p>
						<a href="#" class="btn">More</a>
					</article>
				</div>
			</div>
		</div>
	</div>
    
    </section>

@stop
