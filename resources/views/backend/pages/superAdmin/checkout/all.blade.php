@extends('backend.layout.template')
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 549px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 448px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 549px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">{{__('checkout.All Membership Payments')}}</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('checkout.All Membership Payments')}}</li>
					</ul>
				</nav>
			</div>
	<!--==============all user table start================ -->
	<div  class="col-12 col-xl-12 col-md-12 col-12">

		<div class="section-headline margin-bottom-30">
			<h4>{{__('checkout.All Membership Payments')}}</h4>
		</div>
		
		<table class="basic-table table-responsive">

			<tbody><tr>
			
				<th># Si</th>
				<th>{{__('checkout.Employer Name')}}</th>
				<th>{{__('checkout.Plan name')}}</th>
				<th>{{__('checkout.Transcection id')}}</th>
				<th>{{__('checkout.Expired date')}}</th>

				
			</tr>
			@php
                $i = 1;
            @endphp
			@foreach($checkouts as $checkout)
			@php
			$employer = App\Models\User::where('id',$checkout->user_id)->first();
			@endphp
			<tr>
				<td data-label="Column 1"><a href="">{{$i}}</a></td>
				<td data-label="Column 2">
					@if($employer)
					{{$employer->full_name}}
					@endif
				</td>
				<td data-label="Column 3"> 
					{{$checkout->plan_name}}
				</td>
				<td data-label="Column 4">
					@if($checkout->transaction_id == null)
					Free for first month
					@else
					{{$checkout->transaction_id}}
					@endif
				</td>
				<td data-label="Column 5">{{$checkout->expired_date}}</td>
				
				



			</tr>
			@php
                $i++;
            @endphp
			@endforeach
			
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