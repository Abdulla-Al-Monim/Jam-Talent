@extends('backend.layout.template')
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 549px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 448px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 549px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Freelancer</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">Home</a></li>
						<li><a href="{{route('user.dashbord')}}">Dashboard</a></li>
						<li>@if($bankInfo->payment_type == 1)
							Bank Inforamtion
							@else
							Western Union
							@endif
						</li>
					</ul>
				</nav>
			</div>
	<!--==============all user table start================ -->
	<div  class="col-12 col-xl-12 col-md-12">

		<div class="section-headline margin-bottom-30">
			<h4>
				@if($bankInfo->payment_type == 1)
			Bank Inforamtion
			@else
			Western Union
			@endif
		</h4>
		</div>
		<table class="basic-table table-responsive">

			<tbody><tr>
				

				
				<th>User Name</th>
				<th>User Email</th>
				@if($bankInfo->account_name)
				<th>Account Name</th>
				@endif
				@if($bankInfo->account_number)
				<th>Account Number</th>
				@endif
				@if($bankInfo->bank_name)
				<th>Bank Name</th>
				@endif
				@if($bankInfo->bank_address)
				<th>Bank Address</th>
				@endif
				@if($bankInfo->swift_code)
				<th>Swift Code</th>
				@endif
				@if($bankInfo->iban_no)
				<th>IBAN No</th>
				@endif
				@if($bankInfo->passport_no)
				<th>Passport No</th>
				@endif
				@if($bankInfo->national_id_photo)
				<th>Namtional Id</th>
				@endif
				
				
			</tr>
			<tr>
				<td data-label="Column 1"><a href="{{route('single.freelancer.profile',$bankInfo->user_id)}}">{{$freelancer->full_name}}</a>
				<td data-label="Column 2">{{$freelancer->email}}</td>
				@if($bankInfo->account_name)
				<td>{{$bankInfo->account_name}}</td>
				@endif
				@if($bankInfo->account_number)
				<td>{{$bankInfo->account_number}}</td>
				@endif
				@if($bankInfo->bank_name)
				<td>{{$bankInfo->bank_name}}</td>
				@endif
				@if($bankInfo->bank_address)
				<td>{{$bankInfo->bank_address}}</td>
				@endif
				@if($bankInfo->swift_code)
				<td>{{$bankInfo->swift_code}}</td>
				@endif
				@if($bankInfo->iban_no)
				<td>{{$bankInfo->iban_no}}</td>
				@endif
				@if($bankInfo->passport_no)
				<td>{{$bankInfo->passport_no}}</td>
				@endif
				@if($bankInfo->national_id_photo)
				<td><a href="{{route('download.national.id',$bankInfo->id)}}">National Id</a></td>
				@endif



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