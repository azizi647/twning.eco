@extends('site.layout')
@section('title', 'Twining ETSN')

@section('content')
<div class="full-width-container block-2 parallax-block" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<header>
						<h2><span>Our Team</span></h2>
					</header>
				</div>
                              <div class="grid_3">
					<ul>
						<li class="submenu"><a href="#">About Twinning project</a></li>
						<li class="submenu"><a href="#">Twinning project team</a></li>
						<li class="submenu"><a href="#">Mandatory results</a></li>
						<li class="submenu"><a href="#">Mandatory results</a></li>
					</ul>
				</div>
                            <div class="grid_0"></div>
				<div class="grid_2 team">
				        <article>
						<div class="img_container"><img src="{{asset('public/site_style/images/index-1_img-2.jpg')}}" alt="our team"></div>
						<h4>Mark Gret</h4>
						<p>Lamus at magna non derto </p>
					</article>
				</div>
				<div class="grid_2 team">
					<article>
						<div class="img_container"><img src="{{asset('public/site_style/images/index-1_img-2.jpg')}}" alt="our team"></div>
						<h4>Mark Gret</h4>
						<p>Lamus at magna non derto </p>
					</article>
				</div>
				<div class="grid_2 team">
					<article>
						<div class="img_container"><img src="{{asset('public/site_style/images/index-1_img-2.jpg')}}" alt="our team"></div>
						<h4>Mark Gret</h4>
						<p>Lamus at magna non derto </p>
					</article>
				</div>
				<div class="grid_2 team">
					<article>
						<div class="img_container"><img src="{{asset('public/site_style/images/index-1_img-2.jpg')}}" alt="our team"></div>
						<h4>Mark Gret</h4>
						<p>Lamus at magna non derto </p>
					</article>
				</div>
				
			</div>
		</div>
	</div>
@stop