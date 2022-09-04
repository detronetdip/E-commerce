@extends('layouts.index')

@section('page')
    @include('layouts.slider')
    @include('layouts.categories')
        @if ($location != null)
            <section class="defaultPadding mt4">
                <div class="container mrlAuto">
                    <div class="heading">
                        <span>For You</span>
                        <h2>Best Selling Of {{ $location }}</h2>
                    </div>
                    <div class="row mt3 ct-row">
                        <div class="owl-carousel owl-theme product-slider">
                            <div class="item">
                                <div class="productBox">
                                    <a href="product.html" class="product-image">
                                        <img src="{{ asset('assets/user/images/sample/img-1.jpg') }}" alt="product" />
                                        <div class="topOption">
                                            <span class="offer">10% off</span>
                                            <span class="wishlist">
                                                <i class="uil uil-heart"></i>
                                            </span>
                                        </div>
                                    </a>
                                    <div class="product-detail">
                                        <p>Available (In Stock)</p>
                                        <h4>Product Tittle</h4>
                                        <div class="price">&#8377;100 <span>&#8377;110</span></div>
                                        <div class="cartqt">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn" />
                                                <input type="number" name="quantity" value="1" class="qty-text" />
                                                <input type="button" value="+" class="plus plus-btn" />
                                            </div>
                                            <div class="ct-icon">
                                                <i class="uil uil-shopping-cart-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="productBox">
                                    <a href="product.html" class="product-image">
                                        <img src="{{ asset('assets/user/images/sample/img-2.jpg') }}" alt="product" />
                                        <div class="topOption">
                                            <span class="offer">10% off</span>
                                            <span class="wishlist">
                                                <i class="uil uil-heart"></i>
                                            </span>
                                        </div>
                                    </a>
                                    <div class="product-detail">
                                        <p>Available (In Stock)</p>
                                        <h4>Product Tittle</h4>
                                        <div class="price">&#8377;100 <span>&#8377;110</span></div>
                                        <div class="cartqt">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn" />
                                                <input type="number" name="quantity" value="1" class="qty-text" />
                                                <input type="button" value="+" class="plus plus-btn" />
                                            </div>
                                            <div class="ct-icon">
                                                <i class="uil uil-shopping-cart-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="productBox">
                                    <a href="product.html" class="product-image">
                                        <img src="{{ asset('assets/user/images/sample/img-3.jpg') }}" alt="product" />
                                        <div class="topOption">
                                            <span class="offer">10% off</span>
                                            <span class="wishlist">
                                                <i class="uil uil-heart"></i>
                                            </span>
                                        </div>
                                    </a>
                                    <div class="product-detail">
                                        <p>Available (In Stock)</p>
                                        <h4>Product Tittle</h4>
                                        <div class="price">&#8377;100 <span>&#8377;110</span></div>
                                        <div class="cartqt">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn" />
                                                <input type="number" name="quantity" value="1" class="qty-text" />
                                                <input type="button" value="+" class="plus plus-btn" />
                                            </div>
                                            <div class="ct-icon">
                                                <i class="uil uil-shopping-cart-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="productBox">
                                    <a href="product.html" class="product-image">
                                        <img src="{{ asset('assets/user/images/sample/img-2.jpg') }}" alt="product" />
                                        <div class="topOption">
                                            <span class="offer">10% off</span>
                                            <span class="wishlist">
                                                <i class="uil uil-heart"></i>
                                            </span>
                                        </div>
                                    </a>
                                    <div class="product-detail">
                                        <p>Available (In Stock)</p>
                                        <h4>Product Tittle</h4>
                                        <div class="price">&#8377;100 <span>&#8377;110</span></div>
                                        <div class="cartqt">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn" />
                                                <input type="number" name="quantity" value="1" class="qty-text" />
                                                <input type="button" value="+" class="plus plus-btn" />
                                            </div>
                                            <div class="ct-icon">
                                                <i class="uil uil-shopping-cart-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="productBox">
                                    <a href="product.html" class="product-image">
                                        <img src="{{ asset('assets/user/images/sample/img-3.jpg') }}" alt="product" />
                                        <div class="topOption">
                                            <span class="offer">10% off</span>
                                            <span class="wishlist">
                                                <i class="uil uil-heart"></i>
                                            </span>
                                        </div>
                                    </a>
                                    <div class="product-detail">
                                        <p>Available (In Stock)</p>
                                        <h4>Product Tittle</h4>
                                        <div class="price">&#8377;100 <span>&#8377;110</span></div>
                                        <div class="cartqt">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn" />
                                                <input type="number" name="quantity" value="1" class="qty-text" />
                                                <input type="button" value="+" class="plus plus-btn" />
                                            </div>
                                            <div class="ct-icon">
                                                <i class="uil uil-shopping-cart-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <section class="defaultPadding mt4">
            <div class="container mrlAuto">
                <div class="heading">
                    <span>For You</span>
                    <h2>Top Featured Products</h2>
                </div>
                <div class="row mt3 ct-row">
                    <div class="owl-carousel owl-theme product-slider">
                        <div class="item">
                            <div class="productBox">
                                <a href="product.html" class="product-image">
                                    <img src="{{ asset('assets/user/images/sample/img-1.jpg') }}" alt="product" />
                                    <div class="topOption">
                                        <span class="offer">10% off</span>
                                        <span class="wishlist">
                                            <i class="uil uil-heart"></i>
                                        </span>
                                    </div>
                                </a>
                                <div class="product-detail">
                                    <p>Available (In Stock)</p>
                                    <h4>Product Tittle</h4>
                                    <div class="price">&#8377;100 <span>&#8377;110</span></div>
                                    <div class="cartqt">
                                        <div class="quantity buttons_added">
                                            <input type="button" value="-" class="minus minus-btn" />
                                            <input type="number" name="quantity" value="1" class="qty-text" />
                                            <input type="button" value="+" class="plus plus-btn" />
                                        </div>
                                        <div class="ct-icon">
                                            <i class="uil uil-shopping-cart-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="productBox">
                                <a href="product.html" class="product-image">
                                    <img src="{{ asset('assets/user/images/sample/img-2.jpg') }}" alt="product" />
                                    <div class="topOption">
                                        <span class="offer">10% off</span>
                                        <span class="wishlist">
                                            <i class="uil uil-heart"></i>
                                        </span>
                                    </div>
                                </a>
                                <div class="product-detail">
                                    <p>Available (In Stock)</p>
                                    <h4>Product Tittle</h4>
                                    <div class="price">&#8377;100 <span>&#8377;110</span></div>
                                    <div class="cartqt">
                                        <div class="quantity buttons_added">
                                            <input type="button" value="-" class="minus minus-btn" />
                                            <input type="number" name="quantity" value="1" class="qty-text" />
                                            <input type="button" value="+" class="plus plus-btn" />
                                        </div>
                                        <div class="ct-icon">
                                            <i class="uil uil-shopping-cart-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="productBox">
                                <a href="product.html" class="product-image">
                                    <img src="{{ asset('assets/user/images/sample/img-3.jpg') }}" alt="product" />
                                    <div class="topOption">
                                        <span class="offer">10% off</span>
                                        <span class="wishlist">
                                            <i class="uil uil-heart"></i>
                                        </span>
                                    </div>
                                </a>
                                <div class="product-detail">
                                    <p>Available (In Stock)</p>
                                    <h4>Product Tittle</h4>
                                    <div class="price">&#8377;100 <span>&#8377;110</span></div>
                                    <div class="cartqt">
                                        <div class="quantity buttons_added">
                                            <input type="button" value="-" class="minus minus-btn" />
                                            <input type="number" name="quantity" value="1" class="qty-text" />
                                            <input type="button" value="+" class="plus plus-btn" />
                                        </div>
                                        <div class="ct-icon">
                                            <i class="uil uil-shopping-cart-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="productBox">
                                <a href="product.html" class="product-image">
                                    <img src="{{ asset('assets/user/images/sample/img-2.jpg') }}" alt="product" />
                                    <div class="topOption">
                                        <span class="offer">10% off</span>
                                        <span class="wishlist">
                                            <i class="uil uil-heart"></i>
                                        </span>
                                    </div>
                                </a>
                                <div class="product-detail">
                                    <p>Available (In Stock)</p>
                                    <h4>Product Tittle</h4>
                                    <div class="price">&#8377;100 <span>&#8377;110</span></div>
                                    <div class="cartqt">
                                        <div class="quantity buttons_added">
                                            <input type="button" value="-" class="minus minus-btn" />
                                            <input type="number" name="quantity" value="1" class="qty-text" />
                                            <input type="button" value="+" class="plus plus-btn" />
                                        </div>
                                        <div class="ct-icon">
                                            <i class="uil uil-shopping-cart-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="productBox">
                                <a href="product.html" class="product-image">
                                    <img src="{{ asset('assets/user/images/sample/img-3.jpg') }}" alt="product" />
                                    <div class="topOption">
                                        <span class="offer">10% off</span>
                                        <span class="wishlist">
                                            <i class="uil uil-heart"></i>
                                        </span>
                                    </div>
                                </a>
                                <div class="product-detail">
                                    <p>Available (In Stock)</p>
                                    <h4>Product Tittle</h4>
                                    <div class="price">&#8377;100 <span>&#8377;110</span></div>
                                    <div class="cartqt">
                                        <div class="quantity buttons_added">
                                            <input type="button" value="-" class="minus minus-btn" />
                                            <input type="number" name="quantity" value="1" class="qty-text" />
                                            <input type="button" value="+" class="plus plus-btn" />
                                        </div>
                                        <div class="ct-icon">
                                            <i class="uil uil-shopping-cart-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="defaultPadding mt4">
            <div class="container mrlAuto">
                <div class="heading">
                    <span>Offers</span>
                    <h2>Best Values</h2>
                </div>
                <div class="row mt3 ct-row banner-row">
                    <div class="row1">
                        <div class="ban">
                            <a href="#">
                                <img src="{{ asset('assets/user/images/banner/offer-1.jpg') }}" alt="banner1" />
                            </a>
                        </div>
                        <div class="ban">
                            <a href="#">
                                <img src="{{ asset('assets/user/images/banner/offer-2.jpg') }}" alt="banner1" />
                            </a>
                        </div>
                        <div class="ban">
                            <a href="#">
                                <img src="{{ asset('assets/user/images/banner/offer-3.jpg') }}" alt="banner1" />
                            </a>
                        </div>
                    </div>
                    <div class="row1">
                        <a href="#" class="long-banner">
                            <img src="{{ asset('assets/user/images/banner/offer-4.jpg') }}" alt="banner1" />
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="defaultPadding mt4">
            <div class="container mrlAuto">
                <div class="heading">
                    <span>For You</span>
                    <h2>Fresh Vegitable & Fruits</h2>
                </div>
                <div class="row mt3 ct-row">
                    <div class="owl-carousel owl-theme product-slider">
                        <div class="item">
                            <div class="productBox">
                                <a href="product.html" class="product-image">
                                    <img src="{{ asset('assets/user/images/sample/img-1.jpg') }}" alt="product" />
                                    <div class="topOption">
                                        <span class="offer">10% off</span>
                                        <span class="wishlist">
                                            <i class="uil uil-heart"></i>
                                        </span>
                                    </div>
                                </a>
                                <div class="product-detail">
                                    <p>Available (In Stock)</p>
                                    <h4>Product Tittle</h4>
                                    <div class="price">&#8377;100 <span>&#8377;110</span></div>
                                    <div class="cartqt">
                                        <div class="quantity buttons_added">
                                            <input type="button" value="-" class="minus minus-btn" />
                                            <input type="number" name="quantity" value="1" class="qty-text" />
                                            <input type="button" value="+" class="plus plus-btn" />
                                        </div>
                                        <div class="ct-icon">
                                            <i class="uil uil-shopping-cart-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="productBox">
                                <a href="product.html" class="product-image">
                                    <img src="{{ asset('assets/user/images/sample/img-2.jpg') }}" alt="product" />
                                    <div class="topOption">
                                        <span class="offer">10% off</span>
                                        <span class="wishlist">
                                            <i class="uil uil-heart"></i>
                                        </span>
                                    </div>
                                </a>
                                <div class="product-detail">
                                    <p>Available (In Stock)</p>
                                    <h4>Product Tittle</h4>
                                    <div class="price">&#8377;100 <span>&#8377;110</span></div>
                                    <div class="cartqt">
                                        <div class="quantity buttons_added">
                                            <input type="button" value="-" class="minus minus-btn" />
                                            <input type="number" name="quantity" value="1" class="qty-text" />
                                            <input type="button" value="+" class="plus plus-btn" />
                                        </div>
                                        <div class="ct-icon">
                                            <i class="uil uil-shopping-cart-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="productBox">
                                <a href="product.html" class="product-image">
                                    <img src="{{ asset('assets/user/images/sample/img-3.jpg') }}" alt="product" />
                                    <div class="topOption">
                                        <span class="offer">10% off</span>
                                        <span class="wishlist">
                                            <i class="uil uil-heart"></i>
                                        </span>
                                    </div>
                                </a>
                                <div class="product-detail">
                                    <p>Available (In Stock)</p>
                                    <h4>Product Tittle</h4>
                                    <div class="price">&#8377;100 <span>&#8377;110</span></div>
                                    <div class="cartqt">
                                        <div class="quantity buttons_added">
                                            <input type="button" value="-" class="minus minus-btn" />
                                            <input type="number" name="quantity" value="1" class="qty-text" />
                                            <input type="button" value="+" class="plus plus-btn" />
                                        </div>
                                        <div class="ct-icon">
                                            <i class="uil uil-shopping-cart-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="productBox">
                                <a href="product.html" class="product-image">
                                    <img src="{{ asset('assets/user/images/sample/img-2.jpg') }}" alt="product" />
                                    <div class="topOption">
                                        <span class="offer">10% off</span>
                                        <span class="wishlist">
                                            <i class="uil uil-heart"></i>
                                        </span>
                                    </div>
                                </a>
                                <div class="product-detail">
                                    <p>Available (In Stock)</p>
                                    <h4>Product Tittle</h4>
                                    <div class="price">&#8377;100 <span>&#8377;110</span></div>
                                    <div class="cartqt">
                                        <div class="quantity buttons_added">
                                            <input type="button" value="-" class="minus minus-btn" />
                                            <input type="number" name="quantity" value="1" class="qty-text" />
                                            <input type="button" value="+" class="plus plus-btn" />
                                        </div>
                                        <div class="ct-icon">
                                            <i class="uil uil-shopping-cart-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="productBox">
                                <a href="product.html" class="product-image">
                                    <img src="{{ asset('assets/user/images/sample/img-3.jpg') }}" alt="product" />
                                    <div class="topOption">
                                        <span class="offer">10% off</span>
                                        <span class="wishlist">
                                            <i class="uil uil-heart"></i>
                                        </span>
                                    </div>
                                </a>
                                <div class="product-detail">
                                    <p>Available (In Stock)</p>
                                    <h4>Product Tittle</h4>
                                    <div class="price">&#8377;100 <span>&#8377;110</span></div>
                                    <div class="cartqt">
                                        <div class="quantity buttons_added">
                                            <input type="button" value="-" class="minus minus-btn" />
                                            <input type="number" name="quantity" value="1" class="qty-text" />
                                            <input type="button" value="+" class="plus plus-btn" />
                                        </div>
                                        <div class="ct-icon">
                                            <i class="uil uil-shopping-cart-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="defaultPadding mt4">
            <div class="container mrlAuto">
                <div class="heading">
                    <span>For You</span>
                    <h2>Added New Products</h2>
                </div>
                <div class="row mt3 ct-row">
                    <div class="owl-carousel owl-theme product-slider">
                        <div class="item">
                            <div class="productBox">
                                <a href="product.html" class="product-image">
                                    <img src="{{ asset('assets/user/images/sample/img-1.jpg') }}" alt="product" />
                                    <div class="topOption">
                                        <span class="offer">10% off</span>
                                        <span class="wishlist">
                                            <i class="uil uil-heart"></i>
                                        </span>
                                    </div>
                                </a>
                                <div class="product-detail">
                                    <p>Available (In Stock)</p>
                                    <h4>Product Tittle</h4>
                                    <div class="price">&#8377;100 <span>&#8377;110</span></div>
                                    <div class="cartqt">
                                        <div class="quantity buttons_added">
                                            <input type="button" value="-" class="minus minus-btn" />
                                            <input type="number" name="quantity" value="1" class="qty-text" />
                                            <input type="button" value="+" class="plus plus-btn" />
                                        </div>
                                        <div class="ct-icon">
                                            <i class="uil uil-shopping-cart-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="productBox">
                                <a href="product.html" class="product-image">
                                    <img src="{{ asset('assets/user/images/sample/img-2.jpg') }}" alt="product" />
                                    <div class="topOption">
                                        <span class="offer">10% off</span>
                                        <span class="wishlist">
                                            <i class="uil uil-heart"></i>
                                        </span>
                                    </div>
                                </a>
                                <div class="product-detail">
                                    <p>Available (In Stock)</p>
                                    <h4>Product Tittle</h4>
                                    <div class="price">&#8377;100 <span>&#8377;110</span></div>
                                    <div class="cartqt">
                                        <div class="quantity buttons_added">
                                            <input type="button" value="-" class="minus minus-btn" />
                                            <input type="number" name="quantity" value="1" class="qty-text" />
                                            <input type="button" value="+" class="plus plus-btn" />
                                        </div>
                                        <div class="ct-icon">
                                            <i class="uil uil-shopping-cart-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="productBox">
                                <a href="product.html" class="product-image">
                                    <img src="{{ asset('assets/user/images/sample/img-3.jpg') }}" alt="product" />
                                    <div class="topOption">
                                        <span class="offer">10% off</span>
                                        <span class="wishlist">
                                            <i class="uil uil-heart"></i>
                                        </span>
                                    </div>
                                </a>
                                <div class="product-detail">
                                    <p>Available (In Stock)</p>
                                    <h4>Product Tittle</h4>
                                    <div class="price">&#8377;100 <span>&#8377;110</span></div>
                                    <div class="cartqt">
                                        <div class="quantity buttons_added">
                                            <input type="button" value="-" class="minus minus-btn" />
                                            <input type="number" name="quantity" value="1" class="qty-text" />
                                            <input type="button" value="+" class="plus plus-btn" />
                                        </div>
                                        <div class="ct-icon">
                                            <i class="uil uil-shopping-cart-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="productBox">
                                <a href="product.html" class="product-image">
                                    <img src="{{ asset('assets/user/images/sample/img-2.jpg') }}" alt="product" />
                                    <div class="topOption">
                                        <span class="offer">10% off</span>
                                        <span class="wishlist">
                                            <i class="uil uil-heart"></i>
                                        </span>
                                    </div>
                                </a>
                                <div class="product-detail">
                                    <p>Available (In Stock)</p>
                                    <h4>Product Tittle</h4>
                                    <div class="price">&#8377;100 <span>&#8377;110</span></div>
                                    <div class="cartqt">
                                        <div class="quantity buttons_added">
                                            <input type="button" value="-" class="minus minus-btn" />
                                            <input type="number" name="quantity" value="1" class="qty-text" />
                                            <input type="button" value="+" class="plus plus-btn" />
                                        </div>
                                        <div class="ct-icon">
                                            <i class="uil uil-shopping-cart-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="productBox">
                                <a href="product.html" class="product-image">
                                    <img src="{{ asset('assets/user/images/sample/img-3.jpg') }}" alt="product" />
                                    <div class="topOption">
                                        <span class="offer">10% off</span>
                                        <span class="wishlist">
                                            <i class="uil uil-heart"></i>
                                        </span>
                                    </div>
                                </a>
                                <div class="product-detail">
                                    <p>Available (In Stock)</p>
                                    <h4>Product Tittle</h4>
                                    <div class="price">&#8377;100 <span>&#8377;110</span></div>
                                    <div class="cartqt">
                                        <div class="quantity buttons_added">
                                            <input type="button" value="-" class="minus minus-btn" />
                                            <input type="number" name="quantity" value="1" class="qty-text" />
                                            <input type="button" value="+" class="plus plus-btn" />
                                        </div>
                                        <div class="ct-icon">
                                            <i class="uil uil-shopping-cart-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
