@extends('backend.layout.template')
@section('title')
All Post Job
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 549px;">
	<div class="simplebar-track vertical" style="visibility: visible;">
		<div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 344px;">
			
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
				<h3>All Jobs</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">Home</a></li>
						<li><a href="{{route('user.dashbord')}}">Dashboard</a></li>
						<li>All Jobs</li>
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
							<h3><i class="icon-material-outline-business-center"></i>Job Listings</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
								@foreach($jobs as $job)
								<li>
									<!-- Job Listing -->
									<div class="job-listing">

										<!-- Job Listing Details -->
										<div class="job-listing-details">

									
											<!-- Details -->
											<div class="job-listing-description">
												<h3 class="job-listing-title"><a href="{{route('job.show',$job->id)}}">{{$job->job_title}}</a>
												@php
												$count = App\Models\Backend\JobApply::where('job_id',$job->id)->where('status',1)->count();

												$employer = App\Models\User::where('id',$job->user_id)->first();
												@endphp 
													@if($count == 0)
													<span class="dashboard-status-button green">Pending Approval</span>
													@else
													<span class="dashboard-status-button green">Approved</span>
													@php
													@endphp

													@endif
												</h3>

												<!-- Job Listing Footer -->
												<div class="job-listing-footer">
													<ul>
														<li><i class="icon-material-outline-date-range"></i><a href="{{route('single.employer.profile',$employer->id)}}">Posted by {{$employer->full_name}}</a> </li>
														@if($count != 0)
														@php
														$jobApply = App\Models\Backend\JobApply::where('job_id',$job->id)->where('status',1)->first();

														$freelancer = App\Models\User::where('id',$jobApply->freelancer_id)->first();
														@endphp
														<li><i class="icon-material-outline-date-range"></i><a href="{{route('single.freelancer.profile',$freelancer->id)}}">Cadidate {{$freelancer->full_name}}</a></li>
														@endif
														<li><i class="icon-material-outline-date-range"></i> on {{ \Carbon\Carbon::parse($job->created_at)->format(' D/m/Y')}}</li>
													</ul>
												</div>
											</div>
										</div>
									</div>

									<!-- Buttons -->
									<div class="buttons-to-right always-visible">
										@php
											$countApply = App\Models\Backend\JobApply::where('job_id',$job->id)->count();
										@endphp
										@if($count == 0)
										<a href="{{route('candidate.manage.admin',[$job->id,$job->user_id])}}" class="button ripple-effect"><i class="icon-material-outline-supervisor-account"></i>Candidates <span class="button-info">{{$countApply}}</span></a>
										@endif
										
									</div>
								</li>
								@endforeach

							</ul>

						</div>
					</div>
				</div>

			</div>
			<div class="clearfix" style="margin-top: 60px;"></div>

			<div class="d-felx justify-content-center">

            {{ $jobs->links('pagination::bootstrap-4') }}

        </div>
		<div class="clearfix"></div>
			<!-- Row / End -->

			@include('includes.dashboardFooter')

		</div>
	</div>
</div>
</div>
@endsection