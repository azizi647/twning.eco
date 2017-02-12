@extends('site.layout')
@section('title', 'Twining ETSN')

@section('content')
<!--=======content================================-->

<section id="content">
	<div class="full-width-container block-1">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<header>
						<h3><span> About</span></h3>
					</header>
				</div>
			</div>
			<div class="row">
                            <div class="grid_3">
					<ul>
						<li class="submenu"><a href="#">About Twinning project</a></li>
						<li class="submenu"><a href="#">Twinning project team</a></li>
						<li class="submenu"><a href="#">Mandatory results</a></li>
					</ul>
				</div>
                            
                            
				<div class="grid_9">
					<article class="clearfix">
						<div class="grid_4 alpha">
							<div class="img_container"><img src="{{asset('public/site_style/images/index-3_img-1.jpg')}}" alt="img"></div>
						</div>
						<div class="grid_4">
							<h5><a href="#">Derto minol</a></h5>
							<p>Gamus at magna non nunc tristique rhoncuseri tym. Aliquam nibh ante, egestas id dictum aterert commodo re luctus libero. Praesent faucibus malesuada cibuste. Donec laoreet metus id laoreet malesuada. <br><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam consectetur orci sed Curabitur vel lorem sit amet nulla ullamcorper fermentum. In vitae varius augue, eu consectetur ligula. Etiam dui eros, laoreet sit amet est vel, commodo venenatis eros.Lamus at magna non nunc tristique rhoncuseri tym. </p>
						</div>
					</article>
					
				</div>
				
			</div>
		</div>
	</div>
    
	
</section>

@stop
