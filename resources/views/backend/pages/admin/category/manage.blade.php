@extends('backend.layout.template')

@section('title')
Category Manage
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 549px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 275px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
<div class="dashboard-content-inner" style="min-height: 549px;">
	
	<!-- Dashboard Headline -->
	<div class="dashboard-headline">
		<h3>{{__('category.Manage Category')}}</h3>

		<!-- Breadcrumbs -->
		<nav id="breadcrumbs" class="dark">
			<ul>
				<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
				<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
				<li>{{__('category.Manage Category')}}</li>
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
					<div class="content ">
						<div class="table-responsive">
							<table class="table">
			                  <thead class="thead-dark">
			                    <tr> 
			                      <th scope="col"># Si</th>
			                      <th scope="col">{{__('category.Category Name')}}</th>
			                      <th scope="col">{{__('category.Category Thumbnail')}}</th>
			                      <th scope="col">{{__('category.Description')}}</th>
			                      <th scope="col">
			                       {{__('category.Parent Category')}} 
			                      </th>
			                      <th scope="col">{{__('category.Featured or Not')}}</th>
			                      <th scope="col">{{__('category.Popular or Not')}}</th>
			                      <th scope="col">{{__('category.Action')}}</th>
			                      <!-- <th scope="col">Action</th> -->
			                    </tr>
			                  </thead>
			                  <tbody>
			                    @php
			                      $i = 1;
			                    @endphp
			                    @foreach($categories as $category)
			                    <tr>
			                      <th scope="row">{{$i}}</th>
			                      <td>{{$category->name}}</td>
			                      <td><img src="{{ asset('images/category/' . $category->image)}}" style="width: 50px; height: 50px;"></td>
			                      <td>{{$category->desc}}</td>
			                      
			                   
			                      <td>
			                        @if($category->parent_id == 0)
			                        Primary Category
			                        @else
			                        {{$category->parent->name}}
			                        @endif
			                        
			                      </td>
			                      <td>
			                        @if($category->featured == 0)
			                        No
			                        @else
			                        Yes
			                        @endif
			                        
			                      </td>
			                      <td>
			                        @if($category->popular == 0)
			                        No
			                        @else
			                        Yes
			                        @endif
			                        
			                      </td>
			                      <td>
			                      	<a href="{{route('category.edit',$category->id)}}" class=" button ripple-effect"><i class="icon-feather-edit"></i></a>
			                      	<!-- Bid Acceptance Popup
											================================================== -->
											<div id="small-dialog-1" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

												<!--Tabs -->
												<div class="sign-in-form">

													<ul class="popup-tabs-nav">
														<li><a href="#tab1">Update Category</a></li>
													</ul>

													<div class="popup-tabs-container">

														<!-- Tab -->
														<div class="popup-tab-content" id="tab">
															
															<!-- Welcome Text -->
															<div class="welcome-text">
																
																

															</div>

															<form id="terms" method="POST" action="{{route('category.update',$category->id)}}" enctype="multipart/form-data">
																@csrf
									<div class="form-group">
				                      <label>Category Name</label>
				                      <input type="text" value="{{$category->name}}" name="name" class="form-control"  autocomplete="off">
				                      @error('name')
										    <div class="alert alert-danger">{{ $message }}</div>
										@enderror
				                    </div>
				                    <div class="col-auto">
										<div class="avatar-wrapper" data-tippy-placement="bottom" title="Change Avatar">
											<img class="profile-pic" src="{{ asset('images/category/' . $category->image)}}" alt="" />
											<div class="upload-button"></div>
											<input class="file-upload" name="image" type="file" accept="image/*"/>
										</div>
									</div>
				                    
				                    <div class="form-group">
				                      <label>Description</label>
				                      <textarea class="form-control" rows="5" name="desc" >{{$category->desc}}</textarea>
				                    </div>
				                    <div class="form-group">
				                      <label>Parent Category</label>
				                      <select class="form-control" name="parent_id">
				                        <option value="0">Primary</option>
				                        @foreach($primary_category as $primaryCategory)
				                        <option value="{{$primaryCategory->id}}"@if ($primaryCategory->id ==  $category->id) selected @endif>{{$primaryCategory->name}}</option>
				                        @endforeach
				                      </select>
				                    </div>
				                    <div class="form-group">
				                      <label>Fetured</label>
				                      <select class="form-control" name="fetured">
				                        <option value="1"@if ($category->fetured == 1) selected @endif>Yes</option>
				                        <option value="0"@if ($category->fetured == 0) selected @endif>No</option>
				                      </select>
				                    </div>
				                    <div class="form-group">
				                      <label>Popular</label>
				                      <select class="form-control" name="popular">
				                        <option value="1"@if ($category->popular == 1) selected @endif>Yes</option>
				                        <option value="0" @if ($category->popular == 0) selected @endif>No</option>
				                      </select>
				                    </div>

																<!-- Button -->
																<button class="margin-top-15 button full-width button-sliding-icon ripple-effect" type="submit" form="terms">Confirm<i class="icon-material-outline-arrow-right-alt"></i>
																</button>
															</form>

															

														</div>

													</div>
												</div>
											</div>
			                      </td>
			                    </tr>
			                    @php
			                      $i++;
			                    @endphp
			                    @endforeach
			                  </tbody>
		                </table>
						</div>
						
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