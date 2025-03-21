@include('header')

				<section class="page-heading wow fadeIn" data-wow-duration="1.5s" style="background-image: url(files/images/01-heading.jpg)">
					<div class="container">
						<div class="page-name">
							<h1>Our Services</h1>
							<span>Lovely layout of heading</span>
						</div>
					</div>
				</section>

				<section class="services on-services green">
					<div class="container">
					<div class="row">
						<div class="section-heading">
							<h2>What We Offer</h2>
							<div class="section-dec"></div>
						</div>

					@foreach($arr as $services)
						<div class="service-item col-md-4">
							<span><i class="fa fa-support"></i></span>
							<div class="tittle"><h3>{{$services->title}}</h3></div>
							<p>{{$services->details}}</p>
						</div>
					@endforeach

					</div>
					</div>
				</section>

				<section class="call-to-action-2">
					<div class="container">
					<div class="left-text hidden-xs">
						<h4>Know Us Better, Read This</h4>
						<p><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi ut explicabo magni sapiente.</em><br><br>Inventore at quia, vel in repellendus, cumque dolorem autem ad quidem mollitia porro blanditiis atque rerum debitis eveniet nostrum aliquam. Sint aperiam expedita sapiente amet officia quis perspiciatis adipisci, iure dolorem esse exercitationem!</p>
					</div>
						<div class="right-image hidden-xs"></div>
					</div>
				</section>

@include('footer')

@include('scripts')