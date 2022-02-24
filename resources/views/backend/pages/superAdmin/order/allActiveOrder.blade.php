@extends('backend.layout.template')
@section('title')
{{__('backendOrder.All Active Orders')}}
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 611px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 342px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 611px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">{{__('backendOrder.All Active Orders')}}</h3>
				<span class="margin-top-7" style="text-align:left;">{{__('backendOrder.All Orders')}} </span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('backendOrder.All Active Orders')}}</li>
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
							
							<h3><i class="icon-material-outline-supervisor-account"></i> {{$count}} {{__('backendOrder.All Active Orders')}}</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
								@foreach($orders as $order)
								@php
									$freelancer = App\Models\User::orderBy('id','asc')->where('id',$order->freelancer_id)->first();
									$employer = App\Models\User::orderBy('id','asc')->where('id',$order->employer_id)->first();
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
												<h4>
													<a href="{{route('single.employer.profile',$employer->id)}}">{{__('backendOrder.Offer by')}} {{$employer->full_name}}</a>
												</h4>
												<h4>
													<a href="{{route('single.freelancer.profile',$freelancer->id)}}">{{__('backendOrder.received by')}} {{$freelancer->full_name}}</a>
												</h4>


													<!-- Details -->
												@if($order->delivery_type == 1)
												<span class="freelancer-detail-item">{{$order->	delivary_time}} {{__('backendOrder.Days')}}</span>
												@else
												<span class="freelancer-detail-item">{{$order->	delivary_time}} {{__('backendOrder.Hours')}}</span>
												@endif
												<span class="freelancer-detail-item">{{__('backendOrder.Budget')}} {{$order->budget}}$</span>
												<br>
												<span class="freelancer-detail-item">{!!$order->message!!}</span>
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">


													<!-- <a href="#small-dialog" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> Send Message</a> -->
													
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
													@if($order->status == 1)
													<span class="dashboard-status-button blue">{{__('backendOrder.Bid Order')}}</span>
													<span class="dashboard-status-button blue">{{$order->order_id}}</span>
													@endif
													
												</h4>
												<h4>
													<a href="{{route('single.employer.profile',$employer->id)}}">{{__('backendOrder.Offer by')}} {{$employer->full_name}}</a>
												</h4>
												<h4>
													<a href="{{route('single.freelancer.profile',$freelancer->id)}}">{{__('backendOrder.received by')}} {{$freelancer->full_name}}</a>
												</h4>

													<!-- Details -->
												@if($order->delivery_type == 1)
												<span class="freelancer-detail-item">{{$order->	delivary_time}} Days</span>
												@else
												<span class="freelancer-detail-item">{{$order->	delivary_time}} Hours</span>
												@endif
												<span class="freelancer-detail-item">{{__('backendOrder.Budget')}}Budget {{$order->budget}}$</span>
												<br>
												<span class="freelancer-detail-item">{!!$task->description!!}</span>
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
													<!-- <a href="#small-dialog" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> Send Message</a> -->
													
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