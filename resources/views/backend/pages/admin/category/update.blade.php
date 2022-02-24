@extends('backend.layout.template')
@section('title')
Update Category
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 549px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 275px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 549px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>{{__('category.Update Category')}}</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">{{__('backendIndex.Home')}}</a></li>
						<li><a href="#">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('category.Update Category')}}</li>
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
							<h3><i class="icon-material-outline-supervisor-account"></i>{{__('category.Update Category')}}</h3>
							<div class="content">
								<form action="{{route('category.update', $category->id)}} " method="POST" enctype="multipart/form-data">
				                    @csrf
				                    <div class="form-group">
				                      <label>{{__('category.Category Name')}} </label>
				                      <input type="text" name="name" class="form-control" dir="ltr" required="required" autocomplete="off" value="{{$category->name}}">
				                    </div>
				                    <div class="form-group">
				                      <label>{{__('category.Category Name')}} Arabic</label>
				                      <input type="text" name="name_ar" dir="rtl" class="form-control" required="required" autocomplete="off" value="{{$category->name_ar}}">
				                    </div>
				                    <div class="form-group">
				                      <label>{{__('category.Category Name')}} Turkish</label>
				                      <input type="text" name="name_tr" dir="ltr" class="form-control" required="required" autocomplete="off" value="{{$category->name_tr}}">
				                    </div>
				                    <div class="col-auto">
									<div class="avatar-wrapper" data-tippy-placement="bottom" title="Change Avatar">
										<img class="profile-pic" src="{{ asset('images/category/' . $category->image)}}" alt="" />
										<div class="upload-button"></div>
										<input class="file-upload" name="image" type="file" accept="image/*"/>
									</div>
								</div>
				                    <div class="form-group">
				                      <label>{{__('category.Description')}}</label>
				                      <textarea class="form-control" rows="5" name="desc">{{$category->desc}}</textarea>
				                    </div>
				                    <div class="form-group">
				                      <label>{{__('category.Parent Category')}} </label>
				                      <select class="form-control" name="parent_id">
				                        <option value="0">Primary category</option>
				                        @foreach($primary_category as $cat)
				                        <option value="{{$cat->id}}" {{$cat->id == $category->parent_id ? 'selected': ''}}>{{$cat->name}}</option>
				                        @endforeach
				                      </select>
				                    </div>
				                    <div class="form-group">
				                      <label>{{__('category.Featured')}} </label>
				                      <select class="form-control" name="featured">
				                        <option value="1"@if ($category->featured == 1) selected @endif>Yes</option>
				                        <option value="0"@if ($category->featured == 0) selected @endif>No</option>
				                      </select>
				                    </div>
				                    <div class="form-group">
				                      <label>{{__('category.Popular')}} </label>
				                      <select class="form-control" name="popular">
				                        <option value="1"@if ($category->popular == 1) selected @endif>Yes</option>
				                        <option value="0" @if ($category->popular == 0) selected @endif>No</option>
				                      </select>
				                    </div>
				                    <div class="form-group">
				                      <input type="submit" name="updateCategory" class="btn btn-primary btn-block" value="{{__('category.Save Changes')}}">
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
@endsection	