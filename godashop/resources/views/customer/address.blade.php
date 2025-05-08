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
            <aside class="col-md-3">
                <div class="inner-aside">
                    <div class="category">
                        <ul>
                            <li >
                                <a href="thong-tin-tai-khoan.html" title="Thông tin tài khoản" target="_self">Thông tin tài khoản
                                </a>
                            </li>
                            <li class="active">
                                <a href="dia-chi-giao-hang-mac-dinh.html" title="Địa chỉ giao hàng mặc định" target="_self">Địa chỉ giao hàng mặc định
                                </a>
                            </li>
                            <li class="">
                                <a href="don-hang-cua-toi.html" target="_self">Đơn hàng của tôi
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
            <div class="col-md-9 account">
                <div class="row">
                    <div class="col-xs-6">
                        <h4 class="home-title">Địa chỉ giao hàng mặc định</h4>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <form action="{{ route('customer.address.update') }}" method="POST" role="form">
                            @csrf
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <input type="text" value="{{ Auth()->user()->shipping_name }}" class="form-control" name="shipping_name" placeholder="Họ và tên" required="" oninvalid="this.setCustomValidity('Vui lòng nhập tên của bạn')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="tel" value="{{ Auth()->user()->shipping_mobile }}" class="form-control" name="shipping_mobile" placeholder="Số điện thoại" required="" pattern="[0][0-9]{9,}" oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại bắt đầu bằng số 0 và ít nhất 9 con số theo sau')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="form-group col-sm-4">
                                    <select name="province" class="form-control province" required="" oninvalid="this.setCustomValidity('Vui lòng chọn Tỉnh / thành phố')" oninput="this.setCustomValidity('')">
                                        <option value="">Tỉnh / thành phố</option>
                                        @foreach ($provinces as $province)
                                            <option {{ $province->id == $selected_province_id ? 'selected' : '' }} value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <select name="district" class="form-control district" required="" oninvalid="this.setCustomValidity('Vui lòng chọn Quận / huyện')" oninput="this.setCustomValidity('')">
                                        <option value="">Quận / huyện</option>
                                        @foreach ($districts as $district)
                                            <option {{ $district->id == $selected_district_id ? 'selected' : '' }} value="{{ $district->id }}">{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <select name="ward" class="form-control ward" required="" oninvalid="this.setCustomValidity('Vui lòng chọn Phường / xã')" oninput="this.setCustomValidity('')">
                                        <option value="">Phường / xã</option>
                                        @foreach ($wards as $ward)
                                            <option {{ $ward->id == $selected_ward_id ? 'selected' : '' }} value="{{ $ward->id }}">{{ $ward->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-12">
                                    <input type="text" value="{{ Auth()->user()->housenumber_street }}" class="form-control" placeholder="Địa chỉ" name="housenumber_street" required="" oninvalid="this.setCustomValidity('Vui lòng nhập địa chỉ bao gồm số nhà, tên đường')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="form-group col-sm-12">
                                    <button type="submit" class="btn btn-primary pull-right">Cập nhật</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
