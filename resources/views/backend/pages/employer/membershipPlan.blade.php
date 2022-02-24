@extends('backend.layout.template')
@section('title')
My membership plan
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
						<li>{{__('superAdminMembershipPlan.Membership Plan')}}</li>
					</ul>
				</nav>
			</div>
	<!--==============all user table start================ -->
	<div  class="col-12 col-xl-12 col-md-12 col-12">

		<div class="section-headline margin-bottom-30">
			<h4>{{__('superAdminMembershipPlan.Membership Plan')}}</h4>
		</div>
		
		<table class="basic-table table-responsive">

			<tbody><tr>
				

				<th>{{__('superAdminMembershipPlan.Plan Name')}}</th>
				<th>{{__('superAdminMembershipPlan.Duration')}}</th>
				<th>{{__('superAdminMembershipPlan.Expired Date')}}</th>

				
			</tr>
		
			<tr>
				
				<td data-label="Column 1">@if($checkout)
				    
				    @if($checkout->plan_name === "Basic")
					{{__('superAdminMembershipPlan.Basic')}}
					@elseif($checkout->plan_name === "Standard")
					{{__('superAdminMembershipPlan.Standard')}}
					@elseif($checkout->plan_name === "Extended")
					{{__('superAdminMembershipPlan.Extended')}}
					@endif
				    @endif
				    </td>
				<td data-label="Column 2">
				    @if($checkout)
					{{__('superAdminMembershipPlan.One Mounth')}}
					@endif
				</td>
				<td data-label="Column 3">@if($checkout)
				    {{$checkout->expired_date}}
				    @endif</td>
					
				


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