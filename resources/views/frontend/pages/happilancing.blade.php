@extends('frontend.layout.template')
<!-- title section -->
@section('title')
{{__('happilancing.HAPPILANCING')}}
@endsection


@section('body-content')

<!-- top slider section start -->
<style type="text/css">
 
</style>
<section class="top-slider iahappy">
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
       
      </div>
    </div>
  </div>

  <div class="slider-text text-dark">
    <h1 class="text-light" style="text-align: center;">{{__('happilancing.HAPPILANCING HUB')}}</h1>
    <h3 class="text-light"style="text-align: center;">{{__('happilancing.Happy freelancing hub is a concept giving all the freelancing community a corporate working center where they can get all the facilities like other corporate employees.')}} </h3>
  </div>
</section>
<!-- top slider section end -->
<!-- Enjoy the difference start -->
<section class="enjoy-the-difference">
  <div class="container">
    <h2 class="text-center">{{__('happilancing.ENJOY THE')}} <span class="font-weight-bold">{{__('happilancing.DIFFERENCE.')}}</span></h2>
    <h4>{{__('happilancing.Because the increasing demand of the population needs a quality workplace, our aim is to break all the barriers for the workplace – no more limit in the time zone, no more limit in the geographical location, no more limit on the specific number of organizational work.')}}</h4>
    <div>
      <div class="row">
        <div class="col-md-4">
          <h3>{{__('happilancing.Our Happilancing Vision')}}</h3>
          <P>{{__('happilancing.JamTalent Happilancings vision is to create a united strong freelancer community through our happilancing hub. Only together we can make the difference.')}}</P>
        </div>
        <div class="col-md-4 ">
          <h3>{{__('happilancing.Our Happilancing Mission')}}</h3>
          <P>{{__('happilancing.JamTalent Happilancing Hub will be the trustable center for all the freelancers community in the world which is determined to give all almost all the similar facilities as like other workplace and would be considered as a career opportunity for the youth talent.')}}</P>
        </div>
        <div class="col-md-4">
          <h3>{{__('happilancing.Our Happilancing Goal')}}</h3>
          <P>{{__('happilancing.We will establish a happy freelancing hub franchise model called “Happilancing Hub”. It will be an official place for all the freelancers to do the office as in other job careers instead of home to spread the goodness all over the world.')}}</P>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Enjoy the difference end -->
<!-- second slider start -->

<!-- second slider end -->
<!-- Information Section Start -->
<section class="info-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-4 px-4">
        <div class="row text-right">
          <div class="col-12 mb-4">
            <h6>{{__('happilancing.Learning to Earning')}} <br>{{__('happilancing.Center')}}</h6>
            <p>{{__('happilancing.Happilancing Center will provide all the learning, training, internship to a guaranteed working opportunity to all the Happilancer Talents.')}}</p>
          </div>
          <div class="col-12 mb-4">
            <h6>{{__('happilancing.Give Identity Or Job Recognition')}}</h6>
            <p>{{__('happilancing.Most of the time freelancers are suffered no recognition or appreciation for their hard work. This model will give the identity to the freelancers and give them recognition.')}}</p>
          </div>
          <div class="col-12 mb-4">
            <h6>{{__('happilancing.Satisfying Working Environment')}}</h6>
            <p>{{__('happilancing.Our Happilancer community will have all the facilities like other working environments.')}}</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 px-4">
        <img src="{{asset('img/KnowledgeHublogoPNG.png')}}">
      </div>
      <div class="col-md-4 px-4">
        <div class="row text-left">
          <div class="col-12 mb-4">
            <h6>{{__('happilancing.Hackathon and Meet-Ups Programs')}}</h6>
            <p>{{__('happilancing.As we are building strong united freelancer community, we will arrange different types of meet up, challenges, competition, teamwork, recreational programs for the freelancer all over the world.')}}</p>
          </div>
          <div class="col-12 mb-4">
            <h6>{{__('happilancing.Brand And Companies Sponsorship Center')}}</h6>
            <p>{{__('happilancing.Through our different programs, live hackathon competitions, and competition, the big companies and brands can see the happilancer performance live and also sponsor them to encourage more.')}}</p>
          </div>
          <div class="col-12 mb-4">
            <h6>{{__('happilancing.Happilancer Internship Program')}}</h6>
            <p>{{__('happilancing.Our happilancers will get the special internship under strong big companies all over the world and get the real-time project experience under strong reputed companies.')}} </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Information Section End -->
<!-- Gallery Section Start -->
<!-- Gallery Section Start -->
<section class="gallery">
  <div class="row">
    <!-- 1st column -->
    <div class="col-md-5 col-12 p-0">
      <div class="row m-0">
        <div class="col-12 p-0">
          <div class="gallery-hvr">
            <img src="{{asset('img/6.35.2.jpeg')}}" class="md-img" alt="">
            <div class="hvr-txt" style="height: 69px!important; background: #222222!important;">
              <h3 style="margin-top: 11px!important; background: #222222!important;">{{__('happilancing.Market Researcher - Dubai')}} <br>{{__('happilancing.Hire Now')}} </h3>
             
            </div>
          </div>
        </div>
        <div class="col-6 p-0">
          <div class="gallery-hvr">
            <img src="{{asset('img/6.0.jpeg')}}" class="sm-img" alt="">
            <div class="hvr-txt" style="height: 69px!important; background: #222222!important;">
              <h3 style="    margin-top: 11px!important;
    font-size: 15px;
    background: #222222!important;
    padding: 0px 18px;
">{{__('happilancing.Copyright Writer - Singapore')}} <br> {{__('happilancing.Hire Now')}}</h3>
             
            </div>
          </div>
        </div>
        <div class="col-6 p-0">
          <div class="gallery-hvr">
            <img src="{{asset('img/111.jpeg')}}" class="sm-img" alt="">
            <div class="hvr-txt" style="height: 69px!important; background: #222222!important;">
              <h3 style="    margin-top: 11px!important;
    font-size: 15px;
    background: #222222!important;
    padding: 0px 18px;
">{{__('happilancing.Ai Programmer - New Delhi')}} <br> {{__('happilancing.Hire Now')}}</h3>
             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- 2nd column -->
    <div class="col-md-2 col-12 p-0">
      <div class="row m-0">
        <div class="col-12 p-0">
          <div class="gallery-hvr">
            <img src="{{asset('img/09.jpeg')}}" class="sm-img" alt="">
            
              <div class="hvr-txt" style="height: 69px!important;background: #222222!important;">
              <h3 style="    margin-top: 11px!important;
    font-size: 15px;
    background: #222222!important;
    padding: 0px 3px;
">{{__('happilancing.Social Media Expert - London')}} <br>{{__('happilancing.Hire Now')}} </h3>
             
            </div>
            
          </div>
        </div>
        <div class="col-12 p-0">
          <div class="gallery-hvr">
            <img src="{{asset('img/071.jpeg')}}" class="sm-img" alt="">
           <div class="hvr-txt" style="height: 69px!important; background: #222222!important;">
              <h3 style="    margin-top: 11px!important;
    font-size: 15px;
    background: #222222!important;
    padding: 0px 3px;
">Campaign Manager - New York <br> {{__('happilancing.Hire Now')}}</h3>
             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- 3rd column -->
    <div class="col-md-5 col-12 p-0">
      <div class="gallery-hvr">
        <img src="{{asset('img/40.jpeg')}}" class="lg-img" alt="">
        <div class="hvr-txt" style="height: 69px!important; background: #222222!important;">
              <h3 style="margin-top: 11px!important;">Graphic Designer - Istanbul <br> {{__('happilancing.Hire Now')}}</h3>
             
            </div>
      </div>
    </div>
  </div>
</section>
<!-- Gallery Section End -->
<!-- Gallery Section End -->
<!-- Knowledge, experience start -->
<section class="knowledge">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 p-0">
        <div class="left-coll">
          <h1 style="text-transform: uppercase;">{{__('happilancing.Benefit From Happilancing')}} <span style="text-transform: uppercase;">{{__('happilancing.Franchise Model.')}}</span></h1>
        </div>
      </div>
      <div class="col-md-6 p-0">
        <div class="right-coll">
          <h3>{{__('happilancing.JamTalent Franchise model')}}</h3>
          <p>{{__('happilancing.Happilancing will be a training center and full or part-time workplace for freelancers. JamTalent provides all the courses, materials, teachers, and certificate. So the franchise of happilancing hub has to maintain a good quality under the supervision of JanTalent Management body. A strong management body will monitor the quality of this franchise periodically and ensure that they are maintaining these qualities.')}}</p>
          <p>{{__('happilancing.If any franchise is failed to maintain the quality, the JamTalent management body will have the full authority to cancel their franchise contract. We will strongly maintain our brand value. This wills also increase our brand value and trust for both employers and freelancers.')}}</p>
          <!-- <button type="button" class="btn btn-outline-dark">CREATE WEBSITE NOW</button> -->
        </div>
      </div>
    </div>
  </div>
  
</section>
<!-- Knowledge, experience end -->
<!-- brand section start -->
<!-- brand section start -->
<!-- <section class="brand"style="background :#FAFCFF!important;">
  <div class="container">
    <div class="row align-items-center" >
      <div class="col-md-3 col-4"style=" padding: 30px 30px!important;">
        <img src="{{asset('img/jam/Different.png')}}"  alt="">
      </div>
      <div class="col-md-3 col-4"style=" padding: 30px 30px!important;">
        <img src="{{asset('img/jam/Different.png')}}"  alt="">
      </div>
      <div class="col-md-3 col-4" style=" padding: 30px 30px!important;">
        <img src="{{asset('img/jam/Different.png')}}"  style="" alt="">
      </div>
      <div class="col-md-3 col-4"style=" padding: 30px 30px!important;">
        <img src="{{asset('img/jam/Different.png')}}"  alt="">
      </div>
      
    </div>
  </div>
</section> -->
<!-- brand section end -->
<!-- brand section end -->
<!-- Get in touch start -->
<section class="get-in-touch" style="padding-top: 99px!important;">
  <div class="container-md">
    <div class="form">
      <div class="row align-items-center justify-content-between">

        <div class="col-lg-8 col-12">
          <div class="from-bg">

            <div>
              <h1>{{__('happilancing.Do You Want Our Happilancing Franchising Model ? Contact With Us')}}</h1>
            </div>
            <form method="post" action="{{route('contact.store')}}">
              @csrf
              <div class="form-group">
                <input name="name" type="text" name="name" class="form-control form-sec-bg border-bottom py-2 my-4" placeholder="{{__('contact.Full Name')}}" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <input name="email" type="email" class="form-control form-sec-bg border-bottom py-2 my-4" placeholder="{{__('contact.Email')}}" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <input name="phone" type="text" class=" form-control form-sec-bg border-bottom py-2 my-4" placeholder="{{__('contact.Phone Number')}}" id="exampleInputPhone" required>
              </div>
              @error('phone')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <div class="msg">
                <textarea name="message" placeholder="{{__('contact.Messages')}}" class=" form-sec-bg py-2 my-4 container-fluid pb-5 border-bottom" required> </textarea>
              </div>
              @error('message')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror

              <div class="d-flex">
                <button type="submit" class="from-btn btn btn-primary preview-btn mb-3">{{__('contact.SEND')}}!</button>
              </div>
            </form>

          </div>
        </div>
        <!-- <div class="col-lg-4 col-12 information">
          <div style="background-color:var(--blue); padding-top: 5px;">
            <div class="add-box">
              <p class="text-left">Room 6, First floor Pony building, </p>
              <p class="text-left">Al Khabeesi Area - Al Ittihad Rd </p>
              <p class="text-left">Deira - Dubai, UAE</p>
              <p>info@jamsam.dev</p>
              <p>+971569443479</p>
              <div class="icon-box">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#007ced" class="icon bi bi-geo-alt" viewBox="0 0 16 16">
                  <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                  <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                </svg>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</section>
<!-- get in touch section end  -->
<!-- footer start -->
@include('includes.footer')
<!-- footer end -->
@endsection