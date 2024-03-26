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
                  <li class="active"><a href="{{route('terms')}}">سياسة الخصوصية</a></li>
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
  
                            <li ><a href="{{route('home')}}">الرئيسية</a></li>
                            <li class="active"><a href="{{route('terms')}}">سياسة الخصوصية</a></li>
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
   <!-- Contact Section Begin -->
   <section class="contact spad">
    <div class="container" dir="rtl" align='right'>
        <h3>شروط الاستخدام</h3>
    <p>مرحبًا بك في صفحة شروط الاستخدام لمتجرنا. يُرجى قراءة هذه الشروط بعناية قبل استخدام موقعنا أو طلب المنتجات منه. من خلال استخدامك للموقع أو طلب المنتجات منه، فإنك توافق على هذه الشروط وتلتزم بها.</p>
    
    <h4>المعلومات الشخصية:</h4>
    <p>نقوم بجمع معلومات شخصية بسيطة منك عندما تقوم بطلب منتج من متجرنا. هذه المعلومات تشمل الاسم وعنوان التوصيل ورقم الهاتف. يتم استخدام هذه المعلومات فقط لغرض تأكيد الطلب والتواصل معك بخصوصه. لا نقوم بجمع أو مشاركة أي معلومات شخصية أخرى.</p>

    <h4>الأمان:</h4>
    <p>نحن نتخذ إجراءات أمان ملائمة لحماية المعلومات الشخصية التي تقدمها لنا. ومع ذلك، يجب عليك أيضًا اتخاذ الخطوات اللازمة لحماية معلوماتك الشخصية من الوصول غير المصرح به.</p>

    <h4>التحديثات:</h4>
    <p>قد نقوم بتحديث شروط الاستخدام من وقت لآخر. يُرجى مراجعة هذه الصفحة بانتظام لمعرفة أحدث التحديثات. يستمر استخدامك للموقع بعد نشر أي تحديث يعني موافقتك على هذه التغييرات.</p>

    <h4>الملكية الفكرية:</h4>
    <p>جميع العلامات التجارية وحقوق الملكية الفكرية الأخرى الموجودة في الموقع هي ملك لأصحابها. يُمنع استخدام أو نسخ أو توزيع أو نقل أي من هذه المواد دون الحصول على إذن خطي منا.</p>

    <h4>إلغاء الطلب:</h4>
    <p>لديك الحق في إلغاء طلبك قبل شحنه. يرجى التواصل معنا في أقرب وقت ممكن إذا كنت ترغب في إلغاء طلبك.</p>

    <h4>التغييرات والاستردادات:</h4>
    <p>يُرجى ملاحظة أن جميع المبيعات نهائية. لا يُمكن استرداد الأموال بعد تأكيد الطلب وشحنه.</p>

    <h4>الاتصال:</h4>
    <p>إذا كان لديك أي استفسارات أو مخاوف بخصوص شروط الاستخدام أو ممارسات الخصوصية، يرجى التواصل معنا عبر البريد الإلكتروني المقدم في موقعنا.</p>
    
    <p>نشكرك على استخدامك لمتجرنا. نتطلع دائمًا لخدمتك بشكل أفضل وتقديم منتجات عالية الجودة.</p>
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

@endsection