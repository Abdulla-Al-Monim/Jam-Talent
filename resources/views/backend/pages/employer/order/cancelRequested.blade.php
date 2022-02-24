@extends('backend.layout.template')
@section('title')
{{__('backendOrder.Cancel Request')}}
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 611px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 342px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 611px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">{{__('backendOrder.Cancel Request')}}</h3>
				<span class="margin-top-7">{{__('backendOrder.Cancel Request')}} </span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('backendOrder.Cancel Request')}}</li>
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
							
							<h3><i class="icon-material-outline-supervisor-account"></i> {{$count}}{{__('backendOrder.Manage Cancel Request')}} </h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
								@foreach($orderCancels as $order)
								@php
								$cancelOrder = App\Models\Backend\OrderCancel::where('order_id',$order->id)->first();

								$freelancer = App\Models\User::where('id',$order->freelancer_id)->first();

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
												<a href="{{route('single.freelancer.profile',$freelancer->id)}}" target="_blank"><span class="freelancer-detail-item">{{__('backendOrder.Freelancer')}}
												@if($freelancer->full_name !== null) {{$freelancer->full_name}}
													@else
													{{__('backendOrder.Unknown')}}
													@endif
												</span></a>
												<br>
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
													

														<!-- Download order End -->
														@if($cancelOrder->cancel_request == 1)
														<br>
															<span class=" button red ripple-effect" style="color:white;"> {{__('backendOrder.Pending Cancel Approval')}}</span>
															
														@endif
														<a href="#small-dialog-3{{$freelancer->id}}" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> {{__('backendOrder.Send Message')}}</a>
                          <!-- Send Direct Message Popup
================================================== -->
<div id="small-dialog-3{{$freelancer->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

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
          <h3>{{__('backendOrder.Direct Message To')}} {{$freelancer->full_name}}</h3>
        </div>
          
        <!-- Form -->
        <form method="post" id="send-pm" action="{{route('send.message.emp',$freelancer->id)}}">
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
													<a href="#small-dialog-1{{$cancelOrder->id}}" class="popup-with-zoom-anim button ripple-effect">{{__('backendOrder.Cancel')}}</i></a>
													<!-- Bid Acceptance Popup
													================================================== -->
													<div id="small-dialog-1{{$cancelOrder->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

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
																		<h3>{{__('backendOrder.Are you sure Confirm Cancel Request ?')}}</h3>

																	</div>

																	<form id="terms" method="POST" action="{{route('confirm.cancel.request.freelancer',$cancelOrder->id)}}" enctype="multipart/form-data">
																		@csrf
																		<!-- Button -->
																		<button class="margin-top-15 button full-width button-sliding-icon ripple-effect" type="submit" form="terms">{{__('backendOrder.Confirm')}} <i class="icon-material-outline-arrow-right-alt"></i>
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
													<a href="#">{{$task->task_name}} </a> 
													@if($order->status == 1)
													<span class="dashboard-status-button blue">{{__('backendOrder.Bit Order')}}</span>
													<span class="dashboard-status-button blue">{{$order->order_id}}</span>
													@endif
													
												</h4>


													<!-- Details -->
												
												<br>
												<span class="freelancer-detail-item">{!!$cancelOrder->message!!}</span>
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
													
												
												<a href="{{route('single.freelancer.profile',$freelancer->id)}}" target="_blank"><span class="freelancer-detail-item">{{__('backendOrder.Freelancer')}}
												@if($freelancer->full_name !== null) {{$freelancer->full_name}}
													@else
													Unknown
													@endif
												</span></a>


														<!-- Download order End -->
														@if($cancelOrder->cancel_request == 2)
														<br>
															<span class=" button red ripple-effect" style="color:white;">{{__('backendOrder.Pending Cancel Approval')}} </span>
																													
															@endif
															<br>

															<a href="#small-dialog-3{{$freelancer->id}}" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i>{{__('backendOrder.Freelancer')}} </a>
                          <!-- Send Direct Message Popup
================================================== -->
<div id="small-dialog-3{{$freelancer->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

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
          <h3>{{__('backendOrder.Direct Message To')}} {{$freelancer->full_name}}</h3>
        </div>
          
        <!-- Form -->
        <form method="post" id="send-pm" action="{{route('send.message.emp',$freelancer->id)}}">
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
													@if($cancelOrder->cancel_request == 1)
													<a href="#small-dialog-1{{$cancelOrder->id}}" class=" popup-with-zoom-anim button ripple-effect">{{__('backendOrder.Cancel')}}</i></a>
													<!-- Bid Acceptance Popup
													================================================== -->
													<div id="small-dialog-1{{$cancelOrder->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

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
																		<h3>{{__('backendOrder.Are you sure Confirm Cancel Request ?')}}</h3>

																	</div>

																	<form id="terms" method="POST" action="{{route('confirm.cancel.request.freelancer',$cancelOrder->id)}}" enctype="multipart/form-data">
																		@csrf
																		<!-- Button -->
																		<button class="margin-top-15 button full-width button-sliding-icon ripple-effect" type="submit" form="terms">{{__('backendOrder.Confirm')}} <i class="icon-material-outline-arrow-right-alt"></i>
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
			<div class="margin-bottom-25"></div>
			<div class="d-felx justify-content-center">

		            {{ $orderCancels->links('pagination::bootstrap-4') }}

		        </div>
				<div class="clearfix"></div>
			<!-- Row / End -->

			<!-- Footer -->
			@include('includes.dashboardFooter')
			<!-- Footer / End -->

		</div>
	</div></div></div>
@endsection