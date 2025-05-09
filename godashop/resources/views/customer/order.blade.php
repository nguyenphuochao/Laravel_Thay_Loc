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

                @include('customer.sidebar')

                <div class="col-md-9 order">
                    <div class="row">
                        <div class="col-xs-6">
                            <h4 class="home-title">Đơn hàng của tôi</h4>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12">
                            <!-- Mỗi đơn hàng -->
                            @foreach ($orders as $order)
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Đơn hàng <a href="{{ route('customer.orderDetail', ['orderId' => $order->id]) }}">#{{ $order->id }}</a></h5>
                                        <span class="date">
                                            Đặt hàng {{ $order->created_date }} </span>
                                        <hr>

                                        @foreach ($order->orderItems as $orderItem)
                                            @php
                                                $product = $orderItem->product;
                                            @endphp
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img src="../images/{{ $product->featured_image }}" alt="{{ $product->name }}" class="img-responsive">
                                                </div>
                                                <div class="col-md-3">
                                                    @php
                                                        $prefixSlug = \Str::slug($product->name);
                                                        $slug = "{$prefixSlug}-{$product->id}";
                                                    @endphp
                                                    <a class="product-name" href="{{ route('product.show', ['slug' => $slug]) }}">{{ $product->name }}</a>
                                                </div>
                                                <div class="col-md-2">
                                                    Số lượng: {{ $orderItem->qty }}
                                                </div>
                                                <div class="col-md-2">
                                                   {{$order->status->description}}
                                                </div>
                                                <div class="col-md-3">
                                                    Giao hàng {{ $order->delivered_date }}
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
