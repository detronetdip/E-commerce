@extends('layouts.index')

@section('page')
    <div class="path">
        <div class="container">
            <a href="{{ url('/') }}">Home</a>
            /
            <a href="{{ url()->current() }}">Cart</a>
        </div>
    </div>
    <section class="cart">
        <section class="myac-body">
            <div class="flex row">
                <div class="right">
                    <div class="col-lg-12 col-md-12">
                        <div class="pdpt-bg">
                            <div class="pdpt-title flex justify-between">
                                <h4>
                                    <i class="uil uil-shopping-cart-alt"></i> &nbsp;My Cart
                                </h4>
                            </div>
                            <div class="order-body10">
                                <table>
                                    <thead>
                                        <th>
                                            <h5>Product</h5>
                                        </th>
                                        <th>
                                            <h5>Price</h5>
                                        </th>
                                        <th>
                                            <h5>Quantity</h5>
                                        </th>
                                        <th>
                                            <h5>Subtotal</h5>
                                        </th>
                                        <th>
                                            <h5>Delete</h5>
                                        </th>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < 3; $i++)
                                            <tr>
                                                <td>
                                                    <div class="product">
                                                        <a href="">
                                                            <img src="{{asset('assets/user/images/product/big-1.jpg')}}" alt="" />
                                                        </a>
                                                        <h6>Product Tittle</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="price">
                                                        <h6>&#8377;15</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="qty">
                                                        <div class="box">
                                                            <input type="text" value="1" />
                                                            <div class="btnbv">
                                                                <button>+</button>
                                                                <button>-</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="price">
                                                        <h6>&#8377;15</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="price">
                                                        <h6>
                                                            <i class="uil uil-trash-alt"></i>
                                                        </h6>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endfor

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="left">
                    <div class="ul-wrapper">
                        <h4>Cart Totals</h4>
                        <table>
                            <tr>
                                <td>
                                    <h6>Subtotal</h6>
                                </td>
                                <td>
                                    <h6>&#8377;15</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Shipping</h6>
                                </td>
                                <td>
                                    <h6>&#8377;1</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Grand Total</h6>
                                </td>
                                <td>
                                    <h6>&#8377;16</h6>
                                </td>
                            </tr>
                        </table>
                        <div class="cktout">
                            <a href="checkout.html" style="width: 100%;margin: 0;">
                                <button style="margin: 0;width: 100%;">Proceed To Checkout</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
