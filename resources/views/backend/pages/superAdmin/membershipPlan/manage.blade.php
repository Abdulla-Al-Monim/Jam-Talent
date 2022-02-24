@extends('backend.layout.template')
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 549px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 448px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 549px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">{{__('superAdminMembershipPlan.All Membership Plans')}}</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('superAdminMembershipPlan.All Membership Plans')}}</li>
					</ul>
				</nav>
			</div>
	<!--==============all user table start================ -->
	<div  class="col-12 col-xl-12 col-md-12 col-12">

		<div class="section-headline margin-bottom-30">
			<h4>{{__('superAdminMembershipPlan.All Membership Plans')}}</h4>
		</div>
		
		<table class="basic-table table-responsive">

			<tbody><tr>
				

				<th># Si</th>
				<th>{{__('superAdminMembershipPlan.Plan Name')}}</th>
				<th>{{__('superAdminMembershipPlan.Billed type')}}</th>
				<th>{{__('superAdminMembershipPlan.Rate')}}</th>
				<th>{{__('superAdminMembershipPlan.Status')}}</th>
				<th>{{__('superAdminMembershipPlan.Action')}}</th>

				
			</tr>
			@php
                $i = 1;
            @endphp
			@foreach($membershipPlans as $membershipPlan)
			<tr>
				<td data-label="Column 1"><a href="">{{$i}}</a></td>
				<td data-label="Column 2"> 
					 
					@if($membershipPlan->plan_name === "Basic")
          {{__('superAdminMembershipPlan.Basic')}}
          @elseif($membershipPlan->plan_name === "Standard")
          {{__('superAdminMembershipPlan.Standard')}}
          @elseif($membershipPlan->plan_name === "Extended")
          {{__('superAdminMembershipPlan.Extended')}}
          @endif
				
				</td>
				<td data-label="Column 3">
					@if($membershipPlan->Billed == 1)
					Hourly
					@elseif($membershipPlan->Billed == 2)
					Monthly
					@endif
				</td>
				<td data-label="Column 3">{{$membershipPlan->rate}}</td>
				<td data-label="Column 4">
					@if($membershipPlan->status == 1)
					
						Active	

					@elseif($membershipPlan->status == 0)

						En-Active
						@endif
				</td>
				<td data-label = "colum-5">
					<a href="#small-dialog-1{{$membershipPlan->id}}" class=" btn-danger popup-with-zoom-anim btn "><i class="icon-material-outline-delete"></i></a>
			                      	<!-- Bid Acceptance Popup
											================================================== -->
											<div id="small-dialog-1{{$membershipPlan->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

												<!--Tabs -->
												<div class="sign-in-form">

													<ul class="popup-tabs-nav">
														<li><a href="#tab1">{{__('superAdminMembershipPlan.Delete Membership Plan')}}</a></li>
													</ul>

													<div class="popup-tabs-container">

														<!-- Tab -->
														<div class="popup-tab-content" id="tab">
															
															<!-- Welcome Text -->
															<div class="welcome-text">
																
																<h3>{{__('superAdminMembershipPlan.Are you sure you want to delete blog?')}}</h3>

															</div>

															<form id="terms" method="POST" action="{{route('membership.delete',$membershipPlan->id)}}" enctype="multipart/form-data">
																@csrf
																<!-- Button -->
																<button class="margin-top-15 button  button-sliding-icon btn btn-success" type="submit" form="terms">{{__('superAdminMembershipPlan.Confirm')}}<i class="icon-material-outline-arrow-right-alt"></i>
																</button>
															</form>

															

														</div>

													</div>
												</div>
											</div>	
			                      		</div>

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