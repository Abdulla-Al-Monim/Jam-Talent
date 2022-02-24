@extends('backend.layout.template')

@section('title')
{{__('blog.Manage Blogs')}}
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 549px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 275px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
<div class="dashboard-content-inner" style="min-height: 549px;">
	
	<!-- Dashboard Headline -->
	<div class="dashboard-headline">
		<h3>{{__('blog.Manage Blogs')}}</h3>

		<!-- Breadcrumbs -->
		<nav id="breadcrumbs" class="dark">
			<ul>
				<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
				<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
				<li>{{__('blog.Manage Blogs')}}</li>
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
					<h3><i class="icon-material-outline-supervisor-account"></i>{{__('blog.All Blogs')}}</h3>
					<div class="content table-responsive">
						<div class="table-responsive">
							<table class="table table-responsive" style="
							display: block !important;
   							overflow-x: auto !important;
   							width: 100% !important;">
			                  <thead class="thead-dark">
			                    <tr> 
			                      <th scope="col"># Si</th>
			                      <th scope="col">{{__('blog.Blog Title')}}</th>
			                      <th scope="col">{{__('blog.Blog Thumbnail')}}</th>
			                      <th scope="col">{{__('blog.Blog Type')}}</th>
			                      <th scope="col">{{__('blog.Description')}}</th>
			                      @if(Auth::user()->user_type_id == 2)
			                      <th scope="col">{{__('blog.Posted By')}}</th>
			                      @elseif(Auth::user()->user_type_id == 0)
			                      <th scope="col">{{__('blog.Posted By')}}</th>
			                      @endif
			                      <th scope="col">{{__('blog.Status')}}</th>
			                      <th scope="col">{{__('blog.Action')}}</th>
			                      <!-- <th scope="col">Action</th> -->
			                    </tr>
			                  </thead>
			                  <tbody>
			                    @php
			                      $i = 1;
			                    @endphp
			                    @foreach($blogs as $blog)
			                    @php
			                    $user = App\Models\User::where('id',$blog->user_id)->first();
			                    @endphp
			                    <tr>
			                      <th scope="row">{{$i}}</th>
			                      <td>{{$blog->	title}}</td>
			                      <td><img src="{{ asset('images/blog/' . $blog->image)}}" style="width: 50px; height: 50px;"></td>
			                      <td>{{$blog->type}}</td>
			                      <td>{!!$blog->s_desc!!}</td>
			                      @if(Auth::user()->user_type_id == 0)
			                      <td>
			                      	@if($user->user_type_id == 0)
			                      	Super Admin : 
				                      	@if($user->full_name !==null) {{$user->full_name}}
				                      	@else
				                      	Unknown
				                      	@endif
			                      	@elseif($user->user_type_id == 1)
			                      	Freelancer : 
				                      	@if($user->full_name !==null) {{$user->full_name}}
				                      	@else
				                      	Unknown
				                      	@endif
			                      	@elseif($user->user_type_id == 2)
			                      	Admin : 
				                      	@if($user->full_name !==null) {{$user->full_name}}
				                      	@else
				                      	Unknown
				                      	@endif
			                      	@elseif($user->user_type_id == 3)
			                      	Employer : 
				                      	@if($user->full_name !==null) {{$user->full_name}}
				                      	@else
				                      	Unknown
				                      	@endif
			                      	@endif
			                      </td>
			                      @elseif(Auth::user()->user_type_id == 2)
			                      	<td>@if($user->user_type_id == 0)
			                      	Super Admin : 
				                      	@if($user->full_name !==null) {{$user->full_name}}
				                      	@else
				                      	Unknown
				                      	@endif
			                      	@elseif($user->user_type_id == 1)
			                      	Freelancer : 
				                      	@if($user->full_name !==null) {{$user->full_name}}
				                      	@else
				                      	Unknown
				                      	@endif
			                      	@elseif($user->user_type_id == 2)
			                      	Admin : 
				                      	@if($user->full_name !==null) {{$user->full_name}}
				                      	@else
				                      	Unknown
				                      	@endif
			                      	@elseif($user->user_type_id == 3)
			                      	Employer : 
				                      	@if($user->full_name !==null) {{$user->full_name}}
				                      	@else
				                      	Unknown
				                      	@endif
			                      	@endif</td>

			                      @endif
			                      
			                      <td>
			                      	@if($blog->status == 1)
			                      	Active
			                      	@else
			                      	En-active
			                      	@endif
			                      </td>
			                      <td>
			                      	
			                      	<div class="row">
			                      		<div class="col-md-4">
			                      			<a href="#small-dialog-1{{$blog->id}}" class=" btn-danger popup-with-zoom-anim btn "><i class="icon-material-outline-delete"></i></a>
			                      	<!-- Bid Acceptance Popup
											================================================== -->
											<div id="small-dialog-1{{$blog->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

												<!--Tabs -->
												<div class="sign-in-form">

													<ul class="popup-tabs-nav">
														<li><a href="#tab1">{{__('blog.Delete Blog')}}</a></li>
													</ul>

													<div class="popup-tabs-container">

														<!-- Tab -->
														<div class="popup-tab-content" id="tab">
															
															<!-- Welcome Text -->
															<div class="welcome-text">
																
																<h3>{{__('blog.Are you sure you want to delete blog?')}}</h3>

															</div>

															<form id="terms" method="POST" action="{{route('blog.delete',$blog->id)}}" enctype="multipart/form-data">
																@csrf
																<!-- Button -->
																<button class="margin-top-15 button  button-sliding-icon btn btn-success" type="submit" form="terms">{{__('blog.Confirm')}}<i class="icon-material-outline-arrow-right-alt"></i>
																</button>
															</form>

															

														</div>

													</div>
												</div>
											</div>	
			                      		</div>
			                      		@if($blog->user_id == Auth::user()->id)
			                      		<div class="col-md-4">
			                      			<div class="row">
			                      			<a href="{{route('blog.edit',$blog->id)}}" class=" btn-primary btn margin-left-15"><i class="icon-line-awesome-pencil"></i></a>
			                      	
			                      		</div>
			                      		</div>
			                      		@endif
			                      		<div class="col-md-4">
			                      			@if(Auth::user()->user_type_id == 0 || Auth::user()->user_type_id == 2)
									@if($blog->status == 0)
									<a href="#small-dialog-2{{$blog->id}}" class="btn-success popup-with-zoom-anim btn "><i class="icon-material-outline-check"></i></a>
			                      	<!-- Bid Acceptance Popup
											================================================== -->
											<div id="small-dialog-2{{$blog->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

												<!--Tabs -->
												<div class="sign-in-form">

													<ul class="popup-tabs-nav">
														<li><a href="#tab1">{{__('blog.Active Blog')}}</a></li>
													</ul>

													<div class="popup-tabs-container">

														<!-- Tab -->
														<div class="popup-tab-content" id="tab">
															
															<!-- Welcome Text -->
															<div class="welcome-text">
																
																<h3>{{__('blog.Are you sure you want to active blog ?')}}</h3>

															</div>

															<form id="terms" method="POST" action="{{route('blog.active',$blog->id)}}" enctype="multipart/form-data">
																@csrf
																<!-- Button -->
																<button class="margin-top-15 button  button-sliding-icon btn btn-success" type="submit" form="terms">{{__('blog.Confirm')}}<i class="icon-material-outline-arrow-right-alt"></i>
																</button>
															</form>

															

														</div>

													</div>
												</div>
											</div>	
			                      		</div>
									
										@else
										<a href="#small-dialog-3{{$blog->id}}" class=" btn-success popup-with-zoom-anim btn "><i class="icon-feather-x"></i></a>
			                      	<!-- Bid Acceptance Popup
											================================================== -->
											<div id="small-dialog-3{{$blog->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

												<!--Tabs -->
												<div class="sign-in-form">

													<ul class="popup-tabs-nav">
														<li><a href="#tab1">{{__('blog.En-Active Blog')}}</a></li>
													</ul>

													<div class="popup-tabs-container">

														<!-- Tab -->
														<div class="popup-tab-content" id="tab">
															
															<!-- Welcome Text -->
															<div class="welcome-text">
																
																<h3>{{__('blog.Are you sure you want to En-Active blog ?')}}</h3>

															</div>

															<form id="terms" method="POST" action="{{route('blog.enActive',$blog->id)}}" enctype="multipart/form-data">
																@csrf
																<!-- Button -->
																<button class="margin-top-15 button  button-sliding-icon btn btn-success" type="submit" form="terms">{{__('blog.Confirm')}}<i class="icon-material-outline-arrow-right-alt"></i>
																</button>
															</form>

															

														</div>

													</div>
												</div>
											</div>	
			                      		</div>
										
										@endif
									
									@endif
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