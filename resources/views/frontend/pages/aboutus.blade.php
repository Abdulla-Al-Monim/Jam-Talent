@extends('frontend.layout.template')
@section('title')
{{__('topbar.AboutUs')}}
@endsection
@section('body-content')

<!-- about us page start  -->
<!-- header section  -->
<section class="header" >
  <div class="container">
    <div class="hearder-containt mt-5 pt-5">
      <div class="row justify-content-start">
        <div class="col-md-6">
          <p class="highlight-p">{{__('about.ABOUT')}}</p>
          <h1 class="text-white mb-4">{{__('about.ABOUT US')}}</h1>
          <p class="text-white">{{__('about.Future of freelancing career starts from here. JamTalent is a community of global talent where any talent can join us from any field and experience the journey from learning to earning.')}}.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- header section end  -->
<!-- collum-section  -->
<!-- collum-section  -->
<section class="collum-section">
  <div class="collums">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-4 col-12 p-0 card-center">
          <div class="collum">
            <div class="card">
              <div class="front">
                <img src="{{asset('images/JamTalentWallpaper.jpg')}}" alt="">
              </div>
              <div class="back">
                <div class="back-content card-back-one">
                  <p>{{__('about.We care about our jam talent freelancers community. For the first time in the history of freelancer’s marketplace, we offer our freelancers the internship facilities and real time training for their career development step by step to grow themselves and start earning from this platform.')}}
                    
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-12 p-0 card-center">
          <div class="collum">
            <div class="card">
              <div class="front">
                <img src="{{asset('images/JamTalentWallpaper1.jpg')}}" alt="">
              </div>
              <div class="back">
                <div class="back-content card-back-two">
                  <p>{{__('about.We not only care about our freelancers in different way, we also provide the facilities to our employer to build or hire a team for their big projects so that they can get the most unique benefits from us and save their time and money.')}}
                    </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-12 p-0 card-center">
          <div class="collum">
            <div class="card">
              <div class="front">
                <img src="{{asset('images/JamTalentWallpaper2.jpg')}}" alt="">
              </div>
              <div class="back">
                <div class="back-content card-back-three">
                  <p>{{__('about.What do you think? Freelancing is not a career? don’t feel secure in this freelancing field?
                    We are here to bring new changes in this era of digitalization. Now freelancing is the demand of time as a career for new generations. And our promise is to help them build their career.')}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- collum section end  -->
<!-- collum section end  -->
<!-- the numbers don't lie start  -->
<section class="my-5 pb-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 col-12">
        <p class="highlight-p">{{__('about.Freelancers leverage skills training over a formal education')}}</p>
        <h1 class="mb-4">{{__('about.The Numbers Do not Lie')}}</h1>
        <p>{{__('about.According to Gallup research 37% of employees would resign from their current jobs if they got an opportunity to work remotely. Freelancers in the United States Collectively contribute$1.4 trillion to the economy annually')}}</p>
      </div>
      <div class="col-md-6 col-12">
        <div class="row">
          <div class="col-6">
            <div class="wrapper">
              <div class="card">
                <div class="circle">
                  <div class="bar"></div>
                  <div class="box"><span></span></div>
                </div>
              </div>

            </div>
            <h4 class="text-center my-4">{{__('about.College education')}}</h4>
          </div>
          <div class="col-6">
            <div class="wrapper">
              <div class="card js">
                <div class="circle">
                  <div class="bar"></div>
                  <div class="box"><span></span></div>
                </div>

              </div>
            </div>
            <h4 class="text-center my-4">{{__('about.Skill related education/ training')}}</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.min.js"></script>

<script>
  let options = {
    startAngle: -1.55,
    size: 150,
    value: 0.79,
    fill: {
      gradient: ['#b8d8fb', '#0b7ffc']
    }
  }
  $(".circle .bar").circleProgress(options).on('circle-animation-progress',
    function(event, progress, stepValue) {
      $(this).parent().find("span").text(String(stepValue.toFixed(2).substr(2)) + "%");
    });
  $(".js .bar").circleProgress({
    value: 0.93
  });
</script>
<!-- the number don't lie end  -->
<!-- a team of professionals start  -->
<section class="a-team-of-professionals">
  <div class="container text-center">
    <p class="highlight-p">{{__('about.CONSULTANTS')}}</p>
    <h1 class="text-white pb-4 underline">{{__('about.A Team Of Professionals')}}</h1>
  </div>
  <div class="container mt-5 pt-5">
    <div class="row">
      <div class="col-lg-6 col-12">
        <div class="row justify-content-around">
          <div class="col-5"><img class="img-fluid" src="{{asset('images/1617910237.jpg')}}" alt=""></div>
          <div class="col-5">
            <p class="highlight-p">Abdulla Al Monim</p>
            <p class="text-muted">{{__('about.Back-end Developer')}}</p>
            <p></p>
            <div class="social-media-section social-media-hidden">
              <a href="#" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="social-icon shadow bi bi-facebook" viewBox="0 0 16 16">
                  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                </svg>
              </a>
              <a href="#" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="social-icon shadow bi bi-instagram" viewBox="0 0 16 16">
                  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                </svg>
              </a>
              <a href="#" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="social-icon shadow bi bi-youtube" viewBox="0 0 16 16">
                  <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                </svg>
              </a>
              <a href="#" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="social-icon shadow bi bi-twitter" viewBox="0 0 16 16">
                  <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-12 profile-responsive">
        <div class="row justify-content-around">
          <div class="col-5"><img class="img-fluid" src="{{asset('img/monju.png')}}" alt=""></div>
          <div class="col-5">
            <p class="highlight-p">Monjurul Islam</p>
            <p class="text-muted">{{__('about.Front-end Developer')}}</p>
            <p></p>
            <div class="social-media-section social-media-hidden">
              <a href="https://www.facebook.com/rasel.monim/" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="social-icon shadow bi bi-facebook" viewBox="0 0 16 16">
                  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                </svg>
              </a>
              <a href="#" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="social-icon shadow bi bi-instagram" viewBox="0 0 16 16">
                  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                </svg>
              </a>
              <a href="#" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="social-icon shadow bi bi-youtube" viewBox="0 0 16 16">
                  <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                </svg>
              </a>
              <a href="#" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="social-icon shadow bi bi-twitter" viewBox="0 0 16 16">
                  <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
<!-- a team of professionals end  -->
<!-- what we do best section start  -->
<section class="what-we-do-best">
  <div class="container text-center">
    <p class="highlight-p">{{__('about.FEATURES')}}</p>
    <h1 class="pb-4 underline">{{__('about.What We Do Best')}}</h1>
  </div>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-4 text-center">
        <img src="{{asset('images/payasyougoprocess.svg')}}" width="80" style="padding-bottom: 15px;" >
        <p class="highlight-p">{{__('about.Pay As You Go Process')}}</p>
        <p>{{__('about.We are offering the best affordable price to our employers and also freelancers')}}</p>
      </div>
      <div class="col-md-4 text-center">
        <img src="{{asset('images/Teamcreation.svg')}}" width="80" style="padding-bottom: 15px;">
        <p class="highlight-p">{{__('about.Team Creation')}}</p>
        <p>{{__('about.We make team building easy for both the freelancer and employers for big projects.')}}</p>
      </div>
      <div class="col-md-4 text-center">
        <img src="{{asset('images/HRservice.svg')}}" width="80" style="padding-bottom: 15px;">
        <p class="highlight-p">{{__('about.HR Service')}}</p>
        <p>{{__('about.We are also offering the best HR service to any small and big organization from searching to hiring process.')}}</p>
      </div>
      <div class="col-md-4 text-center">
        <img src="{{asset('images/Businessconsultacy.svg')}}" width="80" style="padding-bottom: 15px;">
        <p class="highlight-p">{{__('about.Business Consultancy')}}</p>
        <p>{{__('about.You have just a willing to do some business and rest of it we will take care with our best consultant to reach your goal.')}}</p>
      </div>
      <div class="col-md-4 text-center">
        <img src="{{asset('images/HappilancingHub.svg')}}" width="80" style="padding-bottom: 15px;">
        <p class="highlight-p">{{__('about.Happilancing Hub')}}</p>
        <p>{{__('about.We will establish happy freelancing hub franchise model called “Happilancing Hub”. It will be an official place for all the freelancers to do the office as like other job career instead of home.')}}  </p>
      </div>
      <div class="col-md-4 text-center">
        <img src="{{asset('images/EasyPaymentWithdrawal.svg')}}" width="80" style="padding-bottom: 15px;">
        <p class="highlight-p">{{__('about.Easy Payment Withdrawal')}}</p>
        <p>{{__('about.We are providing the best technology to secure and make an easy payment in just few clicks to individual and to your entire team')}}</p>
      </div>
    </div>
  </div>
</section>






<!-- footer start -->
@include('includes.footer')
<!-- footer end -->

@endsection