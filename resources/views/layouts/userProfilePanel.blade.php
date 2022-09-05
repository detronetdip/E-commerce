@extends('layouts.index')

@section('page')
    <div class="path">
        <div class="container">
            <a href="{{ url('/') }}">Home</a>
            /
            <a href="{{ url()->current() }}">{{ $title }}</a>
        </div>
    </div>
    @yield('section-name')
    <div class="headbanner">
        <div class="userimage">
            <img src="{{ asset('assets/user/images/img-5.jpg') }}" alt="" />
        </div>
        <h4>Jhon Doe</h4>
        <p>
            +91 1245789630
            <a href="#"><i class="uil uil-edit"></i></a>
        </p>
        <div class="earn-points">
            <img src="{{ asset('assets/user/images/Dollar.svg') }}" alt="" />Ballance :
            <span>&#8377;20</span>
        </div>
    </div>
    <section class="myac-body">
        <div class="flex row">
            <div class="left">
                <div class="ul-wrapper">
                    <ul>
                        <li class="active">
                            <i class="uil uil-box"></i>
                            <a href="{{ url('user/profile') }}">My Orders</a>
                        </li>
                        <li>
                            <i class="uil uil-wallet"></i>
                            <a href="{{ url('user/wallet') }}">My Wallet</a>
                        </li>
                        <li>
                            <i class="uil uil-heart"></i>
                            <a href="{{ url('user/wishlist') }}">My Wishlist</a>
                        </li>
                        <li>
                            <i class="uil uil-location-point"></i>
                            <a href="{{ url('user/address') }}">My Address</a>
                        </li>
                        <li>
                            <i class="uil uil-sign-out-alt"></i>
                            <a href="">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            @yield('user-panel-right')
        </div>
    </section>
    </section>
@endsection
