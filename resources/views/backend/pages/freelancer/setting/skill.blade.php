<!-- @extends('backend.layout.template') -->
@section('title')
Skills
@endsection
@section('body-content')

<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">Skills</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('backendIndex.Skills')}}</li>
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			@if(Auth::user()->skill)
			<div class="row">
				<form method="POST" action="{{route('freelancer.skill.update')}}" enctype="multipart/form-data">
					@csrf
					<!-- Dashboard Box -->
				
				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-account-circle"></i> {{__('backendIndex.Skills')}}</h3>
						</div>

						<div class="content with-padding padding-bottom-0">

							<div class="row">

								
								<div class="col">
									<div class="row">

										<div class="col-xl-6">
											<div class="submit-field">
												<!-- <h5>{{__('backendIndex.Skill')}}</h5> -->
												<input type="text" name="skill_one" class="with-border" value="{{$skill->skill_one}}">
											</div>
										</div>

										<div class="col-xl-6">
											<div class="submit-field">
												<!-- <h5>{{__('backendIndex.Skill')}}</h5> -->
												<input type="text" class="with-border" value="{{$skill->skill_two}}" name="skill_two">
											</div>
										</div>

										

										<div class="col-xl-6">
											<div class="submit-field">
												<!-- <h5>{{__('backendIndex.Skill')}}</h5> -->
												<input type="text" class="with-border" value="{{$skill->skill_three}}" name="skill_three">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<!-- <h5>{{__('backendIndex.Skill')}}</h5> -->
												<input type="text" name="skill_four" class="with-border" value="{{$skill->skill_four}}">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<!-- <h5>{{__('backendIndex.Skill')}}</h5> -->
												<input type="text" class="with-border" value="{{$skill->skill_five}}" name="skill_five">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<!-- <h5>{{__('backendIndex.Skill')}}</h5> -->
												<input type="text" class="with-border" value="{{$skill->skill_six}}" name="skill_six">
											</div>
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
			</div>
			@else
			<div class="row">
				<form method="POST" action="{{route('freelancer.skill.create')}}" enctype="multipart/form-data">
					@csrf
					<!-- Dashboard Box -->
				
				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-account-circle"></i> Skills</h3>
						</div>

						<div class="content with-padding padding-bottom-0">

							<div class="row">

								
								<div class="col">
									<div class="row">

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>Skill</h5>
												<input type="text" name="skill_one" class="with-border" value="">
											</div>
										</div>

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>Skill</h5>
												<input type="text" class="with-border" value="" name="skill_two">
											</div>
										</div>

										

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>Skill</h5>
												<input type="text" class="with-border" value="" name="skill_three">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>Skill</h5>
												<input type="text" name="skill_four" class="with-border" value="">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>Skill</h5>
												<input type="text" class="with-border" value="" name="skill_five">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>Skill</h5>
												<input type="text" class="with-border" value="" name="skill_six">
											</div>
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
			</div>
			@endif
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
