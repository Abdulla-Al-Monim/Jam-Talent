@extends('backend.layout.template')
@section('title')
{{__('earning.Earning')}}
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 549px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 448px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 549px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<!-- <h3>Membership Plan</h3> -->

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('earning.Earning')}}</li>
					</ul>
				</nav>
			</div>
	<!--==============all user table start================ -->
	<div  class="col-12 col-xl-12 col-md-12 col-12">

		<div class="section-headline margin-bottom-30">
			<!-- <h4>Membership Plan</h4> -->
		</div>
		
		<table class="basic-table table-responsive">

			<tbody>
				<tr>
				

				<th>{{__('earning.Order Id')}}</th>
				<th>{{__('earning.Employer name')}}</th>
				<th>{{__('earning.Earning balance')}}</th>
				<th>{{__('earning.Order type')}}</th>
				<th>{{__('earning.Completed date')}}</th>
				<th>{{__('earning.Status')}}</th>

				
			</tr>
		@foreach($freelancerBalances as $freelancerBalance)
			<tr>
				@if($freelancerBalance)
				
				@php
					$order = App\Models\Backend\Order::where('id',$freelancerBalance->order_id)->first();
					$employer = App\Models\User::where('id',$order->employer_id)->first();

					
				@endphp
				

				<td data-label="Column 1">{{$order->order_id}}
				    </td>
				<td data-label="Column 2">
					<a href="{{route('single.employer.profile',$employer->id)}}">{{$employer->full_name}}</a>
				    
				</td>
				<td data-label="Column 3">{{$order->budget}}</td>

				<td>@if($order->order_type == 1){{__('backendOrder.Custom Offer')}}
				@else
				{{__('backendOrder.Bid Order')}}
				@endif
				<td data-label="Column 1">{{$order->created_at}}
				    </td>	
				<td>@if($freelancerBalance->created_at < Carbon\Carbon::now()) {{__('backendOrder.Payment within 14 days')}} @else {{__('backendOrder.Complete')}} @endif</td>
			</td>
				
				@endif


			</tr>
			@endforeach
			
			
		</tbody>
	</table>
</div>
<div  class="col-12 col-xl-12 col-md-12 col-12">

		<div class="section-headline margin-bottom-30">
			<!-- <h4>Membership Plan</h4> -->
		</div>
		
		<table class="basic-table table-responsive">

			<tbody>
				<tr>
				

				<th>{{__('earning.Total Earn')}}</th>
				<th>$ {{$totalBalance}}</th>
				

				
			</tr>
		
			
			
		</tbody>
	</table>
</div>
<!-- ==================all user table end================== -->


			
			<!-- Footer -->
			@include('includes.dashboardFooter')
			<!-- Footer / End -->

		</div>
	</div>
</div>
</div>
<!-- En-valid Popup
================================================== -->
							
@endsection