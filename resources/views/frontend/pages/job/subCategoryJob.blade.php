@extends('frontend.layout.template')
@section('title')
{{$subCategory->name}}
@endsection
@section('body-content')

<!-- Page Content
================================================== -->
<div class="full-page-container">

	
	
	<!-- Full Page Content -->
	<div class="full-page-content-container" data-simplebar>
		<div class="full-page-content-inner">

			<!-- <h3 class="page-title">Search Results</h3>

			<div class="notify-box margin-top-15">
				<div class="switch-container">
					<label class="switch"><input type="checkbox"><span class="switch-button"></span><span class="switch-text">Turn on email alerts for this search</span></label>
				</div>

				<div class="sort-by">
					<span>Sort by:</span>
					<select class="selectpicker hide-tick">
						<option>Relevance</option>
						<option>Newest</option>
						<option>Oldest</option>
						<option>Random</option>
					</select>
				</div>
			</div> -->
			@if($jobCount == 0)
				<strong>{{__('job.No Job Found)}}</strong>
				@endif
			<div class="listings-container grid-layout margin-top-35">
				
				
				@foreach($jobs as $job)
				@php 
				
				$employer = App\Models\User::where('id',$job->user_id)->first(); 

				@endphp
				<!-- Job Listing -->
				<a href="{{route('job.show',$job->id)}}" class="job-listing">

					<!-- Job Listing Details -->
					<div class="job-listing-details">
						<!-- Logo -->
						<div class="job-listing-company-logo">
							<img src="{{ asset('images/employer/' . $employer->image)}}" alt="">
						</div>

						<!-- Details -->
						<div class="job-listing-description">
							<h4 class="job-listing-company">{{$employer->full_name}} <span class="verified-badge" title="Verified Employer" data-tippy-placement="top"></span></h4>
							<h3 class="job-listing-title">{{$job->job_title}}</h3>
						</div>
					</div>

					<!-- Job Listing Footer -->
					<div class="job-listing-footer">
						<span class="bookmark-icon"></span>
						<ul>
							<li><i class="icon-material-outline-location-on"></i> {{$job->location}}</li>
							<li><i class="icon-material-outline-business-center"></i> {{$job->job_type}}</li>
							<li><i class="icon-material-outline-account-balance-wallet"></i> ${{$job->min_salary}}-${{$job->max_salary}}</li>
							<li><i class="icon-material-outline-access-time"></i> {{$job->created_at->diffForHumans()}}</li>
						</ul>
					</div>
				</a>	

				@endforeach
				
			</div>

			<!-- Pagination -->
			<div class="clearfix"></div>
			<!-- <div class="pagination-container margin-top-20 margin-bottom-20">
				<nav class="pagination">
					<ul>
						<li class="pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-left"></i></a></li>
						<li><a href="#" class="ripple-effect">1</a></li>
						<li><a href="#" class="ripple-effect current-page">2</a></li>
						<li><a href="#" class="ripple-effect">3</a></li>
						<li><a href="#" class="ripple-effect">4</a></li>
						<li class="pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>
					</ul>
				</nav>
			</div> -->
			<div class="clearfix"></div>
			<!-- Pagination / End -->

			<!-- Footer -->
			<!-- Footer -->
			
			<!-- Footer / End -->

			<!-- Footer / End -->

		</div>
	</div>
	<!-- Full Page Content / End -->

</div>
@include('includes.footer')
@endsection