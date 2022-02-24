@extends('backend.layout.template')
@section('title')
Post a task
@endsection
@section('body-content')
<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">{{__('backendTask.Post a Task')}}</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('backendTask.Post a Task')}}</li>
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
								<h3><i class="icon-feather-folder-plus"></i>{{__('backendTask.Task Submission Form')}} </h3>
							</div>

							<div class="content with-padding padding-bottom-10">
								<div class="row">

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>{{__('backendTask.Project Name')}}</h5>
											<input type="text" class="with-border" required placeholder="e.g. {{__('backendTask.build me a website')}}" autocomplete="off" name="task_name">
											@error('task_name')
											    <div class="alert alert-danger">{{__('backendTask.The task name field is required.')}}</div>
											@enderror
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>{{__('backendTask.Category')}}</h5>
											<select class=" with-border selectpicker" required title="{{__('backendJob.Select Category')}}" name="category_name">
												
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
											@error('category_name')
											    <div class="alert alert-danger">{{__('backendTask.The category name field is required.')}}</div>
											@enderror
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>{{__('backendTask.Location')}}  <i class="help-icon" data-tippy-placement="right" title="Leave blank if it's an online job"></i></h5>
											<div class="input-with-icon">
												<div id="autocomplete-container">
													<input id="autocomplete-input"required class="with-border" type="text" placeholder="{{__('backendTask.Anywhere')}}" name="location" autocomplete="off">
												</div>
												<i class="icon-material-outline-location-on"></i>
												@error('location')
											    <div class="alert alert-danger">{{__('backendTask.The location field is required.')}}</div>
											@enderror
											</div>
										</div>
									</div>

									<div class="col-xl-6">
										<div class="submit-field">
											<h5>{{__('backendTask.What is Your Estimated Budget?')}}</h5>
											<div class="row">
												<div class="col-xl-6">
													<div class="input-with-icon">
														<input class="with-border" type="number" min="1" required placeholder="{{__('backendJob.min')}}" name="min_budget" autocomplete="off">
														<i class="currency">USD</i>
														@error('min_budget')
														    <div class="alert alert-danger">{{__('backendTask.The min budget field is required.')}}</div>
														@enderror
													</div>
												</div>
												<div class="col-xl-6">
													<div class="input-with-icon">
														<input class="with-border" type="number" min="1" required  autocomplete="off" placeholder="{{__('backendJob.max')}}" name="max_budget">
														<i class="currency">USD</i>
														@error('max_budget')
														    <div class="alert alert-danger">{{__('backendTask.The max budget field is required.')}}</div>
														@enderror
													</div>
												</div>
											</div>
											<div class="feedback-yes-no margin-top-0">
												<div class="radio">
													<input id="radio-1" name="radio" type="radio" checked selected value="1">
													<label for="radio-1"><span class="radio-label"></span>{{__('backendTask.Fixed Price Project')}} </label>
													
												</div>

												<!-- <div class="radio">
													<input id="radio-2" name="radio" type="radio" value="2">
													<label for="radio-2"><span class="radio-label"></span> Hourly Project</label>
												</div> -->
											</div>
										</div>
									</div>

									<!-- <div class="col-xl-6">
										
										<div class="submit-field">

											<h5>What skills are required? <i class="help-icon" data-tippy-placement="right" title="Up to 5 skills that best describe your project"></i></h5>
											<div class="keywords-container">
												<div class="keyword-input-container">
													<input type="text" class="keyword-input with-border" name="skill_names" placeholder="Add Skills"/>
													<button class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
												</div>
												<div class="keywords-list">
													
												</div>
												<div class="clearfix"></div>
											</div>

										</div>
									</div> -->
									<div class="col-xl-6">
										<div class="submit-field">
											<h5>{{__('backendTask.Delivery Days')}}</h5>
												<input class="with-border" type="number" required placeholder="" autocomplete="off" min="1"  name="delivery_time">
												@error('delivery_time')
												    <div class="alert alert-danger">{{__('backendTask.The delivery time field is required.')}}</div>
												@enderror
										</div>
									</div>
									<div class="col-xl-12">
										<div class="submit-field">
											<h5>{{__('backendTask.Describe Your Project')}}</h5>
											<textarea cols="30" required rows="5" class="with-borde ckeditor" name="description"></textarea>
											@error('description')
											    <div class="alert alert-danger">{{__('backendTask.The description field is required.')}}</div>
											@enderror
											<div class="uploadButton margin-top-30">
												<input class="uploadButton-input" type="file" accept="image/*, application/pdf" required name="file" id="upload" multiple/>
												<label class="uploadButton-button ripple-effect" for="upload">{{__('backendTask.Upload Files')}}</label>
												<span class="uploadButton-file-name">{{__('backendTask.Images or documents that might be helpful in describing your project')}}</span>
												@error('file')
												    <div class="alert alert-danger">{{__('backendTask.The file field is required.')}}</div>
												@enderror
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-12">
						<input type="submit" name=""class="button ripple-effect big margin-top-30" value="{{__('backendTask.Post a Task')}}">
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