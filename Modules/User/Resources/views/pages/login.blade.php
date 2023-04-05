@php
        $softwaresetting = Modules\User\Models\SoftwareSetting::first();
        $total_post = App\Models\Post::count();
        $all_post = App\Models\Post::get();
        $users = auth()->user();
       $layout_type = 'horizontal';
@endphp
        
     @slot('title')
     Login
    @endslot
    @push('css')
    <style>
        #page-topbar {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1002;
            background-color: #3e95f2;
            -webkit-box-shadow: 0 .75rem 1.5rem rgba(18,38,63,.03);
            box-shadow: 0 .75rem 1.5rem rgba(18,38,63,.03);
            }
        .auth-full-bg{
                background-color:#fff!important;
            }
            .faruk_btn{
                height: 112px; margin-left:36px;
            }
            @media screen and (max-width:1575px) {
            .faruk_btn {
                height:78px; margin-left: 21px;
            }
            @media screen and (max-width:700px) {
                    .vactor_image {
                        display: none;
                    }
                    .btn_faruk{
                        margin-top: 25px;
                    }
                }
        }
    </style>
    
    @endpush

    <body class="auth-body-bg"style="background-color:#fff!important;">
        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-xl-12">
                        <div class="auth-full-bg pt-lg-3 p-4">
                            <div class="w-100">
                                <div class="d-flex h-100 flex-column">
                                    <div class="p-4 mt-auto">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-10" style="margin-bottom:-1%;">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-6 col-lg-6 col-xl-6 vactor_image">
                                                            <div class="card h-90">
                                                                <img src="{{ asset('backend/images/logo/Fisheries .gif')}}" alt="Los Angeles" style="width: 100%; height: 491px;margin-left:-20px;" >
                                                           </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-xl-6" style="">
                                                        <div class="card  h-90">
                                                            <div class="bg-primary bg-soft">
                                                            <div class="row">
                                                                  <div id="demo" class="carousel slide" data-ride="carousel">
                                                                  
                                                                    <!-- Indicators -->
                                                                    <ul class="carousel-indicators">
                                                                      <li data-target="#demo" data-slide-to="0" class="active"></li>
                                                                      <li data-target="#demo" data-slide-to="1"></li>
                                                                      <li data-target="#demo" data-slide-to="2"></li>
                                                                    </ul>
                                                                    
                                                                    <!-- The slideshow -->
                                                                    <div class="carousel-inner">
                                                                      <div class="carousel-item active">
                                                                        {{-- <img src="http://dof.leotechbd.com/storage/photos/P3GV2Tg0VGuql0IWABjag3KNMWjWiy0FCnUeh9Iw.png" alt="Los Angeles" style="height:109px" > --}}
                                                                        <img src="{{ asset('storage/'.$softwaresetting->website_logo) }}" alt="Los Angeles" class="faruk_btn" style="" >
                                                                      </div>  
                                                                    </div>
                                                                  </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body"> 
                                                            <div class="auth-logo py-3 text-left" style="">
                                                                <h4>
                                                                    <b style="color: #556ee6;font-size:29px;">Fishing Vessel and Gear Database </b>
                                                                </h4>
                                                                    
                                                            </div>
                                                            <div class="auth-logo text-left">
                                                                <h4>
                                                                    <b style="font-size: 28px;">Sign In</b>
                                                                </h4>
                                                                    
                                                            </div>
                                                            <div class="p-2">
                                                                <form class="needs-validation" wire:submit.prevent="login">
                                                                    <div class="mb-3">
                                                                        <x-template::input.text wire:model.defer="email" label="Email" />
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <x-template::input.password wire:model.defer="password" label="Password" />
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="remember-check">
                                                                        <label class="form-check-label" for="remember-check" style="font-size: 16px"> 
                                                                            Remember me
                                                                        </label>
                                                                        <div class="float-end">
                                                                            <a href="{{route('reset_password')}}" style="font-size: 15px"
                                                                                     class="text-primary mb-3">Reset Password</a>
                                                                         </div>
                                                                    </div>
                                                                    
                                                                    <div class="py-2 row">
                                                                        <div class="col-md-12 text-left">
                                                                            <x-template::button.info  class="btn w-lg waves-effect btn-label waves-light btn_faruk"
                                                                            type="submit"> <i class="bx bx-key label-icon" style="width: 20%"></i>
                                                                            Log In
                                                                            </x-template:button.info>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-4 text-center">
                                                                        <ul class="list-inline">
                                                                            <li class="list-inline-item">
                                                                                <a href="https://www.facebook.com/people/Sustainable-Coastal-and-Marine-Fisheries/100089940130064/"  target="_blank"
                                                                                    class="social-list-item bg-primary text-white border-primary">
                                                                                    <i class="mdi mdi-facebook"></i>
                                                                                </a>
                                                                            </li>
                                                                            <li class="list-inline-item">
                                                                                <a href="https://www.instagram.com/sustainablecoastal/"  target="_blank"
                                                                                    class="social-list-item bg-info text-white border-info">
                                                                                    <i class="mdi mdi-instagram text-white"></i>
                                                                                </a>
                                                                            </li>
                                                                            <li class="list-inline-item">
                                                                                <a href="http://www.fisheries.gov.bd/"  target="_blank"
                                                                                    class="social-list-item bg-danger text-white border-danger">
                                                                                    <i class="mdi mdi-google"></i>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                     </div>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="row mt-4"style=" width: 130%;">
                                                <div class="col-md-6"style="font-size: 17px">
                                                    <script>document.write(new Date().getFullYear())</script><span style="font-size: 17px"> Copyright Department of Fisheries (DOF).</span>
                                                    <img src="{{ asset('backend/images/logo/fo-logo.png') }}" alt="" style=" height: 50px">
                                                </div>
                                                <div class="col-md-6 ">
                                                    <div class="text-sm-end d-none d-sm-block " style="font-size: 17px">
                                                        Powered by <a href="https://www.leotechbd.com/" target="_blank">
                                                            <img src="{{ asset('backend/images/logo.png') }}" alt="" style="height: 50px" >
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
                {{-- <footer class="footer">
                    <div class="container-fluid py-2">
                        <div class="row ">
                            <div class="col-md-4">
                                <script>document.write(new Date().getFullYear())</script><span style="font-size:15px">© Copyright Department of Fisheries (DOF).</span>
                                <img src="{{ asset('backend/images/logo/fo-logo.png') }}" alt="" style=" height: 50px">
                            </div>
                            <div class="col-md-4 text-center" style="font-size: 22px;margin-top: 1%;">
                                <a href="https://www.facebook.com/people/Sustainable-Coastal-and-Marine-Fisheries/100089940130064/" target="_blank" class="fab fa-facebook "></a>
                              <a href="https://bd.linkedin.com/"  target="_blank">
                                <i class="fab fa-linkedin"></i>
                            </a>
                              <a href="https://web.telegram.org/" target="_blank"><i class="fab fa-telegram "></i></a>
                              <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                            </div>
                            <div class="col-md-4 ">
                                <div class="text-sm-end d-none d-sm-block " style="font-size: 15px">
                                    Powered by <a href="https://www.leotechbd.com/" target="_blank">
                                        <img src="{{ asset('backend/images/logo.png') }}" alt="" style="height: 50px" >
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer> --}}
            </div>
            <!-- end container-fluid -->
        </div>
    </body>
    <script>
        // function to convert a Gregorian date to Bangla date
        function getBanglaDate(gregorianDate) {
          // array of Bengali month names
          var banglaMonths = [
            'বৈশাখ', 'জ্যৈষ্ঠ', 'আষাঢ়', 'শ্রাবণ', 'ভাদ্র', 'আশ্বিন', 'কার্তিক', 'অগ্রহায়ণ', 'পৌষ', 'মাঘ', 'ফাল্গুন', 'চৈত্র'
          ];
          var banglaMonthsShort = [
            'বৈশাখ', 'জ্যৈষ্ঠ', 'আষাঢ়', 'শ্রাবণ', 'ভাদ্র', 'আশ্বিন', 'কার্তিক', 'অগ্রহায়ণ', 'পৌষ', 'মাঘ', 'ফাল্গুন', 'চৈত্র'
          ];
          // subtract 593 from the Gregorian year to get the Bengali year
          var bengaliYear = gregorianDate.getFullYear() - 593;
          // get the Bengali month index (0-based) by subtracting 4 from the Gregorian month
          var bengaliMonthIndex = gregorianDate.getMonth() - 4;
          if (bengaliMonthIndex < 0) {
            bengaliMonthIndex += 12;
            bengaliYear--;
          }
          var bengaliMonth = banglaMonths[bengaliMonthIndex];
          var bengaliMonthShort = banglaMonthsShort[bengaliMonthIndex];
          // get the Bengali day of the month by adding 13 to the Gregorian day
          var bengaliDayOfMonth = gregorianDate.getDate() + 13;
          if (bengaliDayOfMonth > 31) {
            bengaliDayOfMonth -= 31;
            bengaliMonthIndex++;
          }
             // check if the Bengali month index is out of range (0-11)
      if (bengaliMonthIndex > 11) {
        bengaliMonthIndex -= 12;
        bengaliYear++;
      }
      bengaliMonth = banglaMonths[bengaliMonthIndex];
      bengaliMonthShort = banglaMonthsShort[bengaliMonthIndex];
      // return the Bangla date in the format "DD MonthName YYYY"
      return bengaliDayOfMonth + ' ' + bengaliMonthShort + ' ' + bengaliYear;
    }
    
    // function to get the current time in 12-hour format with সকাল দুপুর বিকাল রাত
    // function to get the current time in 12-hour format with সকাল দুপুর বিকাল রাত
    function getCurrentTime() {
      var currentTime = new Date();
      var hours = currentTime.getHours();
      var minutes = currentTime.getMinutes();
      var seconds = currentTime.getSeconds();
      var meridian = ''; // initialize meridian variable
      // if (hours >= 0 && hours < 4) {
      //   meridian = 'রাত';
      //   hours = hours + 12;
      // } else if (hours >= 4 && hours < 12) {
      //   meridian = 'সকাল';
      // } else if (hours >= 12 && hours < 16) {
      //   meridian = 'দুপুর';
      // } else {
      //   meridian = 'বিকাল';
      //   hours = hours - 12;
      // }
      hours = hours ? hours : 12; // set hour to 12 if it's 0
      var timeString = hours + ':' + (minutes < 10 ? '0' + minutes : minutes) + ':' + (seconds < 10 ? '0' + seconds : seconds) + ' ' + meridian;
      return timeString;
    }
    
    
    // function to get the current day of the week in Bengali
    function getCurrentDay() {
      var banglaDays = ['শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার'];
      var banglaDayIndex = new Date().getDay();
      var banglaDay = banglaDays[banglaDayIndex];
      return banglaDay;
    }
    
    // set the current time, date, and day of the week every second
    setInterval(function() {
      var currentTime = getCurrentTime();
      var currentDate = new Date();
      var banglaDate = getBanglaDate(currentDate);
      var currentDay = getCurrentDay();
      document.getElementById('time').innerHTML = currentTime;
      document.getElementById('date').innerHTML = banglaDate + ' | ' + currentDate.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
      document.getElementById('day').innerHTML = currentDay;
    }, 1000);
    </script>
