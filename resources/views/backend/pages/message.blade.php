
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
					<h3>Messages</h3>

					<!-- Breadcrumbs -->
					<nav id="breadcrumbs" class="dark">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Messages</li>
						</ul>
					</nav>
				</div>
	
				<div class="messages-container margin-top-0">

					<div class="messages-container-inner">

						<!-- Messages -->
						<div class="messages-inbox">
							<div class="messages-headline">
								<div class="input-with-icon">
										<input id="autocomplete-input" type="text" placeholder="Search">
									<i class="icon-material-outline-search"></i>
								</div>
							</div>

							<ul>
								<li>
									<a href="#">
										<div class="message-avatar"><i class="status-icon status-online"></i><img src="images/user-avatar-small-03.jpg" alt=""></div>

										<div class="message-by">
											<div class="message-by-headline">
												<h5>David Peterson</h5>
												<span>4 hours ago</span>
											</div>
											<p>Thanks for reaching out. I'm quite busy right now on many</p>
										</div>
									</a>
								</li>

								<li class="active-message">
									<a href="#">
										<div class="message-avatar"><i class="status-icon status-offline"></i><img src="images/user-avatar-small-02.jpg" alt=""></div>

										<div class="message-by">
											<div class="message-by-headline">
												<h5>Sindy Forest</h5>
												<span>Yesterday</span>
											</div>
											<p>Hi Tom! Hate to break it to you but I'm actually on vacation</p>
										</div>
									</a>
								</li>
								
								<li>
									<a href="#">
										<div class="message-avatar"><i class="status-icon status-offline"></i><img src="images/user-avatar-placeholder.png" alt=""></div>

										<div class="message-by">
											<div class="message-by-headline">
												<h5>Sebastiano Piccio</h5>
												<span>2 days ago</span>
											</div>
											<p>Hello, I want to talk about my project if you don't mind!</p>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="message-avatar"><i class="status-icon status-online"></i><img src="images/user-avatar-placeholder.png" alt=""></div>

										<div class="message-by">
											<div class="message-by-headline">
												<h5>Marcin Kowalski</h5>
												<span>2 days ago</span>
											</div>
											<p>Yes, I received payment. Thanks for cooperation!</p>
										</div>
									</a>
								</li>

							</ul>
						</div>
						<!-- Messages / End -->

						<!-- Message Content -->
						<div class="message-content">

							<div class="messages-headline">
								<h4>Sindy Forest</h4>
								<a href="#" class="message-action"><i class="icon-feather-trash-2"></i> Delete Conversation</a>
							</div>
							
							<!-- Message Content Inner -->
							<div class="message-content-inner">
									
									<!-- Time Sign -->
									<div class="message-time-sign">
										<span>28 June, 2019</span>
									</div>

									<div class="message-bubble me">
										<div class="message-bubble-inner">
											<div class="message-avatar"><img src="images/user-avatar-small-01.jpg" alt=""></div>
											<div class="message-text"><p>Thanks for choosing my offer. I will start working on your project tomorrow.</p></div>
										</div>
										<div class="clearfix"></div>
									</div>

									<div class="message-bubble">
										<div class="message-bubble-inner">
											<div class="message-avatar"><img src="images/user-avatar-small-02.jpg" alt=""></div>
											<div class="message-text"><p>Great. If you need any further clarification let me know. 👍</p></div>
										</div>
										<div class="clearfix"></div>
									</div>

									<div class="message-bubble me">
										<div class="message-bubble-inner">
											<div class="message-avatar"><img src="images/user-avatar-small-01.jpg" alt=""></div>
											<div class="message-text"><p>Ok, I will. 😉</p></div>
										</div>
										<div class="clearfix"></div>
									</div>

									<!-- Time Sign -->
									<div class="message-time-sign">
										<span>Yesterday</span>
									</div>

									<div class="message-bubble me">
										<div class="message-bubble-inner">
											<div class="message-avatar"><img src="images/user-avatar-small-01.jpg" alt=""></div>
											<div class="message-text"><p>Hi Sindy, I just wanted to let you know that project is finished and I'm waiting for your approval.</p></div>
										</div>
										<div class="clearfix"></div>
									</div>

									<div class="message-bubble">
										<div class="message-bubble-inner">
											<div class="message-avatar"><img src="images/user-avatar-small-02.jpg" alt=""></div>
											<div class="message-text"><p>Hi Tom! Hate to break it to you, but I'm actually on vacation 🌴 until Sunday so I can't check it now. 😎</p></div>
										</div>
										<div class="clearfix"></div>
									</div>

									<div class="message-bubble me">
										<div class="message-bubble-inner">
											<div class="message-avatar"><img src="images/user-avatar-small-01.jpg" alt=""></div>
											<div class="message-text"><p>Ok, no problem. But don't forget about last payment. 🙂</p></div>
										</div>
										<div class="clearfix"></div>
									</div>

									<div class="message-bubble">
										<div class="message-bubble-inner">
											<div class="message-avatar"><img src="images/user-avatar-small-02.jpg" alt=""></div>
											<div class="message-text">
												<!-- Typing Indicator -->
												<div class="typing-indicator">
													<span></span>
													<span></span>
													<span></span>
												</div>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
							</div>
							<!-- Message Content Inner / End -->
							
							<!-- Reply Area -->
							<div class="message-reply">
								<textarea cols="1" rows="1" placeholder="Your Message"></textarea>
								<button class="button ripple-effect">Send</button>
							</div>

						</div>
						<!-- Message Content -->

					</div>
			</div>
			<!-- Messages Container / End -->



			
			<!-- Footer -->
			@include('includes.dashboardFooter')
			<!-- Footer / End -->

			</div>
		</div>
	</div>
</div>
@endsection