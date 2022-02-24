@extends('frontend.layout.template')
<!-- title section -->
@section('title')
Sign up
@endsection

@section('body-content')

<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-xl-5 offset-xl-3">

			<div class="login-register-page">
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3 style="font-size: 26px;">{{__('registation.One Account - All of Jam')}}</h3>
					<p>{{__('registation.Powered by Jam Unity')}}</p>
					
				</div>

				<!-- Account Type -->
				
					
				<!-- Form -->
				<form id="register-account-form"method="POST" action="{{route('admin.register.store')}}">
					 @csrf
					
					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="text" class="input-text with-border" type="email" name="email" required placeholder="Email Address">
						@error('email')
						    <div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>
					
                                

					<div class="input-with-icon-left" data-tippy-placement="bottom" data-tippy="" data-original-title="Should be at least 8 characters long">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" type="password" name="password" required autocomplete="new-password" placeholder="Password" >
						@error('password')
						    <div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat Password" >
					</div>
					@error('password')
						    <div class="alert alert-danger">{{ $message }}</div>
					@enderror
					<!-- @if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif -->
					<input type="submit" name=""class="button full-width button-sliding-icon ripple-effect margin-top-10 icon-material-outline-arrow-right-alt" style="width: 960px;" value="REGISTER">
					<span>Already have an account? <a href="">Log In!</a></span>
					<!-- Button -->
					<!-- <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" form="login-form" style="width: 960px;">Register <i class="icon-material-outline-arrow-right-alt"></i></button> -->
				</form>
				
				
				
				
			</div>

		</div>
	</div>
</div>
@endsection