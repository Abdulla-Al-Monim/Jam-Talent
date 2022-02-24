@extends('backend.layout.template')
@section('title')
{{__('backendJob.Manage Candidates')}}
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 549px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 275px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 549px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">{{__('backendJob.Manage Candidates')}}</h3>
				<span class="margin-top-7">{{__('backendJob.Job Applications for')}} <a href="{{route('job.show',$job->id)}}">{{$job->job_title}}</a></span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('backendJob.Manage Candidates')}}</li>
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
							<h3><i class="icon-material-outline-supervisor-account"></i> {{$count}} {{__('backendJob.Candidates')}}</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
								@foreach( $jobApplies as $jobApply)
								@php
								$freelancer = App\Models\User::where('id',$jobApply->freelancer_id)->first();
								@endphp
								<li>
									<!-- Overview -->
									<div class="freelancer-overview manage-candidates">
										<div class="freelancer-overview-inner">

											<!-- Avatar -->
											<div class="freelancer-avatar">
												<div class="verified-badge"></div>
												<a href="{{route('single.freelancer.profile',$freelancer->id)}}">
													@if($freelancer->image == null)
												           <img src="{{ asset('images/default.jpeg')}}" alt="">
												       @else
														<img src="{{ asset('images/freelancer/' . $freelancer->image)}}" alt="">
													@endif
												</a>
											</div>

											<!-- Name -->
											<div class="freelancer-name">
												<h4><a href="{{route('single.freelancer.profile',$freelancer->id)}}">
													@if($freelancer->full_name == null)
													Unknown
													@else
													{{$freelancer->full_name}}
													@endif 
													<img class="flag" src="images/flags/au.svg" alt="" data-tippy-placement="top" data-tippy="" data-original-title="Australia"></a></h4>

												<!-- Details -->
												<span class="freelancer-detail-item"><a href="#"><i class="icon-feather-mail"></i> {{$jobApply->email}}</a></span>
												<span class="freelancer-detail-item"><strong>{{__('backendJob.Salary Budget')}} </strong><span>alary Budge ${{$jobApply->budget}}</span></i></a></span>
												<!-- <span class="freelancer-detail-item"><i class="icon-feather-phone"></i> (+61) 123-456-789</span> -->

												<!-- Rating -->
												<div class="freelancer-rating">
													<div class="star-rating" data-rating="{{$freelancer->freelancerActivity->average_rating}}"></div>
												</div>

												<!-- Buttons -->
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
													<div class="col-md-12">
														<div class="row">
														<div class="col-md-4">
															<a href="{{route('candidate.cv.download',$jobApply->id)}}" class="button ripple-effect btn btn-primary"><i class="icon-feather-file-text"></i>{{__('backendJob.download cv')}} </a>
														</div>
														<!-- <div class="col-md-4">
															<a href="#small-dialog" class="popup-with-zoom-anim button dark ripple-effect btn"><i class="icon-feather-mail"></i> Send Message</a>
														</div> -->
														<div class="col-md-4">
															<div class="row">
																	<form action="{{route('candidate.approve',[$jobApply->id,$job->id])}}" method="POST">
																@csrf
																		<button class="icon-material-outline-check btn btn-success" type="submit"></button>
																	</form>
																
															</div>
															
															
														</div>
														<div class="col-md-4">
															<a href="#small-dialog-2{{$freelancer->id}}" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> {{__('backendJob.Send Message')}}</a>
                          <!-- Send Direct Message Popup
================================================== -->
<div id="small-dialog-2{{$freelancer->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

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
          <h3>{{__('backendJob.Direct Message To')}} {{$freelancer->full_name}}</h3>
        </div>
          
        <!-- Form -->
        <form method="post" id="send-pm" action="{{route('send.message.emp',$freelancer->id)}}">
          @csrf
          <textarea name="message" cols="10" placeholder="{{__('backendTask.Message')}}" class="with-border" required></textarea>
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