@extends('frontend.layout.template')
<!-- title section -->
@section('title')
{{__('topbar.ContactUs')}}
@endsection
@section('body-content')



@section('body-content')
    



    <!-- contact-us start -->
<section class="contact-us">
  <div class="section mb-5">
    <div class="container-fluid">
      <div class="row">
        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3609.573319467586!2d55.28062201373316!3d25.21760783706328!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f4292edb8ef63%3A0xfe69627f9d080836!2sEmirates%20Towers!5e0!3m2!1sen!2sbd!4v1617979275231!5m2!1sen!2sbd" width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy"> -->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.020076035193!2d55.3406026491473!3d25.269910083783195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5ceec5a3eb9d%3A0x3873018827faef1d!2sAl%20Khubaisi%20(%20Pony%20Building%20)!5e0!3m2!1sen!2sbd!4v1638276976082!5m2!1sen!2sbd" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </iframe>
      </div>
    </div>
  </div>
  <div class="section pb-5 mb-5">
    <div class="container">
      <div class="row pb-5 mb-5 text-center">
        <div class="col-12 col-md-8 card-box">
          <div class="card-wrapper">

            <div class="form-card box-shadow">
              <div class="card-body">
                <div class="card-title">
                  <h1 class="con-head py-4">{{__('contact.get in touch')}}</h1>
                  <form action="{{route('contact.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <input type="text" class="form-control my-3 py-3 rounded-0" name="name" placeholder="{{__('contact.Full Name')}}">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                      <input type="email" name="email" class="form-control my-3 py-3 rounded-0" placeholder="{{__('contact.Email')}}">
                    </div>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                      <input type="text" class="form-control my-3 py-3 rounded-0" placeholder="{{__('contact.Phone Number')}}" name="phone">
                    </div>
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                      <textarea name="message" id="" placeholder="{{__('contact.Messages')}}"></textarea>
                    </div>
                    @error('message')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary">{{__('contact.SEND')}}</button>
                  </form>

                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4 add">
          <div class="address">
            <div class="contact-title py-4">
              <h2>{{__('contact.Contact Information')}}</h2>
            </div>
            <div class="info" style="margin-left: 40px;">
              <ul class="list-unstyled mb-0 pb-0">

                <li class="icon mb-0 pb-0">
                  <div class="icon"><i class="fa fa-map-marker"></i></div>
                </li>

                <li>
                  <div class="con-address text-left">
                    <p class="text-left">Room 6, First floor Pony building, </p>
                    <p class="text-left">Al Khabeesi Area - Al Ittihad Rd </p>
                    <p class="text-left">Deira - Dubai, UAE</p>
                  </div>
                </li>
              </ul>
              <ul class="list-unstyled  mb-0 pb-0">
                <li class="icon mb-0 pb-0">
                  <div class="icon"><i class="fa fa-envelope"></i></div>
                </li>
                <li class="mb-0 pb-0">
                  <div class="con-address">
                    <p class="">info@jamsam.dev</p>
                  </div>
                </li>
              </ul>

              <ul class="list-unstyled mb-0 pb-0">
                <li class="icon">
                  <div class="icon"><i class="fa-phone-volume"></i></div>
                </li>
                <li class="mb-0 pb-0">
                  <div class="con-address">
                    <p class="">0569443479</p>
                  </div>
                </li>
              </ul>
              <ul class="list-unstyled mb-0 pb-0">
                <li class="icon">
                  <div class="icon"><i class="fa fa-mobile-alt"></i></div>
                </li>
                <li>
                  <div class="con-address">
                    <p class="">+00971 54549 4593</p>
                  </div>
                </li>
              </ul>




              </ul>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
</section>
   
    <!-- footer start -->
@include('includes.footer')
<!-- footer end -->
@endsection

