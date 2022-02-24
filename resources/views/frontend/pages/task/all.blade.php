@extends('frontend.layout.template')
@section('title')
All Task
@endsection
@section('body-content')
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

			<div class="listings-container grid-layout margin-top-35">
				@foreach($tasks as $task)
				@php 
				$employer = App\Models\User::where('id',$task->employer_id)->first();
				@endphp
				<!-- Job Listing -->
				<a href="{{route('task.show',$task->id)}}" class="job-listing">

					<!-- Job Listing Details -->
					<div class="job-listing-details">
						<!-- Logo -->
						<div class="job-listing-company-logo">

							@if($employer->iamge == null)
							<img src="{{asset('images/default.jpeg')}}" alt="">
							@else
							<img src="{{ asset('images/employer/' . $employer->image)}}" alt="">
							@endif

						</div>

						<!-- Details -->
						<div class="job-listing-description">
							<h4 class="job-listing-company">
								
								@if($employer->full_name == null)
									Unknown
									@else
										{{$employer->full_name}}
									@endif
								 <span class="verified-badge" title="Verified Employer" data-tippy-placement="top"></span></h4>
							<h3 class="job-listing-title">{{$task->task_name}}</h3>
						</div>
					</div>

					<!-- Job Listing Footer -->
					<div class="job-listing-footer">
						<!-- <span class="bookmark-icon"></span> -->
						<ul>
							<!-- <li><i class="icon-material-outline-location-on"></i> {{$task->min_budget}}</li> -->
							<li>
								@if($task->budget_type == 1)
								<i class="icon-material-outline-business-center"></i> {{$task->delivery_time}} Hours
								@else
								<i class="icon-material-outline-business-center"></i> {{$task->delivery_time}} Days
								@endif
							</li>
							<li><i class="icon-material-outline-account-balance-wallet"></i> ${{$task->min_budget}}-${{$task->max_budget}}</li>
							<li><i class="icon-material-outline-access-time"></i> {{$task->created_at->diffForHumans()}}</li>
						</ul>
					</div>
				</a>	
				@endforeach
			</div>

			<!-- Pagination -->
			<div class="clearfix"></div>
			<div class="d-felx justify-content-center">

		            {{ $tasks->links('pagination::bootstrap-4') }}

		        </div>
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
<!-- footer start -->
@include('includes.footer')
<!-- footer end -->
@endsection