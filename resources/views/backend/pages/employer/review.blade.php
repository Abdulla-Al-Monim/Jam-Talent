@extends('backend.layout.template')
<!-- title section -->
@section('title')
Reviews
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 549px;">
	<div class="simplebar-track vertical" style="visibility: visible;">
		<div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 166px;">
			
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
					<h3 style="text-align:left;">{{__('backendOrder.Reviews')}}</h3>
 
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs" class="dark">
						<ul>
							<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
							<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
							<li>{{__('backendOrder.Reviews')}}</li>
						</ul>
					</nav>
				</div>
		
				<!-- Row -->
				<div class="row">

					<!-- Dashboard Box -->
					<div class="col-xl-6">
						<div class="dashboard-box margin-top-0">

							<!-- Headline -->
							<div class="headline">
								<h3><i class="icon-material-outline-business"></i> 
								{{__('backendOrder.Rate Employers')}}</h3>
							</div>

							<div class="content">
								<ul class="dashboard-box-list">
									@foreach($reviewEmployers as $reviewEmployer)
									@php
										$employer = App\Models\User::where('id',$reviewEmployer->user_id)->first();
									@endphp
									<li>
										<div class="boxed-list-item">
											<!-- Content -->
											<div class="item-content">
												<a href="{{route('single.employer.profile',$reviewEmployer->id)}}" target="_blank">
													<h4>@if($employer->full_name !== null)
													{{$employer->full_name}}
													@else
													Unknown
													@endif
													</h4> 
												</a>
												

												
												<div class="item-details margin-top-10">
													@if($reviewEmployer->status == 1)

													@if($reviewEmployer->rating == 1)
														<div class="star-rating" data-rating="1">
															<!-- <span class="star"></span> -->
														</div>
														@elseif($reviewEmployer->rating == 2)
														<div class="star-rating" data-rating="2">
															<!-- <span class="star"></span> -->
														</div>
														@elseif($reviewEmployer->rating == 3)
														<div class="star-rating" data-rating="3">
															<!-- <span class="star"></span> -->
														</div>
														@elseif($reviewEmployer->rating == 4)
														<div class="star-rating" data-rating="4">
															<!-- <span class="star"></span> -->
														</div>
														@elseif($reviewEmployer->rating == 5)
														<div class="star-rating" data-rating="5">
															<!-- <span class="star"></span> -->
														</div>
														@endif
													@endif
									
									
											
										</div>
										<div class="detail-item"><i class="icon-material-outline-date-range"></i> {{ \Carbon\Carbon::parse($reviewEmployer->created_at)->format('d/m/Y')}}
											</div>
									</div>
										
									</li>
									@endforeach
								</ul>
							</div>
						</div>

						<!-- Pagination -->
						<div class="clearfix"></div>
						<!-- <div class="pagination-container margin-top-40 margin-bottom-0">
							<nav class="pagination">
								<ul>
									<li><a href="#" class="ripple-effect current-page">1</a></li>
									<li><a href="#" class="ripple-effect">2</a></li>
									<li><a href="#" class="ripple-effect">3</a></li>
									<li class="pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>
								</ul>
							</nav>
						</div> -->
						<div class="d-felx justify-content-center">

				            {{ $reviewEmployers->links('pagination::bootstrap-4') }}

				        </div>
						<div class="clearfix"></div>
						<!-- Pagination / End -->

					</div>

					<!-- Dashboard Box -->
					<div class="col-xl-6">
						<div class="dashboard-box margin-top-0">

							<!-- Headline -->
							<div class="headline">
								<h3><i class="icon-material-outline-face"></i> {{__('backendOrder.Rate Freelancers')}}</h3>
							</div>

							<div class="content">
								<ul class="dashboard-box-list">
									@foreach($reviewFreelancers as $reviewFreelancer)
									@php
										$freelancer = App\Models\User::where('id',$reviewFreelancer->user_id)->first();

									@endphp
									
									<li>
										<div class="boxed-list-item">
											<!-- Content -->
											<div class="item-content">
												<a href="{{route('single.freelancer.profile',$freelancer->id)}}" target="_blank">
													<h4>
													@if($freelancer->full_name !== null)
													{{$freelancer->full_name}}
													@else
													Unknown
													@endif 
												</h4>
												</a>
												
												
												@if($reviewFreelancer->rating == 1)
														<div class="star-rating" data-rating="1">
															<!-- <span class="star"></span> -->
														</div>
														@elseif($reviewFreelancer->rating == 2)
														<div class="star-rating" data-rating="2">
															<!-- <span class="star"></span> -->
														</div>
														@elseif($reviewFreelancer->rating == 3)
														<div class="star-rating" data-rating="3">
															<!-- <span class="star"></span> -->
														</div>
														@elseif($reviewFreelancer->rating == 4)
														<div class="star-rating" data-rating="4">
															<!-- <span class="star"></span> -->
														</div>
														@elseif($reviewFreelancer->rating == 5)
														<div class="star-rating" data-rating="5">
															<!-- <span class="star"></span> -->
														</div>
														@endif
												<div class="item-description">
															<p>{{$reviewFreelancer->comment}}</p>
														</div>
											</div>

										</div>
										<div class="detail-item"><i class="icon-material-outline-date-range"></i> {{ \Carbon\Carbon::parse($reviewFreelancer->created_at)->format('d/m/Y')}}
											</div>
									</li>
									
									@endforeach
								</ul>
								<div class="d-felx justify-content-center">

				            {{ $reviewFreelancers->links('pagination::bootstrap-4') }}

				        </div>
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