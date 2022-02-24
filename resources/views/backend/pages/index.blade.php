@extends('backend.layout.template')


<!-- title section -->
@section('title')
{{$user->slug}}
@endsection


@section('body-content')

@if(Auth::user()->user_type_id == 1)
			@if(Auth::user()->status == null)
			<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>{{__('backendIndex.Dashboard')}}</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			<div class="row">
				
				<form method="POST" action="{{route('freelancer.update')}}" enctype="multipart/form-data">
					<div class="col-xl-12">
						<div class=" margin-bottom-20">
							<strong>{{__('backendIndex.First Update Your Profile')}}</strong>
						</div>
					</div>
					
				
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
										<img class="profile-pic" src="" alt="" />
										<div class="upload-button"></div>
										<input class="file-upload" name="image" type="file" accept="image/*"/>
									</div>
								</div>

								<div class="col">
									<div class="row">

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.First Name')}}</h5>
												<input type="text" name="first_name" autocomplete="off" required class="with-border" value="">
											</div>
											@error('first_name')
										    	<div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
										</div>

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Last Name')}}</h5>
												<input autocomplete="off" type="text" class="with-border" required value="" name="last_name">
											</div>
											@error('last_name')
											    <div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
										</div>

										

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Email')}}</h5>
												<input type="text" readonly class="with-border" value="{{Auth::user()->email}}" name="email">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.User Name')}}</h5>
												<input type="text" name="user_name" autocomplete="off" class="with-border" value="">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Language')}}</h5>
												<input type="text" class="with-border" autocomplete="off" value="" name="language" required>
											</div>
											@error('language')
										    	<div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Gender')}}</h5>
											
												<select class="with-border selectpicker" data-size="7" title="gender" required name="gender">
													<option value="1">{{__('backendIndex.male')}}</option>
													<option value="2">{{__('backendIndex.female')}}</option>
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
							<h3><i class="icon-material-outline-face"></i>{{__('backendIndex.My Profile')}} </h3>
						</div>

						<div class="content">
							<ul class="fields-ul">
							<li>
								<div class="row">
									<div class="col-xl-4">
										<div class="submit-field">
											<div class="bidding-widget">
												<!-- Headline -->
												<span class="bidding-detail">{{__('backendIndex.Set your')}} <strong>{{__('backendIndex.minimal hourly rate')}}</strong></span>

												<!-- Slider -->
												<div class="bidding-value margin-bottom-10">$<span id="biddingVal"></span></div>
												<input class="bidding-slider" type="text" value="" name="hourly_rate" data-slider-handle="custom" data-slider-currency="$" data-slider-min="5" data-slider-max="150" data-slider-value="35" data-slider-step="1" data-slider-tooltip="hide" />
											</div>
										</div>
									</div>


									<div class="col-xl-4">
										<div class="submit-field">
											<h5>{{__('backendIndex.Cover Letter')}}</h5>
											
											<!-- Attachments -->
											<!-- <div class="attachments-container margin-top-0 margin-bottom-0">


												
											</div> -->
											<div class="clearfix"></div>
											
											<!-- Upload Button -->
											<div class="uploadButton margin-top-0">
												<input type="text" class="with-border" autocomplete="off" value="" name="file_link" placeholder="{{__('backendIndex.Cover Letter')}} {{__('backendIndex.Link')}}">
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
											
										</div>
									</div>
									<div class="col-xl-4">
										<div class="submit-field">
											<h5>{{__('backendIndex.Recommendation Letters')}}</h5>
											
											<!-- Attachments -->
											<!-- <div class="attachments-container margin-top-0 margin-bottom-0">


												
											</div> -->
											<div class="clearfix"></div>
											
											<!-- Upload Button -->
											<div class="uploadButton margin-top-0">
												<input type="text" class="with-border" autocomplete="off" value="" name="recommendation_letter_link" placeholder="{{__('backendIndex.Recommendation Letters')}} {{__('backendIndex.Link')}}">
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
									<div class="col-xl-4">
										<div class="submit-field">
											<h5>{{__('backendIndex.Portfolio')}}</h5>
											
											<!-- Attachments -->
											<!-- <div class="attachments-container margin-top-0 margin-bottom-0">


												
											</div> -->
											<div class="clearfix"></div>
											
											<!-- Upload Button -->
											<div class="uploadButton margin-top-0">
												<input type="text" class="with-border" autocomplete="off" value="" name="portfolio_link" placeholder="{{__('backendIndex.Portfolio')}} {{__('backendIndex.Link')}}">
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
									<div class="col-xl-4">
										<div class="submit-field">
											<h5>{{__('backendIndex.CV')}}</h5>
											
											<!-- Attachments -->
											<!-- <div class="attachments-container margin-top-0 margin-bottom-0">


												
											</div> -->
											<div class="clearfix"></div>
											
											<!-- Upload Button -->
											<div class="uploadButton margin-top-0">
												<input type="text" class="with-border" value="" name="cv_link" autocomplete="off" placeholder="{{__('backendIndex.CV')}} {{__('backendIndex.Link')}}">
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
									<div class="col-xl-4">
										<div class="submit-field">
											<h5>{{__('backendIndex.Qualification Certificates')}}</h5>
											
											<!-- Attachments -->
											<!-- <div class="attachments-container margin-top-0 margin-bottom-0">


												
											</div> -->
											<div class="clearfix"></div>
											
											<!-- Upload Button -->
											<div class="uploadButton margin-top-0">
												<input type="text" class="with-border" autocomplete="off" value="" name="qualification_certificate_link" placeholder="{{__('backendIndex.Qualification Certificates')}} {{__('backendIndex.Link')}}">
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
											<input type="text" class="with-border" autocomplete="off" required value="" name="sort_description" autocomplete="off">
										</div>
										@error('sort_description')
										    	<div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
									</div>

									<div class="col-xl-6">
										<div class="submit-field">
											<h5>{{__('backendIndex.Nationality')}}</h5>
											<select class=" with-border selectpicker" name="location" required data-size="7" title="Nationality" data-live-search="true">
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
												<option value="LB">Libya</option>
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
												<option value="US">United States</option>
												<option value="UY">Uruguay</option>
												<option value="UZ">Uzbekistan</option>
												<option value="YE">Yemen</option>
												<option value="ZM">Zambia</option>
												<option value="ZW">Zimbabwe</option>
												<option value="Emirates">United Arab Emirates</option>
												<option value="Syria">Syria</option>
												<option value="Palestine">Palestine</option>
												<option value="LB">Libya</option>
											</select>
										</div>
										@error('location')
										    	<div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
									</div>
									

									<div class="col-xl-12">
										<div class="submit-field">
											<h5>{{__('backendIndex.Introduce Yourself')}}</h5>
											<textarea required name="description" cols="30" rows="5" class=" ckeditor with-border"></textarea>
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
				<div class="col-xl-12">
					<div class="col">
								<div class="margin-top-10 margin-bottom-10">
									<h3>{{__('backendIndex.Choose your payment method')}}</h3>
								</div>
								<div class="feedback-yes-no margin-top-0">

									<div class="radio">
										<input id="radio-1" name="radio" type="radio" checked selected value="1">
										<label for="radio-1"><span class="radio-label"></span>{{__('backendIndex.Bank')}}  </label>
										
									</div>

									<div class="radio">
										<input id="radio-2" name="radio" type="radio" value="2">
										<label for="radio-2"><span class="radio-label"></span>{{__('backendIndex.Western Union')}} </label>
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
												<input type="text" name="account_name" autocomplete="off" class="with-border" value="">
											</div>
											@error('account_name')
										    <div class="alert alert-danger">{{__('backendIndex.required')}}</div>
										@enderror
										</div>

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Account Number')}}</h5>
												<input type="text" autocomplete="off" class="with-border" value="" name="account_number">
											</div>
											@error('account_number')
											    <div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
										</div>

										

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Bank Name')}}</h5>
												<input type="text" class="with-border"  autocomplete="off" value="" name="bank_name">
											</div>
											@error('bank_name')
											    <div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Bank Address')}}</h5>
												<input type="text" autocomplete="off" class="with-border" value="" name="bank_address">
											</div>
											@error('bank_address')
											    <div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.SWIFT CODE')}}</h5>
												<input type="text" name="swift_code" autocomplete="off" class="with-border" value="">
											</div>
											@error('swift_code')
											    <div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.IBAN NO')}}</h5>
												<input type="text" name="iban_no" class="with-border" autocomplete="off" value="">
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
							<h3><i class="icon-material-outline-account-circle"></i>{{__('backendIndex.Western Union')}} </h3>
						</div>
						<div class="content with-padding padding-bottom-0">
							
							<div class="row">

								

								<div class="col">
									<div class="row">

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Passport No')}}</h5>
												<input type="text" name="passport_no" autocomplete="off" class="with-border" value="">
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
											@error('national_id_photo')
											    <div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror

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
					<input type="submit" name=""class="button ripple-effect big margin-top-30" value="Save Changes">
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
			@else

	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				@if(Auth::user()->full_name == null)
				<h3>{{__('backendIndex.Unknown')}}</h3>
				@else
				<h3>{{Auth::user()->full_name}}</h3>
				@endif
				
				<span>{{__('backendIndex.We are glad to see you again!')}}</span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li>{{__('backendIndex.Dashboard')}}</li>
					</ul>
				</nav>
			</div>
	
			<!-- Fun Facts Container -->
			<div class="fun-facts-container">
				<div class="fun-fact" data-fun-fact-color="#36bd78">
					<div class="fun-fact-text">
						@if(Auth::user()->user_type_id == 1)
							<span>{{__('backendIndex.Complete Order')}}</span>
							@php 
								$count = App\Models\Backend\Order::where('freelancer_id',Auth::user()->id)->where('status',3)->count();
							@endphp
							
							<h4>{{ $count }}</h4>
						@elseif(Auth::user()->user_type_id == 3)
						<span>{{__('backendIndex.Tasks Posted')}}</span>
						@php
							$count = App\Models\Backend\Task::where('employer_id',Auth::user()->id)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 2)
						<span>{{__('backendIndex.Tasks Posted')}}</span>
						@php
							$count = App\Models\Backend\Task::count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 0)
						<span>{{__('backendIndex.Tasks Posted')}}</span>
						@php
							$count = App\Models\Backend\Task::count();
						@endphp
						<h4>{{$count}}</h4>
						@endif
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-gavel"></i></div>
				</div>
				<div class="fun-fact" data-fun-fact-color="#b81b7f">
					<div class="fun-fact-text">
						@if(Auth::user()->user_type_id == 1)
						<span>{{__('backendIndex.Jobs Applied')}}</span>
						@php
							$count = App\Models\Backend\JobApply::where('freelancer_id',Auth::user()->id)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 3)
						<span>{{__('backendIndex.Jobs Posted')}}</span>
						@php
							$count = App\Models\Backend\Job::where('user_id',Auth::user()->id)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 2)
						<span>{{__('backendIndex.Jobs Posted')}}</span>
						@php
							$count = App\Models\Backend\Job::count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 0)
						<span>{{__('backendIndex.Jobs Posted')}}</span>
						@php
							$count = App\Models\Backend\Job::count();
						@endphp
						<h4>{{$count}}</h4>
						@endif
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i></div>
				</div>
				<div class="fun-fact" data-fun-fact-color="#efa80f">
					<div class="fun-fact-text">
						@if(Auth::user()->user_type_id == 1)
						@php
							$count = App\Models\Backend\TaskApply::where('freelancer_id',Auth::user()->id)->count();
						@endphp
						<span>{{__('backendIndex.Task Applied')}}</span>
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 3)
						<span>{{__('backendIndex.Reviews')}}</span>
						@php
							$count = App\Models\Backend\ReviewEmployer::where('user_id',Auth::user()->id)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 2)
						<span>{{__('backendIndex.All Freelancers')}}</span>
						@php
							$count = App\Models\User::where('user_type_id',1)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 0)
						<span>{{__('backendIndex.All Freelancers')}}All Freelancers</span>
						@php
							$count = App\Models\User::where('user_type_id',1)->count();
						@endphp
						<h4>{{$count}}</h4>
						@endif
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-rate-review"></i></div>
				</div>

				<!-- Last one has to be hidden below 1600px, sorry :( -->
				<div class="fun-fact" data-fun-fact-color="#2a41e6">
					<div class="fun-fact-text">
						@if(Auth::user()->user_type_id == 1)
						@php
							$count = App\Models\Backend\Order::where('freelancer_id',Auth::user()->id)->where('status',5)->count();
						@endphp
						<span>{{__('backendIndex.Cancel Orders')}}</span>
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 3)
						<span>{{__('backendIndex.Order Completed')}}</span>
						@php
						$count = App\Models\Backend\Order::where('employer_id',Auth::user()->id)->where('status',3)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 2)
						<span>{{__('backendIndex.Employers')}}</span>
						@php
							$count = App\Models\User::where('user_type_id',3)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 0)
						<span>{{__('backendIndex.Employers')}}</span>
						@php
							$count = App\Models\User::where('user_type_id',3)->count();
						@endphp
						<h4>{{$count}}</h4>

						@endif
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-gavel"></i></div>
				</div>
			</div>
			
			<!-- Row -->
			<div class="row">

				<!-- <div class="col-xl-4">
					<div class="dashboard-box child-box-in-row">
						<div class="fun-fact" data-fun-fact-color="#efa80f">
					<div class="fun-fact-text">
						@if(Auth::user()->user_type_id == 1)
						@php
							$count = App\Models\Backend\ReviewFreelancer::where('user_id',Auth::user()->id)->count();
						@endphp
						<span>Reviews</span>
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 3)
						<span>Reviews</span>
						@php
							$count = App\Models\Backend\ReviewEmployer::where('user_id',Auth::user()->id)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 2)
						<span>All Freelancers</span>
						@php
							$count = App\Models\User::where('user_type_id',1)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 0)
						<span>All Freelancers</span>
						@php
							$count = App\Models\User::where('user_type_id',1)->count();
						@endphp
						<h4>{{$count}}</h4>
						@endif
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-rate-review"></i></div>
				</div>
					</div>
				</div> -->
				<div class="col-xl-4">

					<!-- Dashboard Box -->
					<!-- If you want adjust height of two boxes 
						 add to the lower box 'main-box-in-row' 
						 and 'child-box-in-row' to the higher box -->
					<div class="dashboard-box child-box-in-row"> 
						<div class="headline">
							<h3><i class="icon-material-outline-note-add"></i>{{__('backendIndex.Notes')}} </h3>
						</div>	
						
						<div class="dashboard-box-scrollbar" style="max-height: 360px" data-simplebar="init"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 159px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;"><div class="content with-padding">
							<!-- Note -->
							@foreach($user->notes as $note)
							<div class="dashboard-note">
								<p>{{$note->note}}</p>
								<div class="note-footer">
									@if($note->priority == 2)
									<span class="note-priority high">{{__('backendIndex.High Priority')}}</span>
									@elseif($note->priority == 1)
									<span class="note-priority medium">{{__('backendIndex.Medium Priority')}}</span>
									@else
									<span class="note-priority low">{{__('backendIndex.Low Priority')}}</span>
									@endif
									
									<div class="note-buttons">
										
										<form class="" method="POST" action="{{route('note.delete',$note->id)}}">
											@csrf
											<!-- <a href="#" data-tippy-placement="top" data-tippy="" data-original-title="Edit"><i class="icon-feather-edit"></i></a> -->
											<button href="#" data-tippy-placement="top" data-tippy="" data-original-title="Remove"><i class="icon-feather-trash-2" type="submit"></i></button> 
										</form>
										
									</div>
								</div>
							</div>
							@endforeach
							
						</div></div></div></div>

							<div class="add-note-button">
								<a href="#small-dialog" class="popup-with-zoom-anim button full-width button-sliding-icon" style="width: 278.656px;">{{__('backendIndex.Add Note')}} <i class="icon-material-outline-arrow-right-alt"></i></a>
								<!-- Add note pop up
								================================================== -->
								<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

									<!--Tabs -->
									<div class="sign-in-form">

										<ul class="popup-tabs-nav">
											<li><a href="#tab">{{__('backendIndex.Add Note')}}</a></li>
										</ul>

										<div class="popup-tabs-container">

											<!-- Tab -->
											<div class="popup-tab-content" id="tab">
												
												<!-- Welcome Text -->
												<div class="welcome-text">
													<h3>{{__('backendIndex.Do Not Forget')}} 😎</h3>
												</div>
													
												<!-- Form -->
												<form method="POST" id="add-note" action="{{route('note.add')}}">
													@csrf

													<select class=" with-border default margin-bottom-20 selectpicker" data-size="7" title="Priority" name="priority">
														<option value="0" selected>{{__('backendIndex.Low Priority')}}</option>
														<option value="1">{{__('backendIndex.Medium Priority')}}</option>
														<option value="2">{{__('backendIndex.High Priority')}}</option>
													</select>

													<textarea cols="10" placeholder="{{__('backendIndex.Note')}}" class="with-border" name="note"></textarea>
													<!-- Button -->
													<button class="button full-width button-sliding-icon ripple-effect" type="submit" form="add-note">{{__('backendIndex.Add Note')}} <i class="icon-material-outline-arrow-right-alt"></i></button>

												</form>
												
												

											</div>

										</div>
									</div>
								</div>
								<!-- Add note  popup / End -->
							</div>
					</div>
					<!-- Dashboard Box / End -->
				</div>
			</div>
			<!-- Row / End -->

			
			@include('includes.dashboardFooter')

		</div>
	</div>
	<!-- Dashboard Content / End -->

	@endif
	@elseif(Auth::user()->user_type_id == 3)

	@if(Auth::user()->status == null)
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Settings</h3>

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
						<div class=" margin-bottom-20">
							<strong>{{__('backendIndex.First Update Your Profile')}}</strong>
						</div>
					</div>
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-account-circle"></i>{{__('backendIndex.My Account')}} </h3>
						</div>

						<div class="content with-padding padding-bottom-0">

							<div class="row">

								<div class="col-auto">
									<div class="avatar-wrapper" data-tippy-placement="bottom" title="Change Avatar">
										<img class="profile-pic" src="" alt="" />
										<div class="upload-button"></div>
										<input class="file-upload" name="image" type="file" accept="image/*"/>
									</div>
								</div>

								<div class="col">
									<div class="row">

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.First Name')}}</h5>
												<input type="text" required name="first_name" autocomplete="off" class="with-border" value="">
											</div>
											@error('first_name')
										    	<div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
										</div>

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Last Name')}}</h5>
												<input type="text" required autocomplete="off" class="with-border" name="last_name" value="">
											</div>
											@error('last_name')
											    <div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
										</div>

										

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Email')}}</h5>
												<input type="text" readonly class="with-border" value="{{Auth::user()->email}}" name="email">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.User Name')}}</h5>
												<input  type="text" name="user_name" autocomplete="off" class="with-border" value="">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Language')}}</h5>
												<input type="text" required class="with-border" autocomplete="off" value="" name="language">
											</div>
											@error('language')
											    <div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>{{__('backendIndex.Gender')}}</h5>
											
												<select class="with-border selectpicker" data-size="7" required title="gender" name="gender">
													<option value="1" >{{__('backendIndex.male')}}</option>
													<option value="2" >{{__('backendIndex.female')}}</option>
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
							<h3><i class="icon-material-outline-face"></i>{{__('backendIndex.My Profile')}} </h3>
						</div>

						<div class="content">
							<ul class="fields-ul">
							<li>
								<div class="row">
									<div class="col-xl-6">
										<div class="submit-field">
											<h5>{{__('backendIndex.Tagline')}}</h5>
											<input type="text" required class="with-border" value="" name="sort_description">
										</div>
										@error('sort_description')
											    <div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
									</div>

									<div class="col-xl-6">
										<div class="submit-field">
											<h5>{{__('backendIndex.Nationality')}}</h5>
											<select class="selectpicker with-border" name="location" required data-size="7" title="Nationality" data-live-search="true">
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
												<option value="LB">Libya</option>
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
												<option value="US" >United States</option>
												<option value="UY">Uruguay</option>
												<option value="UZ">Uzbekistan</option>
												<option value="YE">Yemen</option>
												<option value="ZM">Zambia</option>
												<option value="ZW">Zimbabwe</option>
												<option value="Emirates">United Arab Emirates</option>
												<option value="Syria">Syria</option>
												<option value="Palestine">Palestine</option>
												<option value="LB">Libya</option>
											</select>
										</div>
										@error('location')
											    <div class="alert alert-danger">{{__('backendIndex.required')}}</div>
											@enderror
									</div>
									<div class="col-xl-12">
										<div class="submit-field">
											<h5>{{__('backendIndex.Introduce Yourself')}} </h5>
											<textarea name="description" required cols="30" rows="5" class=" ckeditor with-border"></textarea>
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
					<input type="submit" name=""class="button ripple-effect big margin-top-30" value="Save Changes">
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
	@else
	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				@if(Auth::user()->full_name == null)
				<h3>{{__('backendIndex.Unknown')}}</h3>
				@else
				<h3>{{Auth::user()->full_name}}</h3>
				@endif
				
				<span>{{__('backendIndex.We are glad to see you again!')}}</span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li>{{__('backendIndex.Dashboard')}}</li>
					</ul>
				</nav>
			</div>
	
			<!-- Fun Facts Container -->
			<div class="fun-facts-container">
				<div class="fun-fact" data-fun-fact-color="#36bd78">
					<div class="fun-fact-text">
						@if(Auth::user()->user_type_id == 1)
							<span>{{__('backendIndex.Complete Order')}}</span>
							@php 
								$count = App\Models\Backend\Order::where('freelancer_id',Auth::user()->id)->where('status',3)->count();
							@endphp
							
							<h4>{{ $count }}</h4>
						@elseif(Auth::user()->user_type_id == 3)
						<span>{{__('backendIndex.Tasks Posted')}}</span>
						@php
							$count = App\Models\Backend\Task::where('employer_id',Auth::user()->id)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 2)
						<span>{{__('backendIndex.Tasks Posted')}}</span>
						@php
							$count = App\Models\Backend\Task::count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 0)
						<span>{{__('backendIndex.Tasks Posted')}}</span>
						@php
							$count = App\Models\Backend\Task::count();
						@endphp
						<h4>{{$count}}</h4>
						@endif
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-gavel"></i></div>
				</div>
				<div class="fun-fact" data-fun-fact-color="#b81b7f">
					<div class="fun-fact-text">
						@if(Auth::user()->user_type_id == 1)
						<span>{{__('backendIndex.Jobs Applied')}}</span>
						@php
							$count = App\Models\Backend\JobApply::where('freelancer_id',Auth::user()->id)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 3)
						<span>{{__('backendIndex.Jobs Posted')}}</span>
						@php
							$count = App\Models\Backend\Job::where('user_id',Auth::user()->id)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 2)
						<span>{{__('backendIndex.Jobs Posted')}}</span>
						@php
							$count = App\Models\Backend\Job::count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 0)
						<span>{{__('backendIndex.Jobs Posted')}}</span>
						@php
							$count = App\Models\Backend\Job::count();
						@endphp
						<h4>{{$count}}</h4>
						@endif
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i></div>
				</div>
				<div class="fun-fact" data-fun-fact-color="#efa80f">
					<div class="fun-fact-text">
						@if(Auth::user()->user_type_id == 1)
						@php
							$count = App\Models\Backend\TaskApply::where('freelancer_id',Auth::user()->id)->count();
						@endphp
						<span>{{__('backendIndex.Task Applied')}}</span>
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 3)
						<span>{{__('backendIndex.Reviews')}}</span>
						@php
							$count = App\Models\Backend\ReviewEmployer::where('user_id',Auth::user()->id)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 2)
						<span>{{__('backendIndex.All Freelancers')}}</span>
						@php
							$count = App\Models\User::where('user_type_id',1)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 0)
						<span>{{__('backendIndex.All Freelancers')}}</span>
						@php
							$count = App\Models\User::where('user_type_id',1)->count();
						@endphp
						<h4>{{$count}}</h4>
						@endif
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-rate-review"></i></div>
				</div>

				<!-- Last one has to be hidden below 1600px, sorry :( -->
				<div class="fun-fact" data-fun-fact-color="#2a41e6">
					<div class="fun-fact-text">
						@if(Auth::user()->user_type_id == 1)
						@php
							$count = App\Models\Backend\Order::where('freelancer_id',Auth::user()->id)->where('status',5)->count();
						@endphp
						<span>{{__('backendIndex.Cancel Order')}}</span>
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 3)
						<span>{{__('backendIndex.Order Completed')}} </span>
						@php
						$count = App\Models\Backend\Order::where('employer_id',Auth::user()->id)->where('status',3)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 2)
						<span>{{__('backendIndex.Employers')}}</span>
						@php
							$count = App\Models\User::where('user_type_id',3)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 0)
						<span>{{__('backendIndex.Employers')}}</span>
						@php
							$count = App\Models\User::where('user_type_id',3)->count();
						@endphp
						<h4>{{$count}}</h4>

						@endif
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-gavel"></i></div>
				</div>
			</div>
			
			<!-- Row -->
			<div class="row">

				<!-- <div class="col-xl-4">
					<div class="dashboard-box child-box-in-row">
						<div class="fun-fact" data-fun-fact-color="#efa80f">
					<div class="fun-fact-text">
						@if(Auth::user()->user_type_id == 1)
						@php
							$count = App\Models\Backend\ReviewFreelancer::where('user_id',Auth::user()->id)->count();
						@endphp
						<span>Reviews</span>
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 3)
						<span>Reviews</span>
						@php
							$count = App\Models\Backend\ReviewEmployer::where('user_id',Auth::user()->id)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 2)
						<span>All Freelancers</span>
						@php
							$count = App\Models\User::where('user_type_id',1)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 0)
						<span>All Freelancers</span>
						@php
							$count = App\Models\User::where('user_type_id',1)->count();
						@endphp
						<h4>{{$count}}</h4>
						@endif
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-rate-review"></i></div>
				</div>
					</div>
				</div> -->
				<div class="col-xl-4">

					<!-- Dashboard Box -->
					<!-- If you want adjust height of two boxes 
						 add to the lower box 'main-box-in-row' 
						 and 'child-box-in-row' to the higher box -->
					<div class="dashboard-box child-box-in-row"> 
						<div class="headline">
							<h3><i class="icon-material-outline-note-add"></i>{{__('backendIndex.Notes')}}</h3>
						</div>	
						
						<div class="dashboard-box-scrollbar" style="max-height: 360px" data-simplebar="init"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 159px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;"><div class="content with-padding">
							<!-- Note -->
							@foreach($user->notes as $note)
							<div class="dashboard-note">
								<p>{{$note->note}}</p>
								<div class="note-footer">
									@if($note->priority == 2)
									<span class="note-priority high">{{__('backendIndex.High Priority')}}</span>
									@elseif($note->priority == 1)
									<span class="note-priority medium">{{__('backendIndex.Medium Priority')}}</span>
									@else
									<span class="note-priority low">{{__('backendIndex.Low Priority')}}</span>
									@endif
									
									<div class="note-buttons">
										
										<form class="" method="POST" action="{{route('note.delete',$note->id)}}">
											@csrf
											<!-- <a href="#" data-tippy-placement="top" data-tippy="" data-original-title="Edit"><i class="icon-feather-edit"></i></a> -->
											<button href="#" data-tippy-placement="top" data-tippy="" data-original-title="Remove"><i class="icon-feather-trash-2" type="submit"></i></button> 
										</form>
										
									</div>
								</div>
							</div>
							@endforeach
							
						</div></div></div></div>

							<div class="add-note-button">
								<a href="#small-dialog" class="popup-with-zoom-anim button full-width button-sliding-icon" style="width: 278.656px;">{{__('backendIndex.Add Note')}} <i class="icon-material-outline-arrow-right-alt"></i></a>
								<!-- Add note pop up
								================================================== -->
								<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

									<!--Tabs -->
									<div class="sign-in-form">

										<ul class="popup-tabs-nav">
											<li><a href="#tab">{{__('backendIndex.Add Note')}}</a></li>
										</ul>

										<div class="popup-tabs-container">

											<!-- Tab -->
											<div class="popup-tab-content" id="tab">
												
												<!-- Welcome Text -->
												<div class="welcome-text">
													<h3>{{__('backendIndex.Do Not Forget')}} 😎</h3>
												</div>
													
												<!-- Form -->
												<form method="POST" id="add-note" action="{{route('note.add')}}">
													@csrf

													<select class=" with-border default margin-bottom-20 selectpicker" data-size="7" title="Priority" name="priority">
														<option value="0" selected>{{__('backendIndex.Low Priority')}}</option>
														<option value="1">{{__('backendIndex.Medium Priority')}}</option>
														<option value="2">{{__('backendIndex.High Priority')}}</option>
													</select>

													<textarea cols="10" placeholder="{{__('backendIndex.Note')}}" class="with-border" name="note"></textarea>
													<!-- Button -->
													<button class="button full-width button-sliding-icon ripple-effect" type="submit" form="add-note">{{__('backendIndex.Add Note')}} <i class="icon-material-outline-arrow-right-alt"></i></button>

												</form>
												
												

											</div>

										</div>
									</div>
								</div>
								<!-- Add note  popup / End -->
							</div>
					</div>
					<!-- Dashboard Box / End -->
				</div>
			</div>
			<!-- Row / End -->

			
			@include('includes.dashboardFooter')

		</div>
	</div>
	<!-- Dashboard Content / End -->
	@endif
	@else
	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				@if(Auth::user()->full_name == null)
				<h3>{{__('backendIndex.Unknown')}}</h3>
				@else
				<h3>{{Auth::user()->full_name}}</h3>
				@endif
				
				<span>{{__('backendIndex.We are glad to see you again!')}}</span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li>{{__('backendIndex.Dashboard')}}</li>
					</ul>
				</nav>
			</div>
	
			<!-- Fun Facts Container -->
			<div class="fun-facts-container">
				<div class="fun-fact" data-fun-fact-color="#36bd78">
					<div class="fun-fact-text">
						@if(Auth::user()->user_type_id == 1)
							<span>{{__('backendIndex.Complete Order')}}</span>
							@php 
								$count = App\Models\Backend\Order::where('freelancer_id',Auth::user()->id)->where('status',3)->count();
							@endphp
							
							<h4>{{ $count }}</h4>
						@elseif(Auth::user()->user_type_id == 3)
						<span>{{__('backendIndex.Tasks Posted')}}</span>
						@php
							$count = App\Models\Backend\Task::where('employer_id',Auth::user()->id)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 2)
						<span>{{__('backendIndex.Tasks Posted')}}</span>
						@php
							$count = App\Models\Backend\Task::count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 0)
						<span>{{__('backendIndex.Tasks Posted')}}</span>
						@php
							$count = App\Models\Backend\Task::count();
						@endphp
						<h4>{{$count}}</h4>
						@endif
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-gavel"></i></div>
				</div>
				<div class="fun-fact" data-fun-fact-color="#b81b7f">
					<div class="fun-fact-text">
						@if(Auth::user()->user_type_id == 1)
						<span>Jobs Applied</span>
						@php
							$count = App\Models\Backend\JobApply::where('freelancer_id',Auth::user()->id)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 3)
						<span>{{__('backendIndex.Jobs Posted')}}</span>
						@php
							$count = App\Models\Backend\Job::where('user_id',Auth::user()->id)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 2)
						<span>{{__('backendIndex.Jobs Posted')}}</span>
						@php
							$count = App\Models\Backend\Job::count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 0)
						<span>{{__('backendIndex.Jobs Posted')}}</span>
						@php
							$count = App\Models\Backend\Job::count();
						@endphp
						<h4>{{$count}}</h4>
						@endif
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i></div>
				</div>
				<div class="fun-fact" data-fun-fact-color="#efa80f">
					<div class="fun-fact-text">
						@if(Auth::user()->user_type_id == 1)
						@php
							$count = App\Models\Backend\TaskApply::where('freelancer_id',Auth::user()->id)->count();
						@endphp
						<span>{{__('backendIndex.Task Applied')}}</span>
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 3)
						<span>Reviews</span>
						@php
							$count = App\Models\Backend\ReviewEmployer::where('user_id',Auth::user()->id)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 2)
						<span>{{__('backendIndex.All Freelancers')}}</span>
						@php
							$count = App\Models\User::where('user_type_id',1)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 0)
						<span>{{__('backendIndex.All Freelancers')}}</span>
						@php
							$count = App\Models\User::where('user_type_id',1)->count();
						@endphp
						<h4>{{$count}}</h4>
						@endif
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-rate-review"></i></div>
				</div>

				<!-- Last one has to be hidden below 1600px, sorry :( -->
				<div class="fun-fact" data-fun-fact-color="#2a41e6">
					<div class="fun-fact-text">
						@if(Auth::user()->user_type_id == 1)
						@php
							$count = App\Models\Backend\Order::where('freelancer_id',Auth::user()->id)->where('status',5)->count();
						@endphp
						<span>{{__('backendIndex.Cancel Order')}}</span>
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 3)
						<span>{{__('backendIndex.Order Completed')}}</span>
						@php
						$count = App\Models\Backend\Order::where('employer_id',Auth::user()->id)->where('status',3)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 2)
						<span>{{__('backendIndex.Employers')}}</span>
						@php
							$count = App\Models\User::where('user_type_id',3)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 0)
						<span>{{__('backendIndex.Employers')}}</span>
						@php
							$count = App\Models\User::where('user_type_id',3)->count();
						@endphp
						<h4>{{$count}}</h4>

						@endif
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-gavel"></i></div>
				</div>
			</div>
			
			<!-- Row -->
			<div class="row">

				<!-- <div class="col-xl-4">
					<div class="dashboard-box child-box-in-row">
						<div class="fun-fact" data-fun-fact-color="#efa80f">
					<div class="fun-fact-text">
						@if(Auth::user()->user_type_id == 1)
						@php
							$count = App\Models\Backend\ReviewFreelancer::where('user_id',Auth::user()->id)->count();
						@endphp
						<span>Reviews</span>
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 3)
						<span>Reviews</span>
						@php
							$count = App\Models\Backend\ReviewEmployer::where('user_id',Auth::user()->id)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 2)
						<span>All Freelancers</span>
						@php
							$count = App\Models\User::where('user_type_id',1)->count();
						@endphp
						<h4>{{$count}}</h4>
						@elseif(Auth::user()->user_type_id == 0)
						<span>All Freelancers</span>
						@php
							$count = App\Models\User::where('user_type_id',1)->count();
						@endphp
						<h4>{{$count}}</h4>
						@endif
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-rate-review"></i></div>
				</div>
					</div>
				</div> -->
				<div class="col-xl-4">

					<!-- Dashboard Box -->
					<!-- If you want adjust height of two boxes 
						 add to the lower box 'main-box-in-row' 
						 and 'child-box-in-row' to the higher box -->
					<div class="dashboard-box child-box-in-row"> 
						<div class="headline">
							<h3><i class="icon-material-outline-note-add"></i>{{__('backendIndex.Notes')}} </h3>
						</div>	
						
						<div class="dashboard-box-scrollbar" style="max-height: 360px" data-simplebar="init"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 159px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;"><div class="content with-padding">
							<!-- Note -->
							@foreach($user->notes as $note)
							<div class="dashboard-note">
								<p>{{$note->note}}</p>
								<div class="note-footer">
									@if($note->priority == 2)
									<span class="note-priority high">{{__('backendIndex.High Priority')}}</span>
									@elseif($note->priority == 1)
									<span class="note-priority medium">{{__('backendIndex.Medium Priority')}}</span>
									@else
									<span class="note-priority low">{{__('backendIndex.Low Priority')}}</span>
									@endif
									
									<div class="note-buttons">
										
										<form class="" method="POST" action="{{route('note.delete',$note->id)}}">
											@csrf
											<!-- <a href="#" data-tippy-placement="top" data-tippy="" data-original-title="Edit"><i class="icon-feather-edit"></i></a> -->
											<button href="#" data-tippy-placement="top" data-tippy="" data-original-title="Remove"><i class="icon-feather-trash-2" type="submit"></i></button> 
										</form>
										
									</div>
								</div>
							</div>
							@endforeach
							
						</div></div></div></div>

							<div class="add-note-button">
								<a href="#small-dialog" class="popup-with-zoom-anim button full-width button-sliding-icon" style="width: 278.656px;">{{__('backendIndex.Add Note')}} <i class="icon-material-outline-arrow-right-alt"></i></a>
								<!-- Add note pop up
								================================================== -->
								<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

									<!--Tabs -->
									<div class="sign-in-form">

										<ul class="popup-tabs-nav">
											<li><a href="#tab">{{__('backendIndex.Add Note')}}</a></li>
										</ul>

										<div class="popup-tabs-container">

											<!-- Tab -->
											<div class="popup-tab-content" id="tab">
												
												<!-- Welcome Text -->
												<div class="welcome-text">
													<h3>{{__('backendIndex.Do Not Forget')}} 😎</h3>
												</div>
													
												<!-- Form -->
												<form method="POST" id="add-note" action="{{route('note.add')}}">
													@csrf

													<select class=" with-border default margin-bottom-20 selectpicker" data-size="7" title="Priority" name="priority">
														<option value="0" selected>{{__('backendIndex.Low Priority')}}</option>
														<option value="1">{{__('backendIndex.Medium Priority')}}</option>
														<option value="2">{{__('backendIndex.High Priority')}}</option>
													</select>

													<textarea cols="10" placeholder="{{__('backendIndex.Note')}}" class="with-border" name="note"></textarea>
													<!-- Button -->
													<button class="button full-width button-sliding-icon ripple-effect" type="submit" form="add-note">{{__('backendIndex.Add Note')}} <i class="icon-material-outline-arrow-right-alt"></i></button>

												</form>
												
												

											</div>

										</div>
									</div>
								</div>
								<!-- Add note  popup / End -->
							</div>
					</div>
					<!-- Dashboard Box / End -->
				</div>
			</div>
			<!-- Row / End -->

			
			@include('includes.dashboardFooter')

		</div>
	</div>
	<!-- Dashboard Content / End -->
@endif
@endsection