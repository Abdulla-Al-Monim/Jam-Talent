@extends('backend.layout.template')
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 549px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 275px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
<div class="dashboard-content-inner" style="min-height: 549px;">
	
	<!-- Dashboard Headline -->
	<div class="dashboard-headline">
		<h3>{{__('backendTask.All Cancel Request')}}</h3>

		<!-- Breadcrumbs -->
		<nav id="breadcrumbs" class="dark">
			<ul>
				<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
				<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
				<li>{{__('backendTask.All Cancel Request')}}</li>
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
					<h3><i class="icon-material-outline-supervisor-account"></i>{{__('backendTask.All Cancel Request')}}</h3>
					<div class="content ">
						<div class="table-responsive">
							<table class="table">
			                  <thead class="thead-dark">
			                    <tr> 
			                      <th scope="col"># Si</th>
			                      <th scope="col">{{__('backendTask.Freelancer Name')}}</th>
			                      <th scope="col">{{__('backendTask.Employer Name')}}</th>
			                      <th scope="col">{{__('backendTask.Request Message')}}</th>
			                      <th scope="col">{{__('backendTask.Action')}}</th>
			                      <!-- <th scope="col">Action</th> -->
			                    </tr>
			                  </thead>
			                  <tbody>
			                    @php
			                      $i = 1;
			                    @endphp
			                    @foreach($orderCancels as $orderCancel)
			                    <tr>
			                      <th scope="row">{{$i}}</th>
			                      @php
			                      	$freelancer = App\Models\User::where('id',$orderCancel->freelancer_id)->first();
			                      	$employer = App\Models\User::where('id',$orderCancel->employer_id)->first();
			                      @endphp
			                      <td><a href="{{route('single.freelancer.profile',$freelancer->id)}}" target="_blank"> @if($freelancer->full_name !== null)
			                      	{{$freelancer->full_name}}
			                      	@else
			                      	Unknown
			                      	@endif</a></td>
			                      <td><a href="{{route('single.employer.profile',$employer->id)}}" target="_blank"> @if($employer->full_name !== null)
			                      	{{$employer->full_name}}
			                      	@else
			                      	Unknown
			                      	@endif</a></td>
			                      <td>{{$orderCancel->message}}</td>
			                      <td><span>
			                      	<form action="{{route('confirm.cancel.request.freelancer',$orderCancel->id)}}" method="POST">
			                      		@csrf
			                      		<button type="submit" class="btn btn-primary">Aprove</button>
			                      	
			                      	<span>
			                      		<!-- <form action="{{route('confirm.cancel.request.freelancer',[$orderCancel->order_id,$orderCancel->id])}}" method="POST">
			                      		@csrf
			                      			<button type="submit" class="btn btn-danger">Reject</button>
			                      		</form> -->
			                      	</span>
			                      	
			                      </span>
			                      </tr>
			                     
			                    @php
			                      $i++;
			                    @endphp
			                    @endforeach
			                  </tbody>
		                </table>
						</div>
						
					</div>
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