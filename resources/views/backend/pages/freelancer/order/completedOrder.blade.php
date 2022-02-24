@extends('backend.layout.template')
@section('title')
{{__('backendOrder.Completed Orders')}}
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 611px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 342px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 611px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">{{__('backendOrder.All Completed Orders')}}</h3>
				<span class="margin-top-7" style="text-align:left;">{{__('backendOrder.All Completed Orders')}} </span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('backendOrder.Completed Order List')}}</li>
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
								$count = App\Models\Backend\Order::where('freelancer_id',Auth::user()->id)->where('status',3)->count();
							@endphp
							<h3><i class="icon-material-outline-supervisor-account"></i> {{$count}} {{__('backendOrder.All Completed Orders')}}</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
								@foreach($orders as $order)
								@php
									$review = App\Models\Backend\ReviewEmployer::where('order_id',$order->id)->first();

									$employerActivity = App\Models\Backend\EmployerActivity::where('user_id',$order->employer_id)->first();

									$deliveryOrder = App\Models\Backend\DelivaryOrder::where('order_id',$order->id)->first();

									$employer = App\Models\User::where('id',$order->employer_id)->first();
								@endphp
								@if($order->order_type == 1)

								<li>
									<!-- Overview -->
									<div class="freelancer-overview manage-candidates">
										<div class="freelancer-overview-inner">

											

											<!-- Title -->
											<div class="freelancer-name">
											<!-- get custom offer table -->		
											@php 

												$customOffer = App\Models\Backend\TaskOffer::where('id',$order->offer_id)->first();
											@endphp
												<h4>
													<a href="#">{{$customOffer->title}} </a> 
													@if($order->status == 1)
													<span class="dashboard-status-button blue">{{__('backendOrder.Active Orders')}}</span>
													@endif
													
												</h4>


													<!-- Details -->
												@if($order->delivery_type == 1)
												<span class="freelancer-detail-item">{{$order->	delivary_time}} {{__('backendOrder.Days')}}</span>
												@else
												<span class="freelancer-detail-item">{{$order->	delivary_time}} {{__('backendOrder.Hours')}}</span>
												@endif
												<span class="freelancer-detail-item">{{__('backendOrder.Budget')}} {{$order->budget}} $</span>
												<br>
												<span class="freelancer-detail-item">{!!$order->message!!}</span>
												<br>
												<a href="{{route('single.employer.profile',$employer->id)}}" target="_blank"><span class="freelancer-detail-item">{{__('backendOrder.Offer by')}}
												@if($employer->full_name !== null) {{$employer->full_name}}
													@else
													{{__('backendOrder.Unknown')}}
													@endif
												</span></a>
												<!-- Buttons -->
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
													<a href="{{route('dowload.order.file.employer',$deliveryOrder->id)}}" class="button ripple-effect"><i class="icon-feather-file-text"></i> {{__('backendOrder.Download Project')}}</a>
													
                          <!-- Send Direct Message Popup
================================================== -->
<div id="small-dialog-3{{$employer->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

  <!--Tabs -->
  <div class="sign-in-form">

    <ul class="popup-tabs-nav">
      <li><a href="#tab2">{{__('backendOrder.Send Message')}}</a></li>
    </ul>

    <div class="popup-tabs-container">

      <!-- Tab -->
      <div class="popup-tab-content" id="tab2">
        
        <!-- Welcome Text -->
        <div class="welcome-text">
          <h3>{{__('backendOrder.Direct Message To')}} {{$employer->full_name}}</h3>
        </div>
          
        <!-- Form -->
        <form method="post" id="send-pm" action="{{route('send.message.emp',$employer->id)}}">
          @csrf
          <textarea name="message" cols="10" placeholder="{{__('backendTask.Message')}}" class="with-border" required></textarea>
          <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="send-pm">{{__('backendOrder.Send')}} <i class="icon-material-outline-arrow-right-alt"></i></button>
        </form>
        <!-- Button -->
        

      </div>

    </div>
  </div>
</div>
													@if($review->status == 0)
														<a href="#small-dialog-4" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> {{__('backendOrder.Review')}} </a>
														<div id="small-dialog-4" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

															<!--Tabs -->
															<div class="sign-in-form">

																<ul class="popup-tabs-nav">
																</ul>

																<div class="popup-tabs-container">

																	<!-- Tab -->
																	<div class="popup-tab-content" id="tab4">
																		
																		<!-- Welcome Text -->
																		<div class="welcome-text">
																			<h3>{{__('backendOrder.Review')}} </h3>
																			<span>{{__('backendOrder.Rate')}}  <a href="{{route('single.freelancer.profile',$order->freelancer_id)}}">

																			{{$user->full_name}}
																			</a>
																		</span>
																		</div>
																			
																		<!-- Form -->
																		
																		<form method="post" action="{{route('review.order.freelancer',[$review->id,$employerActivity->id])}}" id="change-review-form" enctype="multipart/form-data">
																			@csrf

																			<div class="feedback-yes-no">
																				<strong>{{__('backendOrder.Your Rating')}} </strong>
																				<div class="leave-rating">
																					<input type="radio" name="rating" id="rating-1" value="5" />
																					<label for="rating-1" class="icon-material-outline-star"></label>
																					<input type="radio" name="rating" id="rating-2" value="4"/>
																					<label for="rating-2" class="icon-material-outline-star"></label>
																					<input type="radio" name="rating" id="rating-3" value="3"/>
																					<label for="rating-3" class="icon-material-outline-star"></label>
																					<input type="radio" name="rating" id="rating-4" value="2"/>
																					<label for="rating-4" class="icon-material-outline-star"></label>
																					<input type="radio" name="rating" id="rating-5" value="1"/>
																					<label for="rating-5" class="icon-material-outline-star"></label>
																				</div>
																				@error('rating')
																				    <div class="alert alert-danger">{{ $message }}</div>
																				@enderror
																				<div class="clearfix"></div>
																			</div>

																			<textarea class="with-border" placeholder="Comment" name="comment" id="message" cols="7" required></textarea>
																			@error('comment')
																				    <div class="alert alert-danger">{{ $message }}</div>
																			@enderror
																			<!-- Button -->
																			<button class="button full-width button-sliding-icon ripple-effect" type="submit" form="change-review-form">{{__('backendOrder.Save Changes')}}  <i class="icon-material-outline-arrow-right-alt"></i></button>
																		</form>
																		
																		

																	</div>

																</div>
															</div>
														</div>
													<!-- review end -->
													@endif
												</div>
											</div>
										</div>
									</div>
								</li>
								@elseif($order->order_type == 2)
								<li>
									<!-- Overview -->
									<div class="freelancer-overview manage-candidates">
										<div class="freelancer-overview-inner">

											

											<!-- Title -->
											<div class="freelancer-name">
											<!-- get custom offer table -->		
											@php 
												$taskApply = App\Models\Backend\TaskApply::where('id',$order->offer_id)->first();
												$task = App\Models\Backend\Task::where('id',$taskApply->task_id)->first();
												
												$review = App\Models\Backend\ReviewEmployer::where('order_id',$order->id)->first();
											@endphp
												<h4>
													<a href="#">{{$task->task_name}} </a> 
													@if($order->status == 1)
													<span class="dashboard-status-button blue">{{__('backendOrder.Active Orders')}}</span>
													@endif
													
												</h4>


													<!-- Details -->
												@if($order->delivery_type == 1)
												<span class="freelancer-detail-item">{{$order->	delivary_time}}{{__('backendOrder.Days')}}  </span>
												@else
												<span class="freelancer-detail-item">{{$order->	delivary_time}} {{__('backendOrder.Hours')}} </span>
												@endif
												<span class="freelancer-detail-item">{{__('backendOrder.Send')}} {{__('backendOrder.Budget')}}  {{$order->budget}} $</span>
												<br>
												<span class="freelancer-detail-item">{!!$order->message!!}</span>
												<br>
												<a href="{{route('single.employer.profile',$employer->id)}}" target="_blank"><span class="freelancer-detail-item">{{__('backendOrder.Offer by')}} 
												@if($employer->full_name !== null) {{$employer->full_name}}
													@else
													Unknown
													@endif
												</span></a>
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
													<!-- <a href="{{route('download.documentt.task.freelancer',$task->id)}}" class="button ripple-effect"><i class="icon-feather-file-text"></i>{{__('backendOrder.Download Document')}}  </a> -->
													<a href="{{route('dowload.order.file.employer',$deliveryOrder->id)}}" class="button ripple-effect"><i class="icon-feather-file-text"></i>{{__('backendOrder.Download Project')}} </a>
													<!-- <a href="#small-dialog" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> Send Message</a> -->
													<!-- give review -->

													<a href="#small-dialog-3{{$employer->id}}" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> {{__('backendOrder.Send Message')}} </a>
                          <!-- Send Direct Message Popup
================================================== -->
<div id="small-dialog-3{{$employer->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

  <!--Tabs -->
  <div class="sign-in-form">

    <ul class="popup-tabs-nav">
      <li><a href="#tab2">{{__('backendOrder.Send Message')}} </a></li>
    </ul>

    <div class="popup-tabs-container">

      <!-- Tab -->
      <div class="popup-tab-content" id="tab2">
        
        <!-- Welcome Text -->
        <div class="welcome-text">
          <h3>{{__('backendOrder.Direct Message To')}} {{$employer->full_name}}</h3>
        </div>
          
        <!-- Form -->
        <form method="post" id="send-pm" action="{{route('send.message.emp',$employer->id)}}">
          @csrf
          <textarea name="message" cols="10" placeholder="{{__('backendTask.Message')}}" class="with-border" required></textarea>
          <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="send-pm">{{__('backendOrder.Send')}} <i class="icon-material-outline-arrow-right-alt"></i></button>
        </form>
        <!-- Button -->
        

      </div>

    </div>
  </div>
</div>
													@if($review->status == 0)
														<a href="#small-dialog-1" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i>{{__('backendOrder.Review')}}</a>
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
																			<h3>{{__('backendOrder.Review')}} </h3>
																			<span>{{__('backendOrder.Rate')}}  <!-- <a href="{{route('single.freelancer.profile',$order->freelancer_id)}}"> -->

																			{{$user->full_name}}
																			</a>{{__('backendOrder.for the project')}}   <a href="{{route('task.show',$task->id)}}">

																			{{$task->task_name}}
																		</a> 
																		</span>
																		</div>
																			
																		<!-- Form -->
																		
																		<form method="post" action="{{route('review.order.freelancer',[$review->id,$employerActivity->id])}}" id="change-review-form" enctype="multipart/form-data">
																			@csrf

																			<div class="feedback-yes-no">
																				<strong>{{__('backendOrder.Your Rating')}} </strong>
																				<div class="leave-rating">
																					<input type="radio" name="rating" id="rating-1" value="5" />
																					<label for="rating-1" class="icon-material-outline-star"></label>
																					<input type="radio" name="rating" id="rating-2" value="4"/>
																					<label for="rating-2" class="icon-material-outline-star"></label>
																					<input type="radio" name="rating" id="rating-3" value="3"/>
																					<label for="rating-3" class="icon-material-outline-star"></label>
																					<input type="radio" name="rating" id="rating-4" value="2"/>
																					<label for="rating-4" class="icon-material-outline-star"></label>
																					<input type="radio" name="rating" id="rating-5" value="1"/>
																					<label for="rating-5" class="icon-material-outline-star"></label>
																				</div>
																				@error('rating')
																				    <div class="alert alert-danger">{{ $message }}</div>
																				@enderror
																				<div class="clearfix"></div>
																			</div>

																			<textarea class="with-border" placeholder="Comment" name="comment" id="message" cols="7" required>{{__('backendOrder.Excellent programmer - helped me fix small issues.')}} </textarea>
																			@error('comment')
																				    <div class="alert alert-danger">{{ $message }}</div>
																				@enderror
																			<!-- Button -->
																			<button class="button full-width button-sliding-icon ripple-effect" type="submit" form="change-review-form">{{__('backendOrder.Save Changes')}}  <i class="icon-material-outline-arrow-right-alt"></i></button>
																		</form>
																		
																		

																	</div>

																</div>
															</div>
														</div>
													<!-- review end -->
													@endif
												</div>
											</div>
										</div>
									</div>
								</li>
								@endif
								@endforeach
							</ul>
						</div>
					</div>
				</div>

			</div>
			<div class="d-felx justify-content-center">

		            {{ $orders->links('pagination::bootstrap-4') }}

		        </div>
				<div class="clearfix"></div>
			<!-- Row / End -->

			<!-- Row / End -->

			<!-- Footer -->
			@include('includes.dashboardFooter')
			<!-- Footer / End -->

		</div>
	</div></div></div>
@endsection