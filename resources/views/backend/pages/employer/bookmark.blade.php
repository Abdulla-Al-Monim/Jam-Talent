@extends('backend.layout.template')
<!-- title section -->
@section('title')
Book Mark
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 549px;">
	<div class="simplebar-track vertical" style="visibility: visible;">
		<div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 270px;">
			
		</div>
	</div>
	<div class="simplebar-track horizontal" style="visibility: visible;">
		<div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;">
		
		</div>
	</div>
	<div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;">
		<div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
			<div class="dashboard-content-inner" style="min-height: 549px;">
				
				<!-- Dashboard Headline -->
				<div class="dashboard-headline">
					<h3 style="text-align:left;">{{__('bookmark.Bookmarks')}}</h3>

					<!-- Breadcrumbs -->
					<nav id="breadcrumbs" class="dark">
						<ul>
							<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
							<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
							<li>{{__('bookmark.Bookmarks')}}</li>
						</ul>
					</nav>
				</div>
		
				<!-- Row -->
				<div class="row">

					

					<!-- Dashboard Box -->
					<div class="col-xl-12">
						
						<div class="dashboard-box margin-top-0">

							<!-- Headline -->
							<div class="headline">
								<h3><i class="icon-material-outline-face"></i> {{__('bookmark.Bookmarked Freelancers')}}</h3>
							</div>

							<div class="content">
								<ul class="dashboard-box-list">
									@foreach($bookMarkFreelancers as $bookMarkFreelancer)
									@php
									$freelancer = App\Models\User::where('id',$bookMarkFreelancer->freelancer_id)->first();
									@endphp
									
									<li>
										<!-- Overview -->
										<div class="freelancer-overview">
											<div class="freelancer-overview-inner">

												<!-- Avatar -->
												<div class="freelancer-avatar">
													<div class="verified-badge"></div>
													<a href="{{route('single.freelancer.profile',$freelancer->id)}}">
														@if($freelancer->image == null)
												           <img src="{{ asset('images/default.jpeg')}}" alt="">
												       	@else
															<img src="{{ asset('images/freelancer/' . $freelancer->image)}}" alt="">
														@endif
													</a>
												</div>

												<!-- Name -->
												<div class="freelancer-name">
													<h4><a href="{{route('single.freelancer.profile',$freelancer->id)}}">
														@if($freelancer->full_name !== null)
														{{$freelancer->full_name}}
														@else
														Unknown
														@endif
														 <img class="flag" src="images/flags/de.svg" alt="" data-tippy-placement="top" data-tippy="" data-original-title="Germany"></a></h4>
													<span>{{$freelancer->sort_description}}</span>
													<!-- Rating -->
													<div class="freelancer-rating">
														<div class="star-rating" data-rating="{{$freelancer->freelancerActivity->average_rating}}"><span class="star"></div>
													</div>
												</div>
											</div>
										</div>

										<!-- Buttons -->
										<form action="{{route('bookmark.freelancer.remove',$bookMarkFreelancer->id)}}" method="POST">
											<div class="buttons-to-right single-right-button">
												@csrf
												<button href="#" class="button red ripple-effect ico" data-tippy-placement="left" data-tippy="" data-original-title="Remove"><i class="icon-feather-trash-2"></i></button>
											</div>
										</form>
										
									</li>
									@endforeach
								</ul>
							</div>
						</div>
						
					</div>

				</div>
				<!-- Row / End -->

				<!-- Footer -->
				@include('includes.dashboardFooter')
				<!-- Footer / End -->

			</div>
		</div>
	</div>
</div>
@endsection