@extends('backend.layout.template')
@section('title')
Active Order
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 611px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 342px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 611px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">{{__('backendOrder.All Active Orders')}}</h3>
				<span class="margin-top-7"style="text-align:left;">{{__('backendOrder.All Active Orders')}} </span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('backendOrder.Active Orders')}}</li>
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
								$count = App\Models\Backend\Order::where('freelancer_id',Auth::user()->id)->where('status',1)->count();
							@endphp
							<h3><i class="icon-material-outline-supervisor-account"></i> {{$count}}{{__('backendOrder.Active Orders')}}</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
								@foreach($orders as $order)
								@php
								$taskApply = App\Models\Backend\TaskApply::where('id',$order->offer_id)->first();

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
													<span class="dashboard-status-button blue">{{__('backendOrder.Custom Offer')}}</span>
													<span class="dashboard-status-button blue">{{$order->order_id}}</span>
													@endif
													
												</h4>


													<!-- Details -->
												@if($order->delivery_type == 1)
												<span class="freelancer-detail-item">{{$order->	delivary_time}} {{__('backendOrder.Days')}}</span>
												@else
												<span class="freelancer-detail-item">{{$order->	delivary_time}} {{__('backendOrder.Hours')}}</span>
												@endif
												<span class="freelancer-detail-item">{{__('backendOrder.Budget')}} $ {{$order->budget}} </span>
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
													<a href="{{route('download.document.freelancer',$customOffer->id)}}" class="button ripple-effect"><i class="icon-feather-file-text"></i> {{__('backendOrder.Download Document')}}</a>
													<!-- delivery Order -->
													<a href="#small-dialog-1{{$deliveryOrder->id}}" class="popup-with-zoom-anim button green ripple-effect"> {{__('backendOrder.Delivery Order')}}</a>
													<div id="small-dialog-1{{$deliveryOrder->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

													<!--Tabs -->
														<div class="sign-in-form">

															<ul class="popup-tabs-nav">
																<li><a href="#tab1">{{__('backendOrder.Delivery Order')}}</a></li>
															</ul>

															<div class="popup-tabs-container">

																<!-- Tab -->
																<div class="popup-tab-content" id="tab">
																	
																	<!-- Welcome Text -->
																	<div class="welcome-text">
																		<h3>{{__('backendOrder.Attach File')}}</h3>
																	</div>
																		
																		
																		<!-- Form -->
																	<form method="POST" action="{{route('place.order.freelancer',[$deliveryOrder->id,$order->id])}}" enctype="multipart/form-data">
																		@csrf
																		<div class="input-with-icon-left">
																			
																			<textarea placeholder="{{__('backendOrder.description')}}" name="description"></textarea>
																		</div>
																		<div class="uploadButton margin-top-25">
																			<input class="uploadButton-input" type="file" accept="image/*, application/pdf,.zip,.rar,.7zip" id="upload" name="file" multiple/>
																			<label class="uploadButton-button ripple-effect" for="upload">{{__('backendOrder.Add Attachments')}}</label>
																			<span class="uploadButton-file-name">{{__('backendOrder.Upload Document')}} </span>
																		</div>
																		<button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit">{{__('backendOrder.Delivery Order')}} <i class="icon-material-outline-arrow-right-alt"></i></button>

																	</form>
																	<!-- Button -->
																</div>
															</div>
														</div>
													</div>
													<!-- delivery Order end -->

													<!-- Cancel Order -->
													<a href="#small-dialog-2{{$order->id}}" id="" class="popup-with-zoom-anim button green ripple-effect"> {{__('backendOrder.Cancel Order')}}</a>
													<div id="small-dialog-2{{$order->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

													<!--Tabs -->
														<div class="sign-in-form">

															<ul class="popup-tabs-nav">
																<li><a href="#tab1">{{__('backendOrder.Cancel Order')}}</a></li>
															</ul>

															<div class="popup-tabs-container">

																<!-- Tab -->
																<div class="popup-tab-content" id="tab">
																		<!-- Form -->
																	<form method="POST" action="{{route('cancel.order.freelancer', $order->id)}}" enctype="multipart/form-data">
																		@csrf
																		<div class="input-with-icon-left">
																			
																			<textarea placeholder="{{__('backendTask.Send Message')}}" name="message"></textarea>
																		</div>

																		<button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit">{{__('backendOrder.Request Cancel')}} <i class="icon-material-outline-arrow-right-alt"></i></button>

																	</form>
																	<!-- Button -->
																</div>
															</div>
														</div>
													</div>
													<!-- Cancel order end -->

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
          <textarea name="message" cols="10" placeholder="{{__('backendTask.Send Message')}}" class="with-border" required></textarea>
          <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="send-pm">{{__('backendOrder.Send')}} <i class="icon-material-outline-arrow-right-alt"></i></button>
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
												
												$task = App\Models\Backend\Task::where('id',$taskApply->task_id)->first();
												
											@endphp
												<h4>
													<a href="#">{{$task->task_name}} </a> 
													@if($order->status == 1)
													<span class="dashboard-status-button blue">{{__('backendOrder.Bid Order')}}</span>
													<span class="dashboard-status-button blue">{{$order->order_id}}</span>
													@endif
													
												</h4>


													<!-- Details -->
												@if($order->delivery_type == 1)
												<span class="freelancer-detail-item">{{$order->	delivary_time}} {{__('backendOrder.Days')}}</span>
												@else
												<span class="freelancer-detail-item">{{$order->	delivary_time}}{{__('backendOrder.Hours')}} </span>
												@endif
												<span class="freelancer-detail-item">{{__('backendOrder.Budget')}} $ {{$order->budget}} </span>
												<br>
												<span class="freelancer-detail-item">{!!$order->message!!}</span>
												<br>
												<a href="{{route('single.employer.profile',$employer->id)}}" target="_blank"><span class="freelancer-detail-item">{{__('backendOrder.Offer by')}}
												@if($employer->full_name !== null) {{$employer->full_name}}
													@else
													{{__('backendOrder.Unknown')}}
													@endif
												</span></a>
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
													<a href="{{route('download.documentt.task.freelancer',$task->id)}}" class="button ripple-effect"><i class="icon-feather-file-text"></i> {{__('backendOrder.Download Document')}}</a>
													<!-- <a href="#small-dialog" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> Send Message</a> -->
													<!-- delivery Order -->
													<a href="#small-dialog-1{{$deliveryOrder->id}}" class="popup-with-zoom-anim button green ripple-effect">{{__('backendOrder.Delivery Order')}} </a>
													<div id="small-dialog-1{{$deliveryOrder->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

													<!--Tabs -->
														<div class="sign-in-form">

															<ul class="popup-tabs-nav">
																<li><a href="#tab1">{{__('backendOrder.Delivery Order')}}</a></li>
															</ul>

															<div class="popup-tabs-container">

																<!-- Tab -->
																<div class="popup-tab-content" id="tab">
																	
																	<!-- Welcome Text -->
																	<div class="welcome-text">
																		<h3>{{__('backendOrder.Attach File')}}</h3>
																	</div>
																		
																		
																		<!-- Form -->
																	<form method="POST" action="{{route('place.order.freelancer',$deliveryOrder->id)}}" enctype="multipart/form-data">
																		@csrf
																		<div class="input-with-icon-left">
																			
																			<textarea placeholder="{{__('backendOrder.description')}}" name="description"></textarea>
																		</div>
																		<div class="uploadButton margin-top-25">
																			<input class="uploadButton-input" type="file" accept="image/*, application/pdf,.zip,.rar,.7zip" id="upload" name="file" multiple/>
																			<label class="uploadButton-button ripple-effect" for="upload">{{__('backendOrder.Add Attachments')}}</label>
																			<span class="uploadButton-file-name">{{__('backendOrder.Upload Document')}} </span>
																		</div>
																		<button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit">{{__('backendOrder.Delivery Order')}} <i class="icon-material-outline-arrow-right-alt"></i></button>

																	</form>
																	<!-- Button -->
																</div>
															</div>
														</div>
													</div>
													<!-- delivery Order end -->
													<!-- Cancel Order -->
													<a href="#small-dialog-2{{$order->id}}" data-target="#{{$order->id}}" class="popup-with-zoom-anim button green ripple-effect"> {{__('backendOrder.Cancel Order')}}</a>
													<div id="small-dialog-2{{$order->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">
														<div id="{{$order->id}}"></div>

													<!--Tabs -->
														<div class="sign-in-form">

															<ul class="popup-tabs-nav">
																<li><a href="#tab{{$order->id}}">{{__('backendOrder.Cancel Order')}}</a></li>
															</ul>

															<div class="popup-tabs-container">

																<!-- Tab -->
																<div class="popup-tab-content" id="tab">
																		<!-- Form -->
																	<form method="POST" action="{{route('cancel.order.freelancer', $order->id)}}" enctype="multipart/form-data">
																		@csrf
																		<div class="input-with-icon-left">
																			
																			<textarea placeholder="{{__('backendTask.Send Message')}}" name="message"></textarea>
																		</div>

																		<button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit">{{__('backendOrder.Request Cancel')}} <i class="icon-material-outline-arrow-right-alt"></i></button>

																	</form>
																	<!-- Button -->
																</div>
															</div>
														</div>
													</div>
													<!-- Cancel order end -->

													<a href="#small-dialog-3{{$employer->id}}" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i>{{__('backendOrder.Send Message')}} </a>
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
          <textarea name="message" cols="10" placeholder="{{__('backendTask.Send Message')}}" class="with-border" required></textarea>
          <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="send-pm">{{__('backendOrder.Send')}} <i class="icon-material-outline-arrow-right-alt"></i></button>
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
								@endif
								@endforeach
							</ul>
						</div>
					</div>
				</div>

			</div>
			<div class="margin-bottom-25"></div>
			<div class="d-felx justify-content-center">

		            {{ $orders->links('pagination::bootstrap-4') }}

		        </div>
				<div class="clearfix"></div>
			<!-- Row / End -->

			<!-- Footer -->
			@include('includes.dashboardFooter')
			<!-- Footer / End -->

		</div>
	</div></div></div>
@endsection