@extends('backend.layout.template')
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 611px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 342px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 611px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">Manage Orders</h3>
				<span class="margin-top-7" style="text-align:left;">All Orders </span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">Home</a></li>
						<li><a href="{{route('user.dashbord')}}">Dashboard</a></li>
						<li>Order List</li>
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
							@php 
								$count = App\Models\Backend\TaskApply::where('employer_id',Auth::user()->id)->where('status',1)->count();
							@endphp
							<h3><i class="icon-material-outline-supervisor-account"></i> {{$count}} Orders</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
								@foreach($orders as $order)
								<li>
									<!-- Overview -->
									<div class="freelancer-overview manage-candidates">
										<div class="freelancer-overview-inner">

											

											<!-- Title -->
											<div class="freelancer-name">
												@foreach(App\Models\Backend\Task::where('id',$order->task_id)->get() as $task)
												<!--
														find order 
													-->
													@foreach(App\Models\Backend\DelivaryOrder::where('task_apply_id',$order->id)->get() as $deliver) 
													<h4><a href="#">{{$task->task_name}} </a> 
														@if($deliver->status == 0)
														<span class="dashboard-status-button blue">Running</span>
														@elseif($deliver->status == 1)
														<span class="dashboard-status-button green">Pending Approval</span>
														@elseif($deliver->status == 2)
														<span class="dashboard-status-button green">Panding Cancel request</span>
														@elseif($deliver->status == 3)
														<span class="dashboard-status-button green">Cancel Order</span>
														@elseif($deliver->status == 4)
														<span class="dashboard-status-button green">Order Complete</span>
														@endif
														<span class="dashboard-status-button green">Revision {{$deliver->revision}}</span>
													</h4>


													<!-- Details -->
													@if($order->delivery_type == 1)
													<span class="freelancer-detail-item">{{$order->	delivary_time}} Days</span>
													@else
													<span class="freelancer-detail-item">{{$order->	delivary_time}} Hours</span>
													@endif
													<span class="freelancer-detail-item">Budget {{$order->	min_budget}} $</span>
													<br>
													<span class="freelancer-detail-item">{{$order->description}}</span>
													<!-- Buttons -->
													<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
														@if($deliver->status == 4)
														<a href="{{route('dowload.order.file.employer',$deliver->id)}}" class="button ripple-effect"><i class="icon-feather-file-text"></i> Download Project</a>
														
														@endif
														<a href="#small-dialog" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> Send Message</a>
														@if($deliver->status != 4)
														<a href="#small-dialog-1" class="popup-with-zoom-anim button green ripple-effect"> Download Order</a>
														<div id="small-dialog-1" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

														<!--Tabs -->
															<div class="sign-in-form">

																<ul class="popup-tabs-nav">
																	<li><a href="#tab1"> Order</a></li>
																</ul>

																<div class="popup-tabs-container">

																	<!-- Tab -->
																	<div class="popup-tab-content" id="tab">
																		
																		<!-- Welcome Text -->
																		<div class="welcome-text">
																			<h3>Order</h3>
																		</div>
																		<div class="row">
																				<div class="col-md-6">
																					<h4>{{$deliver->description}}</h4>
																				</div>
																			</div>
																			
																			<div class="row">
																				<div class="col-md-6">
																					<a href="{{route('dowload.order.file.employer',$deliver->id)}}" class="button gray">Download file</a>
																			
																				</div>
																			</div>
																			<div class="row">
																				<div class="col-md-6">
																					<!-- Form -->
																					<form method="POST" action="{{route('confirm.order.emp',$deliver->id)}}" enctype="multipart/form-data">
																						@csrf
																						<button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit">Confirm Order <i class="icon-material-outline-arrow-right-alt"></i></button>

																					</form>
																				</div>
																				@if($deliver->status == 1)
																				<div class="col-md-6">
																					<!-- Form -->
																		<form method="POST" action="{{route('revision.order.emp',$deliver->id)}}" enctype="multipart/form-data">
																			@csrf
																			
																				
																			
																			
																				
																				
																			
																			<button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit">Revision <i class="icon-material-outline-arrow-right-alt"></i></button>

																		</form>
																				</div>
																				@endif
																				
																			</div>	
																		<!-- Button -->
																	</div>
																</div>
															</div>
														</div>
														@elseif($deliver->status == 4)
														@foreach(App\Models\Backend\ReviewFreelancer::where('order_id',$deliver->id)->get() as $review)
														@if($review->status == 0)
														<a href="#small-dialog-1" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> Review</a>
														<!-- Edit Review Popup
														================================================== -->
														<div id="small-dialog-1" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

															<!--Tabs -->
															<div class="sign-in-form">

																<ul class="popup-tabs-nav">
																</ul>

																<div class="popup-tabs-container">

																	<!-- Tab -->
																	<div class="popup-tab-content" id="tab1">
																		
																		<!-- Welcome Text -->
																		<div class="welcome-text">
																			<h3>Review</h3>
																			<span>Rate <a href="{{route('single.freelancer.profile',$deliver->freelancer_id)}}">

																			{{$user->full_name}}
																			</a> for the project <a href="{{route('task.show',$task->id)}}">

																			{{$task->task_name}}
																		</a> 
																		</span>
																		</div>
																			
																		<!-- Form -->
																		
																		<form method="post" action="{{route('review.order.emp',$review->id)}}" id="change-review-form" enctype="multipart/form-data">
																			@csrf
																			<div class="feedback-yes-no">
																				<strong>Was this delivered on budget?</strong>
																				<div class="radio">
																					<input id="radio-rating-1" name="radio" type="radio" value="1">
																					<label for="radio-rating-1"><span class="radio-label"></span> Yes</label>
																				</div>

																				<div class="radio">
																					<input id="radio-rating-2" name="radio" type="radio" value="0">
																					<label for="radio-rating-2"><span class="radio-label"></span> No</label>
																				</div>
																			</div>

																			<div class="feedback-yes-no">
																				<strong>Was this delivered on time?</strong>
																				<div class="radio">
																					<input id="radio-rating-3" name="radio2" type="radio" value="1">
																					<label for="radio-rating-3"><span class="radio-label"></span> Yes</label>
																				</div>

																				<div class="radio">
																					<input id="radio-rating-4" name="radio2" type="radio" value="0">
																					<label for="radio-rating-4"><span class="radio-label"></span> No</label>
																				</div>
																			</div>

																			<div class="feedback-yes-no">
																				<strong>Your Rating</strong>
																				<div class="leave-rating">
																					<input type="radio" name="rating" id="rating-1" value="1" checked/>
																					<label for="rating-1" class="icon-material-outline-star"></label>
																					<input type="radio" name="rating" id="rating-2" value="2"/>
																					<label for="rating-2" class="icon-material-outline-star"></label>
																					<input type="radio" name="rating" id="rating-3" value="3"/>
																					<label for="rating-3" class="icon-material-outline-star"></label>
																					<input type="radio" name="rating" id="rating-4" value="4"/>
																					<label for="rating-4" class="icon-material-outline-star"></label>
																					<input type="radio" name="rating" id="rating-5" value="5"/>
																					<label for="rating-5" class="icon-material-outline-star"></label>
																				</div><div class="clearfix"></div>
																			</div>

																			<textarea class="with-border" placeholder="Comment" name="message" id="message" cols="7" required>Excellent programmer - helped me fix small issues.</textarea>
																			<!-- Button -->
																			<button class="button full-width button-sliding-icon ripple-effect" type="submit" form="change-review-form">Save Changes <i class="icon-material-outline-arrow-right-alt"></i></button>
																		</form>
																		
																		

																	</div>

																</div>
															</div>
														</div>
														@endif
														@endforeach
														<!-- Edit Review Popup / End -->
														@endif
														
														
														
													</div>
													@endforeach
												@endforeach
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