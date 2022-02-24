@extends('frontend.layout.template')
@section('title')
Log In
@endsection
@section('body-content')
<x-guest-layout>
   
    <div class="container" style="padding: 50px 0px;">
        <div class="row">
            <div class="col-xl-3">
                <input type="hidden" name="">
            </div>
            <div class="col-xl-6">


                <div class="login-register-page">
                    <!-- Welcome Text -->
                    <div class="welcome-text">
                        <h3>{{__('registation.One Account - All of Jam')}}</h3>
                        <span>{{__('registation.Powered by Jam Unity')}}</span>
                    </div>
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                    <!-- Form -->
                    <form method="POST" action="{{ route('login') }}" style="margin-bottom: 30px;">
                        @csrf
                        <div class="input-with-icon-left">
                            <i class="icon-material-baseline-mail-outline"></i>
                            <input type="text" class="input-text with-border" type="email" name="email" :value="old('email')" required autofocus>
                            
                        </div>

                        <div class="input-with-icon-left">
                            <i class="icon-material-outline-lock"></i>
                            <input type="password" class="input-text with-border" name="password" required autocomplete="current-password">
                             @error('password') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        @error('email') <span class="error" style="color:red;">{{ $message }}</span> @enderror
                       
                        @if (Route::has('password.request'))
                            <a href="{{route('password.request')}}" class="forgot-password">{{__('registation.Forgot Password?')}}</a>
                        @endif
                        <x-jet-button class="button full-width button-sliding-icon ripple-effect margin-top-10">
                            {{__('registation.Log In')}}
                            <i class="icon-material-outline-arrow-right-alt"></i>
                        </x-jet-button>
                    </form>
                   
                    <!-- Social Login -->
                    <a href="{{route('register.create')}}" class="margin-top-5" style="">{{__('registation.Dont have Account Sign Up!')}}</a>
                    
                </div>

            </div>
            <div class="col-xl-3">
                <input type="hidden" name="">
            </div>
        </div>
    </div>
</x-guest-layout>
@endsection


