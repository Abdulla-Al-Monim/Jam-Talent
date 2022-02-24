@extends('backend.layout.template')

<!-- title section -->
@section('title')
Add Employer
@endsection

@section('body-content')
<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">{{__('addUser.Add Employer')}}</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('addUser.Add Employer')}}</li>
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			<div class="row">
				<form method="POST" action="{{route('employer.store')}}" enctype="multipart/form-data">
					@csrf
					<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-account-circle"></i> {{__('addUser.Add Employer')}}</h3>
						</div>

						<div class="content with-padding padding-bottom-0">

							<div class="row">

								

								<div class="col">
									<div class="row">

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('addUser.First Name')}}</h5>
												<input type="text" name="first_name" class="with-border">
											</div>
										</div>

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('addUser.Last Name')}}</h5>
												<input type="text" class="with-border" name="last_name">
											</div>
										</div>

										

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('addUser.Email')}}</h5>
												<input type="text" class="with-border" name="email">
												@error('email')
												    <div class="alert alert-danger">{{ $message }}</div>
												@enderror
											</div>
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('addUser.Gender')}}</h5>
											
												<select class="with-border selectpicker" data-size="7" title="gender" name="gender">
													<option value="1">{{__('addUser.male')}}</option>
													<option value="2">{{__('addUser.female')}}</option>
												</select>
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
							<h3><i class="icon-material-outline-face"></i> {{__('addUser.My Profile')}}</h3>
						</div>

						<div class="content">
							<ul class="fields-ul">
							<li>
								<div class="row">
									

									<div class="col-xl-6">
										<div class="submit-field">
											<h5>{{__('addUser.Nationality')}}</h5>
											<select class="selectpicker with-border" name="nationality" data-size="7" title="Select Job Type" data-live-search="true">
												<option value="AR">Argentina</option>
												<option value="AM">Armenia</option>
												<option value="AW">Aruba</option>
												<option value="AU">Australia</option>
												<option value="AT">Austria</option>
												<option value="AZ">Azerbaijan</option>
												<option value="BS">Bahamas</option>
												<option value="BH">Bahrain</option>
												<option value="BD">Bangladesh</option>
												<option value="BB">Barbados</option>
												<option value="BY">Belarus</option>
												<option value="BE">Belgium</option>
												<option value="BZ">Belize</option>
												<option value="BJ">Benin</option>
												<option value="BM">Bermuda</option>
												<option value="BT">Bhutan</option>
												<option value="BG">Bulgaria</option>
												<option value="BF">Burkina Faso</option>
												<option value="BI">Burundi</option>
												<option value="KH">Cambodia</option>
												<option value="CM">Cameroon</option>
												<option value="CA">Canada</option>
												<option value="CV">Cape Verde</option>
												<option value="KY">Cayman Islands</option>
												<option value="CO">Colombia</option>
												<option value="KM">Comoros</option>
												<option value="CG">Congo</option>
												<option value="CK">Cook Islands</option>
												<option value="CR">Costa Rica</option>
												<option value="CI">Côte d'Ivoire</option>
												<option value="HR">Croatia</option>
												<option value="CU">Cuba</option>
												<option value="CW">Curaçao</option>
												<option value="CY">Cyprus</option>
												<option value="CZ">Czech Republic</option>
												<option value="DK">Denmark</option>
												<option value="DJ">Djibouti</option>
												<option value="DM">Dominica</option>
												<option value="DO">Dominican Republic</option>
												<option value="EC">Ecuador</option>
												<option value="EG">Egypt</option>
												<option value="GP">Guadeloupe</option>
												<option value="GU">Guam</option>
												<option value="GT">Guatemala</option>
												<option value="GG">Guernsey</option>
												<option value="GN">Guinea</option>
												<option value="GW">Guinea-Bissau</option>
												<option value="GY">Guyana</option>
												<option value="HT">Haiti</option>
												<option value="HN">Honduras</option>
												<option value="HK">Hong Kong</option>
												<option value="HU">Hungary</option>
												<option value="IS">Iceland</option>
												<option value="IN">India</option>
												<option value="ID">Indonesia</option>
												<option value="NO">Norway</option>
												<option value="OM">Oman</option>
												<option value="PK">Pakistan</option>
												<option value="PW">Palau</option>
												<option value="PA">Panama</option>
												<option value="PG">Papua New Guinea</option>
												<option value="PY">Paraguay</option>
												<option value="PE">Peru</option>
												<option value="PH">Philippines</option>
												<option value="PN">Pitcairn</option>
												<option value="PL">Poland</option>
												<option value="PT">Portugal</option>
												<option value="PR">Puerto Rico</option>
												<option value="QA">Qatar</option>
												<option value="RE">Réunion</option>
												<option value="RO">Romania</option>
												<option value="RU">Russian Federation</option>
												<option value="RW">Rwanda</option>
												<option value="SZ">Swaziland</option>
												<option value="SE">Sweden</option>
												<option value="CH">Switzerland</option>
												<option value="TR">Turkey</option>
												<option value="TM">Turkmenistan</option>
												<option value="TV">Tuvalu</option>
												<option value="UG">Uganda</option>
												<option value="UA">Ukraine</option>
												<option value="GB">United Kingdom</option>
												<option value="US" selected>United States</option>
												<option value="UY">Uruguay</option>
												<option value="UZ">Uzbekistan</option>
												<option value="YE">Yemen</option>
												<option value="ZM">Zambia</option>
												<option value="ZW">Zimbabwe</option>
												<option value="Emirates">Emirates</option>
												<option value="Syria">Syria</option>
												<option value="Palestine">Palestine</option>
												<option value="LB">Libya</option>
											</select>
										</div>
									</div>
									
								</div>
							</li>
						</ul>
						</div>
					</div>
				</div>
				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div id="test1" class="dashboard-box">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-lock"></i> {{__('addUser.Password & Security')}}</h3>
						</div>

						<div class="content with-padding">
							<div class="row">

								<div class="col-xl-4">
									<div class="submit-field">
										<h5>{{__('addUser.New Password')}}</h5>
										<input type="password" class="with-border" name="password">
										@error('password')
										    <div class="alert alert-danger">
										    	{{ $message }}
										    </div>
										@enderror
									</div>
								</div>

								<div class="col-xl-4">
									<div class="submit-field">
										<h5>{{__('addUser.Repeat New Password')}}</h5>
										<input type ="password" name= "password_confirmation" class="with-border">
										@error('password_confirmation')
											<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
								</div>

								
							</div>
						</div>
					</div>
				</div>

				<!-- Dashboard Box -->
				
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