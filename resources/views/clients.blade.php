@include('header')

				<section class="page-heading wow fadeIn" data-wow-duration="1.5s" style="background-image: url(files/images/01-heading.jpg)">
					<div class="container">
						<div class="page-name">
							<h1>Our Clients</h1>
							<span>Lovely layout of heading</span>
						</div>
					</div>
				</section>

				<section class="clients">
					<div class="container">
						<div class="section-heading">
							<h2>Our Clients</h2>
							<div class="section-dec"></div>
						</div>

					@foreach($arr as $client)
						<div class="col-md-2 col-sm-4 col-xs-12">
							<div class="client-item">
								<a href="#"><img src="{{asset('images/'.$client->image)}}" alt=""></a>
							</div>
						</div>
					@endforeach

					</div>
				</section>


@include('footer')

@include('scripts')