@extends('layouts.index')

@section('page')
    <div class="path">
        <div class="container">
            <a href="{{ url('/') }}">Home</a>
            /
            <a href="index.html">cat1</a>
            /
            <a href="index.html">product tittle</a>
        </div>
    </div>

    <section class="single-product">
        <div class="row">
            <div class="container">
                <div class="innerrow">
                    <div class="left">
                        <div class="mainImage">
                            <img src="{{ asset('assets/user/images/product/big-1.jpg') }}" alt="" id="mi" />
                        </div>
                        <div class="subimages flex">
                            <div class="sub">
                                <img src="{{ asset('assets/user/images/product/big-2.jpg') }}" alt=""
                                    onclick="view(this)" />
                            </div>
                            <div class="sub">
                                <img src="{{ asset('assets/user/images/product/big-1.jpg') }}" alt=""
                                    onclick="view(this)" />
                            </div>
                            <div class="sub">
                                <img src="{{ asset('assets/user/images/product/big-3.jpg') }}" alt=""
                                    onclick="view(this)" />
                            </div>
                            <div class="sub">
                                <img src="{{ asset('assets/user/images/product/big-4.jpg') }}" alt=""
                                    onclick="view(this)" />
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <h2 class="mt2">Grape fruit turkey</h2>
                        <div class="no-stock">
                            <p class="pd-no">Product No.<span>12345</span></p>
                            <p class="stock-qty">Available<span>(Instock)</span></p>
                        </div>
                        <p class="pp-descp">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam
                            vulputate, purus at tempor blandit, nulla felis dictum eros, sed
                            volutpat odio sapien id lectus. Cras mollis massa ac congue
                            posuere. Fusce viverra mauris vel magna pretium aliquet. Nunc
                            tincidunt, velit id tempus tristique, velit dolor hendrerit
                            nibh, at scelerisque neque mauris sed ex.
                        </p>
                        <div class="product-group-dt">
                            <ul>
                                <li>
                                    <div class="main-price color-discount">
                                        Discount Price<span>&#8377;15</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="main-price mrp-price">
                                        MRP Price<span>&#8377;18</span>
                                    </div>
                                </li>
                            </ul>
                            <ul class="gty-wish-share">
                                <li>
                                    <div class="qty-product">
                                        <div class="quantity buttons_added">
                                            <input type="button" value="-" class="minus minus-btn" />
                                            <input type="number" step="1" name="quantity" value="1"
                                                class="input-text qty text" />
                                            <input type="button" value="+" class="plus plus-btn" />
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <i class="uil uil-heart-alt"></i>
                                </li>
                            </ul>
                            <ul class="ordr-crt-share">
                                <li>
                                    <button class="add-cart-btn hover-btn">
                                        <i class="uil uil-shopping-cart-alt"></i>Add to Cart
                                    </button>
                                </li>
                                <li>
                                    <button class="order-btn hover-btn">Order Now</button>
                                </li>
                            </ul>
                        </div>
                        <div class="down">
                            <ul class="flex">
                                <li>
                                    <div class="pdp-group-dt">
                                        <div class="pdp-icon">
                                            <i class="uil uil-usd-circle"></i>
                                        </div>
                                        <div class="pdp-text-dt">
                                            <span>Lowest Price Guaranteed</span>
                                            <p>
                                                Get difference refunded if you find it cheaper
                                                anywhere else.
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pdp-group-dt">
                                        <div class="pdp-icon">
                                            <i class="uil uil-cloud-redo"></i>
                                        </div>
                                        <div class="pdp-text-dt">
                                            <span>Easy Returns &amp; Refunds</span>
                                            <p>
                                                Return products at doorstep and get refund in seconds.
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="secondrow">
                    <div class="innerrow">
                        <div class="mlt">
                            <div class="container">
                                <div class="heading">
                                    <h4>more like this</h4>
                                </div>
                                <div class="product-container">
                                    <div class="card">
                                        <a href="">
                                            <img src="{{ asset('assets/user/images/product/big-1.jpg') }}" alt="" />
                                        </a>
                                        <div class="detail">
                                            <h4>Product tittle here</h4>
                                            <div class="qty-group">
                                                <div class="quantity buttons_added">
                                                    <input type="button" value="-" class="minus minus-btn" />
                                                    <input type="number" step="1" name="quantity" value="1"
                                                        class="input-text qty text" />
                                                    <input type="button" value="+" class="plus plus-btn" />
                                                </div>
                                                <div class="cart-item-price">
                                                    $12 <span>$15</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <a href="">
                                            <img src="{{ asset('assets/user/images/product/big-1.jpg') }}" alt="" />
                                        </a>
                                        <div class="detail">
                                            <h4>Product tittle here</h4>
                                            <div class="qty-group">
                                                <div class="quantity buttons_added">
                                                    <input type="button" value="-" class="minus minus-btn" />
                                                    <input type="number" step="1" name="quantity" value="1"
                                                        class="input-text qty text" />
                                                    <input type="button" value="+" class="plus plus-btn" />
                                                </div>
                                                <div class="cart-item-price">
                                                    $12 <span>$15</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <a href="">
                                            <img src="{{ asset('assets/user/images/product/big-1.jpg') }}"
                                                alt="" />
                                        </a>
                                        <div class="detail">
                                            <h4>Product tittle here</h4>
                                            <div class="qty-group">
                                                <div class="quantity buttons_added">
                                                    <input type="button" value="-" class="minus minus-btn" />
                                                    <input type="number" step="1" name="quantity" value="1"
                                                        class="input-text qty text" />
                                                    <input type="button" value="+" class="plus plus-btn" />
                                                </div>
                                                <div class="cart-item-price">
                                                    $12 <span>$15</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <a href="">
                                            <img src="{{ asset('assets/user/images/product/big-1.jpg') }}"
                                                alt="" />
                                        </a>
                                        <div class="detail">
                                            <h4>Product tittle here</h4>
                                            <div class="qty-group">
                                                <div class="quantity buttons_added">
                                                    <input type="button" value="-" class="minus minus-btn" />
                                                    <input type="number" step="1" name="quantity" value="1"
                                                        class="input-text qty text" />
                                                    <input type="button" value="+" class="plus plus-btn" />
                                                </div>
                                                <div class="cart-item-price">
                                                    $12 <span>$15</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <a href="">
                                            <img src="{{ asset('assets/user/images/product/big-1.jpg') }}"
                                                alt="" />
                                        </a>
                                        <div class="detail">
                                            <h4>Product tittle here</h4>
                                            <div class="qty-group">
                                                <div class="quantity buttons_added">
                                                    <input type="button" value="-" class="minus minus-btn" />
                                                    <input type="number" step="1" name="quantity" value="1"
                                                        class="input-text qty text" />
                                                    <input type="button" value="+" class="plus plus-btn" />
                                                </div>
                                                <div class="cart-item-price">
                                                    $12 <span>$15</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="alldesc">
                            <div class="container">
                                <div class="heading">
                                    <h4>Product details</h4>
                                </div>
                                <div class="desc-body">
                                    <div class="pdct-dts-1">
                                        <div class="pdct-dt-step">
                                            <h4>Description</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Pellentesque posuere nunc in condimentum
                                                maximus. Integer interdum sem sollicitudin, porttitor
                                                felis in, mollis quam. Nunc gravida erat eu arcu
                                                interdum eleifend. Cras tortor velit, dignissim sit
                                                amet hendrerit sed, ultricies eget est. Donec eget
                                                urna sed metus dignissim cursus.
                                            </p>
                                        </div>
                                        <div class="pdct-dt-step">
                                            <h4>Benefits</h4>
                                            <div class="product_attr">
                                                Aliquam nec nulla accumsan, accumsan nisl in, rhoncus
                                                sapien.<br />
                                                In mollis lorem a porta congue.<br />
                                                Sed quis neque sit amet nulla maximus dignissim id
                                                mollis urna.<br />
                                                Cras non libero at lorem laoreet finibus vel et
                                                turpis.<br />
                                                Mauris maximus ligula at sem lobortis congue.<br />
                                            </div>
                                        </div>
                                        <div class="pdct-dt-step">
                                            <h4>How to Use</h4>
                                            <div class="product_attr">
                                                The peeled, orange segments can be added to the daily
                                                fruit bowl, and its juice is a refreshing drink.
                                            </div>
                                        </div>
                                        <div class="pdct-dt-step">
                                            <h4>Seller</h4>
                                            <div class="product_attr">
                                                Gambolthemes Pvt Ltd, Sks Nagar, Near Mbd Mall,
                                                Ludhana, 141001
                                            </div>
                                        </div>
                                        <div class="pdct-dt-step">
                                            <h4>Disclaimer</h4>
                                            <p>
                                                Phasellus efficitur eu ligula consequat ornare. Nam et
                                                nisl eget magna aliquam consectetur. Aliquam quis
                                                tristique lacus. Donec eget nibh et quam maximus
                                                rutrum eget ut ipsum. Nam fringilla metus id dui
                                                sollicitudin, sit amet maximus sapien malesuada.
                                            </p>
                                        </div>
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
                <h2>Top Featured Products</h2>
            </div>
            <div class="row mt3 ct-row">
                <div class="owl-carousel owl-theme product-slider">
                    <div class="item">
                        <div class="productBox">
                            <a href="" class="product-image">
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
                            <a href="" class="product-image">
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
                            <a href="" class="product-image">
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
                            <a href="" class="product-image">
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
                            <a href="" class="product-image">
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
