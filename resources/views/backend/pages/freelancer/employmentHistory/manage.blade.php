@extends('backend.layout.template')
@section('title')
{{__('backendIndex.Manage Employment history')}}
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 549px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 275px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
<div class="dashboard-content-inner" style="min-height: 549px;">
	
	<!-- Dashboard Headline -->
	<div class="dashboard-headline">
		<h3 style="text-align:left;">{{__('backendIndex.Manage Employment history')}}</h3>

		<!-- Breadcrumbs -->
		<nav id="breadcrumbs" class="dark">
			<ul>
				<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
				<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
				<li>{{__('backendIndex.Manage Employment history')}}</li>
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
					<h3><i class="icon-material-outline-supervisor-account"></i>{{__('backendIndex.Manage Employment history')}}</h3>
					<div class="content ">
						<div class="table-responsive">
							<table class="table">
			                  <thead class="thead-dark">
			                    <tr> 
			                      <th scope="col"># Si</th>
			                      <th scope="col">{{__('backendIndex.Job Title')}}</th>
			                      <th scope="col">{{__('backendIndex.Company Name')}}</th>
			                      <th scope="col">{{__('backendIndex.Company URL')}}</th>
			                      <!-- <th scope="col">{{__('backendIndex.Position')}}</th> -->  
			                      <th scope="col">{{__('backendIndex.Company Profile')}}</th>
			                      <th scope="col">Action</th>
			                      <!-- <th scope="col">Action</th> -->
			                    </tr>
			                  </thead>
			                  <tbody>
			                    @php
			                      $i = 1;
			                    @endphp
			                    @foreach($employmentHistoryManges as $employmentHistoryMange)
			                    <tr>
			                      <th scope="row">{{$i}}</th>
			                      <td>{{$employmentHistoryMange->title}}</td>
			                      <td>{{$employmentHistoryMange->company_name}}</td>
			                      <td>{{$employmentHistoryMange->company_url}}</td>
			                      <!-- <td>{{$employmentHistoryMange->position}}</td> -->
			                      <td><img src="{{ asset('images/employmentHistory/' . $employmentHistoryMange->image)}}" style="width: 50px; height: 50px;"></td>
			                      
			                      <td>
			                      	<a href="#small-dialog-2{{$employmentHistoryMange->id}}" class="popup-with-zoom-anim  btn-danger btn ripple-effect"><i class="icon-material-outline-delete"></i> </a>
                          <!-- Send Direct Message Popup
================================================== -->
<div id="small-dialog-2{{$employmentHistoryMange->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

  <!--Tabs -->
  <div class="sign-in-form">

    <ul class="popup-tabs-nav">
      <li><a href="#tab2">{{__('backendIndex.Delete')}}</a></li>
    </ul>

    <div class="popup-tabs-container">

      <!-- Tab -->
      <div class="popup-tab-content" id="tab2">
        
        <!-- Welcome Text -->
        <div class="welcome-text">
          <h3>{{__('backendIndex.delete Employment History')}}</h3>
        </div>
          
        <!-- Form -->
        <form method="post" id="send-pm" action="{{route('employment.history.delete',$employmentHistoryMange->id)}}">
          @csrf
          
          <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="send-pm">{{__('backendIndex.Confirm')}} <i class="icon-material-outline-arrow-right-alt"></i></button>
        </form>
        <!-- Button -->
        

      </div>

    </div>
  </div>
</div>
									<a href="#small-dialog-3{{$employmentHistoryMange->id}}" class="popup-with-zoom-anim btn btn-primary ripple-effect"><i class="icon-line-awesome-pencil"></i> </a>
                          <!-- Send Direct Message Popup
================================================== -->
<div id="small-dialog-3{{$employmentHistoryMange->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

  <!--Tabs -->
  <div class="sign-in-form">

    <ul class="popup-tabs-nav">
      <li><a href="#tab2">{{$employmentHistoryMange->Update}}</a></li>
    </ul>

    <div class="popup-tabs-container">

      <!-- Tab -->
      <div class="popup-tab-content" id="tab2">
        
        <!-- Welcome Text -->
        <div class="welcome-text">
          <h3>{{__('backendIndex.Update Employment History')}}</h3>
        </div>
          
        <!-- Form -->
        <form method="post" id="send-pm" action="{{route('update.employment.history',$employmentHistoryMange->id)}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label>{{__('backendIndex.Job Title')}}</label>
              <input type="text" name="title" class="form-control" value="{{$employmentHistoryMange->title}}"  autocomplete="off">
              @error('title')
				    <div class="alert alert-danger">{{ $message }}</div>
				@enderror
            </div>
           <div class="form-group">
              <label>{{__('backendIndex.Company Name')}}</label>
              <input type="text" name="company_name" value="{{$employmentHistoryMange->company_name}}" class="form-control"  autocomplete="off">
              @error('company_name')
				    <div class="alert alert-danger">{{ $message }}</div>
				@enderror
            </div>
			<div class="form-group">
              <label>{{__('backendIndex.Company URL')}}</label>
              <input type="text" name="company_url" class="form-control" value="{{$employmentHistoryMange->company_url}}"  autocomplete="off">
              
            </div>
            <!-- <div class="form-group">
              <label>{{__('backendIndex.Position')}}</label>
              <input type="text" name="position" class="form-control"  value="{{$employmentHistoryMange->position}}" autocomplete="off">
              @error('position')
				    <div class="alert alert-danger">{{ $message }}</div>
				@enderror
            </div> -->
            <div class="uploadButton margin-top-30">
						<div class="avatar-wrapper" data-tippy-placement="bottom" title="Change Company Profile">
										<img class="profile-pic" src="{{ asset('images/employmentHistory/' . $employmentHistoryMange->image)}}" alt="" />
										<div class="upload-button"></div>
										<input class="uploadButton-input file-upload" type="file" accept="image/*" id="upload" multiple="" name="image">
									</div>
						
			</div>
            <div class="form-group">
              <label>{{__('backendIndex.Description')}}</label>
              <input type="text" name="s_desciption" class="form-control" value="{{$employmentHistoryMange->s_desciption}}" autocomplete="off">
              <!-- <textarea class="ckeditor form-control" name="s_desciption"></textarea> -->
              @error('s_desciption')
				    <div class="alert alert-danger">{{ $message }}</div>
				@enderror
            </div>
          <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="send-pm"><i class="icon-material-outline-arrow-right-alt"></i>{{__('backendIndex.Update Employment History')}}</button>
        </form>
        <!-- Button -->
        

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