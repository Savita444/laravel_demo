@include('header')

				<section class="page-heading wow fadeIn" data-wow-duration="1.5s" style="background-image: url(files/images/01-heading.jpg)">
					<div class="container">
						<div class="page-name">
							<h1>Our Blog</h1>
							<span>Lovely layout of heading</span>
						</div>
					</div>
				</section>
				
				<section class="on-blog-grid">
					<div class="container">
						<div class="row">

					@foreach($arr as $blog)
							<div class="col-md-4">
								<div class="blog-item">
									<a href="/blog-single/{{$blog->id}}"><img src="{{asset('images/'.$blog->image)}}" alt=""></a>
									<h3><a href="/blog-single/{{$blog->id}}">{{$blog->title}}</a></h3>

									<p>{{$blog->short_details}}</p>
									<div class="read-more">
										<a href="/blog-single/{{$blog->id}}">Read more</a>
									</div>
								</div>
							</div>
					@endforeach
						
							<div class="col-md-12">
								<div class="portfolio-page-nav text-center">
									<ul>
										{{$arr->links('/pagination/blog-pagination')}}
									</ul>
								</div>
							</div>
						</div>	
					</div>		
				</section>


@include('footer')

@include('scripts')