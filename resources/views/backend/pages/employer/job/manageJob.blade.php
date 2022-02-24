@extends('backend.layout.template')
@section('title')
{{__('backendJob.Manage Jobs')}}
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
				<h3 style="text-align:left;">{{__('backendJob.Manage Jobs')}}</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('backendJob.Manage Jobs')}}</li>
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
							<h3><i class="icon-material-outline-business-center"></i>{{__('backendJob.My Job Listings')}} </h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
								@foreach($jobs as $job)
								<li>
									<!-- Job Listing -->
									<div class="job-listing">

										<!-- Job Listing Details -->
										<div class="job-listing-details">

											<!-- Logo -->
<!-- 											<a href="#" class="job-listing-company-logo">
												<img src="images/company-logo-05.png" alt="">
											</a> -->

											<!-- Details -->
											<div class="job-listing-description">
												<h3 class="job-listing-title"><a href="{{route('job.show',$job->id)}}">{{$job->job_title}}</a>
												@php
												$count = App\Models\Backend\JobApply::where('job_id',$job->id)->where('status',1)->count();
												@endphp 
													@if($count == 0)
													<span class="dashboard-status-button green">{{__('backendJob.Pending Approval')}}</span>
													@else
													<span class="dashboard-status-button green">{{__('backendJob.Approved')}}</span>
													@endif
												</h3>

												<!-- Job Listing Footer -->
												<div class="job-listing-footer">
													<ul>
														<li><i class="icon-material-outline-date-range"></i>{{__('backendJob.Approved')}} Posted on {{ \Carbon\Carbon::parse($job->created_at)->format('d/m/Y')}}</li>
														<!-- <li><i class="icon-material-outline-date-range"></i> Expiring on 10 August, 2019</li> -->
													</ul>
												</div>
											</div>
										</div>
									</div>

									<!-- Buttons -->
									<div class="buttons-to-right always-visible">
										@if($job->freelancer_id == null)
										@php
											$count = App\Models\Backend\JobApply::where('job_id',$job->id)->count();
										@endphp
										<a href="{{route('candidate.manage',$job->id)}}" class="button ripple-effect"><i class="icon-material-outline-supervisor-account"></i>{{__('backendJob.Manage Candidates')}}  <span class="button-info">{{$count}}</span></a>
										<a href="#small-dialog-1" class="button gray ripple-effect ico popup-with-zoom-anim button " data-tippy-placement="top" data-tippy="" data-original-title="Edit"><i class="icon-feather-edit"></i></a>
										<!-- Update document
													================================================== -->
													<div id="small-dialog-1" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

														<!--Tabs -->
														<div class="sign-in-form">

															<ul class="popup-tabs-nav">
																<li><a href="#tab1">{{__('backendJob.Update Document')}}</a></li>
															</ul>

															<div class="popup-tabs-container">

																<!-- Tab -->
																<div class="popup-tab-content" id="tab">
																	
																	<!-- Welcome Text -->
																	<div class="welcome-text">
																		<h3>{{__('backendJob.Update Document')}}</h3>
																	</div>
																		
																	<!-- Form -->
																	<form action="{{route('update.document.job.employer',$job->id)}}" method="POST"  enctype="multipart/form-data">
																		@csrf
																		

																		

																		<div class="uploadButton margin-top-25">
																			<input class="uploadButton-input" type="file" value="{{$job->file}}" accept="image/*, application/pdf" id="upload" name="file" multiple/ >
																			<label class="uploadButton-button ripple-effect" for="upload">{{__('backendJob.Add Attachments')}}</label>
																			<span class="uploadButton-file-name">{{__('backendJob.Allowed file types')}}: zip, pdf, png, jpg <br> Max. files size: 50 MB.</span>
																		</div>
																		<button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit">{{__('backendJob.Update')}} <i class="icon-material-outline-arrow-right-alt"></i></button>

																	</form>
																	
																	<!-- Button -->
																	

																</div>
																

															</div>
														</div>
													</div>
										<a href="#small-dialog-4" class="button gray ripple-effect ico popup-with-zoom-anim button" data-tippy-placement="top" data-tippy="" data-original-title="Remove"><i class="icon-feather-trash-2"></i></a>
										<div id="small-dialog-4" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

											<!--Tabs -->
											<div class="sign-in-form">

												<ul class="popup-tabs-nav">
													<li><a href="#tab4">{{__('backendJob.Delete Job')}}</a></li>
												</ul>

												<div class="popup-tabs-container">

													<!-- Tab -->
													<div class="popup-tab-content" id="tab">
														
														<!-- Welcome Text -->
														<div class="welcome-text">
															<h3>{{__('backendJob.Are you sure want to delete Job ?')}}</h3>
														</div>
															
														<!-- Form -->
														<form action="{{route('delete.job.employer',$job->id)}}" method="POST"  enctype="multipart/form-data">
															@csrf
															<button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit">{{__('backendJob.Confirm')}} <i class="icon-material-outline-arrow-right-alt"></i></button>

														</form>
														
														<!-- Button -->
														

													</div>
													

												</div>
											</div>
										</div>

										@else
										@php
										$freelancer = App\Models\User::where('id',$job->freelancer_id)->first();
										@endphp
											<a href="{{route('single.freelancer.profile',$job->freelancer_id)}}" class="button ripple-effect"><i class="icon-material-outline-supervisor-account"></i>@if($freelancer->full_name == null)
												Unknown
												@else

											 	{{$freelancer->full_name}} 
											 @endif
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
			<!-- Row / End -->
			<div class="d-felx justify-content-center">

		            {{ $jobs->links('pagination::bootstrap-4') }}

		        </div>
				<div class="clearfix"></div>
			@include('includes.dashboardFooter')

		</div>
	</div>
</div>
</div>
@endsection