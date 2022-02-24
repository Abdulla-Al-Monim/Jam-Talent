@extends('backend.layout.template')


<!-- title section -->
@section('title')
{{__('backendIndex.Add History')}}
@endsection


@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 549px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 275px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 549px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">{{__('backendIndex.Add History')}}</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('backendIndex.Add History')}}</li>
					</ul>
				</nav>
			</div>


			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-supervisor-account"></i>{{__('backendIndex.Employment history')}}</h3>
							<div class="content">
								<form action="{{route('employment.history.store')}}" method="POST" enctype="multipart/form-data">
				                    @csrf
				                    <div class="form-group">
				                      <label>{{__('backendIndex.Job Title')}}</label>
				                      <input type="text" name="title" class="form-control"  autocomplete="off">
				                      @error('title')
										    <div class="alert alert-danger">{{ $message }}</div>
										@enderror
				                    </div>
				                   <div class="form-group">
				                      <label>{{__('backendIndex.Company Name')}}</label>
				                      <input type="text" name="company_name" class="form-control"  autocomplete="off">
				                      @error('company_name')
										    <div class="alert alert-danger">{{ $message }}</div>
										@enderror
				                    </div>
									<div class="form-group">
				                      <label>{{__('backendIndex.Company URL')}}</label>
				                      <input type="text" name="company_url" class="form-control"  autocomplete="off">
				                      
				                    </div>
				                    <!-- <div class="form-group">
				                      <label>{{__('backendIndex.Position')}}</label>
				                      <input type="text" name="position" class="form-control"  autocomplete="off">
				                      @error('position')
										    <div class="alert alert-danger">{{ $message }}</div>
										@enderror
				                    </div> -->
				                    <div class="uploadButton margin-top-30">
												<input class="uploadButton-input" type="file" accept="image/*" id="upload" multiple="" name="image">
												<label class="uploadButton-button ripple-effect" for="upload">{{__('backendIndex.Upload Company Profile')}} </label>
												<span class="uploadButton-file-name">{{__('backendIndex.Images')}}</span>
												@error('image')
												    <div class="alert alert-danger">{{ $message }}</div>
												@enderror
									</div>
				                    <div class="form-group">
				                      <label>{{__('backendIndex.Description')}}</label>
				                      <input type="text" name="s_desciption" class="form-control"  autocomplete="off">
				                      @error('s_desciption')
										    <div class="alert alert-danger">{{ $message }}</div>
										@enderror
				                    </div>

				                    <div class="form-group">
				                      <input type="submit" name="addBlog" class="btn btn-primary btn-block" value="{{__('backendIndex.Add Employment History')}}">
				                    </div>
				                </form>
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- Row / End -->

			<!-- Footer -->
			@include('includes.dashboardFooter')
			<!-- Footer / End -->

		</div>
	</div></div></div>
	<script type="text/javascript">
			$(document).ready(function() {
		   $('.selectpicker').selectpicker();
		});
	</script>
@endsection