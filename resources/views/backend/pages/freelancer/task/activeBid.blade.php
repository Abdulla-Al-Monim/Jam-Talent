@extends('backend.layout.template')
@section('title')
{{__('sidebar.My Active Bids')}}
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 611px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 277px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 611px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">{{__('backendTask.My Active Bids')}}</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('backendTask.My Active Bids')}}</li>
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
							<h3><i class="icon-material-outline-gavel"></i> {{__('backendTask.Bids List')}}</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
								@foreach($taskApplies as $taskApply)
								<li>
									@php
									$task = App\Models\Backend\Task::orderBy('id','asc')->where('id',$taskApply->task_id)->first();
									$employer = App\Models\User::where('id',$task->employer_id)->first();
									@endphp
									
									<!-- Job Listing -->
									<div class="job-listing width-adjustment">

										<!-- Job Listing Details -->
										<div class="job-listing-details">

											<!-- Details -->
											<div class="job-listing-description">
												
												<h3 class="job-listing-title"><a href="{{route('task.show',$taskApply->task_id)}}">{{$task->task_name}}</a></h3>
												
											</div>
										</div>
									</div>
									
									<!-- Task Details -->
								
									<ul class="dashboard-task-info">

										<li>
											<strong>${{$task->min_budget}} - ${{$task->max_budget}}</strong>
											<span>{{__('backendTask.Projct Budget')}}</span>

										</li>
										<li>
											<strong>${{$taskApply->min_budget}}</strong>
											<span>{{__('backendTask.My Budget')}}</span>
										</li>
										
									</ul>
									<!-- Task Details -->

									<ul class="dashboard-task-info">
										<li><strong>{{$task->delivery_time}} @if($task->delivery_type == 1){{__('backendTask.Days')}} @else {{__('backendTask.Hours')}} @endif</strong><span>{{__('backendTask.Project required delivery time')}}</span></li>
										
										<li><strong>{{$taskApply->delivary_time}}  @if($taskApply->delivery_type == 1){{__('backendTask.Days')}} @else {{__('backendTask.Hours')}} @endif</strong><span>{{__('backendTask.My required delivery time')}}</span></li>

										
									</ul>
									<!-- Buttons -->
									<div class="buttons-to-right always-visible">
										<a href="#small-dialog{{$taskApply->id}}" class="popup-with-zoom-anim button dark ripple-effect ico" data-tippy-placement="top" data-tippy="" data-original-title="Edit Bid"><i class="icon-feather-edit"></i></a>
										<!-- Edit Bid Popup
================================================== -->
										<div id="small-dialog{{$taskApply->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

											<!--Tabs -->
											<div class="sign-in-form">

												<ul class="popup-tabs-nav">
													<li><a href="#tab">{{__('backendTask.Edit Bid')}}</a></li>
												</ul>
												<form action="{{route('update.bid.freelancer',$taskApply->id)}}" method="POST">
													@csrf
													<div class="popup-tabs-container">

													<!-- Tab -->
													<div class="popup-tab-content" id="tab">
																
															<!-- Bidding -->
															<div class="bidding-widget">
																<!-- Headline -->
																<span class="bidding-detail">{{__('backendTask.Set your')}} <strong>{{__('backendTask.Hours')}}{{__('backendTask.price')}}</strong></span>

																<!-- Price Slider -->
																<div class="bidding-value">$<span id="biddingVal"></span></div>
																
																<input class="bidding-slider" type="text" name="min_budget" value="{{$taskApply->min_budget}}" data-slider-handle="custom" data-slider-currency="$" data-slider-min="{{$task->min_budget}}" data-slider-max="{{$task->max_budget}}" data-slider-value="{{$taskApply->min_budget}}" data-slider-step="1" data-slider-tooltip="hide" />
																
																
																<!-- Headline -->
																<span class="bidding-detail margin-top-30">{{__('backendTask.Set your')}} <strong>{{__('backendTask.delivery time')}}</strong></span>

																<!-- Fields -->
																<div class="bidding-fields">
																	<div class="bidding-field">
																		<!-- Quantity Buttons -->
																		<div class="qtyButtons with-border">
																			<div class="qtyDec"></div>
																			<input type="text" name="qtyInput" value="{{$taskApply->delivary_time}}">
																			<div class="qtyInc"></div>
																		</div>
																	</div>
																	<div class="bidding-field">
																		<select class="selectpicker default with-border" name="delivery_type">
																			<option selected value="1" @if ($taskApply->delivery_type == 1) selected @endif>{{__('backendTask.Days')}}</option>
																			<option value="0"  @if ($taskApply->delivery_type == 0) selected @endif>{{__('backendTask.Hours')}}</option>
																		</select>
																	</div>
																</div>
														</div>
														
														<!-- Button -->
														<button class="button full-width button-sliding-icon ripple-effect" type="submit">{{__('backendTask.Save Changes')}}<i class="icon-material-outline-arrow-right-alt"></i></button>

													</div>
												</form>
												

												</div>
											</div>
										</div>
										<!-- Edit Bid Popup / End -->
										<a href="#small-dialog-1{{$taskApply->id}}" class="popup-with-zoom-anim button red ripple-effect ico" data-tippy-placement="top" data-tippy="" data-original-title="Edit Bid"><i class="icon-feather-trash-2"></i></a>
										<!-- delete Bid Popup
================================================== -->
										<div id="small-dialog-1{{$taskApply->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

											<!--Tabs -->
											<div class="sign-in-form">

												<ul class="popup-tabs-nav">
													<li><a href="#tab1">{{__('backendTask.Delete Bid')}}</a></li>
												</ul>

												<div class="popup-tabs-container">

													<!-- Tab -->
													<div class="popup-tab-content" id="tab">
														
														<!-- Welcome Text -->
														<div class="welcome-text">
															<h3>{{__('backendTask.Are you sure want to delete this bid ?')}}</h3>
															

														</div>

														<form id="terms" method="POST" action="{{route('delete.bid.freelancer',$taskApply->id)}}" enctype="multipart/form-data">
															@csrf
															
															<!-- Button -->
															<button class="margin-top-15 button full-width button-sliding-icon ripple-effect" type="submit" form="terms">{{__('backendTask.Accept')}} <i class="icon-material-outline-arrow-right-alt"></i>
															</button>
														</form>

														

													</div>

												</div>
											</div>
										</div>
										<!-- Edit Bid Popup / End -->

										<a href="#small-dialog-2{{$employer->id}}" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i>{{__('backendTask.Send Message')}} </a>
                          <!-- Send Direct Message Popup
================================================== -->
<div id="small-dialog-2{{$employer->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

  <!--Tabs -->
  <div class="sign-in-form">

    <ul class="popup-tabs-nav">
      <li><a href="#tab2">{{__('backendTask.Send Message')}}</a></li>
    </ul>

    <div class="popup-tabs-container">

      <!-- Tab -->
      <div class="popup-tab-content" id="tab2">
        
        <!-- Welcome Text -->
        <div class="welcome-text">
          <h3>{{__('backendTask.Direct Message To')}} {{$employer->full_name}}</h3>
        </div>
          
        <!-- Form -->
        <form method="post" id="send-pm" action="{{route('send.message.emp',$employer->id)}}">
          @csrf
          <textarea name="message" cols="10" placeholder="{{__('backendTask.Message')}}" class="with-border" required></textarea>
          <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="send-pm">{{__('backendTask.Send')}} <i class="icon-material-outline-arrow-right-alt"></i></button>
        </form>
        <!-- Button -->
        

      </div>

    </div>
  </div>
</div>
									</div>
								</li>
								
								@endforeach
							</ul>
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