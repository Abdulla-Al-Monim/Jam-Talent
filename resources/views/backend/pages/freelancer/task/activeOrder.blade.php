@extends('backend.layout.template')
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 611px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 342px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 611px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">{{__('backendTask.Manage Orders')}}</h3>
				<span class="margin-top-7" style="text-align:left;">{{__('backendTask.All Orders')}} </span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="#">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('backendTask.Order List')}}</li>
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
								$count = App\Models\Backend\TaskApply::where('freelancer_id',Auth::user()->id)->where('status',1)->count();
							@endphp
							<h3><i class="icon-material-outline-supervisor-account"></i> {{$count}}{{__('backendTask.Orders')}} </h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
								@foreach($taskApplies as $taskApply)
								<li>
									<!-- Overview -->
									<div class="freelancer-overview manage-candidates">
										<div class="freelancer-overview-inner">

											

											<!-- Title -->
											<div class="freelancer-name">
												@foreach(App\Models\Backend\Task::where('id',$taskApply->task_id)->get() as $task)
													<!--
														find order 
													-->
													@foreach(App\Models\Backend\DelivaryOrder::where('task_apply_id',$taskApply->id)->get() as $deliver) 
													<h4>
														<a href="#">{{$task->task_name}} </a> 
														@if($deliver->status == 0)
														<span class="dashboard-status-button blue">{{__('backendTask.Running')}}</span>
														@elseif($deliver->status == 1)
														<span class="dashboard-status-button green">{{__('backendTask.Pending Approval')}}</span>
														@elseif($deliver->status == 2)
														<span class="dashboard-status-button green">{{__('backendTask.Panding Cancel request')}}</span>
														@elseif($deliver->status == 3)
														<span class="dashboard-status-button green">{{__('backendTask.Cancel Order')}}</span>
														@endif
														
													</h4>


													<!-- Details -->
													@if($taskApply->delivery_type == 1)
													<span class="freelancer-detail-item">{{$taskApply->	delivary_time}} {{__('backendTask.Days')}}</span>
													@else
													<span class="freelancer-detail-item">{{$taskApply->	delivary_time}} {{__('backendTask.Hours')}}</span>
													@endif
													<span class="freelancer-detail-item">{{__('backendTask.Budget')}} {{$task->min_budget}} $</span>
													<br>
													<span class="freelancer-detail-item">{!!$task->description!!}</span>

													

													<!-- Buttons -->
													<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
														<a href="{{route('download.documentt.task.freelancer',$task->id)}}" class="button ripple-effect"><i class="icon-feather-file-text"></i> {{__('backendTask.Download Document')}}</a>
														<a href="#small-dialog" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> {{__('backendTask.Send Message')}}</a>
														
														@if($deliver->status != 4)
														<a href="#small-dialog-1" class="popup-with-zoom-anim button green ripple-effect">{{__('backendTask.Delivery Order')}} </a>
														<div id="small-dialog-1" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

														<!--Tabs -->
															<div class="sign-in-form">

																<ul class="popup-tabs-nav">
																	<li><a href="#tab1">{{__('backendTask.Delivery Order')}}</a></li>
																</ul>

																<div class="popup-tabs-container">

																	<!-- Tab -->
																	<div class="popup-tab-content" id="tab">
																		
																		<!-- Welcome Text -->
																		<div class="welcome-text">
																			<h3>{{__('backendTask.Attach File')}}</h3>
																		</div>
																			
																			
																			<!-- Form -->
																		<form method="POST" action="{{route('place.order.freelancer',$deliver->id)}}" enctype="multipart/form-data">
																			@csrf
																			<div class="input-with-icon-left">
																				
																				<textarea placeholder="description" name="description"></textarea>
																			</div>
																			<div class="uploadButton margin-top-25">
																				<input class="uploadButton-input" type="file" accept="image/*, application/pdf,.zip,.rar,.7zip" id="upload" name="file" multiple/>
																				<label class="uploadButton-button ripple-effect" for="upload">{{__('backendTask.Add Attachments')}}</label>
																				<span class="uploadButton-file-name">{{__('backendTask.Upload Document')}} </span>
																			</div>
																			<button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit">{{__('backendTask.Delivery Order')}} <i class="icon-material-outline-arrow-right-alt"></i></button>

																		</form>
																			
																			
																		
																		
																		<!-- Button -->
																		

																	</div>
																	

																</div>
															</div>
														</div>
														@elseif($deliver->status == 4)
														@foreach(App\Models\Backend\ReviewEmployer::where('order_id',$deliver->id)->get() as $review)
														@if($review->status == 0)
														<a href="#small-dialog-1" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> {{__('backendTask.Review')}}</a>
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
																			<h3>{{__('backendTask.Review')}}</h3>
																			<span>{{__('backendTask.Rate')}} <a href="{{route('single.freelancer.profile',$deliver->freelancer_id)}}">

																			{{$user->full_name}}
																			</a> {{__('backendTask.for the project')}} <a href="{{route('task.show',$task->id)}}">

																			{{$task->task_name}}
																		</a> 
																		</span>
																		</div>
																			
																		<!-- Form -->
																		
																		<form method="post" action="{{route('review.order.freelancer',$review->id)}}" id="change-review-form" enctype="multipart/form-data">
																			@csrf

																			<div class="feedback-yes-no">
																				<strong>{{__('backendTask.Your Rating')}}</strong>
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

																			<textarea class="with-border" placeholder="Comment" name="message" id="message" cols="7" required>{{__('backendTask.Excellent programmer - helped me fix small issues."=>"Mükemmel programcı - küçük sorunları çözmeme yardımcı oldu.')}}</textarea>
																			<!-- Button -->
																			<button class="button full-width button-sliding-icon ripple-effect" type="submit" form="change-review-form">{{__('backendTask.Save Changes')}} <i class="icon-material-outline-arrow-right-alt"></i></button>
																		</form>
																		
																		

																	</div>

																</div>
															</div>
														</div>
														@else
														<a href="{{route('dowload.order.file.employer',$deliver->id)}}" class="button ripple-effect"><i class="icon-feather-file-text"></i>{{__('backendTask.Download Project')}} </a>
														@endif
														@endforeach
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