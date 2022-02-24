@extends('backend.layout.template')

@section('title')
{{__('blog.Manage Blog Category')}}
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 549px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 275px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
<div class="dashboard-content-inner" style="min-height: 549px;">
	
	<!-- Dashboard Headline -->
	<div class="dashboard-headline">
		<h3>{{__('blog.Manage Blog Category')}}</h3>

		<!-- Breadcrumbs -->
		<nav id="breadcrumbs" class="dark">
			<ul>
				<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
				<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
				<li>{{__('blog.Manage Blog Category')}}</li>
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
					<div class="content ">
						<div class="table-responsive">
							<table class="table">
			                  <thead class="thead-dark">
			                    <tr> 
			                      <th scope="col"># Si</th>
			                      <th scope="col">{{__('blog.Name')}}</th>
			                      <th scope="col">{{__('blog.Name')}} Arabic</th>
			                       <th scope="col">{{__('blog.Name')}} Turkish</th>

			                      <th scope="col">Action</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                    @php
			                      $i = 1;
			                    @endphp
			                    @foreach($blogTypes as $blogType)
			                    <tr>
			                      <th scope="row">{{$i}}</th>
			                      <td>{{$blogType->name}}</td>
			             			<td>{{$blogType->name_ar}}</td>
			             			<td>{{$blogType->name_tr}}</td>
			                      <td>
			                <a href="#small-dialog-1{{$blogType->id}}" class=" btn-danger popup-with-zoom-anim btn "><i class="icon-material-outline-delete"></i></a>
			                      	<!-- Bid Acceptance Popup
											================================================== -->
											<div id="small-dialog-1{{$blogType->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

												<!--Tabs -->
												<div class="sign-in-form">

													<ul class="popup-tabs-nav">
														<li><a href="#tab1">{{__('blog.Delete Blog Category')}}</a></li>
													</ul>

													<div class="popup-tabs-container">

														<!-- Tab -->
														<div class="popup-tab-content" id="tab">
															
															<!-- Welcome Text -->
															<div class="welcome-text">
																
																<h3>{{__('blog.Are you sure you want to delete category ?')}}</h3>

															</div>

															<form id="terms" method="POST" action="{{route('delete.blog.type',$blogType->id)}}" enctype="multipart/form-data">
																@csrf
																<!-- Button -->
																<button class="margin-top-15 button  button-sliding-icon btn btn-success" type="submit" form="terms">{{__('blog.Confirm')}}<i class="icon-material-outline-arrow-right-alt"></i>
																</button>
															</form>

															

														</div>

													</div>
												</div>
											</div>
			                      
			                <a href="#small-dialog-2{{$blogType->id}}" class=" btn-primary popup-with-zoom-anim btn "><i class="icon-line-awesome-pencil"></i></a>
			                      	<!-- Bid Acceptance Popup
											================================================== -->
											<div id="small-dialog-2{{$blogType->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

												<!--Tabs -->
												<div class="sign-in-form">

													<ul class="popup-tabs-nav">
														<li><a href="#tab1">Update blog Category</a></li>
													</ul>

													<div class="popup-tabs-container">

														<!-- Tab -->
														<div class="popup-tab-content" id="tab">
															
															<!-- Welcome Text -->
															<div class="welcome-text">
																
																<h3>Update blog Category</h3>

															</div>

															<form id="terms" method="POST" action="{{route('blog.type.update',$blogType->id)}}" enctype="multipart/form-data">
																@csrf
																<!-- Button -->
																<div class="form-group">
				                      <label>{{__('blog.Category Name')}}</label>
				                      <input type="text" value="{{$blogType->name}}" name="name" class="form-control" dir="ltr"  autocomplete="off">
				                      @error('name')
										    <div class="alert alert-danger">{{ $message }}</div>
									  @enderror
				                    </div>
				                    <div class="form-group">
				                      <label>{{__('blog.Category Name')}} Arabic</label>
				                      <input type="text" name="name_ar" class="form-control" value="{{$blogType->name_ar}}" dir="rtl"  autocomplete="off">
				                    </div>
				                    <div class="form-group">
				                      <label>{{__('blog.Category Name')}} turkish</label>
				                      <input type="text" value="{{$blogType->name_tr}}" name="name_tr" class="form-control"  autocomplete="off" dir="ltr">
				                     
				                    </div>
																<button class="margin-top-15 button  button-sliding-icon btn btn-success" type="submit" form="terms">{{__('blog.Confirm')}}<i class="icon-material-outline-arrow-right-alt"></i>
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