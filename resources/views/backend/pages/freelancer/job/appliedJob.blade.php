@extends('backend.layout.template')
@section('title')
{{__('backendJob.Applied Jobs')}}
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 549px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 275px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 549px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">{{__('backendJob.Applied Jobs')}}</h3>
				<!-- <span class="margin-top-7" style="text-align:left;">{{__('backendJob.Job Listings')}} <a href="#"></a></span> -->

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('backendJob.Applied Jobs')}}</li>
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
							<h3><i class="icon-material-outline-supervisor-account"></i> {{__('backendJob.Applied Jobs')}}</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
								@foreach( $jobApplies as $jobApply)
								@php
								$employer = App\Models\User::where('id',$jobApply->employer_id)->first();
								$Job = App\Models\Backend\Job::where('id',$jobApply->job_id)->first();
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
												<h4><a href="{{route('job.show',$Job->id)}}">{{$Job->job_title}} <img class="flag" src="images/flags/au.svg" alt="" data-tippy-placement="top" data-tippy="" data-original-title="Australia"></a></h4>

												
												

												<!-- Buttons -->
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
													<div class="col-md-12">
														<div class="row">
														<div class="col-md-4">
															<a href="#small-dialog-1{{$jobApply->id}}" class="button ripple-effect popup-with-zoom-anim button ripple-effect"><i class="icon-feather-file-text"></i>{{__('backendJob.Update CV')}} </a>
															<!-- Update document
													================================================== -->
													<div id="small-dialog-1{{$jobApply->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

														<!--Tabs -->
														<div class="sign-in-form">

															<ul class="popup-tabs-nav">
																<li><a href="#tab1">{{__('backendJob.Update CV')}}</a></li>
															</ul>

															<div class="popup-tabs-container">

																<!-- Tab -->
																<div class="popup-tab-content" id="tab">
																	
																	<!-- Welcome Text -->
																	<div class="welcome-text">
																		<h3>{{__('backendJob.Update CV')}}</h3>
																	</div>
																		
																	<!-- Form -->
																	<form action="{{route('update.cv.freelancer',$jobApply->id)}}" method="POST"  enctype="multipart/form-data">
																		@csrf
																		

																		

																		<div class="uploadButton margin-top-25">
																			<input class="uploadButton-input" type="file" value="{{$jobApply->file}}" accept="image/*, application/pdf" id="upload" name="file" multiple/ >
																			<label class="uploadButton-button ripple-effect" for="upload">{{__('backendJob.Add Attachments')}}</label>
																			<span class="uploadButton-file-name">{{__('backendJob.Allowed file types')}}: zip, pdf, png, jpg <br> Max. files size: 50 MB.</span>
																		</div>
																		<button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit">Update <i class="icon-material-outline-arrow-right-alt"></i></button>

																	</form>
																	
																	<!-- Button -->
																	

																</div>
																

															</div>
														</div>
													</div>
															
														</div>
														<!-- <div class="col-md-4">
															<a href="#small-dialog" class="popup-with-zoom-anim button dark ripple-effect btn"><i class="icon-feather-mail"></i>Send Message</a>
														</div> -->
														<div class="col-md-8">
															<div class="row">
																<div class="col-md-4">
																	
																	<a href="#small-dialog-2{{$jobApply->id}}" class=" ripple-effect popup-with-zoom-anim ripple-effect"><i class="icon-feather-trash-2 btn btn-danger"></i></a>
															<!-- Cancel request
													================================================== -->
													<div id="small-dialog-2{{$jobApply->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

														<!--Tabs -->
														<div class="sign-in-form">

															<ul class="popup-tabs-nav">
																<li><a href="#tab1">{{__('backendJob.Cancel Apply')}}</a></li>
															</ul>

															<div class="popup-tabs-container">

																<!-- Tab -->
																<div class="popup-tab-content" id="tab">
																	
																	<!-- Welcome Text -->
																	<div class="welcome-text">
																		<h3>{{__('backendJob.Are you sure cancel your job apply')}} ?</h3>
																	</div>
																		
																	<!-- Form -->
																	<form action="{{route('candidate.remove',$jobApply->id)}}" method="POST"  enctype="multipart/form-data">
																		@csrf

																		<button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit">{{__('backendJob.Confirm')}} <i class="icon-material-outline-arrow-right-alt"></i></button>

																	</form>
																	
																	<!-- Button -->
																	

																</div>
																

															</div>
														</div>
													</div>
													</div>
													<div class="col-md-8">
														<a href="#small-dialog-2{{$employer->id}}" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> {{__('backendJob.Send Message')}}</a>
                          <!-- Send Direct Message Popup
================================================== -->
<div id="small-dialog-2{{$employer->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

  <!--Tabs -->
  <div class="sign-in-form">

    <ul class="popup-tabs-nav">
      <li><a href="#tab2">{{__('backendJob.Send Message')}}</a></li>
    </ul>

    <div class="popup-tabs-container">

      <!-- Tab -->
      <div class="popup-tab-content" id="tab2">
        
        <!-- Welcome Text -->
        <div class="welcome-text">
          <h3>{{__('backendJob.Direct Message To')}} {{$employer->full_name}}</h3>
        </div>
          
        <!-- Form -->
        <form method="post" id="send-pm" action="{{route('send.message.emp',$employer->id)}}">
          @csrf
          <textarea name="message" cols="10" placeholder="Message" class="with-border" required></textarea>
          <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="send-pm">{{__('backendJob.Send')}} <i class="icon-material-outline-arrow-right-alt"></i></button>
        </form>
        <!-- Button -->
        

      </div>

    </div>
  </div>
</div>
													</div>





													
																
															</div>
															
															
														</div>

													</div>
													</div>
													
													
												
													
													
								                            <!-- Modal End -->
												</div>
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