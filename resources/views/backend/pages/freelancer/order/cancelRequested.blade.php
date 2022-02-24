@extends('backend.layout.template')
@section('title')
{{__('backendOrder.Manage Cancel Requested')}}
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 611px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 342px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 611px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">{{__('backendOrder.Manage Cancel Requested')}}</h3>
				<span class="margin-top-7" style="text-align:left;">{{__('backendOrder.Cancel Order Request')}} </span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('backendOrder.Manage Cancel Requested')}}</li>
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
							
							<h3><i class="icon-material-outline-supervisor-account"></i> {{$count}} {{__('backendOrder.Manage Cancel Requested')}}</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
								@foreach($orderCancels as $order)
								@php
								$cancelOrder = App\Models\Backend\OrderCancel::where('order_id',$order->id)->first();

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
													@if($order->order_type == 1)
													<span class="dashboard-status-button blue">{{__('backendOrder.Custom Offer')}}</span>
													<span class="dashboard-status-button blue">{{$order->order_id}}</span>
													@endif
													
												</h4>
												<br>
												<span class="freelancer-detail-item">{!!$cancelOrder->message!!}</span>
												<br>
												<a href="{{route('single.employer.profile',$employer->id)}}" target="_blank"><span class="freelancer-detail-item">{{__('backendOrder.Offer by')}}
												@if($employer->full_name !== null) {{$employer->full_name}}
													@else
													{{__('backendOrder.Unknown')}}
													@endif
												</span></a>
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
													

														<!-- Download order End -->
														@if($cancelOrder->cancel_request ==  1)
															<h4 class=" button red ripple-effect" style="color:white;"> {{__('backendOrder.Pending Cancel Approval')}}</h4>
														@endif
													<!-- Confirm Cancel Request -->
													<a href="#small-dialog-3{{$employer->id}}" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> {{__('backendOrder.Send Message')}}</a>
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
          <textarea name="message" cols="10" placeholder="{{__('backendOrder.Send')}}" class="with-border" required></textarea>
          <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="send-pm">{{__('backendOrder.Send')}} <i class="icon-material-outline-arrow-right-alt"></i></button>
        </form>
        <!-- Button -->
        

      </div>

    </div>
  </div>
</div>
					
													@if($cancelOrder->cancel_request == 2)
													<a href="#small-dialog-1" class=" popup-with-zoom-anim button ripple-effect"><i class="icon-feather-user-x"></i></a>
													<!-- Bid Acceptance Popup
													================================================== -->
													<div id="small-dialog-1" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

														<!--Tabs -->
														<div class="sign-in-form">

															<ul class="popup-tabs-nav">
																<li><a href="#tab1">{{__('backendOrder.cancel Requested')}}</a></li>
															</ul>

															<div class="popup-tabs-container">

																<!-- Tab -->
																<div class="popup-tab-content" id="tab">
																	
																	<!-- Welcome Text -->
																	<div class="welcome-text">
																		<h3>{{__('backendOrder.Are you sure confirm cancel request ?')}}</h3>

																	</div>

																	<form id="terms" method="POST" action="{{route('confirm.cancel.request.freelancer',[$cancelOrder->order_id,$cancelOrder->id])}}" enctype="multipart/form-data">
																		@csrf
																		<!-- Button -->
																		<button class="margin-top-15 button full-width button-sliding-icon ripple-effect" type="submit" form="terms">{{__('backendOrder.Cancel')}} <i class="icon-material-outline-arrow-right-alt"></i>
																		</button>
																	</form>

																	

																</div>

															</div>
														</div>
													</div>
													<!-- Bid Acceptance Popup / End -->
													@endif
														<!-- Confirm Cancel Request end-->
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
												$deliveryOrder = App\Models\Backend\DelivaryOrder::where('order_id',$order->id)->first();

												
											@endphp
												<h4>
													<a href="{{route('task.show',$task->id)}}">{{$task->task_name}} </a> 
													@if($order->order_type == 2)
													<span class="dashboard-status-button blue">{{__('backendOrder.Bit Order')}}</span>
													<span class="dashboard-status-button blue">{{$order->order_id}}}</span>
													@endif
													
												</h4>


													<!-- Details -->
												
											
												<span class="freelancer-detail-item">{!!$cancelOrder->message!!}</span>
												<br>
												<a href="{{route('single.employer.profile',$employer->id)}}" target="_blank"><span class="freelancer-detail-item">{{__('backendOrder.Offer by')}}
												@if($employer->full_name !== null) {{$employer->full_name}}
													@else
													{{__('backendOrder.Unknown')}} 
													@endif
												</span></a>
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
													

														<!-- Download order End -->
														@if($cancelOrder->cancel_request == 1)
															<h4 class=" button red ripple-effect" style="color:white;">{{__('backendOrder.Pending Cancel Approval')}} </h4>
														@endif

														<a href="#small-dialog-3{{$employer->id}}" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> {{__('backendOrder.Send Message')}}</a>
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
          <textarea name="message" cols="10" placeholder="{{__('backendOrder.Send')}}" class="with-border" required></textarea>
          <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="send-pm">{{__('backendOrder.Send')}} <i class="icon-material-outline-arrow-right-alt"></i></button>
        </form>
        <!-- Button -->
        

      </div>

    </div>
  </div>
</div>
					
													<!-- Confirm Cancel Request -->
													@if($cancelOrder->cancel_request == 2)
													<a href="#small-dialog-1" class=" popup-with-zoom-anim button ripple-effect">{{__('backendOrder.Confirm')}}</a>
													<!-- Bid Acceptance Popup
													================================================== -->
													<div id="small-dialog-1" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

														<!--Tabs -->
														<div class="sign-in-form">

															<ul class="popup-tabs-nav">
																<li><a href="#tab1">{{__('backendOrder.cancel Requested')}}</a></li>
															</ul>

															<div class="popup-tabs-container">

																<!-- Tab -->
																<div class="popup-tab-content" id="tab">
																	
																	<!-- Welcome Text -->
																	<div class="welcome-text">
																		<h3>{{__('backendOrder.Are you sure confirm Cancel Request ?')}}</h3>

																	</div>

																	<form id="terms" method="POST" action="{{route('confirm.cancel.request.freelancer',[$cancelOrder->order_id,$cancelOrder->id])}}" enctype="multipart/form-data">
																		@csrf
																		<!-- Button -->
																		<button class="margin-top-15 button full-width button-sliding-icon ripple-effect" type="submit" form="terms">{{__('backendOrder.Cancel')}} <i class="icon-material-outline-arrow-right-alt"></i>
																		</button>
																	</form>

																	

																</div>

															</div>
														</div>
													</div>
													<!-- Bid Acceptance Popup / End -->
													@endif
														<!-- Confirm Cancel Request end-->
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
			<!-- Row / End -->

			<!-- Footer -->
			@include('includes.dashboardFooter')
			<!-- Footer / End -->

		</div>
	</div></div></div>
@endsection