@extends('backend.layout.template')
@section('title')
{{__('backendIndex.Settings')}}
@endsection
@section('body-content')

	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">{{__('backendIndex.Settings')}}</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('backendIndex.Settings')}}</li>
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			<div class="row">

				
				<form method="POST" action="{{route('change.password.store')}}">
				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div id="test1" class="dashboard-box">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-lock"></i> {{__('backendIndex.Password & Security')}}</h3>
						</div>
						
						<div class="content with-padding">
							<div class="row">
								
									@csrf
									<div class="col-xl-4">
									<div class="submit-field">
										<h5> {{__('backendIndex.Current Password')}}</h5>
										<input type="password" class="with-border" name="old_password">
									</div>
									@error('old_password')
	                                    <span class="text-danger">{{ $message }}</span>
	                                @enderror
								</div>

								<div class="col-xl-4">
									<div class="submit-field">
										<h5> {{__('backendIndex.New Password')}}</h5>
										<input type="password" class="with-border" name="new_password">
									</div>
									@error('new_password')
	                                    <span class="text-danger">{{ $message }}</span>
	                                @enderror
								</div>

								<div class="col-xl-4">
									<div class="submit-field">
										<h5> {{__('backendIndex.Repeat New Password')}}</h5>
										<input type="password" class="with-border" name="password_confirmation">
									</div>
									@error('password_confirmation')
	                                    <span class="text-danger">{{ $message }}</span>
	                                @enderror
								</div>
								<!-- Button -->
								<div class="col-xl-12">
									<input type="submit" name=""class="button ripple-effect big margin-top-30" value="{{__('backendJob.Save Changes')}}">
									<!-- <a href="#" class="button ripple-effect big margin-top-30">Save Changes</a> -->
								</div>

								
								

								
							</div>
						</div>
						
					</div>
				</div>
				</form>
				<!-- Button -->
				<!-- <div class="col-xl-12">
					<a href="#" class="button ripple-effect big margin-top-30">Save Changes</a>
				</div> -->

			</div>
			<!-- Row / End -->

			<!-- Footer -->
			@include('includes.dashboardFooter')
			<!-- Footer / End -->

		</div>
	</div>
	<!-- Dashboard Content / End -->



@endsection

