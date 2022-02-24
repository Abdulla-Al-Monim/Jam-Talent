<!-- Footer -->
			<div class="dashboard-footer-spacer"></div>
			<div class="small-footer margin-top-15">
				<div class="small-footer-copyrights">
					© 2021 <strong>JamTalent</strong>. {{__('footer.All Rights Reserved.')}}
				</div>
				@if(Auth::user()->socialMedia)
				<ul class="footer-social-links">
					<img src="{{asset('images/pngwing.com.png')}}" class="img-fluid w-50">
					<li>
						<a href="{{Auth::user()->socialMedia->facebook}}" target="_blank" title="Facebook" data-tippy-placement="top">
							<i class="icon-brand-facebook-f"></i>
						</a>
					</li>
					<li>
						<a href="{{Auth::user()->socialMedia->twitter}}" target="_blank" title="Twitter" data-tippy-placement="top">
							<i class="icon-brand-twitter"></i>
						</a>
					</li>
					<li>
						<a href="{{Auth::user()->socialMedia->google_plus}}" target="_blank" title="Google Plus" data-tippy-placement="top">
							<i class="icon-brand-google-plus-g"></i>
						</a>
					</li>
					<li>
						<a href="{{Auth::user()->socialMedia->linkedin}}" target="_blank" title="LinkedIn" data-tippy-placement="top">
							<i class="icon-brand-linkedin-in"></i>
						</a>
					</li>
				</ul>
				@endif
				<div class="clearfix"></div>
			</div>
			<!-- Footer / End -->