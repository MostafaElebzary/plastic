<!-- Footer -->
<footer class="pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-6">
                <div class="footer-item">
                    <div class="footer-logo">
                        <a class="logo-link" href="{{url('/')}}">
                            <img src="{{url('public/uploads/posts/'.$Settings->logo2)}}" alt="Logo">
                        </a>
                        <p>{!! $contact_us->append_content !!}.</p>
                        <ul>
                            <li>
                                <a href="{{$Settings->facebook}}" target="_blank">
                                    <i class='bx bxl-facebook'></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{$Settings->twitter}}" target="_blank">
                                    <i class='bx bxl-twitter'></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{$Settings->linkedin}}" target="_blank">
                                    <i class='bx bxl-pinterest-alt'></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{$Settings->instagram}}" target="_blank">
                                    <i class='bx bxl-linkedin'></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-6">
                <div class="footer-item">
                    <div class="footer-touch">
                        <h3>{{trans('lang.Get In Touch')}}</h3>
                        <ul>
                            <li>
                                <i class='bx bxs-phone-call'></i>
                                <h4>{{trans('lang.Phone')}}</h4>
                                <a href="tel:{{$Settings->phone1}}">{{$Settings->phone1}}</a>
                            </li>
                            <li>
                                <i class='bx bx-mail-send'></i>
                                <h4>{{trans('lang.Email')}}</h4>
                                <a href="{{$Settings->email1}}"><span
                                        class="__cf_email__" >{{$Settings->email1}}</span></a>
                            </li>
                            <li>
                                <i class='bx bx-location-plus'></i>
                                <h4>{{trans('lang.Address')}}</h4>
                                <span>{{$Settings->append_address}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->

<!-- Copyright -->
<div class="copyright-area">
    <div class="container">
        <div class="copyright-item">
            <p>{{trans('lang.Developed and Designed by')}} <a href="https:arabiacode.com/" target="_blank">{{trans('lang.Arabiacode')}}</a></p>
        </div>
    </div>
</div>
<!-- End Copyright -->


@if(session('lang') == 'ar')

    <script src="{{ URL::asset('public/new_front/ar')}}/js/jquery-3.5.1.min.js"></script>
    <!-- Essential JS -->
    <script src="{{ URL::asset('public/new_front/ar')}}/js/popper.min.js"></script>
    <script src="{{ URL::asset('public/new_front/ar')}}/js/bootstrap.min.js"></script>
    <!-- Form Validator JS -->
    <script src="{{ URL::asset('public/new_front/ar')}}/js/form-validator.min.js"></script>
    <!-- Contact JS -->
    <script src="{{ URL::asset('public/new_front/ar')}}/js/contact-form-script.js"></script>
    <!-- Meanmenu JS -->
    <script src="{{ URL::asset('public/new_front/ar')}}/js/jquery.meanmenu.js"></script>
    <!-- Owl Carousel -->
    <script src="{{ URL::asset('public/new_front/ar')}}/js/owl.carousel.min.js"></script>
    <!-- Appear JS -->
    <script src="{{ URL::asset('public/new_front/ar')}}/js/jquery.appear.js"></script>
    <!-- Odometer JS -->
    <script src="{{ URL::asset('public/new_front/ar')}}/js/odometer.min.js"></script>
    <!-- Magnific Popup JS -->
    <script src="{{ URL::asset('public/new_front/ar')}}/js/jquery.magnific-popup.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ URL::asset('public/new_front/ar')}}/js/custom.js"></script>

@else
    <script src="{{ URL::asset('public/new_front/en')}}/js/jquery-3.5.1.min.js"></script>
    <script src="{{ URL::asset('public/new_front/en')}}/js/popper.min.js"></script>
    <script src="{{ URL::asset('public/new_front/en')}}/js/bootstrap.min.js"></script>
    <!-- Form Validator JS -->
    <script src="{{ URL::asset('public/new_front/en')}}/js/form-validator.min.js"></script>
    <!-- Contact JS -->
    <script src="{{ URL::asset('public/new_front/en')}}/js/contact-form-script.js"></script>
    <!-- Meanmenu JS -->
    <script src="{{ URL::asset('public/new_front/en')}}/js/jquery.meanmenu.js"></script>
    <!-- Owl Carousel -->
    <script src="{{ URL::asset('public/new_front/en')}}/js/owl.carousel.min.js"></script>
    <!-- Appear JS -->
    <script src="{{ URL::asset('public/new_front/en')}}/js/jquery.appear.js"></script>
    <!-- Odometer JS -->
    <script src="{{ URL::asset('public/new_front/en')}}/js/odometer.min.js"></script>
    <!-- Magnific Popup JS -->
    <script src="{{ URL::asset('public/new_front/en')}}/js/jquery.magnific-popup.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ URL::asset('public/new_front/en')}}/js/custom.js"></script>
@endif
<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");

        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }

        slides[slideIndex - 1].style.display = "block";

        setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
</script>
</body>

<!-- Mirrored from templates.envytheme.com/robtic/default/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 May 2022 13:30:44 GMT -->
</html>
