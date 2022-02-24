@extends('backend.layout.template')
@section('title')
Active Job
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 549px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 275px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 549px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">{{__('backendJob.My Active Jobs')}}</h3>
				<!-- <span class="margin-top-7" style="text-align:left;">{{__('backendJob.Job Listings')}} <a href="#"></a></span> -->

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('backendJob.Active Jobs')}}</li>
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
							<h3><i class="icon-material-outline-supervisor-account"></i> {{__('backendJob.Active Jobs')}}</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
								@foreach( $jobs as $job)
								@php
								$employer = App\Models\User::where('id',$job->user_id)->first();
								@endphp
								<li>
									<!-- Overview -->
									<div class="freelancer-overview manage-candidates">
										<div class="freelancer-overview-inner">

											<!-- Avatar -->
											<div class="freelancer-avatar">
												<div class="verified-badge"></div>
												<a href="{{route('single.employer.profile',$employer->id)}}">@if($employer->image == null)
										           <img src="{{ asset('images/default.jpeg')}}" alt="">
										         @else
													<img src="{{ asset('images/employer/' . $employer->image)}}" alt="">
												@endif</a>
											</div>

											<!-- Name -->
											<div class="freelancer-name">
												<h4><a href="{{route('job.show',$job->id)}}">{{$job->job_title}} <img class="flag" src="images/flags/au.svg" alt="" data-tippy-placement="top" data-tippy="" data-original-title="Australia"></a></h4>
												<!-- Details -->
												<span class="freelancer-detail-item">
													
													Posted By <a href="{{route('single.employer.profile',$job->user_id)}}">
														@if($employer->full_name !== null)
														{{$employer->full_name}}
														@else
														Unknown
														@endif
													</a>
													</span>
												
												

												<!-- Buttons -->
												<!-- <div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
													<div class="col-md-8">
														<div class="row">
														
														<div class="col-md-4">
															<a href="#small-dialog" class="popup-with-zoom-anim button dark ripple-effect btn"><i class="icon-feather-mail"></i>Send Message</a>
														</div>
														

													</div>
													</div>
													
													
												
													
													
								                            <!-- Modal End -->
												<!--</div> -->
												<div>
													
												</div>
											</div>
													
										</div>
									</div>
										
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
	</div></div></div>
@endsection