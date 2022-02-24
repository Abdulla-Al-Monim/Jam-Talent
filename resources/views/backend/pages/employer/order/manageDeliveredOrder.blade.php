@extends('backend.layout.template')
@section('title')
{{__('backendOrder.Delivered Orders')}}
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 611px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 342px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 611px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">{{__('backendOrder.Delivered Orders')}}</h3>
				<span class="margin-top-7" style="text-align:left;">{{__('backendOrder.Delivered Orders')}} </span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('backendOrder.Delivered Orders')}}</li>
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
								$count = App\Models\Backend\Order::where('employer_id',Auth::user()->id)->where('status',2)->count();
							@endphp
							<h3><i class="icon-material-outline-supervisor-account"></i> {{$count}} {{__('backendOrder.Delivered Orders')}}</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
								@foreach($orders as $order)
								
								@php
								$deliver = App\Models\Backend\DelivaryOrder::where('order_id',$order->id)->first();

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


													<!-- Details -->
												@if($order->delivery_type == 1)
												<span class="freelancer-detail-item">{{$order->	delivary_time}}{{__('backendOrder.Days')}} </span>
												@else
												<span class="freelancer-detail-item">{{$order->	delivary_time}} {{__('backendIndex.Hours')}}</span>
												@endif
												<span class="freelancer-detail-item">{{__('backendOrder.Budget')}} {{$order->budget}}$</span>
												<br>
												<span class="freelancer-detail-item">{!!$order->message!!}</span>
												<br>
												<a href="{{route('single.freelancer.profile',$freelancer->id)}}" target="_blank"><span class="freelancer-detail-item">{{__('backendOrder.Freelancer')}} :
												@if($freelancer->full_name !== null) {{$freelancer->full_name}}
													@else
													Unknown
													@endif
												</span></a>
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
													<!-- Download order Start -->
													<a href="#small-dialog-1{{$deliver->id}}" class="popup-with-zoom-anim button green ripple-effect"> {{__('backendOrder.Download Order')}}</a>
														<div id="small-dialog-1{{$deliver->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

														<!--Tabs -->
															<div class="sign-in-form">

																<ul class="popup-tabs-nav">
																	<li><a href="#tab1">{{__('backendOrder.Order')}} </a></li>
																</ul>

																<div class="popup-tabs-container">

																	<!-- Tab -->
																	<div class="popup-tab-content" id="tab">
																		
																		<!-- Welcome Text -->
																		<div class="welcome-text">
																			<h3>{{__('backendOrder.Order')}}</h3>
																		</div>
																		<div class="row">
																				<div class="col-md-6">
																					<h4>{{$deliver->description}}</h4>
																				</div>
																			</div>
																			
																			<div class="row">
																				<div class="col-md-6">
																					<a href="{{route('dowload.order.file.employer',$deliver->id)}}" class="button gray">{{__('backendOrder.Download file')}}</a>
																			
																				</div>
																			</div>
																			<div class="row">
																				<div class="col-md-6">
																					<!-- Form -->
																					<form method="POST" action="{{route('confirm.order.emp',[$deliver->id,$order->id])}}" enctype="multipart/form-data">
																						@csrf
																						<button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit">{{__('backendOrder.Confirm Order')}} <i class="icon-material-outline-arrow-right-alt"></i></button>

																					</form>
																				</div>
																				<div class="col-md-6">
																					<!-- Form -->
																		<form method="POST" action="{{route('revision.order.emp',[$deliver->id,$order->id])}}" enctype="multipart/form-data">
																			@csrf

																			<button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit">{{__('backendOrder.Revision')}} <i class="icon-material-outline-arrow-right-alt"></i></button>

																		</form>
																				</div>
																				
																			</div>	
																		<!-- Button -->
																	</div>
																</div>
															</div>
														</div>

														<!-- Download order End -->
													<!-- <a href="" class="button ripple-effect"><i class="icon-feather-file-text"></i>Cancel Order</a> -->

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
          <textarea name="message" cols="10" placeholder="{{__('backendTask.Message')}}" class="with-border" required></textarea>
          <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="send-pm">{{__('backendTask.Send')}} <i class="icon-material-outline-arrow-right-alt"></i></button>
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
												
											@endphp
												<h4>
													<a href="#">{{$task->task_name}} </a> 
													
													<span class="dashboard-status-button blue">{{__('backendOrder.Bit Order')}}</span>
													<span class="dashboard-status-button blue">{{$order->order_id}}</span>
													
													
												</h4>


													<!-- Details -->
												@if($order->delivery_type == 1)
												<span class="freelancer-detail-item">{{$order->	delivary_time}} {{__('backendOrder.Days')}}</span>
												@else
												<span class="freelancer-detail-item">{{$order->	delivary_time}}{{__('backendOrder.Hours')}} </span>
												@endif
												<span class="freelancer-detail-item">{{__('backendOrder.Budget')}} {{$order->budget}}$</span>
												<br>
												<span class="freelancer-detail-item">{!!$task->description!!}</span>
												<br>
												<a href="{{route('single.freelancer.profile',$freelancer->id)}}" target="_blank"><span class="freelancer-detail-item">{{__('backendOrder.Days')}}{{__('backendOrder.Freelancer')}} :
												@if($freelancer->full_name !== null) {{$freelancer->full_name}}
													@else
													Unknown
													@endif
												</span></a>
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
													<a href="#small-dialog-1{{$deliver->id}}" class="popup-with-zoom-anim button green ripple-effect"> {{__('backendOrder.Download Order')}}</a>
														<div id="small-dialog-1{{$deliver->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

														<!--Tabs -->
															<div class="sign-in-form">

																<ul class="popup-tabs-nav">
																	<li><a href="#tab1"> {{__('backendOrder.Order')}}</a></li>
																</ul>

																<div class="popup-tabs-container">

																	<!-- Tab -->
																	<div class="popup-tab-content" id="tab">
																		
																		<!-- Welcome Text -->
																		<div class="welcome-text">
																			<h3>{{__('backendOrder.Order')}}</h3>
																		</div>
																		<div class="row">
																				<div class="col-md-6">
																					<h4>{{$deliver->description}}</h4>
																				</div>
																			</div>
																			
																			<div class="row">
																				<div class="col-md-6">
																					<a href="{{route('dowload.order.file.employer',$deliver->id)}}" class="button gray">{{__('backendOrder.Download file')}}</a>
																			
																				</div>
																			</div>
																			<div class="row">
																				<div class="col-md-6">
																					<!-- Form -->
																					<form method="POST" action="{{route('confirm.order.emp',[$deliver->id,$order->id])}}" enctype="multipart/form-data">
																						@csrf
																						<button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit">{{__('backendOrder.Confirm Order')}} <i class="icon-material-outline-arrow-right-alt"></i></button>

																					</form>
																				</div>
																				<div class="col-md-6">
																					<!-- Form -->
																		<form method="POST" action="{{route('revision.order.emp',[$deliver->id,$order->id])}}" enctype="multipart/form-data">
																			@csrf

																			<button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit">{{__('backendOrder.Revision')}} <i class="icon-material-outline-arrow-right-alt"></i></button>

																		</form>
																				</div>
																				
																			</div>	
																		<!-- Button -->
																	</div>
																</div>
															</div>
														</div>
													<!-- <a href="" class="button ripple-effect"><i class="icon-feather-file-text"></i>Cancel Order</a>
												</div> -->

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
          <textarea name="message" cols="10" placeholder="{{__('backendTask.Message')}}" class="with-border" required></textarea>
          <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="send-pm">{{__('backendTask.Send')}} <i class="icon-material-outline-arrow-right-alt"></i></button>
        </form>
        <!-- Button -->
        

      </div>

    </div>
  </div>
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
			<!-- Row / End -->
			<div class="margin-bottom-25"></div>
			<div class="d-felx justify-content-center">

		            {{ $orders->links('pagination::bootstrap-4') }}

		        </div>
				<div class="clearfix"></div>
			<!-- Footer -->
			@include('includes.dashboardFooter')
			<!-- Footer / End -->

		</div>
	</div></div></div>
@endsection