@extends('backend.layout.template')
@section('body-content')
<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Post a Task</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">Home</a></li>
						<li><a href="{{route('user.dashbord')}}">Dashboard</a></li>
						<li>Post a Task</li>
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<form method="POST" action="{{route('task.store')}}" enctype="multipart/form-data">
					@csrf
					<div class="col-xl-12">
						<div class="dashboard-box margin-top-0">

							<!-- Headline -->
							<div class="headline">
								<h3><i class="icon-feather-folder-plus"></i> Task Submission Form</h3>
							</div>

							<div class="content with-padding padding-bottom-10">
								<div class="row">

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Project Name</h5>
											<input type="text" class="with-border" placeholder="e.g. build me a website" name="task_name">
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Category</h5>
											<select class="selectpicker with-border" data-size="7" title="Select Category" name="category_name">
												@foreach($categories as $category)
												<option value="{{$category->name}}">{{$category->name}}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Location  <i class="help-icon" data-tippy-placement="right" title="Leave blank if it's an online job"></i></h5>
											<div class="input-with-icon">
												<div id="autocomplete-container">
													<input id="autocomplete-input" class="with-border" type="text" placeholder="Anywhere" name="location">
												</div>
												<i class="icon-material-outline-location-on"></i>
											</div>
										</div>
									</div>

									<div class="col-xl-6">
										<div class="submit-field">
											<h5>What is your estimated budget?</h5>
											<div class="row">
												<div class="col-xl-6">
													<div class="input-with-icon">
														<input class="with-border" type="text" placeholder="Minimum" name="min_budget">
														<i class="currency">USD</i>
													</div>
												</div>
												<div class="col-xl-6">
													<div class="input-with-icon">
														<input class="with-border" type="text" placeholder="Maximum" name="max_budget">
														<i class="currency">USD</i>
													</div>
												</div>
											</div>
											<div class="feedback-yes-no margin-top-0">
												<div class="radio">
													<input id="radio-1" name="radio" type="radio" checked value="1">
													<label for="radio-1"><span class="radio-label"></span> Fixed Price Project</label>
												</div>

												<div class="radio">
													<input id="radio-2" name="radio" type="radio" value="2">
													<label for="radio-2"><span class="radio-label"></span> Hourly Project</label>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xl-6">
										<div class="submit-field">
											<h5>What skills are required? <i class="help-icon" data-tippy-placement="right" title="Up to 5 skills that best describe your project"></i></h5>
											<div class="keywords-container">
												<div class="keyword-input-container">
													<input type="text" class="keyword-input with-border" placeholder="Add Skills"/>
													<a class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></a>
												</div>
												<div class="keywords-list"><!-- keywords go here --></div>
												<div class="clearfix"></div>
											</div>

										</div>
									</div>

									<div class="col-xl-12">
										<div class="submit-field">
											<h5>Describe Your Project</h5>
											<textarea cols="30" rows="5" class="with-border" name="description"></textarea>
											<div class="uploadButton margin-top-30">
												<input class="uploadButton-input" type="file" name="file" accept="image/*, application/pdf" id="upload" multiple/>
												<label class="uploadButton-button ripple-effect" for="upload">Upload Files</label>
												<span class="uploadButton-file-name">Images or documents that might be helpful in describing your project</span>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-12">
						<input type="submit" name=""class="button ripple-effect big margin-top-30" value="Post a Task">
						<!-- <a href="#" class="button ripple-effect big margin-top-30"><i class="icon-feather-plus"></i> Post a Task</a> -->
					</div>

				</form>

			</div>
			<!-- Row / End -->

			<!-- Footer -->
			@include('includes.dashboardFooter')
			<!-- Footer / End -->

		</div>
	</div>
	<!-- Dashboard Content / End -->
@endsection