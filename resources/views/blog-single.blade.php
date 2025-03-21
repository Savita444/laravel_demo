@include('header')

				<section class="page-heading wow fadeIn" data-wow-duration="1.5s" style="background-image: url(/files/images/01-heading.jpg)">
					<div class="container">
						<div class="page-name">
							<h1>Single Post</h1>
							<span>Lovely layout of heading</span>
						</div>
					</div>
				</section>
				
				<section class="blog-single">
					<div class="container">
						<div class="row">
							<div class="col-md-8">
							@foreach($arr as $blog_s)
								<div class="blog-single-item">
									<img src="{{asset('images/'.$blog_s->image)}}" alt="">
									<div class="blog-single-content">	
										<h3>{{$blog_s->title}}</h3>
										
										<span class="author-title">Admin</span>
										<span class="comment-date">| {{$blog_s->created_at}}</span>

										<p>{{$blog_s->short_details}}</p>
										<p>{{$blog_s->full_details}}</p>
										<div class="share-post">
											<span>Share on: <a href="#">facebook</a>, <a href="#">twitter</a>, <a href="#">linkedin</a>, <a href="#">instagram</a></span>
										</div>
										@php
											$id=$blog_s->id;
										@endphp
									</div>				
							@endforeach

									@if(isset($search_text))
										<div>
											@if($prev != null)
											<div class="prev-btn col-md-6 col-sm-6 col-xs-6">
												<a href="/blog-single/{{$prev->id}}?search_text={{$search_text}}"><i class="fa fa-angle-left"></i>Previous</a>
											</div>
											@else
											<div class="prev-btn col-md-6 col-sm-6 col-xs-6" style="margin-bottom:100px;"></div>
											@endif
										</div>
										<div>
											@if($next != null)
											<div class="next-btn col-md-6 col-sm-6 col-xs-6">
												<a href="/blog-single/{{$next->id}}?search_text={{$search_text}}">Next<i class="fa fa-angle-right"></i></a>
											</div>
											@else
											<div class="next-btn col-md-6 col-sm-6 col-xs-6" style="margin-right: 100px;"></div>
											@endif
										</div>
									@else
										<div>
											@if($prev != null)
											<div class="prev-btn col-md-6 col-sm-6 col-xs-6">
												<a href="/blog-single/{{$prev->id}}"><i class="fa fa-angle-left"></i>Previous</a>
											</div>
											@else
											<div class="prev-btn col-md-6 col-sm-6 col-xs-6" style="margin-bottom:100px;"></div>
											@endif
										</div>
										<div>
											@if($next != null)
											<div class="next-btn col-md-6 col-sm-6 col-xs-6">
												<a href="/blog-single/{{$next->id}}">Next<i class="fa fa-angle-right"></i></a>
											</div>
											@else
											<div class="next-btn col-md-6 col-sm-6 col-xs-6" style="margin-right: 100px;"></div>
											@endif
										</div>
									@endif
							</div>

								<div class="blog-comments">
									<h2> All Comments of this blog</h2>
									<ul class="coments-content">

									@foreach($arr2 as $comment)
										<li class="first-comment-item">
											<div style="display: flex;">
												<div>
													<img src="{{asset('images/profile.jpg')}}" alt="">
												</div>
												<div>
													<div class="author-title">
														<a href="#">{{$comment->name}}</a>
													</div>
													<div>
														<a href="/delete/{{$id}}/{{$comment->id}}" style="font-size: 12px; color: blue;"><i>Delete Comment</i></a>
													</div>
													<span class="comment-date">{{$comment->create_at}}</span>
													<p>{{$comment->message}}</p>
												</div>
											</div>
										</li>
										<br>
									@endforeach
									</ul>
								</div>
								<div class="submit-comment col-sm-12">
									<h2>Leave A Comment</h2>
									<form id="contact_form" method="post" enctype="multipart/form-data">
										@csrf
										<div class=" col-md-4 col-sm-4 col-xs-6">
											<input type="text" class="blog-search-field" name="name" placeholder="Your name..." value="" required>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-6">
											<input type="email" class="blog-search-field" name="email" placeholder="Your email..." value="" required>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-12">
											<input type="text" class="subject" name="subject" placeholder="Subject..." value="" required>
										</div>
										<div class="col-md-12 col-sm-12">
											<textarea id="message" class="input" name="message" placeholder="Comment..." maxlength="200" required></textarea>
										</div>
										<div class=" col-md-4 col-sm-4 col-xs-6">
											<input type="hidden" class="blog-search-field" name="user_id" placeholder="Your name..." value="{{$id}}" required>
										</div>
										<div class="submit-coment col-md-12">
											<div class="btn-black">
												<input class="btn-black a" class="submit-coment col-md-12" type="submit" name="submit_comment" value="Submit now">
												<!-- <a href="blog-single.php" name="submit_comment">Submit now</a> -->
											</div>
										</div>
									</form>		
								</div>
							</div>
							<div class="col-md-4">
								<div class="widget-item">
									<h2>Search about the Blogs...</h2>
									<div class="dec-line"></div>
									<form method="get" id="blog-search" class="blog-search">
										@csrf
										<input type="text" class="blog-search-field" name="search_text" placeholder="Type keyword..." value="">
									</form>
									@if(session()->has('message'))
									    <div class="error_msg">
									    	{{ session()->get('message') }}
									    </div>
									@endif
								</div>

								<div class="widget-item">
									<h2>About Us</h2>
									<div class="dec-line">	
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique earum quod iste, natus quaerat facere a rem dolor sit amet, et placeat nemo.</p>
									<div class="social-icons">
										<ul>
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
											<li><a href="#"><i class="fa fa-instagram"></i></a></li>
											<li><a href="#"><i class="fa fa-rss"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>	
				</section>

@include('footer')

@include('scripts')