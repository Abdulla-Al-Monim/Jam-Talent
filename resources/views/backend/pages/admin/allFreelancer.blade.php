@extends('backend.layout.template')
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 549px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 448px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 549px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Freelancers</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('addUser.All Freelancers')}}</li>
					</ul>
				</nav>
			</div>
	<!--==============all user table start================ -->
	<div  class="col-12 col-xl-12 col-md-12">

		<div class="section-headline margin-bottom-30">
			<h4>{{__('addUser.All Freelancers')}}</h4>
		</div>
		<table class="basic-table table-responsive">

			<tbody><tr>
				

				<th># Si</th>
				<th>{{__('addUser.Email')}}</th>
				<th>{{__('addUser.Verified')}}</th>
				<th>{{__('addUser.Payment Information')}}</th>
				
				<th>{{__('addUser.Action')}}</th>

				
			</tr>
			@php
                $i = 1;
            @endphp
			@foreach($freelancers as $freelancer)
			<tr>
				<td data-label="Column 1"><a href="{{route('single.freelancer.profile',$freelancer->id)}}">{{$i}}</a></td>
				<td data-label="Column 2">{{$freelancer->email}}</td>
				<td data-label="Column 3">
					@if($freelancer->verified == 1)
						Yes
					@else
						NO
					@endif
				</td>
				<td>
					@php
					$bankinfo = App\Models\Backend\BankInfo::where('user_id',$freelancer->id)->first();
					@endphp
					@if($bankinfo)
						@if($bankinfo->payment_type == 1)
						<a href="{{route('freelancer.bankinfo',$bankinfo->id)}}">Bank</a>
						@else
						<a href="{{route('freelancer.bankinfo',$bankinfo->id)}}">Western Union</a>
						@endif
					@endif
				</td>
				<td data-label="Column 3">
					@if($freelancer->verified == 1)
					
							<form method="POST" action="{{route('admin.enActive',$freelancer->id)}}"enctype="multipart/form-data">
							@csrf
							<button class="btn btn-primary ripple-effect icon-feather-user-check" type="submit">
							</form>
					
					@elseif($freelancer->verified == 0)

						<form method="POST" action="{{route('admin.active',$freelancer->id)}}"enctype="multipart/form-data">
							@csrf
							<button class="btn btn-danger ripple-effect icon-feather-user-x" type="submit">
							</form>	
						
						@endif
					</td>
				<td>
					
				</td>



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