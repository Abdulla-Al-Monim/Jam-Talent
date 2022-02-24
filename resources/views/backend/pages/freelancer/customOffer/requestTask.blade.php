@extends('backend.layout.template')
@section('body-content')
<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">{{__('backendTask.Manage Custom Offers')}}</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('backendTask.Manage Custom Offers')}}</li>
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
							<h3><i class="icon-material-outline-assignment"></i> {{__('backendTask.Manage Custom Offers')}}</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
								@foreach($taskRequests as $taskRequest)
								@php
								$employer = App\Models\User::where('id',$taskRequest->employer_id)->first();
								@endphp
								<li>
									<!-- Job Listing -->
									<div class="job-listing width-adjustment">

										<!-- Job Listing Details -->
										<div class="job-listing-details">

											<!-- Details -->
											<div class="job-listing-description">
												<h3 class="job-listing-title"><a href="#">{{$taskRequest->title}}</a> 
													@if($taskRequest->status == 0)
													<span class="dashboard-status-button yellow">{{__('backendTask.Pending Approval')}}</span>
													@else
													<span class="dashboard-status-button yellow">{{__('backendTask.Confirmed')}}</span>
													@endif
												</h3>

												<!-- Job Listing Footer -->
												<div class="job-listing-footer">
													<ul>
														<li><i class="icon-material-outline-access-time"></i>{{$taskRequest->created_at->diffForHumans()}}</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									
									
									@if($taskRequest->status == 0)
									<!-- Buttons -->
									<div class="buttons-to-right always-visible">
										<a href="#small-dialog-1{{$taskRequest->id}}" class=" popup-with-zoom-anim button ripple-effect " ><i class="icon-material-outline-supervisor-account"></i> {{__('backendTask.Approve Order')}} </a>
										
										<!-- approve order popp up -->
										<div id="small-dialog-1{{$taskRequest->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

											<!--Tabs -->
											<div class="sign-in-form">

												<ul class="popup-tabs-nav">
													<li><a href="#tab1">{{__('backendTask.Accept Offer')}}</a></li>
												</ul>

												<div class="popup-tabs-container">

													<!-- Tab -->
													<div class="popup-tab-content" id="tab">
														
														<!-- Welcome Text -->
														<div class="welcome-text">
															<h3>{{__('backendTask.Accept Offer From')}} @if($employer->full_name !== null)
																{{$employer->full_name}}
																@else
																Unknown
																@endif
															</h3>
															

														</div>

														<form id="terms" method="POST" action="{{route('task.apply.confirm',$taskRequest->id)}}" enctype="multipart/form-data">
															@csrf
															<!-- <div class="radio">
																<input id="radio-1" name="radio" type="radio" required>
																<label for="radio-1"><span class="radio-label"></span>  I have read and agree to the Terms and Conditions</label>
															</div> -->
															<!-- Button -->
															<button class="margin-top-15 button full-width button-sliding-icon ripple-effect" type="submit" form="terms">{{__('backendTask.Accept')}} <i class="icon-material-outline-arrow-right-alt"></i>
															</button>
														</form>

														

													</div>

												</div>
											</div>
										</div>
										<!-- Bid Acceptance Popup / End -->
										<a href="{{route('download.document.freelancer',$taskRequest->id)}}" class="button ripple-effect"><i class="icon-feather-file-text"></i> {{__('backendTask.Download Document')}} </a>
										<!-- <a href="#small-dialog" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> Send Message</a> -->
										<!-- <a href="#" class="button gray ripple-effect ico" title="Remove" data-tippy-placement="top"><i class="icon-feather-trash-2"></i></a> -->
									</div>
									@else
									<strong>{{__('backendTask.You confirmed this order')}}</strong>
									@endif
									
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
	<!-- Dashboard Content / End -->
@endsection