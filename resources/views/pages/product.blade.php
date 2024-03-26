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
  
                            <li><a href="{{route('home')}}">الرئيسية</a></li>
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

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                            src='{{ asset("images/$product->main_image") }}' alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        <img data-imgbigurl='{{ asset("images/$product->st1_image") }}'
                            src='{{ asset("images/$product->st1_image") }}' alt="">
                        <img data-imgbigurl='{{ asset("images/$product->st2_image") }}'
                            src='{{ asset("images/$product->st2_image") }}' alt="">
                        <img data-imgbigurl='{{ asset("images/$product->st3_image") }}'
                            src='{{ asset("images/$product->st3_image") }}' alt="">
                        <img data-imgbigurl='{{ asset("images/$product->st4_image") }}'
                            src='{{ asset("images/$product->st4_image") }}' alt="">
                            <img data-imgbigurl='{{ asset("images/$product->main_image") }}'
                            src='{{ asset("images/$product->main_image") }}' alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6" dir="rtl" align="right">
                <div class="product__details__text" dir="rtl">
                    <h3>{{$product->title}}</h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <div class="product__details__price"> {{$product->price}} درهم</div>
                    <p>{{$product->desc}}</p>
                    
                    <div>
                       
                        <a href="#" class="primary-btn" style="border-radius: 20px;">طلب المنتج الان</a>
                        <hr>
                       
                        
                           
                            <b>اذا اعجبك المنتج شاركه مع اصدقاءك</b>
                                <div class="share">
                                    <a href="https://www.facebook.com/sharer/sharer.php?http://127.0.0.1:8000/product/{{$product->slug}}" target="_blank" rel="facebook"><i class="bi bi-facebook" style="width: 50px;font-size:30px;padding:5px"></i></a>
                                    <a href="whatsapp://send?text=http://127.0.0.1:8000/product/{{$product->slug}}" data-action="share/whatsapp/share"><i class="bi bi-whatsapp" style="width: 50px;font-size:30px;padding:5px"></i></a>
                                    
                                    <!-- Your share button code -->

                                </div>

                    </div>
                   

                            
                       
                    
                    
                </div>
            </div>
            <div class="col-lg-12">
                <!-- Checkout Section Begin -->
                <section class="checkout spad" align="right">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <h6>
                                </h6>
                            </div>
                        </div>
                        <div class="checkout__form" >
                            <div  align='center'>
                                <h3 >المرجو ادخال المعلومات  لطلب المنتج</h3>
                            </div>
                          
                            <hr>
                            <br>
                            <div align='center' style="width:100%;height: 200px;display: none" id='spinner' >
                                <div class="spinner-border text-success" style="margin-top: 40%" role="status" >
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                           
                            <form id="order_form">

                                <input type="hidden"  value="{{$product->id}}" name='product_id'>
                                <div class="row">
                                    <div class="col-lg-8 col-md-6">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="checkout__input">
                                                    @if (strlen($product->sizes) > 0)
                                                    <p>المقاس<span>*</span></p>
                                                    <select class="form-select form-select-lg" style="border: 1px solid #181717;border-radius: 4px;" name='size'>
                                                        @foreach (explode(';', $product->sizes) as $size)
                                                          <option value='{{$size}}'> {{ $size}} </option>
                                                        @endforeach
                                                    </select>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="">
                                                    @if (strlen($product->colors) >0)
                                                    <p>اللون<span>*</span></p>
                                                    <select  class="colors form-select  form-select-lg" style="border: 1px solid #181717;border-radius: 4px;margin-top:-5px" name='color'>
                                                       
                                                        @foreach (explode(';', $product->colors) as $color)
                                                          <option value="{{$color}}" >{{$color}}</option>
                                                        @endforeach
                                                    </select>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="checkout__input">
                                                    <p>الكمية<span>*</span></p>
                                                    <input type="number" class="checkout__input__add" value="1" name='quantity'>
                                                    <p class="error_message text-danger" id="quantity_err"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="checkout__input">
                                            <p>الاسم الشخصي والعائلي<span>*</span></p>
                                            <input type="text" class="checkout__input__add" name='full_name'>
                                            <p class="error_message text-danger" id="full_name_err"></p>
                                        </div>
                                        <div class="checkout__input">
                                            <p>المدينة<span>*</span></p>
                                            <input type="text" placeholder="المدينة" class="checkout__input__add" name='city'>
                                            <p class="error_message text-danger" id="city_err"></p>
                                            
                                        </div>
                                        <div class="checkout__input">
                                            <p>العنوان<span>*</span></p>
                                            <input type="address" class="checkout__input__add" name='address' >
                                            <p class="error_message text-danger" id="address_err"></p>
                                        </div>
                                        <div class="checkout__input">
                                            <p>رقم الهاتف<span>*</span></p>
                                            <input type="text"  class="checkout__input__add" placeholder="0612345678" name='phone'>
                                            <p class="error_message text-danger" id="phone_err"></p>
                                        </div>
                                        <div class="checkout__input">
                                            <p> تعليق<span></span></p>
                                            
                                            <textarea class="checkout__input__add" name="comment" style="width: 100%" dir='rtl' rows="6" placeholder="يمكنك ترك تعليق او اضافة معلومات اخرى خاصة بالطلب"></textarea>
                                          
                                        </div>
                                       
                                        
                                       
                                        <button type="button" class="site-btn" id="add_order">ارسال الطلب</button>
                                    </div>
                                    
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->
<hr>
<!-- Related Product Section Begin -->

<section class="related-product">
    <div class="container">
     
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h3>بعض المنتجات المشابهة</h3>
                </div>
            </div>
        </div>
        <div class="row">
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
           
        </div>
    </div>
</section>
<!-- Related Product Section End -->
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
<!-- Load Facebook SDK for JavaScript -->


<script>



</script>

@include('ajax.store')

@endsection