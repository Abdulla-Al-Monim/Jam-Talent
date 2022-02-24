@extends('backend.layout.template')
@section('title')
{{__('category.Create Category')}}
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 549px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 275px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 549px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>{{__('category.Create Category')}}</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('category.Create Category')}}</li>
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
							<h3><i class="icon-material-outline-supervisor-account"></i>{{__('category.Category')}}</h3>
							<div class="content">
								<form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
				                    @csrf
				                    <div class="form-group">
				                      <label>{{__('category.Category Name')}}</label>
				                      <input type="text" name="name" dir="ltr" class="form-control"  autocomplete="off">
				                      @error('name')
										    <div class="alert alert-danger">{{ $message }}</div>
										@enderror
				                    </div>
				                    <div class="form-group">
				                      <label>{{__('category.Category Name')}} Arabic</label>
				                      <input type="text" name="name_ar" dir="rtl" class="form-control"  autocomplete="off">
				                     
				                    </div>
				                    <div class="form-group">
				                      <label>{{__('category.Category Name')}} Turkish</label>
				                      <input type="text" name="name_tr" dir="ltr" class="form-control"  autocomplete="off">
				                      
				                    </div>
				                    <div class="uploadButton margin-top-30">
												<input class="uploadButton-input" type="file" accept="image/*" id="upload" multiple="" name="image">
												<label class="uploadButton-button ripple-effect" for="upload">{{__('category.Upload Thumbnail')}} </label>
												<span class="uploadButton-file-name">{{__('category.Images')}}</span>
												@error('image')
												    <div class="alert alert-danger">{{ $message }}</div>
												@enderror
									</div>
				                    <div class="form-group">
				                      <label>{{__('category.Description')}}</label>
				                      <textarea class="form-control" rows="5" name="desc"></textarea>
				                      @error('desc')
										    <div class="alert alert-danger">{{ $message }}</div>
										@enderror
				                    </div>
				                    <div class="form-group">
				                      <label>{{__('category.Parent Category')}}</label>
				                      <select class="form-control" name="parent_id">
				                        <option value="0">{{__('category.Primary')}}</option>
				                        @foreach($primary_category as $category)
				                        <option value="{{$category->id}}">{{$category->name}}</option>
				                        @endforeach
				                        @error('parent_id')
										    <div class="alert alert-danger">{{ $message }}</div>
										@enderror
				                      </select>
				                      
				                    </div>
				                    <div class="form-group">
				                      <label>{{__('category.Featured')}}</label>
				                      <select class="form-control" name="featured">
				                        <option value="1">{{__('category.yes')}}</option>
				                        <option value="0">{{__('category.no')}}</option>
				                      </select>
				                    </div>
				                    <div class="form-group">
				                      <label>{{__('category.Popular')}}</label>
				                      <select class="form-control" name="popular">
				                        <option value="1">{{__('category.yes')}}</option>
				                        <option value="0" selected>{{__('category.no')}}</option>
				                      </select>
				                    </div>
				                    <div class="form-group">
				                      <input type="submit" name="addCategory" class="btn btn-primary btn-block" value="{{__('category.Add New Category')}}">
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