@extends('backend.layout.template')
@section('title')
{{__('backendTask.Manage Bidders')}}
@endsection
@section('body-content')

<div class="dashboard-content-container" data-simplebar="init" style="height: 611px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 277px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 611px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">{{__('backendTask.Manage Bidders')}}</h3>
				<span class="margin-top-7" style="text-align:left;">{{__('backendTask.Bids for')}} <a href="{{route('task.show',$task->id)}}">{{$task->task_name}}</a></span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('backendTask.Manage Bidders')}}</li>
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
							<h3><i class="icon-material-outline-supervisor-account"></i> {{$count}}{{__('backendTask.Bidders')}} </h3>
							<!-- <div class="sort-by">
								<div class="btn-group bootstrap-select hide-tick"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" role="button" title="Highest First"><span class="filter-option pull-left">Highest First</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">Highest First</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Lowest First</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Fastest First</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="selectpicker hide-tick" tabindex="-98">
									<option>Highest First</option>
									<option>Lowest First</option>
									<option>Fastest First</option>
								</select></div>
							</div> -->
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
								@foreach($taskBids as $taskBid)
								<li>
									<!-- Overview -->
									<div class="freelancer-overview manage-candidates">
										<div class="freelancer-overview-inner">
											@php
											$freelancer = App\Models\User::orderBy('id','asc')->where('id',$taskBid->freelancer_id)->first();
											@endphp
											<!-- Avatar -->
											
											<div class="freelancer-avatar">
												<div class="verified-badge"></div>
												<a href="{{route('single.freelancer.profile',$freelancer->id)}}">@if($freelancer->image == null)
										           <img src="{{ asset('images/default.jpeg')}}" alt="">
										      			 @else
																<img src="{{ asset('images/freelancer/' . $freelancer->image)}}" alt="">
														@endif
												</a>
												
											</div>
											
											<!-- Name -->
											<div class="freelancer-name">
											
												<h4><a href="{{route('single.freelancer.profile',$freelancer->id)}}">@if($freelancer->full_name !== null)
													{{$freelancer->full_name}}
													@else
													Unknown
													@endif 
													<img class="flag" src="images/flags/de.svg" alt="" data-tippy-placement="top" data-tippy="" data-original-title="Germany"></a></h4>

												<!-- Details -->
												<span class="freelancer-detail-item"><a href="#"><i class="icon-feather-mail"></i> {{$freelancer->email}}</a></span>

												<!-- Rating -->
												<div class="freelancer-rating">
													<div class="star-rating" data-rating="{{$freelancer->freelancerActivity->average_rating}}"></div>
												</div>
												<!-- Bid Details -->
												<ul class="dashboard-task-info bid-info">
													<li><strong>${{$taskBid->min_budget}}</strong>
														@if($taskBid->delivery_type == 1)
														<span>{{__('backendTask.Fixed Price')}}</span>
														@else
														<span>{{__('backendTask.Hourly Price')}}</span>
														@endif
													</li>
													<li>
														@if($taskBid->delivery_type == 1)
														<strong>{{$taskBid->min_budget}} {{__('backendTask.Days')}}</strong>
														@else
														<strong>{{$taskBid->min_budget}}{{__('backendTask.Hours')}} </strong>
														@endif
														<span>{{__('backendTask.Delivery Time')}}</span></li>
												</ul>

												<!-- Buttons -->
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-0">
													@if($taskBid->status == 0)
													<a href="#small-dialog-1{{$taskBid->id}}" class="popup-with-zoom-anim button ripple-effect">
														<i class="icon-material-outline-check"></i>
														{{__('backendTask.Accept Offer')}} 
													</a>
													<a href="#small-dialog-2{{$freelancer->id}}" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> {{__('backendTask.Send Message')}}</a>
													<!-- Send Direct Message Popup
================================================== -->
<div id="small-dialog-2{{$freelancer->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

	<!--Tabs -->
	<div class="sign-in-form">

		<ul class="popup-tabs-nav">
			<li><a href="#tab2">{{__('backendTask.Send Message')}}</a></li>
		</ul>

		<div class="popup-tabs-container">

			<!-- Tab -->
			<div class="popup-tab-content" id="tab2">
				
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>{{__('backendTask.Direct Message To')}} {{$freelancer->full_name}}</h3>
				</div>
					
				<!-- Form -->
				<form method="post" id="send-pm" action="{{route('send.message.emp',$freelancer->id)}}">
					@csrf
					<textarea name="message" cols="10" placeholder="{{__('backendTask.Send Message')}}" class="with-border" required></textarea>
					<button class="button full-width button-sliding-icon ripple-effect" type="submit" form="send-pm">{{__('backendTask.Send')}} <i class="icon-material-outline-arrow-right-alt"></i></button>
				</form>
				<!-- Button -->
				

			</div>

		</div>
	</div>
</div>


													<!-- Bid Acceptance Popup
													================================================== -->
													<div id="small-dialog-1{{$taskBid->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

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
																		<h3>{{__('backendTask.Accept Offer From')}} {{$freelancer->full_name}}</h3>
																		<div class="bid-acceptance margin-top-15">
																			${{$taskBid->min_budget}}
																		</div>

																	</div>

																	<form id="terms" method="POST" action="{{route('task.bid.emp.approve',$taskBid->id)}}" enctype="multipart/form-data">
																		@csrf
																		<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
																		<input type="hidden" name="taskBid" value="{{ $taskBid->min_budget }}">
																		<!-- Button -->
																		<button class="margin-top-15 button full-width button-sliding-icon ripple-effect" type="submit" form="terms">{{__('backendTask.Accept')}} <i class="icon-material-outline-arrow-right-alt"></i>
																		</button>
																	</form>

																	

																</div>

															</div>
														</div>
													</div>
													<!-- Bid Acceptance Popup / End -->
													@else
													<a href="#small-dialog-3" class="popup-with-zoom-anim button ripple-effect">
														<i class="icon-material-outline-check"></i>
														{{__('backendTask.Reject Offer')}} 
													</a>
													<div id="small-dialog-3" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

														<!--Tabs -->
														<div class="sign-in-form">

															<ul class="popup-tabs-nav">
																<li><a href="#tab3">{{__('backendTask.Reject Offer')}}</a></li>
															</ul>

															<div class="popup-tabs-container">

																<!-- Tab -->
																<div class="popup-tab-content" id="tab">
																	
																	<!-- Welcome Text -->
																	<div class="welcome-text">
																		
																		<h3>{{__('backendTask.Regect Offer From')}} {{$freelancer->full_name}}</h3>
																		

																		<div class="bid-acceptance margin-top-15">
																			${{$taskBid->min_budget}}
																		</div>

																	</div>

																	<form id="terms" method="POST" action="{{route('task.bid.emp.reject',$taskBid->id)}}" enctype="multipart/form-data">
																		@csrf
																		<div class="radio">
																			<input id="radio-1" name="radio" type="radio" required>
																			<label for="radio-1"><span class="radio-label"></span>  {{__('backendTask.I have read and agree to the Terms and Conditions')}}</label>
																		</div>
																		<!-- Button -->
																		<button class="margin-top-15 button full-width button-sliding-icon ripple-effect" type="submit" form="terms">{{__('backendTask.Accept')}} <i class="icon-material-outline-arrow-right-alt"></i>
																		</button>
																	</form>

																	

																</div>

															</div>
														</div>
													</div>
													@endif	 
													<!-- <a href="#small-dialog-2" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> Send Message</a> -->
													<!-- <a href="#small-dialog-4" class="popup-with-zoom-anim button btn-dengar ripple-effect"><i class="icon-feather-trash-2 "></i></a> -->
													<div id="small-dialog-4" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

														<!--Tabs -->
														<div class="sign-in-form">

															<ul class="popup-tabs-nav">
																<li><a href="#tab4">{{__('backendTask.Delete Offer')}}</a></li>
															</ul>

															<div class="popup-tabs-container">

																<!-- Tab -->
																<div class="popup-tab-content" id="tab">
																	
																	<!-- Welcome Text -->
																	<div class="welcome-text">
																		
																		<h3>{{__('backendTask.Delete Offer From')}} {{$freelancer->full_name}}</h3>
																		

																		<div class="bid-acceptance margin-top-15">
																			${{$taskBid->min_budget}}
																		</div>

																	</div>

																	<form id="terms" method="POST" action="{{route('task.bid.emp.delete',$taskBid->id)}}" enctype="multipart/form-data">
																		@csrf
																		<div class="radio">
																			<input id="radio-1" name="radio" type="radio" required>
																			<label for="radio-1"><span class="radio-label"></span>  {{__('backendTask.I have read and agree to the Terms and Conditions')}}</label>
																		</div>
																		<!-- Button -->
																		<button class="margin-top-15 button full-width button-sliding-icon ripple-effect" type="submit" form="terms">Confirm <i class="icon-material-outline-arrow-right-alt"></i>
																		</button>
																	</form>

																	

																</div>

															</div>
														</div>
													</div>
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




<!-- Send Direct Message Popup / End -->
@endsection