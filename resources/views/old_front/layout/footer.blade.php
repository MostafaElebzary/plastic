<footer class="pb-70" id="contactus">

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-4">
                <div class="footer-item">
                    <div class="footer-contact">
                        <h3>تواصل معنا</h3>
                        <ul>
                            <li>
                                <i class="icofont-ui-message"></i>
                                <a href="mailto:{{$Settings->email1}}">{{$Settings->email1}} </a>
                                <a href="mailto:{{$Settings->email2}}">{{$Settings->email2}} </a>
                            </li>
                            <li>
                                <i class="icofont-stock-mobile"></i>
                                <a href="tel:{{$Settings->phone1}}">Call: {{$Settings->phone1}}</a>
                                <a href="tel:{{$Settings->phone2}}">Call: {{$Settings->phone2}}</a>
                            </li>
                            <li>
                                <i class="icofont-location-pin"></i>
                                {{$Settings->address}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-item">
                    <div class="footer-quick">
                        <h3>الخدمات</h3>
                        <ul>
                            @foreach(\App\Models\Post::take(5)->get() as $posts)
                                <li>
                                    <a href="{{url('service/'.$posts->id)}}">{{$posts->title}}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-5">
                <div class="footer-item">
                    <div class="footer-feedback">
                        <h3>الشكاوى والمقترحات</h3>
                        <form action="{{url('contact')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="الاسم" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="البريد الاليكترونى"
                                       required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" placeholder="رقم الهاتف" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="msg" id="your_message" rows="5"
                                          placeholder="الرسالة" required></textarea>
                            </div>
                            <div class="text-left">
                                <button type="submit" class="btn feedback-btn">ارسال</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<div class="copyright-area">
    <div class="container">
        <div class="copyright-item">
            <p> © {{date('Y')}} {{$Settings->title}} <span class="text-muted hidden-xs-down pull-left">Craeted with <i
                        class="mdi mdi-heart text-danger"></i> by <a
                        href="https://arabiacode.com/" target="_blank"></a> Arabiacode.com</span>
            </p>
        </div>
    </div>
</div>

<script src="{{ URL::asset('public/old_front/assets/js/jquery.min.js')}}"></script>
<script src="{{ URL::asset('public/old_front/assets/js/popper.min.js')}}"></script>
<script src="{{ URL::asset('public/old_front/assets/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('public/old_front/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{ URL::asset('public/old_front/assets/js/jquery.meanmenu.js')}}"></script>
<script src="{{ URL::asset('public/old_front/assets/js/slick.min.js')}}"></script>
<script src="{{ URL::asset('public/old_front/assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ URL::asset('public/old_front/assets/js/wow.min.js')}}"></script>
<script src="{{ URL::asset('public/old_front/assets/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{ URL::asset('public/old_front/assets/js/form-validator.min.js')}}"></script>
<script src="{{ URL::asset('public/old_front/assets/js/contact-form-script.js')}}"></script>
<script src="{{ URL::asset('public/old_front/assets/js/odometer.min.js')}}"></script>
<script src="{{ URL::asset('public/old_front/assets/js/jquery.appear.min.js')}}"></script>
<script src="{{ URL::asset('public/old_front/assets/js/custom.js')}}"></script>

</body>
</html>
