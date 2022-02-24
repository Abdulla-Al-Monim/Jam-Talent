@extends('backend.layout.template')
@section('body-content')

<div class="dashboard-content-container" data-simplebar="init" style="height: 549px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 223px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 549px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>My Active Bids</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('backendTask.My Active Bids')}}</li>
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
							<h3><i class="icon-material-outline-gavel"></i> {{__('backendTask.Bids List')}}</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
								<li>
									<!-- Job Listing -->
									<div class="job-listing width-adjustment">

										<!-- Job Listing Details -->
										<div class="job-listing-details">

											<!-- Details -->
											<div class="job-listing-description">
												<h3 class="job-listing-title"><a href="#">WordPress Guru Needed</a></h3>
											</div>
										</div>
									</div>
									
									<!-- Task Details -->
									<ul class="dashboard-task-info">
										<li><strong>$40</strong><span>Hourly Rate</span></li>
										<li><strong>2 Days</strong><span>Delivery Time</span></li>
									</ul>

									<!-- Buttons -->
									<div class="buttons-to-right always-visible">
										<a href="#small-dialog" class="popup-with-zoom-anim button dark ripple-effect ico" data-tippy-placement="top" data-tippy="" data-original-title="Edit Bid"><i class="icon-feather-edit"></i></a>
										<a href="#" class="button red ripple-effect ico" data-tippy-placement="top" data-tippy="" data-original-title="Cancel Bid"><i class="icon-feather-trash-2"></i></a>
									</div>
								</li>
								<li>
									<!-- Job Listing -->
									<div class="job-listing width-adjustment">

										<!-- Job Listing Details -->
										<div class="job-listing-details">

											<!-- Details -->
											<div class="job-listing-description">
												<h3 class="job-listing-title"><a href="#">Build me a website in Angular JS</a></h3>
											</div>
										</div>
									</div>
									
									<!-- Task Details -->
									<ul class="dashboard-task-info">
										<li><strong>$2,550</strong><span>Fixed price</span></li>
										<li><strong>14 Days</strong><span>Delivery Time</span></li>
									</ul>

									<!-- Buttons -->
									<div class="buttons-to-right always-visible">
										<a href="#small-dialog" class="popup-with-zoom-anim button dark ripple-effect ico" data-tippy-placement="top" data-tippy="" data-original-title="Edit Bid"><i class="icon-feather-edit"></i></a>
										<a href="#" class="button red ripple-effect ico" data-tippy-placement="top" data-tippy="" data-original-title="Cancel Bid"><i class="icon-feather-trash-2"></i></a>
									</div>
								</li>
								<li>
									<!-- Job Listing -->
									<div class="job-listing width-adjustment">

										<!-- Job Listing Details -->
										<div class="job-listing-details">

											<!-- Details -->
											<div class="job-listing-description">
												<h3 class="job-listing-title"><a href="#">Android and iOS React Appe</a></h3>
											</div>
										</div>
									</div>
									
									<!-- Task Details -->
									<ul class="dashboard-task-info">
										<li><strong>$3,000</strong><span>Fixed Price</span></li>
										<li><strong>21 Days</strong><span>Delivery Time</span></li>
									</ul>

									<!-- Buttons -->
									<div class="buttons-to-right always-visible">
										<a href="#small-dialog" class="popup-with-zoom-anim button dark ripple-effect ico" data-tippy-placement="top" data-tippy="" data-original-title="Edit Bid"><i class="icon-feather-edit"></i></a>
										<a href="#" class="button red ripple-effect ico" data-tippy-placement="top" data-tippy="" data-original-title="Cancel Bid"><i class="icon-feather-trash-2"></i></a>
									</div>
								</li>
								<li>
									<!-- Job Listing -->
									<div class="job-listing width-adjustment">

										<!-- Job Listing Details -->
										<div class="job-listing-details">

											<!-- Details -->
											<div class="job-listing-description">
												<h3 class="job-listing-title"><a href="#">Write Simple Python Script</a></h3>
											</div>
										</div>
									</div>
									
									<!-- Task Details -->
									<ul class="dashboard-task-info">
										<li><strong>$30</strong><span>Hourly Rate</span></li>
										<li><strong>1 Day</strong><span>Delivery Time</span></li>
									</ul>

									<!-- Buttons -->
									<div class="buttons-to-right always-visible">
										<a href="#small-dialog" class="popup-with-zoom-anim button dark ripple-effect ico" data-tippy-placement="top" data-tippy="" data-original-title="Edit Bid"><i class="icon-feather-edit"></i></a>
										<a href="#" class="button red ripple-effect ico" data-tippy-placement="top" data-tippy="" data-original-title="Cancel Bid"><i class="icon-feather-trash-2"></i></a>
									</div>
								</li>

							</ul>
						</div>
					</div>
				</div>

			</div>
			<!-- Row / End -->

			<!-- Footer -->
			@include('backend.includes.footer')
			<!-- Footer / End -->

		</div>
	</div></div></div>

@endsection