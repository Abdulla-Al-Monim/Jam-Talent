@extends('backend.layout.template')

<!-- title section -->
@section('title')
Add Membership Plan
@endsection

@section('body-content')
<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>{{__('superAdminMembershipPlan.Add Membership Plan')}}</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('superAdminMembershipPlan.Add Membership Plan')}}</li>
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			<div class="row">
				<form method="POST" action="{{route('membership.store')}}" enctype="multipart/form-data">
					@csrf
					<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3 style="text-align:left;"><i class="icon-material-outline-account-circle"></i> {{__('superAdminMembershipPlan.Add Membership Plan')}}</h3>
						</div>

						<div class="content with-padding padding-bottom-0">

							<div class="row">

								

								<div class="col">
									<div class="row">

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('superAdminMembershipPlan.Plan Name')}}</h5>
												<select class="with-border selectpicker" data-size="7" title="Plan Name" name="plan_name">
													<option value="Basic">{{__('superAdminMembershipPlan.Basic')}}</option>
													<option value="Standard">{{__('superAdminMembershipPlan.Standard')}}</option>
													<option value="Extended">{{__('superAdminMembershipPlan.Extended')}}</option>
												</select>
												@error('plan_name')
												    <div class="alert alert-danger">{{$message}}</div>
												@enderror
											</div>
										</div>
						
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('superAdminMembershipPlan.Billed type')}}</h5>
												<select class="with-border selectpicker" data-size="7" title="Billed" name="Billed">
													<option value="1">{{__('superAdminMembershipPlan.Hourly')}}</option>
													<option value="2">{{__('superAdminMembershipPlan.Monthly')}}</option>
												</select>
												@error('Billed')
												    <div class="alert alert-danger">{{$message}}</div>
												@enderror
											</div>
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('superAdminMembershipPlan.Rate')}}</h5>
												<input type="text" class="with-border" name="rate">
												@error('rate')
												    <div class="alert alert-danger">{{$message}}</div>
												@enderror
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-face"></i> {{__('superAdminMembershipPlan.Description')}}</h3>
						</div>

						<div class="content">
							<ul class="fields-ul">
							<li>
								<div class="row">
									<div class="col-xl-6">
										<div class="submit-field">
											<h5>{{__('superAdminMembershipPlan.Sort description')}}</h5>
											<textarea name="s_desc" cols="30" rows="5" class=" ckeditor with-border"></textarea>

										</div>
										@error('s_desc')
												    <div class="alert alert-danger">{{$message}}</div>
												@enderror
									</div>
									<div class="col-xl-6">
										<div class="submit-field">
											<h5>{{__('superAdminMembershipPlan.Sort description')}} Arabic</h5>
											<textarea name="s_desc_ar" cols="30" rows="5" class=" ckeditor with-border"></textarea>
										</div>
										@error('s_desc_ar')
												    <div class="alert alert-danger">{{$message}}</div>
												@enderror
									</div>
									<div class="col-xl-6">
										<div class="submit-field">
											<h5>{{__('superAdminMembershipPlan.Sort description')}} Turkish</h5>
											<textarea name="s_desc_tr" cols="30" rows="5" class=" ckeditor with-border"></textarea>
										</div>
										@error('s_desc_tr')
												    <div class="alert alert-danger">{{$message}}</div>
												@enderror
									</div>
									<div class="col-xl-6">
										<div class="submit-field">
											<h5>{{__('superAdminMembershipPlan.Description')}}</h5>
											<textarea name="desc" cols="30" rows="5" class=" ckeditor with-border"></textarea>
										</div>
										@error('desc')
												    <div class="alert alert-danger">{{$message}}</div>
												@enderror
									</div>
									<div class="col-xl-6">
										<div class="submit-field">
											<h5>{{__('superAdminMembershipPlan.Description')}} Arabic</h5>
											<textarea name="desc_ar" cols="30" rows="5" class=" ckeditor with-border"></textarea>
										</div>
										@error('desc_ar')
												    <div class="alert alert-danger">{{$message}}</div>
												@enderror
									</div>
									<div class="col-xl-6">
										<div class="submit-field">
											<h5>{{__('superAdminMembershipPlan.Description')}} Turkish</h5>
											<textarea name="desc_tr" cols="30" rows="5" class=" ckeditor with-border"></textarea>
										</div>
										@error('desc_tr')
												    <div class="alert alert-danger">{{$message}}</div>
												@enderror
									</div>
								</div>
							</li>
						</ul>
						</div>
					</div>
				</div>

				
				<!-- Button -->
				<div class="col-xl-12">
					<input type="submit" name=""class="button ripple-effect big margin-top-30" value="Add">
					<!-- <a href="#" class="button ripple-effect big margin-top-30">Save Changes</a> -->
				</div>
				</form>
				

			</div>
			<!-- Row / End -->

			<!-- Footer -->
			@include('includes.dashboardFooter')
			<!-- Footer / End -->

		</div>
	</div>
	<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
	<script type="text/javascript">
	    $(document).ready(function () {
	        $('.ckeditor').ckeditor();
	    });
	</script>
@endsection