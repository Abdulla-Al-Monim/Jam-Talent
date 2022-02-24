@extends('backend.layout.template')
@section('title')
{{__('backendIndex.Settings')}}
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>{{__('backendIndex.Settings')}}</h3>

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
				<form method="POST" action="{{route('admin.update')}}" enctype="multipart/form-data">
					@csrf
					<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-account-circle"></i> {{__('backendIndex.My Account')}}</h3>
						</div>

						<div class="content with-padding padding-bottom-0">

							<div class="row">

								<div class="col-auto">
									<div class="avatar-wrapper" data-tippy-placement="bottom" title="Change Avatar">
										<img class="profile-pic" src="{{ asset('images/admin/' . $admin->image)}}" alt="" />
										<div class="upload-button"></div>
										<input class="file-upload" name="image" type="file" accept="image/*"/>
									</div>

								</div>

								<div class="col">
									<div class="row">

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.First Name')}}</h5>
												<input type="text" name="first_name" class="with-border" value="{{$admin->first_name}}">
											</div>
											@error('first_name')
											    <div class="alert alert-danger">{{ $message }}</div>
											@enderror
											</div>

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Last Name')}}</h5>
												<input type="text" class="with-border" name="last_name" value="{{$admin->last_name}}">
											</div>
											@error('last_name')
											    <div class="alert alert-danger">{{ $message }}</div>
											@enderror
										</div>

										

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Email')}}</h5>
												<input type="text" readonly class="with-border" value="{{$admin->email}}" name="email">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.User Name')}}</h5>
											
												<select class="with-border selectpicker" data-size="7" title="gender" name="gender">
													<option value="1" @if ($admin->gender == 1) selected @endif>{{__('backendIndex.male')}}</option>
													<option value="2" @if ($admin->gender == 2) selected @endif>{{__('backendIndex.female')}}</option>
												</select>
											</div>
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.User Name')}}</h5>
												<input type="text" name="user_name" class="with-border" value="{{$admin->user_name}}">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Language')}}</h5>
												<input type="text" class="with-border" value="{{$admin->language}}" name="language">
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
							<h3><i class="icon-material-outline-face"></i> {{__('backendIndex.My Profile')}}</h3>
						</div>

						<div class="content">
							<ul class="fields-ul">
							<li>
								<div class="row">
									<div class="col-xl-6">
										<div class="submit-field">
											<h5>{{__('backendIndex.Tagline')}}</h5>
											<input type="text" class="with-border" value="{{$admin->sort_description}}" name="sort_description">
										</div>
									</div>

									<div class="col-xl-6">
										<div class="submit-field">
											<h5>{{__('backendIndex.Nationality')}}</h5>
											<select class="selectpicker with-border" name="nationality" data-size="7" title="Nationality" data-live-search="true">
												<option value="AR"@if ($admin->location ==  'AR') selected @endif>Argentina</option>
												<option value="AM" @if ($admin->location ==  'AM') selected @endif>Armenia</option>
												<option value="AW" @if ($admin->location ==  'AW') selected @endif>Aruba</option>
												<option value="AU"@if ($admin->location ==  'AU') selected @endif>Australia</option>
												<option value="AT" @if ($admin->location ==  'AT') selected @endif>Austria</option>
												<option value="AZ"@if ($admin->location ==  'AZ') selected @endif>Azerbaijan</option>
												<option value="BS"@if ($admin->location ==  'BS') selected @endif>Bahamas</option>
												<option value="BH"@if ($admin->location ==  'BH') selected @endif>Bahrain</option>
												<option value="BD"@if ($admin->location ==  'BD') selected @endif>Bangladesh</option>
												<option value="BB"@if ($admin->location ==  'BB') selected @endif>Barbados</option>
												<option value="BY"@if ($admin->location ==  'BY') selected @endif>Belarus</option>
												<option value="BE"@if ($admin->location ==  'BE') selected @endif>Belgium</option>
												<option value="BZ"@if ($admin->location ==  'BZ') selected @endif>Belize</option>
												<option value="BJ"@if ($admin->location ==  'BJ') selected @endif>Benin</option>
												<option value="BM"@if ($admin->location ==  'BM') selected @endif>Bermuda</option>
												<option value="BT"@if ($admin->location ==  'BT') selected @endif>Bhutan</option>
												<option value="BG"@if ($admin->location ==  'BG') selected @endif>Bulgaria</option>
												<option value="BF"@if ($admin->location ==  'BF') selected @endif>Burkina Faso</option>
												<option value="BI"@if ($admin->location ==  'BI') selected @endif>Burundi</option>
												<option value="KH"@if ($admin->location ==  'KH') selected @endif>Cambodia</option>
												<option value="CM"@if ($admin->location ==  'CM') selected @endif>Cameroon</option>
												<option value="CA"@if ($admin->location ==  'CA') selected @endif>Canada</option>
												<option value="CV"@if ($admin->location ==  'CV') selected @endif>Cape Verde</option>
												<option value="KY"@if ($admin->location ==  'KY') selected @endif>Cayman Islands</option>
												<option value="CO"@if ($admin->location ==  'CO') selected @endif>Colombia</option>
												<option value="KM"@if ($admin->location ==  'KM') selected @endif>Comoros</option>
												<option value="CG"@if ($admin->location ==  'CG') selected @endif>Congo</option>
												<option value="CK"@if ($admin->location ==  'CK') selected @endif>Cook Islands</option>
												<option value="CR"@if ($admin->location ==  'CR') selected @endif>Costa Rica</option>
												<option value="CI"@if ($admin->location ==  'CI') selected @endif>Côte d'Ivoire</option>
												<option value="HR"@if ($admin->location ==  'HR') selected @endif>Croatia</option>
												<option value="CU"@if ($admin->location ==  'CU') selected @endif>Cuba</option>
												<option value="CW"@if ($admin->location ==  'CW') selected @endif>Curaçao</option>
												<option value="CY"@if ($admin->location ==  'CY') selected @endif>Cyprus</option>
												<option value="CZ"@if ($admin->location ==  'CZ') selected @endif>Czech Republic</option>
												<option value="DK"@if ($admin->location ==  'DK') selected @endif>Denmark</option>
												<option value="DJ"@if ($admin->location ==  'DJ') selected @endif>Djibouti</option>
												<option value="DM"@if ($admin->location ==  'DM') selected @endif>Dominica</option>
												<option value="DO"@if ($admin->location ==  'DO') selected @endif>Dominican Republic</option>
												<option value="EC"@if ($admin->location ==  'EC') selected @endif>Ecuador</option>
												<option value="EG"@if ($admin->location ==  'EG') selected @endif>Egypt</option>
												<option value="GP"@if ($admin->location ==  'GP') selected @endif>Guadeloupe</option>
												<option value="GU"@if ($admin->location ==  'GU') selected @endif>Guam</option>
												<option value="GT"@if ($admin->location ==  'GT') selected @endif>Guatemala</option>
												<option value="GG"@if ($admin->location ==  'GG') selected @endif>Guernsey</option>
												<option value="GN"@if ($admin->location ==  'GN') selected @endif>Guinea</option>
												<option value="GW"@if ($admin->location ==  'GW') selected @endif>Guinea-Bissau</option>
												<option value="GY"@if ($admin->location ==  'GY') selected @endif>Guyana</option>
												<option value="HT"@if ($admin->location ==  'HT') selected @endif>Haiti</option>
												<option value="HN"@if ($admin->location ==  'HN') selected @endif>Honduras</option>
												<option value="HK"@if ($admin->location ==  'HK') selected @endif>Hong Kong</option>
												<option value="HU"@if ($admin->location ==  'HU') selected @endif>Hungary</option>
												<option value="IS"@if ($admin->location ==  'IS') selected @endif>Iceland</option>
												<option value="IN"@if ($admin->location ==  'IN') selected @endif>India</option>
												<option value="ID"@if ($admin->location ==  'ID') selected @endif>Indonesia</option>
												<option value="NO"@if ($admin->location ==  'NO') selected @endif>Norway</option>
												<option value="OM"@if ($admin->location ==  'OM') selected @endif>Oman</option>
												<option value="PK"@if ($admin->location ==  'PK') selected @endif>Pakistan</option>
												<option value="PW"@if ($admin->location ==  'PW') selected @endif>Palau</option>
												<option value="PA"@if ($admin->location ==  'PA') selected @endif>Panama</option>
												<option value="PG"@if ($admin->location ==  'PG') selected @endif>Papua New Guinea</option>
												<option value="PY"@if ($admin->location ==  'PY') selected @endif>Paraguay</option>
												<option value="PE"@if ($admin->location ==  'PE') selected @endif>Peru</option>
												<option value="PH"@if ($admin->location ==  'PH') selected @endif>Philippines</option>
												<option value="PN"@if ($admin->location ==  'PN') selected @endif>Pitcairn</option>
												<option value="PL"@if ($admin->location ==  'PL') selected @endif>Poland</option>
												<option value="PT"@if ($admin->location ==  'PT') selected @endif>Portugal</option>
												<option value="PR"@if ($admin->location ==  'PR') selected @endif>Puerto Rico</option>
												<option value="QA"@if ($admin->location ==  'QA') selected @endif>Qatar</option>
												<option value="RE"@if ($admin->location ==  'RE') selected @endif>Réunion</option>
												<option value="RO"@if ($admin->location ==  'RO') selected @endif>Romania</option>
												<option value="RU"@if ($admin->location ==  'RU') selected @endif>Russian Federation</option>
												<option value="RW"@if ($admin->location ==  'RW') selected @endif>Rwanda</option>
												<option value="SZ"@if ($admin->location ==  'SZ') selected @endif>Swaziland</option>
												<option value="SE"@if ($admin->location ==  'SE') selected @endif>Sweden</option>
												<option value="CH"@if ($admin->location ==  'CH') selected @endif>Switzerland</option>
												<option value="TR"@if ($admin->location ==  'TR') selected @endif>Turkey</option>
												<option value="TM"@if ($admin->location ==  'TM') selected @endif>Turkmenistan</option>
												<option value="TV"@if ($admin->location ==  'TV') selected @endif>Tuvalu</option>
												<option value="UG"@if ($admin->location ==  'UG') selected @endif>Uganda</option>
												<option value="UA"@if ($admin->location ==  'UA') selected @endif>Ukraine</option>
												<option value="GB"@if ($admin->location ==  'GB') selected @endif>United Kingdom</option>
												<option value="US" @if ($admin->location ==  'US') selected @endif>United States</option>
												<option value="UY"@if ($admin->location ==  'UY') selected @endif>Uruguay</option>
												<option value="UZ"@if ($admin->location ==  'UZ') selected @endif>Uzbekistan</option>
												<option value="YE"@if ($admin->location ==  'YE') selected @endif>Yemen</option>
												<option value="ZM"@if ($admin->location ==  'ZM') selected @endif>Zambia</option>
												<option value="ZW"@if ($admin->location ==  'ZW') selected @endif>Zimbabwe</option>
												<option value="Emirates"@if ($admin->location ==  'Emirates') selected @endif>United Arab Emirates</option>
												<option value="Syria"@if ($admin->location ==  'Syria') selected @endif>Syria</option>
												<option value="Palestine"@if ($admin->location ==  'Palestine') selected @endif>Palestine</option>
												<option value="LB"@if ($admin->location ==  'LB') selected @endif>Libya</option>
											</select>
										</div>
									</div>
									<div class="col-xl-12">
										<div class="submit-field">
											<h5>{{__('backendIndex.Introduce Yourself')}}</h5>
											<textarea name="description" cols="30" rows="5" class=" ckeditor with-border">{{$admin->description}}</textarea>
										</div>
									</div>
								</div>
							</li>
						</ul>
						</div>
					</div>
				</div>

				
				
				<!-- Button -->
				<div class="col-xl-12">
					<input type="submit" name=""class="button ripple-effect big margin-top-30" value="{{__('backendJob.Save Changes')}}">
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