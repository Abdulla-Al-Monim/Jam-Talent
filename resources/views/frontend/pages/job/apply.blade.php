@extends('frontend.layout.template')
<!-- title section -->
@section('title')
Jam Talent
@endsection
@section('body-content')
<section>
	<div class="container">
		<div class="row align-items-center my-4">
			<div class="col-12 col-md-6">
        <h1>{{__('home.Build Your Career')}} | {{__('home.Build Your Workforce')}}</h1>
        <p>{{__('home.Our Internship, Apprenticeship, And Scholarship programs are built in partnership with the world’s most innovative tech companies and sponsored by industry leaders.
 Whether you’re just starting out, upskilling, or looking for a career change – there’s an career development program for everyone.')}}</p>
      </div>
      <div class="col-12 col-md-6">
        <img class="img-fluid" src="{{asset('img/img1-1.png')}}" alt="">
      </div>
		</div>
	</div>
</section>
<section style="background: #F2F2F2; padding: 50px 40px;" class="">
	<div class="container">
		<div class="row">
			<div class="col-md-3 ">
				<div style=" color: lightgrey;      /* margin-block-start: 1em; */
    margin-block-end: 1em;
    /* margin-inline-start: 40px; */
    /* margin-inline-end: 40px;">
					<img src="{{asset('img/jam-con/icon-G_S.2.png')}}" width="33.69px;" height="auto;">
				</div>
				<div class="content">
					<p>{{__('home.Jobs for All of Our Talents.')}}</p>
				</div>
			</div>
			<div class="col-md-3 ">
				<div style="       /* margin-block-start: 1em; */
    margin-block-end: 1em;
    /* margin-inline-start: 40px; */
    /* margin-inline-end: 40px;">
					<img src="{{asset('img/jam-con/icon-G_S.1.png')}}"width="33.69px;" height="auto;">
				</div>
				<div class="content">
					<p>{{__('home.Talents for All of Employers')}}</p>
				</div>
			</div>
			<div class="col-md-3 ">
				<div style="
    margin-block-end: 1em;">
					<img src="{{asset('img/jam-con/icon-G_S.3.png')}}"width="33.69px;" height="auto;">
				</div>
				<div class="content" >
					<p>{{__('home.Projects for Education Institutions')}}</p>
				</div>
			</div>
			<div class="col-md-3 ">
				<div style="       /* margin-block-start: 1em; */
    margin-block-end: 1em;
    /* margin-inline-start: 40px; */
    /* margin-inline-end: 40px;">
					<img src="{{asset('img/jam-con/icon-G_S.4.png')}}"width="33.69px;" height="auto;">
				</div>
				<div class="content">
					<p>{{__('home.Skills for national workforce')}}</p>
				</div>
			</div>
		</div>
	</div>
</section>
          

<section class="margin-top-40 margin-bottom-40">
	<div class="container py-5">
		<div class="row">
			<div class="col-md-12">
				<form id="register-account-form"method="POST" action="{{route('apply.store')}}" enctype="multipart/form-data">
					 @csrf
					
					<div class="">
						<div class="row">
							<div class="col-md-6">
								<div class="submit-field">
									<h3>{{__('home.Contact Reason')}}</h3>
									<select class=" with-border selectpicker" data-size="7" title="{{__('home.Employer (Business)')}}" name="contact_reason" style="height: 48px;">
										<option value=" Employer (Business)">{{__('home.Employer (Business)')}} </option>
										<option value="I am a Job Seeker (Talent )">{{__('home.I am a Job Seeker (Talent )')}}
										</option>
										<option value="Educational Institute">{{__('home.Educational Institute')}}</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="submit-field">
									<h3>{{__('home.Interest Type of')}}</h3>
									<select class=" with-border selectpicker" data-size="7" title="{{__('home.Internship')}}" name="interest_type_of" style="height: 48px;">
									<option value="Internship">{{__('home.Internship')}}</option>
									<option value="Apprentership">{{__('home.Apprentership')}}</option>
									<option value="Scholarship">{{__('home.Scholarship')}}</option>
									<option value="Sponsorship">{{__('home.Sponsorship')}}</option>
								</select>
							</div>
							</div>
						</div>
						
						
						<div class="submit-field">
								
						</div>
							
						
						<h3>{{__('home.Name')}} </h3>
						<div class="row">
							<!-- <div class="headline">
								
							</div> -->

							<div class="col-xl-6">

								<div class="submit-field">
									
									<input style="    margin-bottom: -2px;"type="text" name="first_name" class="with-border" value="">
									<p>{{__('home.First')}}</p>
								</div>
							</div>  
							<div class="col-xl-6">
								<div class="submit-field">
									
									<input style="    margin-bottom: -2px;" type="text" name="last_name" class="with-border" value="">
									<p>{{__('home.Last')}}</p>
								</div>
							</div>  
						</div>
						<div class="submit-field">
							<h3>{{__('home.Position')}}</h3>
							<input type="text"style="    margin-bottom: -2px;" name="position" class="with-border" value="">
							<p>{{__('home.Job Title')}}</p>
						</div>
						<div class="submit-field">
							<h3>{{__('home.Organization Name')}}</h3>
							<input style="    margin-bottom: -2px;" type="text" name="organization_name" class="with-border" value="">
							<p>{{__('home.Company name')}}</p>
						</div>
						<div class="submit-field">
							<h3>{{__('home.Office Address')}}</h3>
							<input type="text" name="office_address" class="with-border" value="">
						</div>
						<div class="submit-field">
							<h3>{{__('home.Email')}}</h3>
							<input type="email" name="email" class="with-border" value="">
						</div>
						<div class="submit-field">
							<h3>{{__('home.Website URL Address')}}</h3>
							<input type="text" name="website_url_address" class="with-border" value="">
						</div>
						<div class="submit-field">
							<h3 ><i class="icon-feather-linkedin"style="margin-right: 10px;" class="text-dark"></i>LinkedIn url</h3>
							<input type="text" name="linkedin_url" class="with-border" value="">
						</div>
						<div class="submit-field">
							<h3><i class="icon-line-awesome-behance"style="margin-right: 10px;" class="text-dark"></i>Behance link</h3>
							<input type="text" name="behance_link" class="with-border" value="">
						</div>
						<div class="submit-field">
							<h3><i class="icon-line-awesome-github-alt"style="margin-right: 10px;" class="text-dark"></i>Github link</h3>
							<input type="text" name="github_link" class="with-border" value="">
						</div>
						<div class="submit-field">
							<h3><i class="icon-line-awesome-whatsapp"style="margin-right: 10px;" class="text-dark"></i>{{__('home.Whatsapp Messaging Number')}}</h3>
							<input type="text" name="whatsapp_messaging_number" class="with-border" value="">
						</div>
						<div class="submit-field">
							<h3>{{__('home.Cover Letter')}}</h3>
			
							<textarea cols="30" rows="5" class="with-border ckeditor" name="cover_letter"></textarea>
							<p>{{__('home.Help us decide the fastest way to process your application')}}</p>
						</div>
						<div class="input-group mb-3">
							  <div class="input-group-prepend">
							    <span class="input-group-text">{{__('home.Upload Attachment')}}</span>
							  </div>
							  <div class="custom-file">
							    <input type="file" class="custom-file-input" id="inputGroupFile01" name="file">
							    <label class="custom-file-label" for="inputGroupFile01">{{__('home.CV, Job Requirements, and or Company Profile')}}</label>
							  </div>
							</div>
					
					<input type="submit" name=""class="button full-width button-sliding-icon ripple-effect margin-top-10 icon-material-outline-arrow-right-alt" style="width: 960px;" value="{{__('home.SUBMIT')}}">
					
					<!-- Button -->
					<!-- <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" form="login-form" style="width: 960px;">Register <i class="icon-material-outline-arrow-right-alt"></i></button> -->
				</form>
			</div>
		</div>
	</div>
</section>
<section class="bg-light">
  <div class="container py-5">
    <div class="row">
      <div class="col-12 col-md-4">
        <h1 class="text-center font-weight-light">1,800+</h1>
        <h4 class="text-center font-weight-light my-2">{{__('home.Skills Based Courses')}}</h4>
      </div>
      <div class="col-12 col-md-4">
        <h1 class="text-center font-weight-light">50,000+</h1>
        <h4 class="text-center font-weight-light my-2">{{__('home.Skills Based Jobs')}}</h4>
      </div>
      <div class="col-12 col-md-4">
        <h1 class="text-center font-weight-light">+500</h1>
        <h4 class="text-center font-weight-light my-2">{{__('home.Skills Based Instructors')}}</h4>
      </div>
    </div>
  </div>
</section>
<!-- footer start -->
@include('includes.footer')
<!-- footer end -->
@endsection