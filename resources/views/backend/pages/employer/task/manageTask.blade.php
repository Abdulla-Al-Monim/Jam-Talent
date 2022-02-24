@extends('backend.layout.template')
<!-- title section -->
@section('title')
Manage Task
@endsection

@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 611px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 419px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 611px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">{{__('backendTask.Manage Tasks')}}</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('backendTask.Manage Tasks')}}</li>
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
							<h3><i class="icon-material-outline-assignment"></i> {{__('backendTask.My Tasks')}}</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">						@foreach($taskRequests as $taskRequest)
								@php 
									$count = App\Models\Backend\TaskApply::orderBy('id','asc')->where('task_id',$taskRequest->id)->where('status',1)->count();
									$countBidder = App\Models\Backend\TaskApply::orderBy('id','asc')->where('task_id',$taskRequest->id)->count();
								@endphp
								<li>
									<!-- Job Listing -->
									<div class="job-listing width-adjustment">

										<!-- Job Listing Details -->
										<div class="job-listing-details">

											<!-- Details -->
											<div class="job-listing-description">
												<h3 class="job-listing-title"><a href="{{route('task.show',$taskRequest->id)}}">{{$taskRequest->task_name}}</a>
													<!-- 
												@if($count > 0 )
													<span class="dashboard-status-button yellow">Running</span>
												@else
													<span class="dashboard-status-button yellow"> Remaining</span>
												@endif  -->
													
												</h3>

												<!-- Job Listing Footer -->
												<div class="job-listing-footer">
													<ul>
														

														<li><i class="icon-material-outline-access-time"></i>
														{{$taskRequest->created_at->diffForHumans()}}
														   {{__('backendTask.left')}}
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									
									<!-- Task Details -->
									<ul class="dashboard-task-info">
										<li><strong>{{$countBidder}}</strong><span>{{__('backendTask.Bids')}}</span></li>
										@php
											$totalBuget = App\Models\Backend\TaskApply::where('task_id',$taskRequest->id)->sum('min_budget');
											if($countBidder == 0){
												$avgBudget = 0;
											}
											else{
												$avgBudget = $totalBuget/$countBidder;
											}
										@endphp
										<li><strong>${{$avgBudget}}</strong><span>{{__('backendTask.Avg. Bid')}}</span></li>

										<li><strong>${{$taskRequest->min_budget}} - ${{$taskRequest->max_budget}}</strong><span>{{__('backendTask.Budget Range')}}</span></li>
									</ul>

									<!-- Buttons -->
									<div class="buttons-to-right always-visible">

										<!-- @foreach(App\Models\Backend\TaskApply::orderBy('id','asc')->where('task_id',$taskRequest->id)->where('status',1)->get() as $applyTask)
										@endforeach -->
										@if($count > 0 )
										<strong>{{__('backendTask.This order is confirmed')}}</strong>
										@else
										<a href="{{route('task.bid.emp',$taskRequest->id)}}" class="button ripple-effect"><i class="icon-material-outline-supervisor-account"></i> {{__('backendTask.Manage Bidders')}} 
											<span class="button-info">{{$countBidder}}</span>
										</a>
										@endif
										
										
									</div>
								</li>
								@endforeach
							</ul>
						</div>
						
					</div>
				</div>

			</div>
			<div class="margin-bottom-25"></div>
			<div class="d-felx justify-content-center">

		            {{ $taskRequests->links('pagination::bootstrap-4') }}

		        </div>
				<div class="clearfix"></div>
			<!-- Row / End -->

			<!-- Footer -->
			@include('includes.dashboardFooter')
			<!-- Footer / End -->

		</div>
	</div></div></div>
@endsection