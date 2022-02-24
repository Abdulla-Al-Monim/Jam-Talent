@extends('frontend.layout.template')
<!-- title section -->
@section('title')
{{$blog->slug}}
@endsection
@section('meta')
<meta property="og:title" content="{{$blog->title}}" />
  <meta property="og:url" content="{{Request::fullUrl()}}" />
  <meta property="og:image" content="{{URL::to($blog->image)}}" />
  <meta property="og:description" content="{{$blog->s_desc}}" />
  <meta property="og:site_name" content="ShareThis" />
@endsection
@section('body-content')
@php
						$freelancerName = App\Models\User::where('id',$blog->user_id)->first();
					@endphp
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>{{__('knowledge.Blog')}}</h2>
				<span>{{__('knowledge.Blog Post page')}}</span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('knowledge.Home')}}</a></li>
						<li><a href="{{route('home.knowledge.hub')}}">{{__('knowledge.Knowledge Hub')}}</a></li>
						<li>{{__('knowledge.Blog Post')}}</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		
		<!-- Inner Content -->
		<div class="col-xl-8 col-lg-8">
			<!-- Blog Post -->
			<div class="blog-post single-post">

				<!-- Blog Post Thumbnail -->
				<div class="blog-post-thumbnail">
					<div class="blog-post-thumbnail-inner">
						<span class="blog-item-tag">@php
								$blogType = App\Models\Backend\Blogtype::orderBy('id','asc')->where('id',$blog->type)->first();
								@endphp
								@if(session()->get('locale') == 'ar')	
									{{$blogType->name_ar}}
									@elseif(session()->get('locale') == 'tk')
									{{$blogType->name_tr}}
									@else
									{{$blogType->name}}
									@endif</span>
						<img src="{{ asset('images/blog/' . $blog->image)}}" alt="">
					</div>
				</div>

				<!-- Blog Post Content -->
				<div class="blog-post-content">
					<h3 class="margin-bottom-10">{{$blog->tilte}}</h3>

					<div class="blog-post-info-list margin-bottom-20">
						<a href="{{route('single.freelancer.profile',$freelancerName->id)}}" target="_blank" class="blog-post-info">{{$blog->created_at->format('d/m/Y')}} <span>{{$freelancerName->full_name}}</span></a>
						<!-- <a href="#" class="blog-post-info">5 Comments</a> -->
					</div>

					<p>{!!$blog->desc!!}</p>

					<!-- Share Buttons -->
					<div class="share-buttons margin-top-25">
						<div class="share-buttons-trigger"><i class="icon-feather-share-2"></i></div>
						<div class="share-buttons-content">
							<span>{{__('knowledge.Interesting')}}? <strong>{{__('knowledge.Share It!')}}</strong></span>
							<ul class="share-buttons-icons">
								<div class="sharethis-inline-share-buttons"></div>
							</ul>
						</div>
					</div>
				</div>

			</div>
			<!-- Blog Post Content / End -->
			
			<!-- Blog Nav -->
			<!-- <ul id="posts-nav" class="margin-top-0 margin-bottom-40">
				<li class="next-post">
					<a href="#">
						<span>Next Post</span>
						<strong>16 Ridiculously Easy Ways to Find &amp; Keep a Remote Job</strong>
					</a>
				</li>
				<li class="prev-post">
					<a href="#">
						<span>Previous Post</span>
						<strong>11 Tips to Help You Get New Clients Through Cold Calling</strong>
					</a>
				</li>
			</ul> -->
			
			<!-- Related Posts -->
			
			<!-- Related Posts / End -->
				

			<!-- Comments -->
			<!-- <div class="row">
				<div class="col-xl-12">
					<section class="comments">
						<h3 class="margin-top-45 margin-bottom-0">Comments <span class="comments-amount">(5)</span></h3>

						<ul>
							<li>
								<div class="avatar"><img src="images/user-avatar-placeholder.png" alt=""></div>
								<div class="comment-content"><div class="arrow-comment"></div>
									<div class="comment-by">Kathy Brown<span class="date">12th, June 2019</span>
										<a href="#" class="reply"><i class="fa fa-reply"></i> Reply</a>
									</div>
									<p>Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor imperdiet vitae. Curabitur lacinia neque non metus</p>
								</div>

								<ul>
									<li>
										<div class="avatar"><img src="images/user-avatar-placeholder.png" alt=""></div>
										<div class="comment-content"><div class="arrow-comment"></div>
											<div class="comment-by">Tom Smith<span class="date">12th, June 2019</span>
												<a href="#" class="reply"><i class="fa fa-reply"></i> Reply</a>
											</div>
											<p>Rrhoncus et erat. Nam posuere tristique sem, eu ultricies tortor imperdiet vitae. Curabitur lacinia neque.</p>
										</div>
									</li>
									<li>
										<div class="avatar"><img src="images/user-avatar-placeholder.png" alt=""></div>
										<div class="comment-content"><div class="arrow-comment"></div>
											<div class="comment-by">Kathy Brown<span class="date">12th, June 2019</span>
												<a href="#" class="reply"><i class="fa fa-reply"></i> Reply</a>
											</div>
											<p>Nam posuere tristique sem, eu ultricies tortor.</p>
										</div>

										<ul>
											<li>
												<div class="avatar"><img src="images/user-avatar-placeholder.png" alt=""></div>
												<div class="comment-content"><div class="arrow-comment"></div>
													<div class="comment-by">John Doe<span class="date">12th, June 2019</span>
														<a href="#" class="reply"><i class="fa fa-reply"></i> Reply</a>
													</div>
													<p>Great template!</p>
												</div>
											</li>
										</ul>

									</li>
								</ul>

							</li>

							<li>
								<div class="avatar"><img src="images/user-avatar-placeholder.png" alt=""> </div>
								<div class="comment-content"><div class="arrow-comment"></div>
									<div class="comment-by">John Doe<span class="date">15th, May 2015</span>
										<a href="#" class="reply"><i class="fa fa-reply"></i> Reply</a>
									</div>
									<p>Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.</p>
								</div>

							</li>
						 </ul>

					</section>
				</div>
			</div> -->
			<!-- Comments / End -->


			<!-- Leava a Comment -->
			<!-- <div class="row">
				<div class="col-xl-12">
					
					<h3 class="margin-top-35 margin-bottom-30">Add Comment</h3> -->

					<!-- Form -->
					<!-- <form method="post" id="add-comment">

						<div class="row">
							<div class="col-xl-6">
								<div class="input-with-icon-left no-border">
									<i class="icon-material-outline-account-circle"></i>
									<input type="text" class="input-text" name="commentname" id="namecomment" placeholder="Name" required="">
								</div>
							</div>
							<div class="col-xl-6">
								<div class="input-with-icon-left no-border">
									<i class="icon-material-baseline-mail-outline"></i>
									<input type="text" class="input-text" name="emailaddress" id="emailaddress" placeholder="Email Address" required="">
								</div>
							</div>
						</div>

						<textarea name="comment-content" cols="30" rows="5" placeholder="Comment"></textarea>
					</form> -->
					
					<!-- Button -->
					<!-- <button class="button button-sliding-icon ripple-effect margin-bottom-40" type="submit" form="add-comment" style="width: 176.203px;">Add Comment <i class="icon-material-outline-arrow-right-alt"></i></button>
					
				</div>
			</div> -->
			<!-- Leava a Comment / End -->

		</div>
		<!-- Inner Content / End -->


		<div class="col-xl-4 col-lg-4 content-left-offset">
			<div class="sidebar-container">
				
				<!-- Location -->
				<!-- <div class="sidebar-widget margin-bottom-40">
					<div class="input-with-icon">
						<input id="autocomplete-input" type="text" placeholder="Search">
						<i class="icon-material-outline-search"></i>
					</div>
				</div> -->

				<!-- Widget -->
				<div class="sidebar-widget">

					<h3>{{__('knowledge.Trending Posts')}}</h3>
					<ul class="widget-tabs">

						<!-- Post #1 -->
						@foreach($trandPosts as $trandPost)
							@php
							$freelancer = App\Models\User::where('id',$trandPost->user_id)->first();
							@endphp
							<li>
								<a href="{{route('single.knowledge.hub',[$trandPost->id,$trandPost->slug])}}" class="widget-content active">
									<img src="{{ asset('images/blog/' . $trandPost->image_single)}}" alt="">
									<div class="widget-text">
										<h5>{!!$trandPost->title!!}</h5>
										<span>{{$trandPost->created_at->format('d/m/Y')}}</span>
										<span>{{$freelancer->full_name}}</span>
									</div>
								</a>
							</li>
							@endforeach
					</ul>

				</div>
				<!-- Widget / End-->


				<!-- Widget -->
				<div class="sidebar-widget">
					<h3>{{__('knowledge.Social Profiles')}}</h3>
					<div class="freelancer-socials margin-top-25">
						<ul>
							<li><a href="https://www.linkedin.com/in/jamsamcommunity/" target="_blank" title="LinkedIn" data-tippy-placement="top"><i class="icon-brand-linkedin-in"></i></a></li>
							<li><a href="https://twitter.com/jamsamcommunity"  target="_blank" title="Twitter" data-tippy-placement="top"><i class="icon-brand-twitter"></i></a></li>
							<li><a href="https://www.facebook.com/jamsamcommunity" title="Facebook" target="_blank" data-tippy-placement="top"><i class="icon-brand-facebook-f"></i></a></li>
							<li><a href="https://www.pinterest.com/jamsamcommunity/" title="Pinterest" target="_blank" data-tippy-placement="top"><i class="icon-brand-pinterest"></i></a></li>
						</ul>
					</div>
				</div>

				<!-- Widget -->
				<div class="sidebar-widget">
					<h3>{{__('knowledge.Tags')}}</h3>
					<div class="task-tags">
						@foreach( App\Models\Backend\Blogtype::orderBy('id','desc')->get() as $blogType)
							<a href="{{route('home.knowledge.hub.search',$blogType->name)}}">
								<span>@if(session()->get('locale') == 'ar')	
									{{$blogType->name_ar}}
									@elseif(session()->get('locale') == 'tk')
									{{$blogType->name_tr}}
									@else
									{{$blogType->name}}
									@endif
								</span>
							</a>
						@endforeach
					</div>
				</div>

			</div>
		</div>

	</div>
</div>
<div class="padding-top-40"></div>
<!-- Section / End -->
<!-- footer start -->
@include('includes.footer')
<!-- footer end -->
@endsection