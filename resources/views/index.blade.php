@include('header')

				<div class="slider">
					<div class="fullwidthbanner-container">
						<div class="fullwidthbanner">
							<ul>
							@foreach($slider_i as $slider)
								<li class="first-slide" data-transition="fade" data-slotamount="10" data-masterspeed="300">
									<img src="{{asset('images/'.$slider->image)}}" data-fullwidthcentering="on" alt="slide">
									<div class="tp-caption first-line lft tp-resizeme start" data-x="center" data-hoffset="0" data-y="250" data-speed="1000" data-start="200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">{{$slider->title}}</div>
									<div class="tp-caption second-line lfb tp-resizeme start" data-x="center" data-hoffset="0" data-y="340" data-speed="1000" data-start="800" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">{{$slider->details}}</div>
									<div class="tp-caption slider-btn sfb tp-resizeme start" data-x="center" data-hoffset="0" data-y="510" data-speed="1000" data-start="2200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0"><a href="#" class="btn btn-slider">Discover More</a></div>
								</li>
							@endforeach
							</ul>
						</div>
					</div>
				</div>
				
				<section class="services green services_edit">
					<div class="container">
						<div class="section-heading">
							<h2>What We Offer</h2>
							<div class="section-dec"></div>
						</div>

						<?php $i=0; ?>
						@foreach($services_i as $services)
						<div class="service-item col-md-4">
							<span><i class="fa fa-support"></i></span>
							<div class="tittle"><h3>{{$services->title}}</h3></div>
							<p>{{$services->details}}</p>
						</div>
							<?php $i++;
							if($i==3){break;}?>
						@endforeach
							
					</div>

					<div class="container">
						<div class="view_more_service">
							<a href="/services" title="View All Services"><span>VIEW MORE SERVICES</span></a>
						</div>
					</div>
				</section>
				
				<section class="call-to-action-2">
					<div class="container">
					<div class="left-text hidden-xs">
						<h4>To know about this theme read this</h4>
						<p><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi ut explicabo magni sapiente.</em><br><br>Inventore at quia, vel in repellendus, cumque dolorem autem ad quidem mollitia porro blanditiis atque rerum debitis eveniet nostrum aliquam. Sint aperiam expedita sapiente amet officia quis perspiciatis adipisci, iure dolorem esse exercitationem!</p>
					</div>
						<div class="right-image hidden-xs"></div>
					</div>
				</section>

				<section class="portfolio">
					<div class="container">
						<div class="section-heading-white">
							<h2>Recent Photos</h2>
							<div class="section-dec"></div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div id="owl-portfolio" class="owl-carousel owl-theme">

								@foreach($photos_i as $photos)
									<div class="item">
								  		<figure>
				        					<img alt="portfolio" src="{{asset('images/'.$photos->image)}}">
				        					<figcaption>
				            					<h3>{{$photos->title}}</h3>
				            					<p>{{$photos->details}}</p>
				        					</figcaption>
				    					</figure>								    
				    				</div>
				    			@endforeach
								  
								</div>
							</div>
						</div>
						<div class="owl-navigation">
						  <a class="btn prev fa fa-angle-left"></a>
						  <a class="btn next fa fa-angle-right"></a>
						  <a href="/work-3columns" class="go-to">Go to portfolio</a>
						</div>
					</div>
				</section>

				<section class="testimonials">
					<div class="container">
						<div class="section-heading">
							<h2 style="color:white;">What Others saying</h2>
							<div class="section-dec"></div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div id="owl-demo" class="owl-carousel owl-theme">
								
								@foreach($about_i as $about)
									<div class="item">
								  		<div class="testimonials-post">
								  			<span class="fa fa-quote-left"></span>
								  			<p>{{$about->thought}}</p>
								  			<h6>{{$about->name}} <em> {{$about->city}}</em></h6>
								  		</div>
								    </div>
								@endforeach

								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="blog-posts">
					<div class="container">
						<div class="section-heading">
							<h2>Latest Posts</h2>
							<div class="section-dec"></div>
						</div>

					@foreach($blog_i as $blog)
						<div class="blog-item">
							<div class="col-md-4">
								<a href="/blog-single/{{$blog->id}}"><img src="{{asset('images/'.$blog->image)}}" alt=""></a>
								<h3><a href="/blog-single/{{$blog->id}}">{{$blog->title}}</a></h3>
								
								<p>{{$blog->short_details}}</p>
								<div class="read-more">
									<a href="/blog-single/{{$blog->id}}">Read more</a>
								</div>
							</div>
						</div>
					@endforeach

					</div>

					
				</section>

@include('footer')

@include('scripts')