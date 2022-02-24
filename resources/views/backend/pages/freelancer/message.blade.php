
@extends('backend.layout.template')
@section('body-content')

<div class="dashboard-content-container" data-simplebar="init" style="height: 549px;">
	<div class="simplebar-track vertical" style="visibility: visible;">
		<div class="simplebar-scrollbar" style="visibility: visible; top: 44px; height: 244px;">
			
		</div>
	</div>
	<div class="simplebar-track horizontal" style="visibility: visible;">
		<div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;">
		</div>
	</div>
	<div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;">
		<div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
			<div class="dashboard-content-inner" style="min-height: 549px;">
			
				<!-- Dashboard Headline -->
				<div class="dashboard-headline">
					<h3 style="text-align:left;">{{__('message.Messages')}}</h3>

					<!-- Breadcrumbs -->
					<nav id="breadcrumbs" class="dark">
						<ul>
							<li><a href="#">{{__('backendIndex.Home')}}</a></li>
							<li><a href="#">{{__('backendIndex.Dashboard')}}</a></li>
							<li>{{__('message.Messages')}}</li>
						</ul>
					</nav>
				</div>
					@if($check == 0)
				<strong>{{__('message.First you send message anyone')}}</strong>

				@else
				<div class="messages-container margin-top-0">

					<div class="messages-container-inner">

						<!-- Messages -->
						<div class="messages-inbox">
							<!-- <div class="messages-headline">
								<div class="input-with-icon">
										<input id="autocomplete-input" type="text" placeholder="Search">
									<i class="icon-material-outline-search"></i>
								</div>
							</div> -->

							<ul>
								
								@foreach($datas as $data)
								@php
									$chatRoomId = App\Models\Backend\ChatRoom::orderBy('id','desc')->where('id', $data)->first();
									
									$message = App\Models\Backend\Message::orderBy('id','desc')->where('chat_room_id', $chatRoomId->id)->first();

									$userOne = App\Models\User::where('id',$chatRoomId->user_one)->first();
									$userTwo = App\Models\User::where('id',$chatRoomId->user_two)->first();
									
								@endphp
								<li>
									<a href="{{route('freelancer.messages.room',$chatRoomId->id)}}">
										<div class="message-avatar"><i class="status-icon status-online"></i>
											@if($userOne->id == Auth::user()->id)
											@if($userTwo->image == null)
										           <img src="{{ asset('images/default.jpeg')}}" alt="">
										         @else

										         	@if($userTwo->user_type_id == 1)
													<img src="{{ asset('images/freelancer/' . $userTwo->image)}}" alt="">
													@elseif($userTwo->user_type_id == 2)
													<img src="{{ asset('images/admin/' . $userTwo->image)}}" alt="">
													@elseif($userTwo->user_type_id == 3)
													<img src="{{ asset('images/employer/' . $userTwo->image)}}" alt="">
													@elseif($userTwo->user_type_id == 0)
													<img src="{{ asset('images/admin/' . $userTwo->image)}}" alt="">
													@endif
												@endif
											@else
											@if($userOne->image == null)
										           <img src="{{ asset('images/default.jpeg')}}" alt="">
										         @else
													@if($userOne->user_type_id == 1)
													<img src="{{ asset('images/freelancer/' . $userOne->image)}}" alt="">
													@elseif($userOne->user_type_id == 2)
													<img src="{{ asset('images/admin/' . $userOne->image)}}" alt="">
													@elseif($userOne->user_type_id == 3)
													<img src="{{ asset('images/employer/' . $userOne->image)}}" alt="">
													@elseif($userOne->user_type_id == 0)
													<img src="{{ asset('images/admin/' . $userOne->image)}}" alt="">
													@endif
												@endif
											@endif
										</div>

										<div class="message-by">
											<div class="message-by-headline">

												@if($userOne->id == Auth::user()->id)
												<h5>{{$userTwo->full_name}}</h5>
												@else
												<h5>{{$userOne->full_name}}</h5>
												@endif

												<span>{{$message->created_at->diffForHumans()}}</span>
											</div>
											
										</div>
									</a>
								</li>
								@endforeach

							</ul>
						</div>
						<!-- Messages / End -->

						<!-- Message Content -->
						<div class="message-content">

							<div class="messages-headline">
								@php
								$userOne = App\Models\User::where('id',$chatRoom->user_one)->first();
								$userTwo = App\Models\User::where('id',$chatRoom->user_two)->first();
								@endphp
								@if($userOne->id == Auth::user()->id)
								<h4>{{$userTwo->full_name}}</h4>
								@else
								<h4>{{$userOne->full_name}}</h4>
								@endif
								<!-- <a href="#" class="message-action"><i class="icon-feather-trash-2"></i> Delete Conversation</a> -->
							</div>
							
							<!-- Message Content Inner -->
							<div class="message-content-inner">
									
		

									@foreach($messages as $message)
									@php
										$user = App\Models\User::where('id',$message->user_id)->first();
										
									@endphp
									@if($message->user_id == Auth::user()->id)
									<div class="message-bubble me">
										<div class="message-bubble-inner">
											<div class="message-avatar">
												@if($user->image == null)
										           <img src="{{ asset('images/default.jpeg')}}" alt="">
										         @else
													<img src="{{ asset('images/freelancer/' . $user->image)}}" alt="">
												@endif
											</div>
											<div class="message-text"><p>{{$message->message}}</p>
												@if($message->file == null)
												@else
													<div class="attachments-container">
														<a href="{{route('message.file.download',$message->id)}}" class="attachment-box ripple-effect"><i>File</i></a>
													</div>
												@endif
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
									@else
									<div class="message-bubble">
										<div class="message-bubble-inner">
											<div class="message-avatar">
												@if($user->image == null)
										           <img src="{{ asset('images/default.jpeg')}}" alt="">
										         @else
													@if($user->user_type_id == 1)
													<img src="{{ asset('images/freelancer/' . $user->image)}}" alt="">
													@elseif($user->user_type_id == 2)
													<img src="{{ asset('images/admin/' . $user->image)}}" alt="">
													@elseif($user->user_type_id == 3)
													<img src="{{ asset('images/employer/' . $user->image)}}" alt="">
													@elseif($user->user_type_id == 0)
													<img src="{{ asset('images/admin/' . $user->image)}}" alt="">
													@endif
												@endif
											</div>
											<div class="message-text"><p>{{$message->message}}</p>
												@if($message->file == null)
												@else
													<div class="attachments-container">
														<a href="{{route('message.file.download',$message->id)}}" class="attachment-box ripple-effect"><i>File</i></a>
													</div>
												@endif
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
									@endif
									@endforeach

									
							</div>
							<!-- Message Content Inner / End -->
							<form action="{{route('send.message.freelancer.room',$chatRoom->id)}}" method="POST" enctype="multipart/form-data">
							<!-- Reply Area -->
							<input class="uploadButton-input" type="file" accept="image/*, application/pdf,.zip,.rar,.7zip" id="upload" name="file" multiple/>
							<div class="message-reply">
								
									@csrf
									<textarea rows="4"  placeholder="{{__('message.Your Message')}}" name="message"></textarea>
									<button class="button ripple-effect" type="submit">{{__('message.Send')}}</button>
							</div>
							
							
							</form>
								

						</div>
						<!-- Message Content -->

					</div>
			</div>
			@endif
			<!-- Messages Container / End -->


			<script src="{{asset('js/jquery-2.2.4.min.js')}}"></script>

			<script type="text/javascript">
				

				function allData(){
					$.ajax({
						type: "GET",
						dataType: 'json',
						url: "/employer/all/messages/",
						success:function(data){
							$.each(data, function(key,value){
								console.log(value.message);
							})
						}
					})
				}
				allData()
			</script>
			
			<!-- Footer -->
			@include('includes.dashboardFooter')
			<!-- Footer / End -->

			</div>
		</div>
	</div>
</div>
@endsection