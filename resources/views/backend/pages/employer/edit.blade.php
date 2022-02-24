@extends('backend.layout.template')
@section('title')
{{__('backendIndex.Settings')}}
@endsection
@section('body-content')
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
				<form method="POST" action="{{route('employer.update')}}" enctype="multipart/form-data">
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
										<img class="profile-pic" src="{{ asset('images/employer/' . $employer->image)}}" alt="" />
										<div class="upload-button"></div>
										<input class="file-upload" name="image" type="file" accept="image/*"/>
									</div>
								</div>

								<div class="col">
									<div class="row">

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.First Name')}}</h5>
												<input type="text" name="first_name" autocomplete="off" class="with-border" value="{{$employer->first_name}}">
											</div>
											@error('first_name')
										    	<div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
										</div>

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Last Name')}}</h5>
												<input type="text" class="with-border" autocomplete="off" name="last_name" value="{{$employer->last_name}}">
											</div>
											@error('last_name')
											    <div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
										</div>

										

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Email')}}</h5>
												<input type="text" readonly class="with-border" value="{{$employer->email}}" name="email">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.User Name')}}</h5>
												<input type="text" name="user_name" autocomplete="off" class="with-border" value="{{$employer->user_name}}">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Language')}}</h5>
												<input type="text" class="with-border" autocomplete="off" value="{{$employer->language}}" name="language">
											</div>
											@error('language')
											    <div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Gender')}}</h5>
											
												<select class="with-border selectpicker" data-size="7" title="gender" name="gender">
													<option value="1" @if ($employer->gender == 1) selected @endif>{{__('backendIndex.male')}}</option>
													<option value="2" @if ($employer->gender == 2) selected @endif>{{__('backendIndex.female')}}</option>
												</select>
											</div>
											@error('gender')
											    <div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
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
											<input type="text" autocomplete="off" class="with-border" value="{{$employer->sort_description}}" name="sort_description">
										</div>
										@error('sort_description')
											    <div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
									</div>

									<div class="col-xl-6">
										<div class="submit-field">
											<h5>{{__('backendIndex.Nationality')}}</h5>
											<select class="selectpicker with-border" name="location" data-size="7" title="Nationality" data-live-search="true">
												<option value="AR"@if ($employer->location ==  'AR') selected @endif>Argentina</option>
												<option value="AM" @if ($employer->location ==  'AM') selected @endif>Armenia</option>
												<option value="AW" @if ($employer->location ==  'AW') selected @endif>Aruba</option>
												<option value="AU"@if ($employer->location ==  'AU') selected @endif>Australia</option>
												<option value="AT" @if ($employer->location ==  'AT') selected @endif>Austria</option>
												<option value="AZ"@if ($employer->location ==  'AZ') selected @endif>Azerbaijan</option>
												<option value="BS"@if ($employer->location ==  'BS') selected @endif>Bahamas</option>
												<option value="BH"@if ($employer->location ==  'BH') selected @endif>Bahrain</option>
												<option value="BD"@if ($employer->location ==  'BD') selected @endif>Bangladesh</option>
												<option value="BB"@if ($employer->location ==  'BB') selected @endif>Barbados</option>
												<option value="BY"@if ($employer->location ==  'BY') selected @endif>Belarus</option>
												<option value="BE"@if ($employer->location ==  'BE') selected @endif>Belgium</option>
												<option value="BZ"@if ($employer->location ==  'BZ') selected @endif>Belize</option>
												<option value="BJ"@if ($employer->location ==  'BJ') selected @endif>Benin</option>
												<option value="BM"@if ($employer->location ==  'BM') selected @endif>Bermuda</option>
												<option value="BT"@if ($employer->location ==  'BT') selected @endif>Bhutan</option>
												<option value="BG"@if ($employer->location ==  'BG') selected @endif>Bulgaria</option>
												<option value="BF"@if ($employer->location ==  'BF') selected @endif>Burkina Faso</option>
												<option value="BI"@if ($employer->location ==  'BI') selected @endif>Burundi</option>
												<option value="KH"@if ($employer->location ==  'KH') selected @endif>Cambodia</option>
												<option value="CM"@if ($employer->location ==  'CM') selected @endif>Cameroon</option>
												<option value="CA"@if ($employer->location ==  'CA') selected @endif>Canada</option>
												<option value="CV"@if ($employer->location ==  'CV') selected @endif>Cape Verde</option>
												<option value="KY"@if ($employer->location ==  'KY') selected @endif>Cayman Islands</option>
												<option value="CO"@if ($employer->location ==  'CO') selected @endif>Colombia</option>
												<option value="KM"@if ($employer->location ==  'KM') selected @endif>Comoros</option>
												<option value="CG"@if ($employer->location ==  'CG') selected @endif>Congo</option>
												<option value="CK"@if ($employer->location ==  'CK') selected @endif>Cook Islands</option>
												<option value="CR"@if ($employer->location ==  'CR') selected @endif>Costa Rica</option>
												<option value="CI"@if ($employer->location ==  'CI') selected @endif>Côte d'Ivoire</option>
												<option value="HR"@if ($employer->location ==  'HR') selected @endif>Croatia</option>
												<option value="CU"@if ($employer->location ==  'CU') selected @endif>Cuba</option>
												<option value="CW"@if ($employer->location ==  'CW') selected @endif>Curaçao</option>
												<option value="CY"@if ($employer->location ==  'CY') selected @endif>Cyprus</option>
												<option value="CZ"@if ($employer->location ==  'CZ') selected @endif>Czech Republic</option>
												<option value="DK"@if ($employer->location ==  'DK') selected @endif>Denmark</option>
												<option value="DJ"@if ($employer->location ==  'DJ') selected @endif>Djibouti</option>
												<option value="DM"@if ($employer->location ==  'DM') selected @endif>Dominica</option>
												<option value="DO"@if ($employer->location ==  'DO') selected @endif>Dominican Republic</option>
												<option value="EC"@if ($employer->location ==  'EC') selected @endif>Ecuador</option>
												<option value="EG"@if ($employer->location ==  'EG') selected @endif>Egypt</option>
												<option value="GP"@if ($employer->location ==  'GP') selected @endif>Guadeloupe</option>
												<option value="GU"@if ($employer->location ==  'GU') selected @endif>Guam</option>
												<option value="GT"@if ($employer->location ==  'GT') selected @endif>Guatemala</option>
												<option value="GG"@if ($employer->location ==  'GG') selected @endif>Guernsey</option>
												<option value="GN"@if ($employer->location ==  'GN') selected @endif>Guinea</option>
												<option value="GW"@if ($employer->location ==  'GW') selected @endif>Guinea-Bissau</option>
												<option value="GY"@if ($employer->location ==  'GY') selected @endif>Guyana</option>
												<option value="HT"@if ($employer->location ==  'HT') selected @endif>Haiti</option>
												<option value="HN"@if ($employer->location ==  'HN') selected @endif>Honduras</option>
												<option value="HK"@if ($employer->location ==  'HK') selected @endif>Hong Kong</option>
												<option value="HU"@if ($employer->location ==  'HU') selected @endif>Hungary</option>
												<option value="IS"@if ($employer->location ==  'IS') selected @endif>Iceland</option>
												<option value="IN"@if ($employer->location ==  'IN') selected @endif>India</option>
												<option value="ID"@if ($employer->location ==  'ID') selected @endif>Indonesia</option>
												<option value="NO"@if ($employer->location ==  'NO') selected @endif>Norway</option>
												<option value="OM"@if ($employer->location ==  'OM') selected @endif>Oman</option>
												<option value="PK"@if ($employer->location ==  'PK') selected @endif>Pakistan</option>
												<option value="PW"@if ($employer->location ==  'PW') selected @endif>Palau</option>
												<option value="PA"@if ($employer->location ==  'PA') selected @endif>Panama</option>
												<option value="PG"@if ($employer->location ==  'PG') selected @endif>Papua New Guinea</option>
												<option value="PY"@if ($employer->location ==  'PY') selected @endif>Paraguay</option>
												<option value="PE"@if ($employer->location ==  'PE') selected @endif>Peru</option>
												<option value="PH"@if ($employer->location ==  'PH') selected @endif>Philippines</option>
												<option value="PN"@if ($employer->location ==  'PN') selected @endif>Pitcairn</option>
												<option value="PL"@if ($employer->location ==  'PL') selected @endif>Poland</option>
												<option value="PT"@if ($employer->location ==  'PT') selected @endif>Portugal</option>
												<option value="PR"@if ($employer->location ==  'PR') selected @endif>Puerto Rico</option>
												<option value="QA"@if ($employer->location ==  'QA') selected @endif>Qatar</option>
												<option value="RE"@if ($employer->location ==  'RE') selected @endif>Réunion</option>
												<option value="RO"@if ($employer->location ==  'RO') selected @endif>Romania</option>
												<option value="RU"@if ($employer->location ==  'RU') selected @endif>Russian Federation</option>
												<option value="RW"@if ($employer->location ==  'RW') selected @endif>Rwanda</option>
												<option value="SZ"@if ($employer->location ==  'SZ') selected @endif>Swaziland</option>
												<option value="SE"@if ($employer->location ==  'SE') selected @endif>Sweden</option>
												<option value="CH"@if ($employer->location ==  'CH') selected @endif>Switzerland</option>
												<option value="TR"@if ($employer->location ==  'TR') selected @endif>Turkey</option>
												<option value="TM"@if ($employer->location ==  'TM') selected @endif>Turkmenistan</option>
												<option value="TV"@if ($employer->location ==  'TV') selected @endif>Tuvalu</option>
												<option value="UG"@if ($employer->location ==  'UG') selected @endif>Uganda</option>
												<option value="UA"@if ($employer->location ==  'UA') selected @endif>Ukraine</option>
												<option value="GB"@if ($employer->location ==  'GB') selected @endif>United Kingdom</option>
												<option value="US" @if ($employer->location ==  'US') selected @endif>United States</option>
												<option value="UY"@if ($employer->location ==  'UY') selected @endif>Uruguay</option>
												<option value="UZ"@if ($employer->location ==  'UZ') selected @endif>Uzbekistan</option>
												<option value="YE"@if ($employer->location ==  'YE') selected @endif>Yemen</option>
												<option value="ZM"@if ($employer->location ==  'ZM') selected @endif>Zambia</option>
												<option value="ZW"@if ($employer->location ==  'ZW') selected @endif>Zimbabwe</option>
												<option value="LB"@if ($employer->location ==  'LB') selected @endif>Libya</option>
												<option value="Emirates"@if ($employer->location ==  'Emirates') selected @endif>United Arab Emirates</option>
												<option value="Syria"@if ($employer->location ==  'Syria') selected @endif>Syria</option>
												<option value="Palestine"@if ($employer->location ==  'Palestine') selected @endif>Palestine</option>
											</select>
										</div>
										@error('location')
											    <div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
									</div>
									<div class="col-xl-12">
										<div class="submit-field">
											<h5> {{__('backendIndex.Introduce Yourself')}}</h5>
											<textarea name="description" cols="30" rows="5" class=" ckeditor with-border">{{$employer->description}}</textarea>
										</div>
										@error('description')
											    <div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
									</div>
								</div>
							</li>
						</ul>
						</div>
					</div>
				</div>
				

				<!-- Dashboard Box -->
				
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