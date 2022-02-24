@extends('backend.layout.template')
@section('title')
{{__('blog.Add Blog Categoy')}}
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 549px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 275px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 549px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>{{__('blog.Add Blog Categoy')}}</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('blog.Add Blog Categoy')}}</li>
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
							<h3><i class="icon-material-outline-supervisor-account"></i>{{__('blog.Blog Category')}}</h3>
							<div class="content">
								<form action="{{route('blog.type.store')}}" method="POST" enctype="multipart/form-data">
				                    @csrf
				                    <div class="form-group">
				                      <label>{{__('blog.Category Name')}}</label>
				                      <input type="text" name="name" class="form-control" dir="ltr"  autocomplete="off">
				                      @error('name')
										    <div class="alert alert-danger">{{ $message }}</div>
									  @enderror
				                    </div>
				                    <div class="form-group">
				                      <label>{{__('blog.Category Name')}} Arabic</label>
				                      <input type="text" name="name_ar" class="form-control" dir="rtl"  autocomplete="off">
				                    </div>
				                    <div class="form-group">
				                      <label>{{__('blog.Category Name')}} turkish</label>
				                      <input type="text" name="name_tr" class="form-control"  autocomplete="off" dir="ltr">
				                     
				                    </div>
				                    <div class="form-group">
				                      <input type="submit" name="addBlog" class="btn btn-primary btn-block" value="{{__('blog.Add Blog Categoy')}}">
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