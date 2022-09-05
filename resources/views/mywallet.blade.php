@extends('layouts.userProfilePanel')

@section('section-name')
    <section class="mywallet">
    @endsection
    @section('user-panel-right')
        <div class="right">
            <h4><i class="uil uil-wallet"></i>My Wallet</h4>
            <div class="col-lg-12 col-md-12">
                <div class="pdpt-bg2">
                    <div class="imgbox">
                        <img src="{{asset('assets/user/images/money.svg')}}" alt="">
                    </div>
                    <span class="rewrd-title">My Balance</span>
                    <h4 class="cashbk-price">$120</h4>
                </div>
                <div class="pdpt-bg">
                    <div class="pdpt-title">
                        <h4>History</h4>
                    </div>
                    <div class="order-body10">
                        <ul class="history-list">
                            <li>
                                <div class="purchase-history">
                                    <div class="purchase-history-left">
                                        <h4>Purchase</h4>
                                        <p>Transaction ID <ins>gambo14255896</ins></p>
                                        <span>6 May 2018, 12.56PM</span>
                                    </div>
                                    <div class="purchase-history-right">
                                        <span>-$25</span>

                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="purchase-history">
                                    <div class="purchase-history-left">
                                        <h4>Purchase</h4>
                                        <p>Transaction ID <ins>gambo14255895</ins></p>
                                        <span>5 May 2018, 11.16AM</span>
                                    </div>
                                    <div class="purchase-history-right">
                                        <span>-$21</span>

                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="purchase-history">
                                    <div class="purchase-history-left">
                                        <h4>Purchase</h4>
                                        <p>Transaction ID <ins>gambo14255894</ins></p>
                                        <span>4 May 2018, 02.56PM</span>
                                    </div>
                                    <div class="purchase-history-right">
                                        <span>-$30</span>

                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="purchase-history">
                                    <div class="purchase-history-left">
                                        <h4>Purchase</h4>
                                        <p>Transaction ID <ins>gambo14255893</ins></p>
                                        <span>3 May 2018, 5.56PM</span>
                                    </div>
                                    <div class="purchase-history-right">
                                        <span>-$15</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endsection
