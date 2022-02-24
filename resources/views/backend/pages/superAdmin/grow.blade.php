@extends('backend.layout.template')
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 549px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 448px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 549px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">All Apply List</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>All Apply List</li>
					</ul>
				</nav>
			</div>
	<!--==============all user table start================ -->
	<div  class="col-12 col-xl-12 col-md-12 col-12">

		<div class="section-headline margin-bottom-30">
			<h4>All Apply List</h4>
		</div>
		<div class="table-responsive table-responsive-sm">
			<table class="basic-table table-responsive">

			<tbody><tr>
			
				<th># Si</th>
				<th>Contact Reason</th>
				<th>Interest Type of</th>
				<th>Name</th>
				<th>Position</th>
				<th>Organization Name</th>
				<th>Office Address</th>
				<th>Email</th>
				<th>Website URL Address</th>
				<th>LinkedIn url</th>
				<th>Behance link</th>
				<th>Github link</th>
				<th>Whatsapp Messaging Number</th>
				<th>Cover Letter</th>
				<th>CV</th>
				@php
                $i = 1;
            @endphp
				
			</tr>
			@foreach($backJobContacts as $backJobContact)
			<td data-label="Column 1">{{$i}}</td>
			<td data-label="Column 1">{{$backJobContact->interest_type_of}}</td>
			<td data-label="Column 1">{{$backJobContact->contact_reason}}</td>
			<td data-label="Column 1">{{$backJobContact->first_name}} {{$backJobContact->last_name}}</td>		
			<td data-label="Column 1">{{$backJobContact->position}}</td>
			<td data-label="Column 1">{{$backJobContact->organization_name}}</td>
			<td data-label="Column 1">{{$backJobContact->office_address}}</td>
			<td data-label="Column 1">{{$backJobContact->email}}</td>
			<td data-label="Column 1">{{$backJobContact->website_url_address}}</td>
			<td data-label="Column 1">{{$backJobContact->linkedin_url}}</td>
			<td data-label="Column 1">{{$backJobContact->behance_link}}</td>
			<td data-label="Column 1">{{$backJobContact->github_link}}</td>

			<td data-label="Column 1">{{$backJobContact->whatsapp_messaging_number}}</td>
			<td data-label="Column 1">{!! $backJobContact->cover_letter !!}</td>
			<td data-label="Column 1"><a href="{{route('download.apply',$backJobContact->id)}}" class="btn btn-primary">Download CV</a></td>
			@php
                $i = $i++;
            @endphp
            @endforeach
				</tbody>
			</table>
		</div>
		
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