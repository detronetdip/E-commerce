<header class="header">
    <div class="top-header">
        <div class="th">
            <div class="logo">
                <a href="index.html">
                    <img src="{{ asset('assets/user/images/logo.png') }}" alt="logo" />
                </a>
            </div>
            <div class="name">
                Krables <br />
                <span>Market</span>
            </div>
            <div class="selecloc">
                <div class="dropdown" tabindex="0">
                    <div class="text">
                        <i class="uil uil-location-point"></i>
                        Gurugram
                    </div>
                    <i class="uil uil-angle-down icon__14"></i>
                </div>
                <div class="location fadeup" id="lcnpnl">
                    <input type="text" placeholder="Search here" id="location_search" oninput="search_city()" />
                    <ul>
                        <li>
                            <i class="uil uil-location-point"></i>
                            <a href="" class="lcn-search">Mumbai</a>
                        </li>
                        <li>
                            <i class="uil uil-location-point"></i>
                            <a href="" class="lcn-search">kolkata</a>
                        </li>
                        <li>
                            <i class="uil uil-location-point"></i>
                            <a href="" class="lcn-search">delhi</a>
                        </li>
                        <li>
                            <i class="uil uil-location-point"></i>
                            <a href="" class="lcn-search">chennai</a>
                        </li>
                        <li>
                            <i class="uil uil-location-point"></i>
                            <a href="" class="lcn-search">west bengal</a>
                        </li>
                        <li>
                            <i class="uil uil-location-point"></i>
                            <a href="" class="lcn-search">maharastra</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="searchbox">
                <span>
                    <i class="uil uil-create-dashboard" onclick="show_cat()"></i>
                    <i class="uil uil-angle-down icon__14" onclick="show_cat()"></i>
                </span>
                <form action="index.html" method="GET">
                    <input type="hidden" value="14" name="d" />
                    <input type="text" placeholder="Search Products" name="f" />
                    <button>
                        <i class="uil uil-search"></i>
                    </button>
                </form>
                <div class="location fadeup" id="ctcnpnl">
                    <input type="text" placeholder="Search here" id="cat_search" oninput="search_cat()" />
                    <ul>
                        <li onclick="set(this)">
                            <i class="uil uil-apps"></i>
                            <a href="" class="cn-search">electronics</a>
                        </li>
                        <li onclick="set(this)">
                            <i class="uil uil-apps"></i>
                            <a href="" class="cn-search">food</a>
                        </li>
                        <li onclick="set(this)">
                            <i class="uil uil-apps"></i>
                            <a href="" class="cn-search">home decoration</a>
                        </li>
                        <li onclick="set(this)">
                            <i class="uil uil-apps"></i>
                            <a href="" class="cn-search">meal</a>
                        </li>
                        <li onclick="set(this)">
                            <i class="uil uil-apps"></i>
                            <a href="" class="cn-search">new godds</a>
                        </li>
                        <li onclick="set(this)">
                            <i class="uil uil-apps"></i>
                            <a href="" class="cn-search">maharastra</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="rightbox">
                <ul>
                    <li>
                        <a href="" class="rightlink">
                            <i class="uil uil-phone-alt"></i>
                            1800-000-0000
                        </a>
                    </li>
                    <li>
                        <a href="" class="rightlink">
                            <i class="uil uil-gift"></i>
                            Offers
                        </a>
                    </li>
                    <li>
                        <a href="" class="rightlink">
                            <i class="uil uil-question-circle"></i>
                            Help
                        </a>
                    </li>
                    <li>
                        <a href="" class="rightlink wl">
                            <i class="uil uil-heart icon_wishlist"></i>
                            <span class="noti_count1">3</span>
                        </a>
                    </li>
                    <li class="user">
                        <a href="#" class="rightlink">
                            <i class="uil uil-user-circle bg" onclick="show_userpanel()">
                            </i>
                        </a>
                        <div class="userpanel fadeup" id="userpanel">
                            <ul>
                                <li>
                                    <i class="uil uil-chat-bubble-user"></i><a href="myorders.html">My Account</a>
                                </li>
                                <li>
                                    <i class="uil uil-box"></i><a href="myorders.html">My Orders</a>
                                </li>
                                <li>
                                    <i class="uil uil-heart-alt"></i><a href="wishlist.html">My Wishlist</a>
                                </li>
                                <li>
                                    <i class="uil uil-shopping-cart"></i><a href="cart.html">My Cart</a>
                                </li>
                                <li>
                                    <i class="uil uil-wallet"></i><a href="mywallet.html">My Wallet</a>
                                </li>
                                <li>
                                    <i class="uil uil-map-marker-alt"></i><a href="address.html">My Address</a>
                                </li>
                                <li><i class="uil uil-signin"></i><a href="">Login</a></li>
                                <li>
                                    <i class="uil uil-signout"></i><a href="">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bottom-header">
        <div class="sub-header">
            <div class="hamberger" onclick="sidebar()">
                <i class="uil uil-bars"></i>
            </div>
            <nav>
                <div class="div">Home</div>
                @for ($i = 0; $i < 5; $i++)
                    <div class="div">
                        cat {{ $i + 1 }}
                        <i class="uil uil-angle-down icon__14"></i>
                        <div class="userpanel fadeup" id="userpanel">
                            <ul>
                                @for ($j = 0; $j < 5; $j++)
                                    <li>
                                        <a href="">Sub cat {{ $j }}</a>
                                    </li>
                                @endfor

                            </ul>
                        </div>
                    </div>
                @endfor
            </nav>
            <div class="cart-right">
                <a href="cart.html" style="text-decoration: none; color: #fff"><i
                        class="uil uil-shopping-cart-alt"></i>Cart</a>
            </div>
            <div class="srch" onclick="openrss()">
                <i class="uil uil-search"></i>
            </div>
        </div>
    </div>
</header>
