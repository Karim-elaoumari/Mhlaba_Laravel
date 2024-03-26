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
                <li class="active"><a href="{{route('home')}}">الرئيسية</a></li>
                <li><a href="{{route('terms')}}">سياسة الخصوصية</a></li>
                <li><a href="{{route('contact')}}">تواصل معنا</a></li>
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

                          <li class="active"><a href="{{route('home')}}">الرئيسية</a></li>
                          <li><a href="{{route('terms')}}">سياسة الخصوصية</a></li>
                          <li><a href="{{route('contact')}}">تواصل معنا</a></li>
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
  <section class="breadcrumb-section set-bg" style="height: 280px;" data-setbg="{{ asset('images/breadcrumb.jpg') }}">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 text-center" dir="rtl">
                  <div class="breadcrumb__text">
                      <h2>متجر الجودة</h2>
                      <div class="breadcrumb__option">
                          <a href="">منتجات عالية الجودة</a>
                          
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- Breadcrumb Section End -->

  <!-- Product Section Begin -->
  <section class="product spad">
      <div class="container">
          
          
         
              <div class="">
                  <div class="product__discount">
                     
                      <div class="row">
                          <div class="product__discount__slider owl-carousel">
                            @foreach($latest as $pro)
                              <div class="col-lg-4" >
                                  <div class="product__discount__item" style="cursor: pointer;">
                                      <div class="product__discount__item__pic set-bg" style="border-radius: 7px;"
                                          data-setbg=' {{asset("images/$pro->main_image")}}'>
                                          <div class="product__discount__percent">-{{(int)(100-(($pro->price*100)/$pro->x_price))}}%</div>
                                          <ul class="product__item__pic__hover">
                                               <li><a href="{{route('single_product',$pro->slug)}}"><i class="bi bi-cart"></i></a></li>
                                              <li><a href="{{route('single_product',$pro->slug)}}"><i class="bi bi-eye"></i></a></li>
                                          </ul>
                                      </div>
                                      <div class="product__discount__item__text">
                                          <h5><a href="#"> {{$pro->title}} </a></h5>
                                          <div class="product__item__price"> {{$pro->price}} درهم <span>{{$pro->x_price}} درهم</span></div>
                                      </div>
                                  </div>
                              </div>
                              @endforeach
                              
                          </div>
                      </div>
                  </div>
                 <hr style="border-color: rgb(94, 22, 194);border-width:3px">
                 <br>
                  <div class="hero__search" style="margin-top: -20px;">
                  
                      <div class="hero__search__form" >
                          <form action="" method="get" dir="rtl">
                              <button  class="site-btn" type="submit" style="border-radius: 20px;">بحث</button>
                              <input type="text" name="search_term" placeholder="اكتب البحث الخاص بك هنا" style="border-radius: 20px;" value="{{ request('search_term') }}" >
                              
                          </form>
                          
                      </div>
                     
                  </div>
                  <hr>
               
                 
                   
                  <div class="row"  @if ($search==true)  tabIndex="0" id='hello'  @endif  >
                    @if ($products->isEmpty())

                    
                    <div   style="color:rgb(8, 217, 119);font-size:2rem" align="center"> لا يوجد منتجات بهذا الوصف</div>
                    @else
                    @foreach($products as $prod)
                      <div class="col-lg-4 col-md-6 col-sm-6">
                          <div class="product__item" style="cursor: pointer;">
                              <div class="product__item__pic set-bg" data-setbg='{{asset("images/$prod->main_image")}}' style="border-radius: 7px;">
                                <div class="product__discount__percent">-{{(int)(100-(($prod->price*100)/$prod->x_price))}}%</div>
                                  <ul class="product__item__pic__hover">
                                      
                                       <li><a href="{{route('single_product',$prod->slug)}}"><i class="bi bi-cart"></i></a></li>
                                              <li><a href="{{route('single_product',$prod->slug)}}"><i class="bi bi-eye"></i></a></li>
                                  </ul>
                              </div>
                              <div class="product__discount__item__text">
                                <h5><a href="#"> {{$prod->title}} </a></h5>
                                <div class="product__item__price"> {{$prod->price}} درهم <span>{{$prod->x_price}} درهم</span></div>
                              </div>
                          </div>
                      </div>
                     @endforeach
                     @endif
                  </div>
                  <div class="product__pagination">
                    {!!$products->links()!!}
                  </div>
              </div>
         
      </div>
  </section>
  <!-- Product Section End -->

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
                     
                          <li>الهاتف: 12323232321</li>
                          <li>البريد الالكتروني: hello@test.com</li>
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
 <script>
   $(document).ready(function () {
    // Handler for .ready() called.
    $('html, body').animate({
        scrollTop: $('#hello').offset().top
    }, 'slow');
});
</script>

@endsection