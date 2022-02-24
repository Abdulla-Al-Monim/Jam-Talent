@extends('backend.layout.template')
@section('title')
{{__('backendOrder.Canceled Orders')}}
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 611px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 342px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 611px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">{{__('backendOrder.Canceled Orders')}}</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('backendOrder.Canceled Orders')}}</li>
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
							
							<h3><i class="icon-material-outline-supervisor-account"></i> {{$count}} {{__('backendOrder.Canceled Orders')}}</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
								@foreach($orderCancels as $order)
								@php
								$cancelOrder = App\Models\Backend\OrderCancel::where('order_id',$order->id)->first();
								$freelancer = App\Models\User::where('id',$cancelOrder->freelancer_id)->first();
								$employer = App\Models\User::where('id',$cancelOrder->employer_id)->first();
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
												@if($cancelOrder->cancel_request == 1)
												<span class="dashboard-status-button blue">
												{{__('backendOrder.Cancel by Freelancer')}} : </span>
												<a href="{{route('single.freelancer.profile',$freelancer->id)}}">
													@if($freelancer->full_name !== null)
												<span class="dashboard-status-button blue"> {{$freelancer->full_name}}</span>
												@else
												<span class="dashboard-status-button blue"> {{__('backendOrder.Unknown')}}</span>
												@endif

												@elseif($cancelOrder->cancel_request == 2)
												<span class="dashboard-status-button blue">{{__('backendOrder.Cancel by Employer')}} : </span>
												<a href="{{route('single.employer.profile',$employer->id)}}">
												@if($employer->full_name !== null)
												<span class="dashboard-status-button blue"> {{$employer->full_name}}</span>
												@else
												<span class="dashboard-status-button blue"> {{__('backendOrder.Unknown')}}</span>
												@endif
												@else
												@endif
												<br>
												<span class="freelancer-detail-item"><strong>{!!$cancelOrder->message!!}</strong></span>
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
													

														<!-- Download order End -->
													<!-- <a href="#small-dialog-2" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> Send Message</a> -->
													
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
													<span class="dashboard-status-button blue">{{__('backendOrder.Unknown')}}Bit Order</span>
													<span class="dashboard-status-button blue">{{$order->order_id}}</span>
													@endif

													
												</h4>
												@if($cancelOrder->cancel_request == 1)
												<span class="dashboard-status-button blue">
												{{__('backendOrder.Cancel by Freelancer')}} : </span>
												<a href="{{route('single.freelancer.profile',$freelancer->id)}}">
													@if($freelancer->full_name !== null)
												<span class="dashboard-status-button blue"> {{$freelancer->full_name}}</span>
												@else
												<span class="dashboard-status-button blue"> {{__('backendOrder.Unknown')}}</span>
												@endif

												@elseif($cancelOrder->cancel_request == 2)
												<span class="dashboard-status-button blue">{{__('backendOrder.Cancel by Employer')}} : <a href="{{route('single.employer.profile',$employer->id)}}"></span>
												
												@if($employer->full_name !== null)
												<span class="dashboard-status-button blue"> {{$employer->full_name}}</span>
												@else
												<span class="dashboard-status-button blue">{{__('backendOrder.Unknown')}} </span>
												@endif
												@else
												@endif
												</a>
												
													<!-- Details -->
												
												<br>
												<span class="freelancer-detail-item">{!!$cancelOrder->message!!}</span>
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
													

														<!-- Download order End -->
													<!-- <a href="#small-dialog-2" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> Send Message</a> -->
													
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
			<div class="margin-bottom-25"></div>
			<div class="d-felx justify-content-center">

		            {{ $orderCancels->links('pagination::bootstrap-4') }}

		        </div>
				<div class="clearfix"></div>
			<!-- Footer -->
			@include('includes.dashboardFooter')
			<!-- Footer / End -->

		</div>
	</div></div></div>
@endsection