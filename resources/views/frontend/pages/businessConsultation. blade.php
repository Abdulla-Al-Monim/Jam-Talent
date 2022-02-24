@extends('frontend.layout.template')
<!-- title section -->
@section('title')
happilancing
@endsection


@section('body-content')

<!-- happilancing start -->
<!-- top slider section start -->
<section class="happilancing">

  <section class="top-slider">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{asset('images/blog-04.jpg')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{asset('images/blog-04.jpg')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{asset('images/blog-04.jpg')}}" class="d-block w-100" alt="...">
        </div>
      </div>
    </div>

    <div class="slider-text">
      <h1 style="font-size: 30px;">KNOWLEDGE &FRESH IDEAS</h1>
      <!-- <h3 style="font-size: 14px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus ducimus non sint doloremque optio. Aperiam aliquid officiis neque totam dolorem.</h3> -->
    </div>
  </section>
  <!-- top slider section end -->
  <!-- Enjoy the difference start -->
  <section class="enjoy-the-difference">
    <div class="container">
      <h2 class="text-center">ENJOY THE <span class="font-weight-bold">DIFFERENCE.</span></h2>
      <h4>Interfaces semantic; deliverables users, seamless beta-test implement tag, communities virtual, global, solutions synthesize blogospheres models partnerships innovate evolve channels, repurpose.</h4>
      <div>
        <div class="row">
          <div class="col-md-4">
            <h3>OUR PURPOSE</h3>
            <P>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos etorbi accusam et justo duo dolores et ea rebum. Stet clita kasd.</P>
          </div>
          <div class="col-md-4 ">
            <h3>OUR PURPOSE</h3>
            <P>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos etorbi accusam et justo duo dolores et ea rebum. Stet clita kasd.</P>
          </div>
          <div class="col-md-4">
            <h3>OUR PURPOSE</h3>
            <P>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos etorbi accusam et justo duo dolores et ea rebum. Stet clita kasd.</P>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Enjoy the difference end -->
  <!-- second slider start -->
  <section class="second-slider">
    <div class="container">
      <div class="text">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators" style="bottom: -50px;">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique hic amet totam cumque molestias praesentium at reiciendis maxime aliquam id placeat quos ab, non quod pariatur dolorem deserunt accusamus blanditiis sint suscipit cupiditate eos enim deleniti nesciunt. Et, earum quibusdam!</h4>
            </div>
            <div class="carousel-item">
              <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique hic amet totam cumque molestias praesentium at reiciendis maxime aliquam id placeat quos ab, non quod pariatur dolorem deserunt accusamus blanditiis sint suscipit cupiditate eos enim deleniti nesciunt. Et, earum quibusdam!</h4>
            </div>
            <div class="carousel-item">
              <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique hic amet totam cumque molestias praesentium at reiciendis maxime aliquam id placeat quos ab, non quod pariatur dolorem deserunt accusamus blanditiis sint suscipit cupiditate eos enim deleniti nesciunt. Et, earum quibusdam!</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- second slider end -->
  <!-- Information Section Start -->
  <section class="info-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4 px-4">
          <div class="row text-right">
            <div class="col-12 mb-4">
              <h6>100% TRANSLATABLE</h6>
              <p>Aenean commodo ligula eget dolor. Aenean massa. Lorem ipsum dolor sit amet, consec tetuer adipis elit, aliquam eget nibh etlibura no sea.Aenean commodo ligula eget dolor.</p>
            </div>
            <div class="col-12 mb-4">
              <h6>BUILT-IN MEGAMENU</h6>
              <p>Aenean commodo ligula eget dolor. Aenean massa. Lorem ipsum dolor sit amet, consec tetuer adipis elit, aliquam eget nibh etlibura no sea.Aenean commodo ligula eget dolor.</p>
            </div>
            <div class="col-12 mb-4">
              <h6>EXPERT SUPPORT</h6>
              <p>Aenean commodo ligula eget dolor. Aenean massa. Lorem ipsum dolor sit amet, consec tetuer adipis elit, aliquam eget nibh etlibura no sea.Aenean commodo ligula eget dolor.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 px-4">
          <img src="{{asset('images/iphone6.jpg')}}">
        </div>
        <div class="col-md-4 px-4">
          <div class="row text-left">
            <div class="col-12 mb-4">
              <h6>FULL SHOP FUNCTIONALITY</h6>
              <p>Aenean commodo ligula eget dolor. Aenean massa. Lorem ipsum dolor sit amet, consec tetuer adipis elit, aliquam eget nibh etlibura no sea.Aenean commodo ligula eget dolor.</p>
            </div>
            <div class="col-12 mb-4">
              <h6>EXTENSIVE DOCUMENTATION</h6>
              <p>Aenean commodo ligula eget dolor. Aenean massa. Lorem ipsum dolor sit amet, consec tetuer adipis elit, aliquam eget nibh etlibura no sea.Aenean commodo ligula eget dolor.</p>
            </div>
            <div class="col-12 mb-4">
              <h6>ADVANCED OPTIONS</h6>
              <p>Aenean commodo ligula eget dolor. Aenean massa. Lorem ipsum dolor sit amet, consec tetuer adipis elit, aliquam eget nibh etlibura no sea.Aenean commodo ligula eget dolor.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Information Section End -->
  <!-- Gallery Section Start -->
  <section class="gallery">
    <div class="row">
      <!-- 1st column -->
      <div class="col-md-5 col-12 p-0">
        <div class="row m-0">
          <div class="col-12 p-0">
            <div class="gallery-hvr">
              <img src="{{asset('images/gallery1.jpg')}}" class="md-img" alt="">
              <div class="hvr-txt">
                <h3>DEMO</h3>
              </div>
            </div>
          </div>
          <div class="col-6 p-0">
            <div class="gallery-hvr">
              <img src="{{asset('images/gallery2.jpg')}}" class="sm-img" alt="">
              <div class="hvr-txt">
                <h3>DEMO</h3>
              </div>
            </div>
          </div>
          <div class="col-6 p-0">
            <div class="gallery-hvr">
              <img src="{{asset('images/gallery5.jpg')}}" class="sm-img" alt="">
              <div class="hvr-txt">
                <h3>DEMO</h3>
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
              <img src="{{asset('images/gallery4.png')}}" class="sm-img" alt="">
              <div class="hvr-txt">
                <h3>DEMO</h3>
              </div>
            </div>
          </div>
          <div class="col-12 p-0">
            <div class="gallery-hvr">
              <img src="{{asset('images/gallery3.jpg')}}" class="sm-img" alt="">
              <div class="hvr-txt">
                <h3>DEMO</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- 3rd column -->
      <div class="col-md-5 col-12 p-0">
        <div class="gallery-hvr">
          <img src="{{asset('images/gallery6.jpg')}}" class="lg-img" alt="">
          <div class="hvr-txt">
            <h3>DEMO</h3>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Gallery Section End -->

  <!-- Knowledge, experience end -->
  <!-- brand section start -->
  <section class="brand">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-2 col-4">
          <img src="{{asset('images/brand1.png')}}" height="90px" alt="">
        </div>
        <div class="col-md-2 col-4">
          <img src="{{asset('images/brand2.png')}}" height="90px" alt="">
        </div>
        <div class="col-md-2 col-4">
          <img src="{{asset('images/brand4.png')}}" height="90px" alt="">
        </div>
        <div class="col-md-2 col-4">
          <img src="{{asset('images/brand5.png')}}" height="90px" alt="">
        </div>
        <div class="col-md-2 col-4">
          <img src="{{asset('images/brand6.png')}}" height="90px" alt="">
        </div>
        <div class="col-md-2 col-4">
          <img src="{{asset('images/brand7.png')}}" height="90px" alt="">
        </div>
      </div>
    </div>
  </section>
  <!-- brand section end -->
  <!-- Get in touch start -->
  <section class="get-in-touch">
    <div class="container-md">
      <div class="form">
        <div class="row align-items-center justify-content-between">

          <div class="col-lg-8 col-12">
            <div class="from-bg">

              <div>
                <h1>Get In Touch</h1>
              </div>
              <form method="post" action="{{route('contact.store')}}">
              @csrf
              <div class="form-group">
                <input name="name" type="text" name="name" class="text-light form-control form-sec-bg border-bottom py-2 my-4" placeholder="NAME" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <input name="email" type="email" class="text-light form-control form-sec-bg border-bottom py-2 my-4" placeholder="EMAIL ADDRESS" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <input name="phone" type="text" class=" form-control form-sec-bg border-bottom py-2 my-4" placeholder="PHONE NUMBER" id="exampleInputPhone" required>
              </div>
              @error('phone')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <div class="msg">
                <textarea name="message" placeholder="MESSAGE" class=" form-sec-bg py-2 my-4 container-fluid pb-5 border-bottom" required> </textarea>
              </div>
              @error('message')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror

              <div class="d-flex">
                <button type="submit" class="from-btn btn btn-primary preview-btn mb-3">Send Message!</button>
              </div>
            </form>

            </div>
          </div>
          <div class="col-lg-4 col-12 information">
            <div style="background-color:var(--blue); padding-top: 5px;">
              <div class="add-box">
                <p>Emirates Towers,Dubai, UAE</p>
                <p>info@jamsam.dev</p>
                <p>+0020 111 1175 009</p>
                <p>+00971 54549 4593</p>
                <div class="icon-box">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#007ced" class="icon bi bi-geo-alt" viewBox="0 0 16 16">
                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- get in touch section end  -->
</section>
<!-- happilancing end -->
<!-- footer start -->
@include('includes.footer')
<!-- footer end -->
@endsection