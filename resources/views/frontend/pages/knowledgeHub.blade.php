@extends('frontend.layout.template')
<!-- title section -->
@section('title')
{{__('topbar.Knowledge Hub')}}
@endsection

@section('body-content')
<!-- Content
================================================== -->
<style type="text/css">
  
</style>
<!-- how page  -->
<section class="ia">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1 class="text-light" style="padding-top:300px;">{{__('knowledge.Showcase your knowledge & skills to get hired faster')}}</h1>      
      </div>
    </div>

  </div>
</section>
<div id="titlebar" class="white margin-bottom-30">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 style="text-align:left;">{{__('knowledge.Blog')}}</h2>
				<span style="text-align:left;">{{__('knowledge.Featured Posts')}}</span>
				@if($blogsCount == 0)
				<span style="text-align:left;">{{__('knowledge.There is no blog posted in this category')}}</span>
				@endif

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('knowledge.Home')}}</a></li>
						<li>{{__('knowledge.Knowledge Hub')}}</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>

<!-- Recent Blog Posts -->
<div class="section white padding-top-0 padding-bottom-60 full-width-carousel-fix">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="blog-carousel">
					@foreach($blogs as $blog)
					@php
						$freelancer = App\Models\User::where('id',$blog->user_id)->first();
					@endphp
					<a href="{{route('single.knowledge.hub',[$blog->id,$blog->slug])}}" class="blog-compact-item-container">
						<div class="blog-compact-item">
							<img src="{{ asset('images/blog/' . $blog->image_related)}}" alt="">
							<span class="blog-item-tag">
								@php
								$blogType = App\Models\Backend\Blogtype::orderBy('id','asc')->where('id',$blog->type)->first();
								@endphp
								@if(session()->get('locale') == 'ar')	
									{{$blogType->name_ar}}
									@elseif(session()->get('locale') == 'tk')
									{{$blogType->name_tr}}
									@else
									{{$blogType->name}}
									@endif
							</span>
							<div class="blog-compact-item-content">
								<ul class="blog-post-tags">
									<li>{{$blog->created_at->format('d/m/Y')}} <span>{{$freelancer->full_name}}</span></li>

								</ul>
								<h3>{{$blog->title}}</h3>
								<!-- <p>{!!$blog->s_desc!!}</p> -->
							</div>
						</div>
					</a>
					@endforeach
				</div>

			</div>
		</div>
	</div>
</div>
<!-- Recent Blog Posts / End -->


<!-- Section -->
<div class="section gray">
	<div class="container">
		<div class="row">
			<div class="col-xl-8 col-lg-8">

				<!-- Section Headline -->
				<div class="section-headline margin-top-60 margin-bottom-35">
					<h4>{{__('knowledge.Recent Posts')}}</h4>
				</div>

				<!-- Blog Post -->
				@foreach($blogsPaginate as $blogPaginate)
				@php
				$freelancer = App\Models\User::where('id',$blogPaginate->user_id)->first();
				@endphp
				<a href="{{route('single.knowledge.hub',[$blogPaginate->id,$blogPaginate->slug])}}" class="blog-post">
					<!-- Blog Post Thumbnail -->
					<div class="blog-post-thumbnail">
						<div class="blog-post-thumbnail-inner">
							<span class="blog-item-tag">
								@php
								$blogType = App\Models\Backend\Blogtype::orderBy('id','asc')->where('id',$blogPaginate->type)->first();
								@endphp
								@if(session()->get('locale') == 'ar')	
									{{$blogType->name_ar}}
									@elseif(session()->get('locale') == 'tk')
									{{$blogType->name_tr}}
									@else
									{{$blogType->name}}
									@endif
								
							</span>

							<img src="{{ asset('images/blog/' . $blogPaginate->image_single)}}" alt="">
						</div>
					</div>
					<!-- Blog Post Content -->
					<div class="blog-post-content">
						<span class="blog-post-date">{{$blogPaginate->created_at->format('d/m/Y')}}</span>
						<span class="blog-post-date">{{$freelancer->full_name}}</span>
						<h3>{{$blogPaginate->title}}</h3>
						<!-- <p>{!!$blogPaginate->s_desc!!} </p> -->
					</div>
					<!-- Icon -->
					<div class="entry-icon"></div>
				</a>
				@endforeach
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">
						<!-- Pagination -->
						<!-- <div class="pagination-container margin-top-10 margin-bottom-20">
							<nav class="pagination">
								<ul>
									
								</ul>
							</nav>
						</div> -->
						<div class="d-felx justify-content-center margin-top-10 margin-bottom-20" >
			            	{{ $blogsPaginate->links('pagination::bootstrap-4') }}
		        		</div>
					</div>
				</div>
			</div>


			<div class="col-xl-4 col-lg-4 content-left-offset">
				<div class="sidebar-container margin-top-65">
					
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

	<!-- Spacer -->
	<div class="padding-top-40"></div>
	<!-- Spacer -->


</div>
<!-- Section / End -->
<!-- footer start -->
@include('includes.footer')
<!-- footer end -->
@endsection