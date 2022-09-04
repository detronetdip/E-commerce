<section class="defaultPadding mt4 footer">
    <div class="footer-row1">
        <div class="container">
            <div class="row flex">
                <ul class="ul1">
                    <li>
                        <a href="#">
                            <i class="uil uil-dialpad-alt"></i>
                            1800-000-000
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="uil uil-envelope-alt"></i>
                            info@Krables.com
                        </a>
                    </li>
                </ul>
                <ul class="ul2">
                    <li>
                        <a href="#">
                            <i class="uil uil-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="uil uil-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="uil uil-google"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="uil uil-linkedin-alt"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-row2">
        <div class="container">
            <div class="row">
                <ul class="ul1">
                    <li class="heading">
                        <h4>Categories</h4>
                    </li>
                    <ul class="ul-sub">
                        <li>Fruits and Vegetables</li>
                        <li>Grocery & Staples</li>
                        <li>Dairy & Eggs</li>
                        <li>Beverages</li>
                        <li>Snacks</li>
                        <li>Fruits and Vegetables</li>
                        <li>Grocery & Staples</li>
                        <li>Dairy & Eggs</li>
                        <li>Beverages</li>
                        <li>Snacks</li>
                    </ul>
                </ul>
                <ul class="ul1">
                    <li class="heading">
                        <h4>Usefull Links</h4>
                    </li>
                    <ul class="ul-sub">
                        <li>Fruits and Vegetables</li>
                        <li>Dairy & Eggs</li>
                        <li>Beverages</li>
                        <li>Snacks</li>
                        <li>Snacks</li>
                        <li>Beverages</li>
                        <li>Snacks</li>
                    </ul>
                </ul>
                <ul class="ul1">
                    <li class="heading">
                        <h4>Top Cities</h4>
                    </li>
                    <ul class="ul-sub">
                        <li>Fruits and Vegetables</li>
                        <li>Grocery & Staples</li>
                        <li>Snacks</li>
                        <li>Fruits and</li>
                        <li>Grocery & Staples</li>
                        <li>Dairy & Eggs</li>
                        <li>Beverages</li>
                        <li>Snacks</li>
                    </ul>
                </ul>
                <ul class="ul1">
                    <li class="heading">
                        <h4>Download App</h4>
                    </li>
                    <ul class="ul-sub da">
                        <li class="dbnt">
                            <a href="">
                                <img src="{{ asset('assets/user/images/svg/download-1.svg') }}" alt="" />
                            </a>
                        </li>
                        <li class="dbnt">
                            <a href="">
                                <img src="{{ asset('assets/user/images/svg/download-2.svg') }}" alt="" />
                            </a>
                        </li>
                    </ul>
                    <li class="heading thd">
                        <h4><b>Payment Mode</b></h4>
                    </li>
                    <ul class="ul-sub t flex">
                        <li class="dbnt">
                            <a href="">
                                <img src="{{ asset('assets/user/images/svg/pyicon-1.svg') }}" alt="" />
                            </a>
                        </li>
                        <li class="dbnt">
                            <a href="">
                                <img src="{{ asset('assets/user/images/svg/pyicon-2.svg') }}" alt="" />
                            </a>
                        </li>
                        <li class="dbnt">
                            <a href="">
                                <img src="{{ asset('assets/user/images/svg/pyicon-3.svg') }}" alt="" />
                            </a>
                        </li>
                        <li class="dbnt">
                            <a href="">
                                <img src="{{ asset('assets/user/images/svg/pyicon-4.svg') }}" alt="" />
                            </a>
                        </li>
                        <li class="dbnt">
                            <a href="">
                                <img src="{{ asset('assets/user/images/svg/pyicon-6.svg') }}" alt="" />
                            </a>
                        </li>
                    </ul>
                    <li class="heading thd">
                        <h4><b>News Letter</b></h4>
                    </li>
                    <ul class="ul-sub t flex nl">
                        <form action="#">
                            <input type="text" name="" placeholder="Email Address" />
                            <button><i class="uil uil-telegram-alt"></i></button>
                        </form>
                    </ul>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-3">
        <span> Developed by Ayondip Jana </span>
    </div>
</section>
<script src="{{ asset('assets/user/js/script.js') }}"></script>
@if ($title == 'Home')
    <script src="{{ asset('assets/user/js/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel();
        });
        var owl = $(".main-slider");
        owl.owlCarousel({
            items: 4,
            loop: true,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
                1200: {
                    items: 4,
                },
                1400: {
                    items: 4,
                },
            },
            margin: 10,
            autoplay: true,
            autoplayTimeout: 2500,
            autoplayHoverPause: true,
            dots: false,
        });

        $(".cate-slider").owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            dots: false,
            navText: [
                "<i class='uil uil-angle-left'></i>",
                "<i class='uil uil-angle-right'></i>",
            ],
            responsive: {
                0: {
                    items: 2,
                },
                375: {
                    items: 2,
                },
                600: {
                    items: 3,
                },
                1000: {
                    items: 4,
                },
                1200: {
                    items: 6,
                },
                1400: {
                    items: 6,
                },
            },
        });

        $(".product-slider").owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            dots: false,
            navText: [
                "<i class='uil uil-angle-left'></i>",
                "<i class='uil uil-angle-right'></i>",
            ],
            responsive: {
                0: {
                    items: 1,
                },
                610: {
                    items: 2,
                },
                600: {
                    items: 3,
                },
                1000: {
                    items: 4,
                },
            },
        });
    </script>
@endif
</body>

</html>
