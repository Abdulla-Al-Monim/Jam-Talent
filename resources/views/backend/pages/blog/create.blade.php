@extends('backend.layout.template')
@section('title')
{{__('blog.Create Blog')}}
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 549px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 275px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 549px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>{{__('blog.Create Blog')}}</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('blog.Create Blog')}}</li>
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
							<h3><i class="icon-material-outline-supervisor-account"></i>{{__('blog.Blog')}}</h3>
							<div class="content">
								<form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
				                    @csrf
				                    <div class="form-group">
				                      <label>{{__('blog.Blog Title')}}</label>
				                      <input type="text" name="title" class="form-control"  autocomplete="off">
				                      @error('title')
										    <div class="alert alert-danger">{{ $message }}</div>
										@enderror
				                    </div>
				                    <div class="uploadButton margin-top-30">
												<input class="uploadButton-input" type="file" accept="image/x-png,image/gif,image/jpeg" id="upload" multiple="" name="image">
												<label class="uploadButton-button ripple-effect" for="upload">{{__('category.Upload Thumbnail')}} </label>
												<span class="uploadButton-file-name">{{__('category.Images')}}</span>
												@error('image')
											    <div class="alert alert-danger">{{ $message }}</div>
												@enderror
									</div>
									
				                    <div class="form-group">
				                      <label>{{__('blog.Description')}}</label>
				                       @if(session()->get('locale') == 'ar')
				                       <textarea class="form-control ckeditor" dir="rtl" rows="5" name="desc"></textarea>
				                        @else	
				                      <textarea class="form-control ckeditor" rows="5" name="desc"></textarea>
				                      @endif
				                      @error('desc')
									    	<div class="alert alert-danger">{{ $message }}</div>
										@enderror
				                    </div>
				                    <div class="form-group">
				                      <label>{{__('blog.Blog Type')}}</label>
				                      <select class="form-control selectpicker" name="type">
				                      	@foreach($blogtypes as $blogtype)
				                        <option value="{{ $blogtype->id }}">
				                        	@if(session()->get('locale') == 'ar')	
												{{$blogtype->name_ar}}
												@elseif(session()->get('locale') == 'tk')
												{{$blogtype->name_tr}}
												@else
												{{$blogtype->name}}
												@endif
				                        </option>
				                        @endforeach
				                      </select>
				                      	@error('type')
									    	<div class="alert alert-danger">{{ $message }}</div>
										@enderror
				                    </div>

				                    <div class="form-group">
				                      <input type="submit" name="addBlog" class="btn btn-primary btn-block" value="{{__('blog.Add New Blog')}}">
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
