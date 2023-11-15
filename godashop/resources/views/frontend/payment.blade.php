@extends('layout_fronend')
@section('content')
    <main id="maincontent" class="page-main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="/" target="_self">Giỏ hàng</a></li>
                        <li><span>/</span></li>
                        <li class="active"><span>Thông tin giao hàng</span></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <aside class="col-md-6 cart-checkout">
                    @foreach(Cart::content() as $item)
                    <div class="row">
                        <div class="col-xs-2">
                            <img class="img-responsive" src="../images/{{$item->options->image}}"
                                alt="{{$item->name}}">
                        </div>
                        <div class="col-xs-7">
                            @php
                            $slugName=\Str::slug($item->name);
                            $slug="{$slugName}-{$item->id}";
                            @endphp
                            <a class="product-name" href="{{route('fe.detail',['slug'=>$slug])}}">{{$item->name}}</a>
                            <br>
                            <span>{{$item->qty}}</span> x <span>{{number_format($item->price)}}₫</span>
                        </div>
                        <div class="col-xs-3 text-right">
                            <span>{{number_format($item->price * $item->qty)}}₫</span>
                        </div>
                    </div>
                    <hr>
                   @endforeach
                    <div class="row">
                        <div class="col-xs-6">
                            Tạm tính
                        </div>
                        <div class="col-xs-6 text-right">
                            {{Cart::subtotal()}}₫
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            Phí vận chuyển
                        </div>
                        <div class="col-xs-6 text-right">
                            @php
                                $shipping = 0;
                            @endphp
                            <span class="shipping-fee" data="">{{number_format($shipping)}}₫</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-6">
                            Tổng cộng
                        </div>
                        <div class="col-xs-6 text-right">
                            @php
                                $total = $shipping + Cart::subtotal(0,"","");
                            @endphp
                            <span class="payment-total" data="1230000">{{number_format($total)}}₫</span>
                        </div>
                    </div>
                </aside>
                <div class="ship-checkout col-md-6">
                    <h4>Thông tin giao hàng</h4>
                    @guest
                        <div>Bạn đã có tài khoản? <a href="javascript:void(0)" class="btn-login">Đăng Nhập </a></div>
                    @endguest
                    @php
                        $userLogin = Auth::user();
                    @endphp
                    <br>
                    <form action="thanh-toan.html" method="POST">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input type="text" value="{{$userLogin->shipping_name}}" class="form-control" name="fullname"
                                    placeholder="Họ và tên" required=""
                                    oninvalid="this.setCustomValidity('Vui lòng nhập tên của bạn')"
                                    oninput="this.setCustomValidity('')">
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="tel" value="{{$userLogin->shipping_mobile}}" class="form-control" name="mobile"
                                    placeholder="Số điện thoại" required="" pattern="[0][0-9]{9,}"
                                    oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại bắt đầu bằng số 0 và ít nhất 9 con số theo sau')"
                                    oninput="this.setCustomValidity('')">
                            </div>
                            <div class="form-group col-sm-4">
                                <select name="province" class="form-control province" required=""
                                    oninvalid="this.setCustomValidity('Vui lòng chọn Tỉnh / thành phố')"
                                    oninput="this.setCustomValidity('')">
                                    <option value="">Tỉnh / thành phố</option>
                                    <option value="01">Thành phố Hà Nội</option>
                                    <option value="02">Tỉnh Hà Giang</option>
                                    <option value="04">Tỉnh Cao Bằng</option>
                                    <option value="06">Tỉnh Bắc Kạn</option>
                                    <option value="08">Tỉnh Tuyên Quang</option>
                                    <option value="10">Tỉnh Lào Cai</option>
                                    <option value="11">Tỉnh Điện Biên</option>
                                    <option value="12">Tỉnh Lai Châu</option>
                                    <option value="14">Tỉnh Sơn La</option>
                                    <option value="15">Tỉnh Yên Bái</option>
                                    <option value="17">Tỉnh Hoà Bình</option>
                                    <option value="19">Tỉnh Thái Nguyên</option>
                                    <option value="20">Tỉnh Lạng Sơn</option>
                                    <option value="22">Tỉnh Quảng Ninh</option>
                                    <option value="24">Tỉnh Bắc Giang</option>
                                    <option value="25">Tỉnh Phú Thọ</option>
                                    <option value="26">Tỉnh Vĩnh Phúc</option>
                                    <option value="27">Tỉnh Bắc Ninh</option>
                                    <option value="30">Tỉnh Hải Dương</option>
                                    <option value="31">Thành phố Hải Phòng</option>
                                    <option value="33">Tỉnh Hưng Yên</option>
                                    <option value="34">Tỉnh Thái Bình</option>
                                    <option value="35">Tỉnh Hà Nam</option>
                                    <option value="36">Tỉnh Nam Định</option>
                                    <option value="37">Tỉnh Ninh Bình</option>
                                    <option value="38">Tỉnh Thanh Hóa</option>
                                    <option value="40">Tỉnh Nghệ An</option>
                                    <option value="42">Tỉnh Hà Tĩnh</option>
                                    <option value="44">Tỉnh Quảng Bình</option>
                                    <option value="45">Tỉnh Quảng Trị</option>
                                    <option value="46">Tỉnh Thừa Thiên Huế</option>
                                    <option value="48">Thành phố Đà Nẵng</option>
                                    <option value="49">Tỉnh Quảng Nam</option>
                                    <option value="51">Tỉnh Quảng Ngãi</option>
                                    <option value="52">Tỉnh Bình Định</option>
                                    <option value="54">Tỉnh Phú Yên</option>
                                    <option value="56">Tỉnh Khánh Hòa</option>
                                    <option value="58">Tỉnh Ninh Thuận</option>
                                    <option value="60">Tỉnh Bình Thuận</option>
                                    <option value="62">Tỉnh Kon Tum</option>
                                    <option value="64">Tỉnh Gia Lai</option>
                                    <option value="66">Tỉnh Đắk Lắk</option>
                                    <option value="67">Tỉnh Đắk Nông</option>
                                    <option value="68">Tỉnh Lâm Đồng</option>
                                    <option value="70">Tỉnh Bình Phước</option>
                                    <option value="72">Tỉnh Tây Ninh</option>
                                    <option value="74">Tỉnh Bình Dương</option>
                                    <option value="75">Tỉnh Đồng Nai</option>
                                    <option value="77">Tỉnh Bà Rịa - Vũng Tàu</option>
                                    <option value="79">Thành phố Hồ Chí Minh</option>
                                    <option value="80">Tỉnh Long An</option>
                                    <option value="82">Tỉnh Tiền Giang</option>
                                    <option value="83">Tỉnh Bến Tre</option>
                                    <option value="84">Tỉnh Trà Vinh</option>
                                    <option value="86">Tỉnh Vĩnh Long</option>
                                    <option value="87">Tỉnh Đồng Tháp</option>
                                    <option value="89">Tỉnh An Giang</option>
                                    <option value="91">Tỉnh Kiên Giang</option>
                                    <option value="92">Thành phố Cần Thơ</option>
                                    <option value="93">Tỉnh Hậu Giang</option>
                                    <option value="94">Tỉnh Sóc Trăng</option>
                                    <option value="95">Tỉnh Bạc Liêu</option>
                                    <option value="96">Tỉnh Cà Mau</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <select name="district" class="form-control district" required=""
                                    oninvalid="this.setCustomValidity('Vui lòng chọn Quận / huyện')"
                                    oninput="this.setCustomValidity('')">
                                    <option value="">Quận / huyện</option>
                                    <option value="785"> Huyện Bình Chánh</option>
                                    <option value="787"> Huyện Cần Giờ</option>
                                    <option value="783"> Huyện Củ Chi</option>
                                    <option value="784"> Huyện Hóc Môn</option>
                                    <option value="786"> Huyện Nhà Bè</option>
                                    <option value="760"> Quận 1</option>
                                    <option value="771"> Quận 10</option>
                                    <option value="772"> Quận 11</option>
                                    <option value="761"> Quận 12</option>
                                    <option value="769"> Quận 2</option>
                                    <option value="770"> Quận 3</option>
                                    <option value="773"> Quận 4</option>
                                    <option value="774"> Quận 5</option>
                                    <option value="775"> Quận 6</option>
                                    <option value="778"> Quận 7</option>
                                    <option value="776"> Quận 8</option>
                                    <option value="763"> Quận 9</option>
                                    <option value="777"> Quận Bình Tân</option>
                                    <option value="765"> Quận Bình Thạnh</option>
                                    <option value="764"> Quận Gò Vấp</option>
                                    <option value="768"> Quận Phú Nhuận</option>
                                    <option value="766"> Quận Tân Bình</option>
                                    <option value="767"> Quận Tân Phú</option>
                                    <option value="762"> Quận Thủ Đức</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <select name="ward" class="form-control ward" required=""
                                    oninvalid="this.setCustomValidity('Vui lòng chọn Phường / xã')"
                                    oninput="this.setCustomValidity('')">
                                    <option value="">Phường / xã</option>
                                    <option value="27037"> Phường Hiệp Tân</option>
                                    <option value="27034"> Phường Hòa Thạnh</option>
                                    <option value="27028"> Phường Phú Thạnh</option>
                                    <option value="27025"> Phường Phú Thọ Hòa</option>
                                    <option value="27031"> Phường Phú Trung</option>
                                    <option value="27016"> Phường Sơn Kỳ</option>
                                    <option value="27019"> Phường Tân Quý</option>
                                    <option value="27010"> Phường Tân Sơn Nhì</option>
                                    <option value="27022"> Phường Tân Thành</option>
                                    <option value="27040"> Phường Tân Thới Hòa</option>
                                    <option value="27013"> Phường Tây Thạnh</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12">
                                <input type="text" value="{{$userLogin->housenumber_street}}" class="form-control" placeholder="Địa chỉ"
                                    name="address" required=""
                                    oninvalid="this.setCustomValidity('Vui lòng nhập địa chỉ bao gồm số nhà, tên đường')"
                                    oninput="this.setCustomValidity('')">
                            </div>
                        </div>
                        <h4>Phương thức thanh toán</h4>
                        <div class="form-group">
                            <label> <input type="radio" name="payment_method" checked="" value="0"> Thanh
                                toán khi giao hàng (COD) </label>
                            <div></div>
                        </div>
                        <div class="form-group">
                            <label> <input type="radio" name="payment_method" value="1"> Chuyển khoản qua ngân
                                hàng </label>
                            <div class="bank-info">STK: 0421003707901<br>Chủ TK: Nguyễn Hữu Lộc. Ngân hàng: Vietcombank
                                TP.HCM <br>
                                Ghi chú chuyển khoản là tên và chụp hình gửi lại cho shop dễ kiểm tra ạ
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-sm btn-primary pull-right">Hoàn tất đơn hàng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
