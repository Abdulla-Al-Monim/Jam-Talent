@extends('backend.layout.template')
@section('title')
{{__('superAdminPayment.Task Payment')}}
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
						<li>{{__('superAdminPayment.Task Payment')}}</li>
					</ul>
				</nav>
			</div>
	<!--==============all user table start================ -->
	<div  class="col-12 col-xl-12 col-md-12 col-12">

		<div class="section-headline margin-bottom-30">
			<h4>{{__('superAdminPayment.Task Payment')}}</h4>
		</div>
		
		<table class="basic-table table-responsive">

			<tbody><tr>
				

				<th>{{__('superAdminPayment.Employer Name')}}</th>
				<th>{{__('superAdminPayment.Freelancer Name')}}</th>
				<th>{{__('superAdminPayment.Task Title')}}</th>
				<th>{{__('superAdminPayment.Budget')}}</th>
				<th>{{__('superAdminPayment.Transaction id')}}</th>
				<th>{{__('superAdminPayment.Post date')}}</th>

				
			</tr>
		@foreach($orderCheckouts as $orderCheckout)
			<tr>
				
				@php
				$freelancer = App\Models\User::where('id',$orderCheckout->freelancer_id)->first();
				$employer = App\Models\User::where('id',$orderCheckout->employer_id)->first();
				$task = App\Models\Backend\Task::where('id',$orderCheckout->task_id)->first();
				@endphp
				<td data-label="Column 1"><a href="{{route('single.employer.profile',$employer->id)}}">{{$employer->full_name}}</a></td>
				<td data-label="Column 3"><a href="{{route('single.freelancer.profile',$freelancer->id)}}">{{$freelancer->full_name}}</a></td>
				<td data-label="Column 3"><a href=""><a href="{{route('task.show',$task->id)}}">{{$task->task_name}}</a></a></td>
				<td data-label="Column 3">{{$orderCheckout->budget}}</td>
				<td data-label="Column 3">{{$orderCheckout->transaction_id}}</td>
				<td data-label="Column 3">{{$orderCheckout->created_at}}</td>
				
					
				


			</tr>
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