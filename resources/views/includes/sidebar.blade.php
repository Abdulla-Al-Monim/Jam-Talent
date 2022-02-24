<!-- Dashboard Sidebar
	================================================== -->
	<div class="dashboard-sidebar">
		<div class="dashboard-sidebar-inner" data-simplebar>
			<div class="dashboard-nav-container">

				<!-- Responsive Navigation Trigger -->
				<a href="#" class="dashboard-responsive-nav-trigger">
					<span class="hamburger hamburger--collapse" >
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
					<span class="trigger-title"></span>
				</a>
				@if( Route::has('login'))
		            @auth
				<!-- Navigation -->
				<div class="dashboard-nav">
					<div class="dashboard-nav-inner">

						<ul data-submenu-title="{{__('sidebar.Start')}}">
							<li class="active"><a href="{{route('user.dashbord')}}"><i class="icon-material-outline-dashboard"></i>{{__('sidebar.Dashboard')}} </a></li>
							<!-- <li><a href="{{route('admin.message')}}"><i class="icon-material-outline-question-answer"></i> Messages <span class="nav-tag">2</span></a></li> -->
							<!-- addmin sidebar start --->
							@if( Auth::user()->user_type_id == 2 )
							<li><a href="#"><i class="icon-material-outline-business-center"></i> {{__('sidebar.Users')}}</a>
								<ul>
									<li><a href="{{route('admin.all')}}">{{__('sidebar.Admins')}}</a></li>
									<li><a href="{{route('freelancer.all')}}">{{__('sidebar.Freelancers')}}</a></li>
									<li><a href="{{route('employer.all')}}">{{__('sidebar.Employers')}}</a></li>
								</ul>	
							</li>
							<li><a href="#"><i class="icon-material-outline-business-center"></i> {{__('sidebar.Categories')}}</a>
								<ul>
									<li><a href="{{route('category.create')}}">{{__('sidebar.Create Category
')}}</a></li>
									<li><a href="{{route('category.manage')}}">{{__('sidebar.Manage Categories
')}}</a></li>
									
								</ul>	
							</li>
							@endif
							<!-- addmin sidebar end --->							
							@if( Auth::user()->user_type_id == 0 )
							<li><a href="{{route('checkout.all')}}"><i class="icon-material-outline-star-border"></i></i>{{__('sidebar.Membership Payment')}} </a></li>
							<li><a href="{{route('all.apply')}}"><i class="icon-material-outline-star-border"></i></i>{{__('sidebar.grow with jamtalent')}}</a></li>
							<li><a href="#"><i class="icon-material-outline-business-center"></i> {{__('sidebar.Payments')}}</a>
								<ul>
									<li><a href="{{route('job.payment.all')}}">{{__('sidebar.Job')}}</a></li>
									<li><a href="{{route('task.payment.all')}}">{{__('sidebar.Task')}} </a></li>
									<li><a href="{{route('all.custom.offer.payment')}}">{{__('sidebar.Custom Offer')}}</a></li>
								</ul>	
							</li>
							<li><a href="#"><i class="icon-material-outline-business-center"></i> {{__('sidebar.Membership Setup')}}</a>
								<ul>
									<li><a href="{{route('membership.create')}}">{{__('sidebar.Create')}} </a></li>
									<li><a href="{{route('membership.manage')}}">{{__('sidebar.Manage')}}</a></li>
									
								</ul>	
							</li>
								<!-- super admin sidebar end --->
								<li><a href="#"><i class="icon-material-outline-business-center"></i>{{__('sidebar.All Users')}}</a>
									<ul>
										<li><a href="{{route('admin.all')}}">{{__('sidebar.Admins')}} </a></li>
										<li><a href="{{route('freelancer.all')}}">{{__('sidebar.Freelancers')}}</a></li>
										<li><a href="{{route('employer.all')}}">{{__('sidebar.Employers')}}</a></li>
									</ul>	
								</li>
								
								<li><a href="#"><i class="icon-material-outline-business-center"></i>{{__('sidebar.Add User')}}</a>
									<ul>
										<li><a href="{{route('admin.add')}}">{{__('sidebar.Admin')}} </a></li>
										<li><a href="{{route('freelancer.add')}}">{{__('sidebar.Freelancer')}}</a></li>
										<li><a href="{{route('employer.add')}}">{{__('sidebar.Employer')}}</a></li>
									</ul>	
								</li>
								<li><a href="#"><i class="icon-material-outline-business-center"></i> {{__('sidebar.Categories')}}</a>
									<ul>
										<li><a href="{{route('category.create')}}">{{__('sidebar.Create Category')}}</a></li>
										<li><a href="{{route('category.manage')}}">{{__('sidebar.Manage Categories')}}</a></li>
										
									</ul>	
								</li>
							@endif
							
							<!-- super addmin sidebar end --->
							@if(Auth::user()->status == null)
							<li><a href="#"><i class="icon-material-outline-business-center"></i> {{__('sidebar.Blogs')}}</a>
							</li>
							@else
							<li><a href="#"><i class="icon-material-outline-business-center"></i>{{__('sidebar.Blogs')}}</a>
								<ul>
									
									@if(Auth::user()->user_type_id == 0)
									<li><a href="{{route('blog.type.create')}}">{{__('sidebar.Create blog type')}}</a></li>
									<li><a href="{{route('blog.type.manage')}}">{{__('sidebar.Manage blog type')}}</a></li>
									@elseif(Auth::user()->user_type_id == 2)
									<li><a href="{{route('blog.type.create')}}">{{__('sidebar.Create blog type')}}</a></li>
									<li><a href="{{route('blog.type.manage')}}">{{__('sidebar.Manage blog type')}}</a></li>
									@endif
									@php
									$count = App\Models\Backend\Blogtype::count();
									@endphp
									@if($count > 0)
									
									<li><a href="{{route('blog.create')}}">{{__('sidebar.Create blog')}}</a></li>
									<li><a href="{{route('blog.manage')}}">{{__('sidebar.Manage blog')}}</a></li>
									
									@endif
									
								</ul>	
							</li>
							@endif
							@if( Auth::user()->status == null)
							<li><a href="{{route('user.dashbord')}}"><i class="icon-material-outline-star-border"></i></i> {{__('sidebar.Bookmarks')}}</a></li>
							@else

							@if( Auth::user()->user_type_id == 1 )
							@if(Auth::user()->status == null)
							<li><a href="{{route('freelancer.edit')}}"><i class="icon-material-outline-star-border"></i></i> {{__('sidebar.Bookmarks')}}</a></li>
							@else
							<li><a href="{{route('manage.bookmark.freelancer')}}"><i class="icon-material-outline-star-border"></i> {{__('sidebar.Bookmarks')}}</a></li>
							<li><a href="{{route('freelancer.earning')}}"><i class="icon-material-outline-star-border"></i> {{__('sidebar.Earning')}}</a></li>
							<li><a href="{{route('manage.review.freelancer')}}"><i class="icon-material-outline-rate-review"></i>{{__('sidebar.Reviews')}}</a></li>
							<li><a href="{{route('freelancer.messages')}}"><i class="icon-material-outline-question-answer"></i>{{__('sidebar.Messages')}}</span></a></li>
							@endif
							@elseif(Auth::user()->user_type_id == 3)
							<li><a href="{{route('manage.bookmark.employer')}}"><i class="icon-material-outline-star-border"></i>{{__('sidebar.Bookmarks')}}</a></li>
							<li><a href="{{route('manage.review.employer')}}"><i class="icon-material-outline-rate-review"></i>{{__('sidebar.Reviews')}}</a></li>
							<li><a href="{{route('employer.messages')}}"><i class="icon-material-outline-question-answer"></i> {{__('sidebar.Messages')}}</span></a></li>
							<li><a href="{{route('employer.membership.plan')}}"><i class="icon-material-outline-star-border"></i>{{__('sidebar.My membership plan')}}</span></a></li>
							
							@endif

							@endif
							
							
						</ul>
						
						<ul data-submenu-title="{{__('sidebar.Organize and Manage')}}">
							<!-- job side bar -->
							@if(Auth::user()->status == null)
							<li><a href="{{route('user.dashbord')}}"><i class="icon-material-outline-business-center"></i> {{__('sidebar.Jobs')}}</a>
							@else
							<li><a href="#"><i class="icon-material-outline-business-center"></i> {{__('sidebar.Jobs')}}</a>
								<ul>
									@if( Auth::user()->user_type_id == 1 )
									@php 
										$count = App\Models\Backend\JobApply::orderBy('id','asc')->where('freelancer_id',Auth::user()->id)->where('status',0)->count();
									@endphp
									<li><a href="{{route('applied.job.manage')}}">{{__('sidebar.Applied Jobs')}}<span class="nav-tag">{{$count}}</span></a></li>
									@php 
										$count = App\Models\Backend\Job::orderBy('id','asc')->where('freelancer_id',Auth::user()->id)->count();
									@endphp
									<li><a href="{{route('freelancer.active.job')}}">{{__('sidebar.Active Job')}}<span class="nav-tag">{{$count}}</span></a></li>
									<!-- admin route -->
									@elseif(Auth::user()->user_type_id == 2)
									@php 
										$count = App\Models\Backend\Job::orderBy('id','asc')->where('status',1)->count();
									@endphp
									<li><a href="{{route('all.post.job')}}">{{__('sidebar.All Posted Jobs')}} <span class="nav-tag">

										{{$count}}</span></a></li>
									<!-- super  admin route end -->
									@elseif(Auth::user()->user_type_id == 0)
									@php 
										$count = App\Models\Backend\Job::orderBy('id','asc')->where('status',1)->count();
									@endphp
									<li><a href="{{route('all.post.job')}}">{{__('sidebar.All Posted Jobs')}}<span class="nav-tag">

										{{$count}}</span></a>
									</li>

									<li><a href="{{route('show.job.each.week')}}">{{__('sidebar.All Posted Jobs Week')}}<span class="nav-tag">
										@php 
										$date = \Carbon\Carbon::today()->subDays(7);
											$count = App\Models\Backend\Job::orderBy('id','asc')->where('status',1)->where('created_at','>=',$date)->count();
										@endphp
										{{$count}}</span></a>
									</li>
									<li><a href="{{route('show.job.each.day')}}">{{__('sidebar.All Posted Jobs day')}}<span class="nav-tag">
										@php 
										$date = \Carbon\Carbon::today();
											$count = App\Models\Backend\Job::orderBy('id','asc')->where('status',1)->where('created_at','>=',$date)->count();
										@endphp
										{{$count}}</span></a>
									</li>
									<!-- super admin route end -->
									@elseif(Auth::user()->user_type_id == 3)
									@php 
										$countJob = App\Models\Backend\Job::orderBy('id','asc')->where('user_id',Auth::user()->id)->count();
									@endphp
									@php
											$count = App\Models\Backend\Checkout::orderBy('id','asc')->where('user_id',Auth::user()->id)->count();
									 @endphp
									 @if($count > 0)
									 @php
													$checkout = App\Models\Backend\Checkout::where('user_id',Auth::user()->id)->first();
													@endphp
									@if($checkout->expired_date > Carbon\Carbon::now())				
									<li><a href="{{route('job.post')}}">{{__('sidebar.Post a Job')}}</a></li>
									@else
									<li><a href="{{route('update.alert')}}">{{__('sidebar.Post a Job')}}</a></li>
									@endif
									@else
									<li><a href="{{route('buy.alert')}}">{{__('sidebar.Post a Job')}}</a></li>
									@endif
									<li><a href="{{route('job.manage')}}">{{__('sidebar.Manage Jobs')}} <span class="nav-tag">{{$countJob}}</span></a></li>
									@endif

								</ul>	
							</li>
							<!-- job side bar end-->
							@endif
							@if(Auth::user()->status == null)
							<li><a href="{{route('user.dashbord')}}"><i class="icon-material-outline-assignment"></i>{{__('sidebar.Tasks')}}</a>
							@else

							<!-- tast Sidebar start -->
							<li><a href="#"><i class="icon-material-outline-assignment"></i>{{__('sidebar.Tasks')}}</a>
								<ul>
									@if( Auth::user()->user_type_id == 1 )
									@php
										$count = App\Models\Backend\TaskOffer::where('freelancer_id',Auth::user()->id)->where('status',0)->count();
									@endphp
									<li><a href="{{route('request.task.manage')}}">{{__('sidebar.Custom Offer')}} <span class="nav-tag">

										{{$count}}</span> </a></li>
									<li><a href="{{route('freelancer.active.bid')}}">
										@php 
										$count = App\Models\Backend\TaskApply::where('freelancer_id',Auth::user()->id)->where('status',0)->count();
										@endphp
										{{__('sidebar.My Active Bids')}} <span class="nav-tag">

										{{$count}}</span></a>
									</li>
									<!-- admin start -->
									@elseif(Auth::user()->user_type_id == 2)
										
										<li>
										@php 
											$count = App\Models\Backend\Task::count();
										@endphp
										<a href="{{route('all.post.task')}}">
										{{__('sidebar.Posted Tasks')}}<span class="nav-tag">{{$count}}</span></a>
									</li>
									<!-- admin end -->

									<!--super admin start -->
									@elseif(Auth::user()->user_type_id == 0)
										
									<li>
										@php 
											$count = App\Models\Backend\Task::count();
										@endphp
										<a href="{{route('all.post.task')}}">
										{{__('sidebar.Posted Tasks')}} <span class="nav-tag">{{$count}}</span></a>
									</li>
									<li>
										@php 
										$date = \Carbon\Carbon::today()->subDays(7);
											$count = App\Models\Backend\Task::where('created_at','>=',$date)->count();
										@endphp
										<a href="{{route('show.task.each.week')}}">
										{{__('sidebar.Posted Tasks last week')}}<span class="nav-tag">{{$count}}</span></a>
									</li>
									<li>
										@php 
										$date = \Carbon\Carbon::today();
											$count = App\Models\Backend\Task::where('created_at','>=',$date)->count();
										@endphp
										<a href="{{route('show.task.each.day')}}">
										{{__('sidebar.Posted Tasks last day')}}<span class="nav-tag">{{$count}}</span></a>
									</li>
									<!--super admin end -->
									@elseif(Auth::user()->user_type_id == 3)
									@php
											$count = App\Models\Backend\Checkout::orderBy('id','asc')->where('user_id',Auth::user()->id)->count();
									 @endphp
									 @if($count>0)
									 	@php
											$checkout = App\Models\Backend\Checkout::where('user_id',Auth::user()->id)->first();
										@endphp
										@if($checkout->expired_date > Carbon\Carbon::now())
											<li><a href="{{route('task.post')}}">{{__('sidebar.Post a Task')}}</a></li>
										@else
											<li><a href="{{route('update.alert')}}">{{__('sidebar.Post a Task')}}</a></li>
											@endif
									@else
									<li><a href="{{route('buy.alert')}}">{{__('sidebar.Post a Task')}}</a></li>
									@endif
									@php 
										$count = App\Models\Backend\Task::where('employer_id',Auth::user()->id)->where('freelancer_id',null)->count();
									@endphp
									<li><a href="{{route('task.manage.emp')}}">{{__('sidebar.Manage Tasks')}}<span class="nav-tag">{{$count}}</span></a>
									</li>

									<li>
										@php 
											$count = App\Models\Backend\TaskOffer::where('employer_id',Auth::user()->id)->count();
										@endphp
										<a href="{{route('mangage.custom.offer')}}">
										{{__('sidebar.Manage Custom Offers')}}<span class="nav-tag">{{$count}}</span></a>
									</li>
									<li>
										@php 
											$count = App\Models\Backend\TaskApply::where('employer_id',Auth::user()->id)->where('status',1)->count();
										@endphp
										<!-- <a href="{{route('order.manage.emp')}}">
										
										Manage Orders <span class="nav-tag">

										{{$count}}</span></a> -->
									</li>
									
									@else
									@endif
								</ul>	
							</li>
							@endif
							<!-- tast Sidebar End -->
							<!-- order side Bar start -->
							@if(Auth::user()->status == null)
							<li><a href="{{route('user.dashbord')}}"><i class="icon-material-outline-assignment"></i> Orders</a>
							@else
							<li><a href="#"><i class="icon-material-outline-assignment"></i> {{__('sidebar.Orders')}}</a>
								<ul>
									@if( Auth::user()->user_type_id == 1 )
									<li><a href="{{route('freelancer.active.order')}}">
										@php 
										$count = App\Models\Backend\Order::where('freelancer_id',Auth::user()->id)->where('status',1)->count();
										@endphp
										{{__('sidebar.My Active Orders')}}<span class="nav-tag">

										{{$count}}</span></a>
									</li>
									<li><a href="{{route('freelancer.delivered.order')}}">
										@php 
										$count = App\Models\Backend\Order::where('freelancer_id',Auth::user()->id)->where('status',2)->count();
										@endphp
										{{__('sidebar.My Delivered Order')}}<span class="nav-tag">

										{{$count}}</span></a>
									</li>
									<li><a href="{{route('freelancer.completed.order')}}">
										@php 
										$count = App\Models\Backend\Order::where('freelancer_id',Auth::user()->id)->where('status',3)->count();
										@endphp
										{{__('sidebar.My Completed Orders')}}<span class="nav-tag">

										{{$count}}</span></a>
									</li>
									<li>
										@php 
											$count = App\Models\Backend\Order::where('freelancer_id',Auth::user()->id)->where('status',5)->count();
										@endphp
										<a href="{{route('manage.cancel.request.freelancer')}}">
										
										{{__('sidebar.Cancel Requested')}} <span class="nav-tag">

										{{$count}}</span></a>
									</li>

									<li>
										@php 
											$count = App\Models\Backend\Order::where('freelancer_id',Auth::user()->id)->where('status',6)->count();
										@endphp
										<a href="{{route('manage.cancel.order.freelancer')}}">
										
										{{__('sidebar.Canceled')}}<span class="nav-tag">

										{{$count}}</span></a>
									</li>

									@elseif(Auth::user()->user_type_id == 2)
									<!-- admin route -->
									<li>
										@php 
											$count = App\Models\Backend\Order::where('status',1)->count();
										@endphp
										<a href="{{route('all.active.order')}}">
										
										{{__('sidebar.Active Orders')}}<span class="nav-tag">

										{{$count}}</span></a>
									</li>
									<li>
										@php 
											$count = App\Models\Backend\Order::where('status',3)->count();
										@endphp
										<a href="{{route('all.complete.order.superAdmin')}}">
										
										{{__('sidebar.Completed Orders')}}<span class="nav-tag">

										3</span></a>
									</li>
									<li>
										@php 
											$count = App\Models\Backend\Order::where('status',6)->count();
										@endphp
										<a href="{{route('all.cancel.order')}}">
										
										{{__('sidebar.Cancel Orders')}}<span class="nav-tag">

										{{$count}}</span></a>
									</li>
									<!-- admin route end -->
									@elseif(Auth::user()->user_type_id == 0)
									<!-- super admin route -->
									<li>
										@php 
											$count = App\Models\Backend\Order::where('status',1)->count();
										@endphp
										<a href="{{route('all.active.order.superAdmin')}}">
										
										{{__('sidebar.Active Orders')}}<span class="nav-tag">

										{{$count}}</span></a>
									</li>
									<li>
										@php 
										$date = \Carbon\Carbon::today()->subDays(7);
											$count = App\Models\Backend\Order::where('status',1)->where('created_at','>=',$date)->count();
										@endphp
										<a href="{{route('all.active.order.last.week')}}">
										
										{{__('sidebar.Active Orders week')}}<span class="nav-tag">

										{{$count}}</span></a>
									</li>
									
									<li>
										@php 
											$count = App\Models\Backend\Order::where('status',3)->count();
										@endphp
										<a href="{{route('all.complete.order.superAdmin')}}">
										
										{{__('sidebar.Completed Orders')}}<span class="nav-tag">

										{{$count}}</span></a>
									</li>
									<li>
										@php 
											$count = App\Models\Backend\Order::where('status',6)->count();
										@endphp
										<a href="{{route('all.cancel.order')}}">
										
										{{__('sidebar.Cancel Orders')}}<span class="nav-tag">

										{{$count}}</span></a>
									</li>
									<!-- super admin route start -->
									@elseif(Auth::user()->user_type_id == 3)
									<li>
										@php 
											$count = App\Models\Backend\Order::where('employer_id',Auth::user()->id)->where('status',1)->count();
										@endphp
										<a href="{{route('order.manage.emp')}}">
										
										{{__('sidebar.Active Orders')}}<span class="nav-tag">

										{{$count}}</span></a>
									</li>
									<li>
										@php 
											$count = App\Models\Backend\Order::where('employer_id',Auth::user()->id)->where('status',2)->count();
										@endphp
										<a href="{{route('order.delivered.emp')}}">
										
										{{__('sidebar.Delivered')}} <span class="nav-tag">

										{{$count}}</span></a>
									</li>
									<li>
										@php 
											$count = App\Models\Backend\Order::where('employer_id',Auth::user()->id)->where('status',3)->count();
										@endphp
										<a href="{{route('order.confirmed.emp')}}">
										
										{{__('sidebar.Completed')}} <span class="nav-tag">

										{{$count}}</span></a>
									</li>
									<!-- cancel requested start-->
									<li>
										@php 
											$count = App\Models\Backend\Order::where('employer_id',Auth::user()->id)->where('status',5)->count();
										@endphp
										<a href="{{route('manage.cancel.request.employer')}}">
										
										{{__('sidebar.Cancel Requested')}}<span class="nav-tag">

										{{$count}}</span></a>
									</li>
									<!-- cancel requested End-->
									<li>
										@php 
											$count = App\Models\Backend\Order::where('employer_id',Auth::user()->id)->where('status',6)->count();
										@endphp
										<a href="{{route('manage.cancel.order.employer')}}">
										
										{{__('sidebar.Canceled')}}<span class="nav-tag">

										{{$count}}</span></a>
									</li>
									@else
									@endif
								</ul>	
							</li>
							@endif
							<!-- order side bar end -->
							@if(Auth::user()->status == null)
							<li><a href="{{route('user.dashbord')}}"><i class="icon-material-outline-assignment"></i> {{__('sidebar.Cancel Requested')}}</a>
							@else

							@if(Auth::user()->user_type_id == 2)
							<!-- cancel requst side Bar start -->

							<li><a href="#"><i class="icon-material-outline-assignment"></i> {{__('sidebar.Cancel Requested')}}</a>
								<ul>
									
									
									<li>
										@php 
											$count = App\Models\Backend\OrderCancel::where('status',0)->where('cancel_request',1)->count();
										@endphp
										<a href="{{route('all.cancel.request.freelancer')}}">
										
										{{__('sidebar.Freelancer')}}<span class="nav-tag">

										{{$count}}</span></a>
									</li>
									<li>
										@php 
											$count = App\Models\Backend\OrderCancel::where('status',0)->where('cancel_request',2)->count();
										@endphp
										<a href="{{route('all.cancel.request.employer')}}">
										
										{{__('sidebar.Employer')}}<span class="nav-tag">

										{{$count}}</span></a>
									</li>
									
								</ul>	
							</li>
							@elseif(Auth::user()->user_type_id == 0)
							<li><a href="#"><i class="icon-material-outline-assignment"></i> {{__('sidebar.Cancel Requested')}}</a>
								<ul>
									
									
									<li>
										@php 
											$count = App\Models\Backend\OrderCancel::where('status',0)->where('cancel_request',1)->count();
										@endphp
										<a href="{{route('all.cancel.request.freelancer')}}">
										
										{{__('sidebar.Freelancer')}}<span class="nav-tag">

										{{$count}}</span></a>
									</li>
									<li>
										@php 
											$count = App\Models\Backend\OrderCancel::where('status',0)->where('cancel_request',2)->count();
										@endphp
										<a href="{{route('all.cancel.request.employer')}}">
										
										{{__('sidebar.Employer')}}<span class="nav-tag">

										{{$count}}</span></a>
									</li>
									
								</ul>	
							</li>
							<!-- cancel requst side Bar end -->

							@endif

							@endif
						</ul>
						
						</ul>

						</ul>
						<ul data-submenu-title="{{__('sidebar.Account')}}">
							@if(Auth::user()->status == null)
							<li><a href="{{route('user.dashbord')}}"><i class="icon-material-outline-assignment"></i> {{__('sidebar.Settings')}}</a>
							@else
							<li><a href="#"><i class="icon-material-outline-assignment"></i> {{__('sidebar.Settings')}}</a>
								<ul>
									@if( Auth::user()->user_type_id == 1 )
										<li><a href="{{route('freelancer.edit')}}"><i class="icon-matesrial-outline-settings"></i>{{__('sidebar.Profile')}}</a></li>
										<li><a href="{{route('freelancer.social.media')}}"><i class="icon-matesrial-outline-settings"></i>{{__('sidebar.Social Media')}}</a></li>

										<li><a href="{{route('freelancer.skill')}}"><i class="icon-matesrial-outline-settings"></i> {{__('sidebar.Skills')}}</a></li>
										<li><a href="{{route('change.password')}}">{{__('sidebar.Change Password')}}</a></li>
										<!-- <li><a href="{{route('change.password')}}"><i class="icon-matesrial-outline-settings"></i> Password Change</a></li> -->
										
										<li><a href="{{route('add.employment.history')}}">{{__('sidebar.Add Employment 
History')}}</a></li>
										<li><a href="{{route('manage.employment.history')}}">{{__('sidebar.Manage Employment History')}}</a></li>
									@elseif(Auth::user()->user_type_id == 2)
										<li><a href="{{route('admin.edit')}}"><i class="icon-material-outline-settings"></i> {{__('sidebar.Profile')}}</a></li>
										<li><a href="{{route('change.password')}}">{{__('sidebar.Change Password')}}</a></li>
										<li><a href="{{route('super.admin.social.media')}}"><i class="icon-matesrial-outline-settings"></i>{{__('sidebar.Social Media')}}</a></li>
										<!-- <li><a href="{{route('change.password')}}"><i class="icon-matesrial-outline-settings"></i> Password Change</a></li> -->
										
									@elseif(Auth::user()->user_type_id == 0)
										<li><a href="{{route('admin.edit')}}"><i class="icon-material-outline-settings"></i> {{__('sidebar.Profile')}}</a></li>
										<li><a href="{{route('change.password')}}">{{__('sidebar.Change Password')}}</a></li>
										<li><a href="{{route('super.admin.social.media')}}"><i class="icon-matesrial-outline-settings"></i>{{__('sidebar.Social Media')}}</a></li>
										<!-- <li><a href="{{route('change.password')}}"><i class="icon-matesrial-outline-settings"></i> Password Change</a></li> -->
									@elseif(Auth::user()->user_type_id == 3)
										<li><a href="{{route('employer.edit')}}" >{{__('sidebar.Profile')}}</a></li>
										<li><a href="{{route('change.password')}}">{{__('sidebar.Change Password')}}</a></li>
										<li><a href="{{route('employer.social.media')}}"><i class="icon-matesrial-outline-settings"></i> {{__('sidebar.Social Media')}}</a></li>
										<!-- <li><a href="{{route('change.password')}}"><i class="icon-matesrial-outline-settings"></i> Password Change</a></li> -->
									@endif
									
								</li>
								</ul>
							</li>
							@endif
							<li>
								
								<form method="POST" action="{{ route('logout') }}">
						          @csrf

						          <a href="{{ route('logout') }}" class="icon-material-outline-power-settings-new test"
						              onclick="event.preventDefault();
						              this.closest('form').submit();">
						              {{__('sidebar.Log out')}}
						              
						          </a>
						        </form>
						    </li>
							</li>
						</ul>
						
					</div>
				</div>
				<!-- Navigation / End -->
					@endif

		        @endif
			</div>
		</div>
	</div>
	<!-- Dashboard Sidebar / End -->