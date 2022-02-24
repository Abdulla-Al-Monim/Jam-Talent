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
								<h3><i class="icon-material-outline-business-center"></i> {{__('bookmark.Bookmarked Jobs')}}</h3>
							</div>

							<div class="content">
								<ul class="dashboard-box-list">
									@foreach($bookMarkJobs as $bookMarkJob)
									<li>
										<!-- Job Listing -->
										<div class="job-listing">

											<!-- Job Listing Details -->
											<div class="job-listing-details">
												@php
													$job = App\Models\Backend\Job::orderBy('id','asc')->where('id',$bookMarkJob->job_id)->first();
													
													$employer = App\Models\User::orderBy('id','asc')->where('id',$job->user_id)->first();
												@endphp
												<!-- Logo -->
												<a href="{{route('job.show',$job->id)}}" class="job-listing-company-logo">
													@if($employer->image == null)
											           <img src="{{ asset('images/default.jpeg')}}" alt="">
											         @else
														<img src="{{ asset('images/employer/' . $employer->image)}}" alt="">
													@endif
												</a>

												<!-- Details -->
												<div class="job-listing-description">
													<h3 class="job-listing-title"><a href="{{route('job.show',$job->id)}}">{{$job->job_title}}</a></h3>

													<!-- Job Listing Footer -->
													<div class="job-listing-footer">
														<ul>
															<li><i class="icon-material-outline-business"></i> {{$employer->full_name}}</li>
															<li><i class="icon-material-outline-location-on"></i> {{$job->location}}</li>
															<li><i class="icon-material-outline-business-center"></i> {{$job->job_type}}</li>
															<li><i class="icon-material-outline-access-time"></i> {{$bookMarkJob->created_at->diffForHumans()}}</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
										<!-- Buttons -->
										<form action="{{route('bookmark.job.remove',$bookMarkJob->id)}}" method="POST">
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
					<div class="col-xl-12">
						<div class="dashboard-box margin-top-0">

							<!-- Headline -->
							<div class="headline">
								<h3><i class="icon-material-outline-business-center"></i> {{__('bookmark.Bookmarked Task')}}</h3>
							</div>

							<div class="content">
								<ul class="dashboard-box-list">
									@foreach($bookMarkTasks as $bookMarkTask)
									<li>
										<!-- Job Listing -->
										<div class="job-listing">

											<!-- Job Listing Details -->
											<div class="job-listing-details">
												@php
													$task = App\Models\Backend\Task::orderBy('id','asc')->where('id',$bookMarkTask->task_id)->first();
													
													$employer = App\Models\User::orderBy('id','asc')->where('id',$task->employer_id)->first();
												@endphp
												<!-- Logo -->
												<a href="{{route('task.show',$task->id)}}" class="job-listing-company-logo">
													@if($employer)
													@if($employer->image == null)
											           <img src="{{ asset('images/default.jpeg')}}" alt="">
											         @else
														<img src="{{ asset('images/employer/' . $employer->image)}}" alt="">
													@endif
													@endif
												</a>

												<!-- Details -->
												<div class="job-listing-description">
													<h3 class="job-listing-title"><a href="{{route('task.show',$task->id)}}">{{$task->task_name}}</a></h3>

													<!-- Job Listing Footer -->
													<div class="job-listing-footer">
														<ul>
															@if($employer)
															<li><i class="icon-material-outline-business"></i> {{$employer->full_name}}</li>
															<li><i class="icon-material-outline-location-on"></i> {{$task->location}}</li>
															<li><i class="icon-material-outline-business-center"></i> {{$task->min_budget}}$-{{$task->	max_budget}}$</li>
															<li><i class="icon-material-outline-access-time"></i> {{$bookMarkTask->created_at->diffForHumans()}}</li>
															@endif
														</ul>
													</div>
												</div>
											</div>
										</div>
										<!-- Buttons -->
										<form action="{{route('bookmark.task.remove',$bookMarkTask->id)}}" method="POST">
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