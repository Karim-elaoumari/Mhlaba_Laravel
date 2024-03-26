@extends('app')
@section('content')
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
  
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper" dir="rtl">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{ asset('images/logo.png') }}" alt=""></a>
        </div>
      
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <ul>
                  <li ><a href="{{route('home')}}">الرئيسية</a></li>
                  <li><a href="{{route('terms')}}">سياسة الخصوصية</a></li>
                  <li class="active"><a href="{{route('contact')}}">تواصل معنا</a></li>
                </ul>
            </ul>
        </nav>
        
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="https://api.whatsapp.com/send?phone=+212637281098&text=Hello%20there!"><i class="bi bi-whatsapp"></i></a>
          
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="bi bi-envelope"></i> hello@test.com</li>
                {{-- <li>Free Shipping for all Order of $99</li> --}}
            </ul>
        </div>
    </div>
    <!-- Humberger End -->
  
    <!-- Header Section Begin -->
    <header class="header">
    
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="{{ asset('images/logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
  
                            <li ><a href="{{route('home')}}">الرئيسية</a></li>
                            <li><a href="{{route('terms')}}">سياسة الخصوصية</a></li>
                            <li class="active"><a href="{{route('contact')}}">تواصل معنا</a></li>
                        </ul>
                    </nav>
                </div>
                
            </div>
            <div class="humberger__open">
                <i class="bi bi-list"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->


<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" style="max-height:   50px;" data-setbg="{{ asset('images/breadcrumb.jpg') }}">
    <div class="container" >
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h3 style="color: aliceblue;">مرحبا بك في متجرك</h3>
                   
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
   <!-- Contact Section Begin -->
   <section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="" style="font-family: 'ElegantIcons';
                    speak: none;
                    font-style: normal;
                    font-weight: normal;
                    font-variant: normal;
                    text-transform: none;
                    line-height: 1;
                    -webkit-font-smoothing: antialiased;"><i class="bi bi-telephone-outbound"></i></span>
                    <h4>الهاتف </h4>
                    <p>+1234567890</p>
                </div>
            </div>
          
           
            <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="" style="font-family: 'ElegantIcons';
                    speak: none;
                    font-style: normal;
                    font-weight: normal;
                    font-variant: normal;
                    text-transform: none;
                    line-height: 1;
                    -webkit-font-smoothing: antialiased;"> <i class="bi bi-envelope-at"></i></span>
                    <h4>البريد الالكتروني</h4>
                    <p>hello@test.com</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Map Begin -->


<!-- Contact Form Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>اترك رسالة</h2>
                </div>
            </div>
        </div>
        <form action="#" align='right' dir="rtl">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="الاسم">
                </div>
                <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="رقم الهاتف">
                </div>
                <div class="col-lg-12 text-center">
                    <textarea placeholder="الرسالة"></textarea>
                    <button type="submit" class="site-btn">ارسال</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Contact Form End -->

  <!-- Footer Section Begin -->
  <footer class="footer spad" dir="rtl">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="./index.html"><img src="{{ asset('images/logo.png') }}" alt=""></a>
                    </div>
                    <ul>
                        <li>Address: 60-49 Road 11378 New York</li>
                        <li>Phone: +65 11.188.888</li>
                        <li>Email: hello@colorlib.com</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <!-- <h6>Join Our Newsletter Now</h6>
                    <p>Get E-mail updates about our latest shop and special offers.</p>
                    <form action="#">
                        <input type="text" placeholder="Enter your mail">
                        <button type="submit" class="site-btn">Subscribe</button>
                    </form> -->
                    <div class="footer__widget__social">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="https://api.whatsapp.com/send?phone=+212637281098&text=Hello%20there!"><i class="bi bi-whatsapp"></i></a>
                     
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text"><p>
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Karim El Aoumari
</p></div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection