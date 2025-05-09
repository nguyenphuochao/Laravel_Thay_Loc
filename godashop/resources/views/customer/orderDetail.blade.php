@extends('layout.app')
@section('content')
<main id="maincontent" class="page-main">
    <div class="container">
        <div class="row">
            <div class="col-xs-9">
                <ol class="breadcrumb">
                    <li><a href="/" target="_self">Trang chủ</a></li>
                    <li><span>/</span></li>
                    <li class="active"><span>Tài khoản</span></li>
                </ol>
            </div>
            <div class="clearfix"></div>

            {{-- sidebar customer --}}
            @include('customer.sidebar')

            <div class="col-md-9 order-info">
                <div class="row">
                    <div class="col-xs-6">
                        <h4 class="home-title">Đơn hàng #{{ $order->id }}</h4>
                    </div>
                    <div class="clearfix"></div>
                    <aside class="col-md-7 cart-checkout">
                        <div class="row">
                            <div class="col-xs-2">
                                <img class="img-responsive" src="../images/suaTamSandrasMychai250ml.jpg" alt="Sữa tắm Sandras Mỹ chai 250ml">
                            </div>
                            <div class="col-xs-7">
                                <a class="product-name" href="chi-tiet-san-pham.html">Sữa tắm Sandras Mỹ chai 250ml</a>
                                <br>
                                <span>2</span> x <span>210,000₫</span>
                            </div>
                            <div class="col-xs-3 text-right">
                                <span>420,000₫</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-2">
                                <img class="img-responsive" src="../images/kemDuongTrangDaNgayVaDem.jpg" alt="Kem Dưỡng Trắng Da Ngày vs Đêm">
                            </div>
                            <div class="col-xs-7">
                                <a class="product-name" href="chi-tiet-san-pham.html">Kem Dưỡng Trắng Da Ngày vs Đêm</a>
                                <br>
                                <span>1</span> x <span>265,000₫</span>
                            </div>
                            <div class="col-xs-3 text-right">
                                <span>265,000₫</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-2">
                                <img class="img-responsive" src="../images/kemNenTrangDiemDuongDaSandrasBB.jpg" alt="Kem nền trang điểm dưỡng da Sandras BB 24h- 15ml">
                            </div>
                            <div class="col-xs-7">
                                <a class="product-name" href="chi-tiet-san-pham.html">Kem nền trang điểm dưỡng da Sandras BB 24h- 15ml</a>
                                <br>
                                <span>2</span> x <span>321,000₫</span>
                            </div>
                            <div class="col-xs-3 text-right">
                                <span>642,000₫</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-6">
                                Tạm tính
                            </div>
                            <div class="col-xs-6 text-right">
                                1,327,000₫
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                Phí vận chuyển
                            </div>
                            <div class="col-xs-6 text-right">
                                50,000₫
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-6">
                                Tổng cộng
                            </div>
                            <div class="col-xs-6 text-right">
                                1,377,000₫
                            </div>
                        </div>
                    </aside>
                    <div class="ship-checkout col-md-5">
                        <h4>Thông tin giao hàng</h4>
                        <div>
                            Họ và tên: {{ $order->customer->shipping_name }}
                        </div>
                        <div>
                            Số điện thoại: 0942514622
                        </div>
                        <div>
                            Thành phố Hồ Chí Minh
                        </div>
                        <div>
                            Quận Tân Phú
                        </div>
                        <div>
                            Phường Hiệp Tân
                        </div>
                        <div>
                            278 Hòa Bình
                        </div>
                        <div>
                            Phương thức thanh toán: COD
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
