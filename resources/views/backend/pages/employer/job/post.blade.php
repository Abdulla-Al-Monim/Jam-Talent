@extends('backend.layout.template')
@section('title')
{{__('backendJob.post a job')}}
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 549px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 191px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 549px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">{{__('backendJob.post a job')}}</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('backendJob.post a job')}}</li>
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<form method="POST" action="{{route('job.store')}}" enctype="multipart/form-data">
						
						@csrf
						<div class="dashboard-box margin-top-0">

							<!-- Headline -->
							<div class="headline">
								<h3><i class="icon-feather-folder-plus"></i>{{__('backendJob.Job Submission Form')}} </h3>
							</div>
							
							<div class="content with-padding padding-bottom-10">
								<div class="row">

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>{{__('backendJob.Job Title')}}</h5>
											<input type="text" class="with-border" required name="job_title"  placeholder="{{__('backendJob.Job Title')}}" autocomplete="off">
											@error('job_title')
											    <div class="alert alert-danger">{{__('backendJob.The job title field is required.')}}</div>
											@enderror
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>{{__('backendJob.Job Type')}}</h5>
											
											<select required class=" with-border selectpicker" data-size="7" title="{{__('backendJob.Select Job Type')}}" name="job_type" style="height: 48px;">
											<option value="Full Time">{{__('backendJob.Full Time')}}</option>
											<option value="Freelance">{{__('backendJob.Freelance')}}</option>
											<option value="Part Time">{{__('backendJob.Part Time')}}</option>
											<option value="Internship">{{__('backendJob.Internship')}}</option>
											<option value="Temporary">{{__('backendJob.Temporary')}}</option>
										</select>
											@error('job_type')
											    <div class="alert alert-danger">{{__('backendJob.The job type field is required.')}}</div>
											@enderror
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>{{__('backendJob.Category')}}</h5>
											<select required class="selectpicker with-border"  title="{{__('backendJob.Select Category')}}" name="job_category">
												
												@foreach($categories as $category)
												<option value="{{$category->id}}">
													
												@if(session()->get('locale') == 'ar')	
												{{$category->name_ar}}
												@elseif(session()->get('locale') == 'tk')
												{{$category->name_tr}}
												@else
												{{$category->name}}
												@endif
													
												</option>
												@endforeach
											</select>
											@error('job_category')
											    <div class="alert alert-danger">{{__('backendJob.The job category field is required.')}}</div>
											@enderror
										</div>
									</div>

									<div class="col-xl-6">
										<div class="submit-field">
											<h5>{{__('backendJob.Location')}}</h5>
											<div class="input-with-icon">
												<div id="autocomplete-container">
													<input id="autocomplete-input" class="with-border" type="text" placeholder="{{__('backendJob.Address')}}" name="location" required autocomplete="off"> 
												</div>
												<i class="icon-material-outline-location-on"></i>
												@error('location')
										   		 	<div class="alert alert-danger">{{__('backendJob.The location field is required.')}}</div>
												@enderror
											</div>
										</div>
									</div>

									<div class="col-xl-6">
										<div class="submit-field">
											<h5>{{__('backendJob.Salary')}}</h5>
											<div class="row">
												<div class="col-xl-6">
													<div class="input-with-icon">
														<input required class="with-border" type="number" min="1" required placeholder="{{__('backendJob.min')}}" name="min_salary" autocomplete="off">
														<i class="currency">USD</i>
														@error('min_salary')
														    <div class="alert alert-danger">{{$message}}</div>
														@enderror
													</div>
												</div>
												<div class="col-xl-6">
													<div class="input-with-icon">
														<input type="number" min="1" required class="with-border" type="text" autocomplete="off" placeholder="{{__('backendJob.max')}}" name="max_salary">
														<i class="currency">USD</i>
														@error('max_salary')
														    <div class="alert alert-danger">{{$message}}</div>
														@enderror
													</div>
												</div>
											</div>
										</div>
									</div>

								<!-- 	<div class="col-xl-4">
										<div class="submit-field">
											<h5>Tags <span>(optional)</span>  <i class="help-icon" data-tippy-placement="right" data-tippy="" data-original-title="Maximum of 10 tags"></i></h5>
											<div class="keywords-container">
												<div class="keyword-input-container">
													<input type="text" class="keyword-input with-border" placeholder="e.g. job title, responsibilites">
													<button class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
												</div>
												<div class="keywords-list" style="height: auto;"></div>
												<div class="clearfix"></div>
											</div>

										</div>
									</div> -->

									<div class="col-xl-12">
										<div class="submit-field">
											<h5>{{__('backendJob.Job Description')}}</h5>
											<textarea required cols="30" rows="5" class="with-border ckeditor" name="description"></textarea>
											@error('description')
												    <div class="alert alert-danger">{{__('backendJob.The description field is required.')}}</div>
												@enderror
											<div class="uploadButton margin-top-30">
												<input class="uploadButton-input" type="file" accept="image/*, application/pdf" id="upload" multiple="" name="file">
												<label class="uploadButton-button ripple-effect" for="upload">{{__('backendJob.Upload Files')}}</label>
												<span class="uploadButton-file-name">{{__('backendJob.Images or documents that might be helpful in describing your job')}}</span>
												@error('file')
												    <div class="alert alert-danger">{{__('backendJob.The file field is required.')}}</div>
												@enderror
											</div>
										</div>
									</div>

								</div>
							</div>

						</div>
					</div>

					<div class="col-xl-12">
						<input type="submit" name=""class="button ripple-effect big margin-top-30" value="{{__('backendJob.post a job')}}">
						<!-- <a href="#" class="button ripple-effect big margin-top-30"><i class="icon-feather-plus"></i> Post a Job</a> -->

					</div>
				</form>
			</div>
			<!-- Row / End -->

			<!-- Footer -->
			@include('includes.dashboardFooter')
			<!-- Footer / End -->

		</div>
	</div></div></div>
@endsection