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
				<form method="POST" action="{{route('freelancer.update')}}" enctype="multipart/form-data">
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
										<img class="profile-pic" src="{{ asset('images/freelancer/' . $user->image)}}" alt="" />
										<div class="upload-button"></div>
										<input class="file-upload" name="image" type="file" accept="image/*"/>
									</div>
								</div>

								<div class="col">
									<div class="row">

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.First Name')}}</h5>
												<input type="text" name="first_name" class="with-border" autocomplete="off" value="{{$user->first_name}}">
											</div>
											@error('first_name')
										    	<div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
										</div>

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Last Name')}}</h5>
												<input type="text" class="with-border" autocomplete="off" value="{{$user->last_name}}" name="last_name">
											</div>
											@error('last_name')
											    <div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
										</div>

										

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Email')}}</h5>
												<input type="text" readonly class="with-border" value="{{$user->email}}" name="email">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.User Name')}}</h5>
												<input type="text" name="user_name" class="with-border" value="{{$user->user_name}}">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Language')}}</h5>
												<input type="text" class="with-border" autocomplete="off" value="{{$user->language}}" name="language">
											</div>
											@error('language')
										    	<div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Gender')}}</h5>
											
												<select class="with-border selectpicker" data-size="7" title="gender" name="gender">
													<option value="1" @if ($user->gender == 1) selected @endif>{{__('backendIndex.Male')}}</option>
													<option value="2" @if ($user->gender == 2) selected @endif>{{__('backendIndex.Female')}}</option>
												</select>
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
									<div class="col-xl-4 dashboard-box padding-bottom-20 padding-top-20">
										<div class="submit-field">
											<div class="bidding-widget">
												<!-- Headline -->
												<span class="bidding-detail">{{__('backendIndex.Set your')}} <strong>{{__('backendIndex.minimal hourly rate')}}</strong></span>

												<!-- Slider -->
												<div class="bidding-value margin-bottom-10">$<span id="biddingVal"></span></div>
												<input class="bidding-slider" type="text" value="{{$user->hourly_rate}}" name="hourly_rate" data-slider-handle="custom" data-slider-currency="$" data-slider-min="5" data-slider-max="150" data-slider-value="35" data-slider-step="1" data-slider-tooltip="hide" />
											</div>

										</div>
									</div>
<!-- 
									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Skills <i class="help-icon" data-tippy-placement="right" title="Add up to 10 skills"></i></h5>

											
											<div class="keywords-container">
												<div class="keyword-input-container">
													<select class="form-control" multiple="multiple">
													  <option selected="selected">orange</option>
													  <option>white</option>
													  <option selected="selected">purple</option>
													</select>
													
												</div>
												
												<div class="clearfix"></div>
											</div>
										</div>
									</div> -->

									<div class="col-xl-4 dashboard-box padding-bottom-20 padding-top-20">
										<div class="submit-field">
											<h5>{{__('backendIndex.Cover Letter')}}</h5>
											
											<!-- Attachments -->
											<!-- <div class="attachments-container margin-top-0 margin-bottom-0">


												
											</div> -->
											<div class="clearfix"></div>
											
											<!-- Upload Button -->
											<div class="uploadButton margin-top-0">
												<input type="text" class="with-border" value="{{$user->file_link}}" name="file_link" autocomplete="off" placeholder="{{__('backendIndex.Cover Letter')}} {{__('backendIndex.Link')}}">
												<span> PDF</span>
												<input style="height: 48px;
    line-height: 48px;
    padding: 0 20px;
    outline: none;
    font-size: 16px;
    color: #808080;
    margin: 0 0 16px 0;
    max-width: 100%;
    width: 100%;
    box-sizing: border-box;
    display: block;
    background-color: #fff;
    font-weight: 500;
    opacity: 1;
    border-radius: 4px;
    border: none;
    box-shadow: 0 1px 4px 0px rgb(0 0 0 / 12%);" class="" type="file" accept=" application/pdf" id="upload-file" placeholder="PDF" name="file" multiple/>
												
											</div>
											@error('file')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
										</div>
									</div>
									<div class="col-xl-4 dashboard-box padding-bottom-20 padding-top-20">
										<div class="submit-field">
											<h5>{{__('backendIndex.Recommendation Letters')}}</h5>
											
											<!-- Attachments -->
											<!-- <div class="attachments-container margin-top-0 margin-bottom-0">


												
											</div> -->
											<div class="clearfix"></div>
											
											<!-- Upload Button -->
											<div class="uploadButton margin-top-0">
												<input type="text" autocomplete="off" class="with-border" value="{{$user->recommendation_letter_link}}" name="recommendation_letter_link" placeholder="{{__('backendIndex.Recommendation Letters')}} {{__('backendIndex.Link')}}">
												<span> PDF</span>
												<input style="height: 48px;
    line-height: 48px;
    padding: 0 20px;
    outline: none;
    font-size: 16px;
    color: #808080;
    margin: 0 0 16px 0;
    max-width: 100%;
    width: 100%;
    box-sizing: border-box;
    display: block;
    background-color: #fff;
    font-weight: 500;
    opacity: 1;
    border-radius: 4px;
    border: none;
    box-shadow: 0 1px 4px 0px rgb(0 0 0 / 12%);" class="" type="file" accept=" application/pdf" id="upload-file" placeholder="PDF" name="recommendation_letter" multiple/>
												
											</div>
											
										</div>
									</div>
									<div class="col-xl-4 dashboard-box padding-bottom-20 padding-top-20">
										<div class="submit-field">
											<h5>{{__('backendIndex.Portfolio')}}</h5>
											
											<!-- Attachments -->
											<!-- <div class="attachments-container margin-top-0 margin-bottom-0">


												
											</div> -->
											<div class="clearfix"></div>
											
											<!-- Upload Button -->
											<div class="uploadButton margin-top-0">
												<input type="text" class="with-border" value="{{$user->portfolio_link}}" name="portfolio_link" placeholder="{{__('backendIndex.Portfolio')}} {{__('backendIndex.Link')}}" autocomplete="off">
												<span> PDF</span>
												<input style="height: 48px;
    line-height: 48px;
    padding: 0 20px;
    outline: none;
    font-size: 16px;
    color: #808080;
    margin: 0 0 16px 0;
    max-width: 100%;
    width: 100%;
    box-sizing: border-box;
    display: block;
    background-color: #fff;
    font-weight: 500;
    opacity: 1;
    border-radius: 4px;
    border: none;
    box-shadow: 0 1px 4px 0px rgb(0 0 0 / 12%);" class=""  type="file" accept=" application/pdf" id="upload-file" placeholder="PDF" name="portfolio" multiple/>
												
											</div>
											
										</div>
									</div>
									<div class="col-xl-4 dashboard-box padding-bottom-20 padding-top-20">
										<div class="submit-field">
											<h5>{{__('backendIndex.CV')}}</h5>
											
											<!-- Attachments -->
											<!-- <div class="attachments-container margin-top-0 margin-bottom-0">


												
											</div> -->
											<div class="clearfix"></div>
											
											<!-- Upload Button -->
											<div class="uploadButton margin-top-0">
												<input type="text" class="with-border" autocomplete="off" value="{{$user->cv_link}}" name="cv_link" placeholder="{{__('backendIndex.CV')}} {{__('backendIndex.Link')}}">
												<span> PDF</span>
												<input style="height: 48px;
    line-height: 48px;
    padding: 0 20px;
    outline: none;
    font-size: 16px;
    color: #808080;
    margin: 0 0 16px 0;
    max-width: 100%;
    width: 100%;
    box-sizing: border-box;
    display: block;
    background-color: #fff;
    font-weight: 500;
    opacity: 1;
    border-radius: 4px;
    border: none;
    box-shadow: 0 1px 4px 0px rgb(0 0 0 / 12%);" class="" type="file" accept=" application/pdf" id="upload-file" placeholder="PDF" name="cv" multiple/>
												
											</div>
											
										</div>
									</div>
									<div class="col-xl-4 dashboard-box padding-bottom-20 padding-top-20">
										<div class="submit-field">
											<h5>{{__('backendIndex.Qualification Certificates')}}</h5>
											
											<!-- Attachments -->
											<!-- <div class="attachments-container margin-top-0 margin-bottom-0">


												
											</div> -->
											<div class="clearfix"></div>
											
											<!-- Upload Button -->
											<div class="uploadButton margin-top-0">
												<input type="text" class="with-border" autocomplete="off" value="{{$user->qualification_certificate_link}}" name="qualification_certificate_link" placeholder="{{__('backendIndex.Qualification Certificates')}} {{__('backendIndex.Link')}}">
												<span> PDF</span>
												<input style="height: 48px;
    line-height: 48px;
    padding: 0 20px;
    outline: none;
    font-size: 16px;
    color: #808080;
    margin: 0 0 16px 0;
    max-width: 100%;
    width: 100%;
    box-sizing: border-box;
    display: block;
    background-color: #fff;
    font-weight: 500;
    opacity: 1;
    border-radius: 4px;
    border: none;
    box-shadow: 0 1px 4px 0px rgb(0 0 0 / 12%);" class=""  type="file" accept=" application/pdf" id="upload-file" placeholder="PDF" name="qualification_certificate" multiple/>
												
											</div>
											
										</div>
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="col-xl-6">
										<div class="submit-field">
											<h5>{{__('backendIndex.Tagline')}}</h5>
											<input type="text" autocomplete="off" class="with-border" value="{{$user->sort_description}}" name="sort_description">
										</div>
										@error('sort_description')
										    	<div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
									</div>

									<div class="col-xl-6">
										<div class="submit-field">
											<h5>{{__('backendIndex.Nationality')}}</h5>
											<select class=" with-border selectpicker" name="location" data-size="7" title="Nationality" data-live-search="true">
												<option value="AR"@if ($user->location ==  'AR') selected @endif>Argentina</option>
												<option value="AM" @if ($user->location ==  'AM') selected @endif>Armenia</option>
												<option value="AW" @if ($user->location ==  'AW') selected @endif>Aruba</option>
												<option value="AU"@if ($user->location ==  'AU') selected @endif>Australia</option>
												<option value="AT" @if ($user->location ==  'AT') selected @endif>Austria</option>
												<option value="AZ"@if ($user->location ==  'AZ') selected @endif>Azerbaijan</option>
												<option value="BS"@if ($user->location ==  'BS') selected @endif>Bahamas</option>
												<option value="BH"@if ($user->location ==  'BH') selected @endif>Bahrain</option>
												<option value="BD"@if ($user->location ==  'BD') selected @endif>Bangladesh</option>
												<option value="BB"@if ($user->location ==  'BB') selected @endif>Barbados</option>
												<option value="BY"@if ($user->location ==  'BY') selected @endif>Belarus</option>
												<option value="BE"@if ($user->location ==  'BE') selected @endif>Belgium</option>
												<option value="BZ"@if ($user->location ==  'BZ') selected @endif>Belize</option>
												<option value="BJ"@if ($user->location ==  'BJ') selected @endif>Benin</option>
												<option value="BM"@if ($user->location ==  'BM') selected @endif>Bermuda</option>
												<option value="BT"@if ($user->location ==  'BT') selected @endif>Bhutan</option>
												<option value="BG"@if ($user->location ==  'BG') selected @endif>Bulgaria</option>
												<option value="BF"@if ($user->location ==  'BF') selected @endif>Burkina Faso</option>
												<option value="BI"@if ($user->location ==  'BI') selected @endif>Burundi</option>
												<option value="KH"@if ($user->location ==  'KH') selected @endif>Cambodia</option>
												<option value="CM"@if ($user->location ==  'CM') selected @endif>Cameroon</option>
												<option value="CA"@if ($user->location ==  'CA') selected @endif>Canada</option>
												<option value="CV"@if ($user->location ==  'CV') selected @endif>Cape Verde</option>
												<option value="KY"@if ($user->location ==  'KY') selected @endif>Cayman Islands</option>
												<option value="CO"@if ($user->location ==  'CO') selected @endif>Colombia</option>
												<option value="KM"@if ($user->location ==  'KM') selected @endif>Comoros</option>
												<option value="CG"@if ($user->location ==  'CG') selected @endif>Congo</option>
												<option value="CK"@if ($user->location ==  'CK') selected @endif>Cook Islands</option>
												<option value="CR"@if ($user->location ==  'CR') selected @endif>Costa Rica</option>
												<option value="CI"@if ($user->location ==  'CI') selected @endif>Côte d'Ivoire</option>
												<option value="HR"@if ($user->location ==  'HR') selected @endif>Croatia</option>
												<option value="CU"@if ($user->location ==  'CU') selected @endif>Cuba</option>
												<option value="CW"@if ($user->location ==  'CW') selected @endif>Curaçao</option>
												<option value="CY"@if ($user->location ==  'CY') selected @endif>Cyprus</option>
												<option value="CZ"@if ($user->location ==  'CZ') selected @endif>Czech Republic</option>
												<option value="DK"@if ($user->location ==  'DK') selected @endif>Denmark</option>
												<option value="DJ"@if ($user->location ==  'DJ') selected @endif>Djibouti</option>
												<option value="DM"@if ($user->location ==  'DM') selected @endif>Dominica</option>
												<option value="DO"@if ($user->location ==  'DO') selected @endif>Dominican Republic</option>
												<option value="EC"@if ($user->location ==  'EC') selected @endif>Ecuador</option>
												<option value="EG"@if ($user->location ==  'EG') selected @endif>Egypt</option>
												<option value="GP"@if ($user->location ==  'GP') selected @endif>Guadeloupe</option>
												<option value="GU"@if ($user->location ==  'GU') selected @endif>Guam</option>
												<option value="GT"@if ($user->location ==  'GT') selected @endif>Guatemala</option>
												<option value="GG"@if ($user->location ==  'GG') selected @endif>Guernsey</option>
												<option value="GN"@if ($user->location ==  'GN') selected @endif>Guinea</option>
												<option value="GW"@if ($user->location ==  'GW') selected @endif>Guinea-Bissau</option>
												<option value="GY"@if ($user->location ==  'GY') selected @endif>Guyana</option>
												<option value="HT"@if ($user->location ==  'HT') selected @endif>Haiti</option>
												<option value="HN"@if ($user->location ==  'HN') selected @endif>Honduras</option>
												<option value="HK"@if ($user->location ==  'HK') selected @endif>Hong Kong</option>
												<option value="HU"@if ($user->location ==  'HU') selected @endif>Hungary</option>
												<option value="IS"@if ($user->location ==  'IS') selected @endif>Iceland</option>
												<option value="IN"@if ($user->location ==  'IN') selected @endif>India</option>
												<option value="ID"@if ($user->location ==  'ID') selected @endif>Indonesia</option>
												<option value="NO"@if ($user->location ==  'NO') selected @endif>Norway</option>
												<option value="OM"@if ($user->location ==  'OM') selected @endif>Oman</option>
												<option value="PK"@if ($user->location ==  'PK') selected @endif>Pakistan</option>
												<option value="PW"@if ($user->location ==  'PW') selected @endif>Palau</option>
												<option value="PA"@if ($user->location ==  'PA') selected @endif>Panama</option>
												<option value="PG"@if ($user->location ==  'PG') selected @endif>Papua New Guinea</option>
												<option value="PY"@if ($user->location ==  'PY') selected @endif>Paraguay</option>
												<option value="PE"@if ($user->location ==  'PE') selected @endif>Peru</option>
												<option value="PH"@if ($user->location ==  'PH') selected @endif>Philippines</option>
												<option value="PN"@if ($user->location ==  'PN') selected @endif>Pitcairn</option>
												<option value="PL"@if ($user->location ==  'PL') selected @endif>Poland</option>
												<option value="PT"@if ($user->location ==  'PT') selected @endif>Portugal</option>
												<option value="PR"@if ($user->location ==  'PR') selected @endif>Puerto Rico</option>
												<option value="QA"@if ($user->location ==  'QA') selected @endif>Qatar</option>
												<option value="RE"@if ($user->location ==  'RE') selected @endif>Réunion</option>
												<option value="RO"@if ($user->location ==  'RO') selected @endif>Romania</option>
												<option value="RU"@if ($user->location ==  'RU') selected @endif>Russian Federation</option>
												<option value="RW"@if ($user->location ==  'RW') selected @endif>Rwanda</option>
												<option value="SZ"@if ($user->location ==  'SZ') selected @endif>Swaziland</option>
												<option value="SE"@if ($user->location ==  'SE') selected @endif>Sweden</option>
												<option value="CH"@if ($user->location ==  'CH') selected @endif>Switzerland</option>
												<option value="TR"@if ($user->location ==  'TR') selected @endif>Turkey</option>
												<option value="TM"@if ($user->location ==  'TM') selected @endif>Turkmenistan</option>
												<option value="TV"@if ($user->location ==  'TV') selected @endif>Tuvalu</option>
												<option value="UG"@if ($user->location ==  'UG') selected @endif>Uganda</option>
												<option value="UA"@if ($user->location ==  'UA') selected @endif>Ukraine</option>
												<option value="GB"@if ($user->location ==  'GB') selected @endif>United Kingdom</option>
												<option value="US" @if ($user->location ==  'US') selected @endif>United States</option>
												<option value="UY"@if ($user->location ==  'UY') selected @endif>Uruguay</option>
												<option value="UZ"@if ($user->location ==  'UZ') selected @endif>Uzbekistan</option>
												<option value="YE"@if ($user->location ==  'YE') selected @endif>Yemen</option>
												<option value="ZM"@if ($user->location ==  'ZM') selected @endif>Zambia</option>
												<option value="ZW"@if ($user->location ==  'ZW') selected @endif>Zimbabwe</option>
												<option value="LB"@if ($user->location ==  'LB') selected @endif>Libya</option>
												<option value="Emirates"@if ($user->location ==  'Emirates') selected @endif>United Arab Emirates</option>
												<option value="Syria"@if ($user->location ==  'Syria') selected @endif>Syria</option>
												<option value="Palestine"@if ($user->location ==  'Palestine') selected @endif>Palestine</option>
											</select>
											@error('nationality')
										    	<div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
										</div>
									</div>

									<div class="col-xl-12">
										<div class="submit-field">
											<h5>{{__('backendIndex.Introduce Yourself')}}</h5>
											<textarea name="description" cols="30" rows="5" class=" ckeditor with-border">{{$user->description}}</textarea>
											@error('description')
										    	<div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
										</div>
									</div>

								</div>
							</li>
						</ul>
						</div>
					</div>
				</div>
				<div class="col-xl-12">
					<div class="col">
								<div class="margin-top-10 margin-bottom-10">
									<h3>{{__('backendIndex.Choose your payment method')}}</h3>
								</div>
								<div class="feedback-yes-no margin-top-0">

									<div class="radio">
										<input id="radio-1" name="radio" type="radio" @if ($bankInfo->payment_type ==  1) checked selected @endif value="1">
										<label for="radio-1"><span class="radio-label"></span> {{__('backendIndex.Bank')}} </label>
										
									</div>

									<div class="radio">
										<input id="radio-2" name="radio" type="radio" @if ($bankInfo->payment_type ==  2) checked selected @endif value="2">
										<label for="radio-2"><span class="radio-label"></span> {{__('backendIndex.Western Union')}}</label>
									</div>
								</div>
								</div>
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-account-circle"></i> {{__('backendIndex.Bank Information')}}</h3>
						</div>
						
						<div class="content with-padding padding-bottom-0">
							
							<div class="row">

								

								<div class="col">
									<div class="row">

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Account Name')}}</h5>
												<input type="text" name="account_name" autocomplete="off" class="with-border" value="{{$bankInfo->account_name}}">
											</div>
											@error('account_name')
										    <div class="alert alert-danger">{{__('backendIndex.required')}}</div>
										@enderror
										</div>

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Account Number')}}</h5>
												<input type="text" class="with-border" autocomplete="off" value="{{$bankInfo->account_name}}" name="account_number">
											</div>
											@error('account_number')
											    <div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
										</div>

										

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Bank Name')}}</h5>
												<input type="text" class="with-border" autocomplete="off" value="{{$bankInfo->bank_name}}" name="bank_name">
											</div>
											@error('bank_name')
											    <div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Bank Address')}}</h5>
												<input type="text" autocomplete="off" class="with-border" value="{{$bankInfo->bank_address}}" name="bank_address">
											</div>
											@error('bank_address')
											    <div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.SWIFT CODE')}}</h5>
												<input type="text" name="swift_code" autocomplete="off" class="with-border" value="{{$bankInfo->swift_code}}">
											</div>
											@error('swift_code')
											    <div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.IBAN NO')}}</h5>
												<input type="text" name="iban_no" autocomplete="off" class="with-border" value="{{$bankInfo->iban_no}}">
											</div>
											@error('iban_no')
											    <div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
										</div>
										
										
									</div>
								</div>
							</div>

						</div>
						<div class="headline">
							<h3><i class="icon-material-outline-account-circle"></i> {{__('backendIndex.Western Union')}}</h3>
						</div>
						<div class="content with-padding padding-bottom-0">
							
							<div class="row">

								

								<div class="col">
									<div class="row">

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Passport No')}}</h5>
												<input type="text" name="passport_no" autocomplete="off" class="with-border" value="{{$bankInfo->passport_no}}">
											</div>
											@error('passport_no')
										    <div class="alert alert-danger">{{__('backendIndex.required')}}</div>
										@enderror
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.National ID Card Photo')}}</h5>
												<div class="uploadButton margin-top-0">
												<input class="uploadButton-input" type="file" accept=" application/pdf" id="upload_pdf" name="national_id_photo" multiple/>
												<label class="uploadButton-button ripple-effect" for="upload_pdf">{{__('backendIndex.Upload Files')}}</label>
												<span class="uploadButton-file-name">{{__('backendIndex.Maximum file size')}}: 10 MB</span>
											</div>
											</div>
											

										</div>
										
										<div class="radio padding-bottom-20">
											<input id="radio-3" name="radio-4" type="radio" required>
											<label for="radio-3"><span class="radio-label"></span>{{__('backendIndex.I agree for the bank transaction, transfer or payment gateway charges to be deducted from my paycheck according to my preferred payment method.')}}</label>
										</div>
										
										
										
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
				
				
				<!-- Button -->
				<div class="col-xl-12">
					<input type="submit" name=""class="button ripple-effect big margin-top-30" value="{{__('backendJob.Save Changes')}}">
					<!-- <a href="#" class="button ripple-effect big margin-top-30">Save Changes</a> -->
				</div>
				</form>
				
													<!-- <form action="{{route('freelancer.add.skill')}}" method="POST">
														@csrf
														<input type="text" name="name" class="keyword-input with-border" placeholder="e.g. Angular, Laravel"/>
														<button type="submit" value="Add">Add</button>
													</form> -->
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

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key=Your_Google_Key=places&callback=initAutocomplete"></script>
    <script>
        $(document).ready(function () {
            $("#latitudeArea").addClass("d-none");
            $("#longtitudeArea").addClass("d-none");
        });
    </script>
    <script>
        google.maps.event.addDomListener(window, 'load', initialize);

        function initialize() {
            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.addListener('place_changed', function () {
                var place = autocomplete.getPlace();
                $('#latitude').val(place.geometry['location'].lat());
                $('#longitude').val(place.geometry['location'].lng());

                $("#latitudeArea").removeClass("d-none");
                $("#longtitudeArea").removeClass("d-none");
            });
        }

    </script>
    <script >
    	$(document).ready(function() {
    		$('.js-example-basic-single').select2();
		});
    </script>
@endsection

@section('title')
{{$user->slug}}
@endsection