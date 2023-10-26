<!DOCTYPE html>
<html>

<head>
    <title>Trang chủ - Mỹ Phẩm Goda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../images/logo.jpg" />
    <link rel="stylesheet" href="../vendor/fontawesome-free-5.11.2-web/css/all.min.css">
    <link rel="stylesheet" href="../vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../vendor/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="../vendor/star-rating/css/star-rating.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../vendor/jquery.min.js"></script>
    <script src="../vendor/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../vendor/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
    <script type="text/javascript" src="../vendor/star-rating/js/star-rating.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="../vendor/format/number_format.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
</head>

<body>
    <header>
        <!-- use for ajax -->
        <input type="hidden" id="reference" value="">
        <!-- Top Navbar -->
        <div class="top-navbar container-fluid">
            <div class="menu-mb">
                <a href="javascript:void(0)" class="btn-close" onclick="closeMenuMobile()">×</a>
                <a class="active" href="{{route('fe.home')}}">Trang chủ</a>
                <a href="san-pham.html">Sản phẩm</a>
                <a href="chinh-sach-doi-tra.html">Chính sách đổi trả</a>
                <a href="chinh-sach-thanh-toan.html">Chính sách thanh toán</a>
                <a href="chinh-sach-giao-hang.html">Chính sách giao hàng</a>
                <a href="lien-he.html">Liên hệ</a>
            </div>
            <div class="row">
                <div class="hidden-lg hidden-md col-sm-2 col-xs-1">
                    <span class="btn-menu-mb" onclick="openMenuMobile()"><i
                            class="glyphicon glyphicon-menu-hamburger"></i></span>
                </div>
                <div class="col-md-6 hidden-sm hidden-xs">
                    <ul class="list-inline">
                        <li><a href="https://www.facebook.com/HocLapTrinhWebTaiNha.ThayLoc"><i
                                    class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="https://www.pinterest.com/"><i class="fab fa-pinterest"></i></a></li>
                        <li><a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-10 col-xs-11">
                    <ul class="list-inline pull-right top-right">
                        <li class="account-login">
                            <a href="javascript:void(0)" class="btn-register">Đăng Ký</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="btn-login">Đăng Nhập </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End top navbar -->
        <!-- Header -->
        <div class="container">
            <div class="row">
                <!-- LOGO -->
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 logo">
                    <a href="{{route('fe.home')}}"><img src="../images/goda450x170_1.jpg" class="img-responsive"></a>
                </div>
                <div class="col-lg-4 col-md-4 hidden-sm hidden-xs call-action">
                    <a href="{{route('fe.home')}}"><img src="../images/godakeben450x170.jpg" class="img-responsive"></a>
                </div>
                <!-- HOTLINE AND SERCH -->
                <div class="col-lg-4 col-md-4 hotline-search">
                    <div>
                        <p class="hotline-phone"><span><strong>Hotline: </strong><a
                                    href="tel:0932.538.468">0932.538.468</a></span></p>
                        <p class="hotline-email"><span><strong>Email: </strong><a
                                    href="mailto:nguyenhuulocla2006@gmail.com">nguyenhuulocla2006@gmail.com</a></span>
                        </p>
                    </div>
                    <form class="header-form" action="">
                        <div class="input-group">
                            <input type="search" class="form-control search" placeholder="Nhập từ khóa tìm kiếm"
                                name="search" autocomplete="off" value="">
                            <div class="input-group-btn">
                                <button class="btn bt-search bg-color" type="submit"><i class="fa fa-search"
                                        style="color:#fff"></i>
                                </button>
                            </div>
                            <input type="hidden" name="c" value="product">
                            <input type="hidden" name="a" value="list">
                        </div>
                        <div class="search-result">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End header -->
    </header>
    <!-- NAVBAR DESKTOP-->
    <nav class="navbar navbar-default desktop-menu">
        <div class="container">
            <ul class="nav navbar-nav navbar-left hidden-sm hidden-xs">
                <li class="@if(request()->segment(1)=="") {{"active"}}  @endif">
                    <a href="{{route('fe.home')}}">Trang chủ</a>
                </li>
                <li class="@if(request()->segment(1)=="san-pham") {{"active"}}  @endif">
                    <a href="{{route('fe.product')}}">Sản phẩm</a>
                </li>
                <li><a href="chinh-sach-doi-tra.html">Chính sách đổi trả</a></li>
                <li><a href="chinh-sach-thanh-toan.html">Chính sách thanh toán</a></li>
                <li><a href="chinh-sach-giao-hang.html">Chính sách giao hàng</a></li>
                <li><a href="lien-he.html">Liên hệ</a></li>
            </ul>
            <span class="hidden-lg hidden-md experience">Trải nghiệm cùng sản phẩm của Goda</span>
            <ul class="nav navbar-nav navbar-right">
                <li class="cart"><a href="javascript:void(0)" class="btn-cart-detail" title="Giỏ Hàng"><i class="fa fa-shopping-cart"></i> <span class="number-total-product">6</span></a></li>
            </ul>
        </div>
    </nav>

    @yield('content')

    {{-- FOOTER --}}
    <footer class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-4 list">
                            <div class="footerLink">
                                <h4>Danh mục</h4>
                                <ul class="list-unstyled">
                                    <li><a href="#">Kem Chống Nắng </a></li>
                                    <li><a href="#">Kem Dưỡng Da </a></li>
                                    <li><a href="#">Kem Trị Mụn </a></li>
                                    <li><a href="#">Kem Trị Thâm Nám </a></li>
                                    <li><a href="#">Sữa Rửa Mặt </a></li>
                                    <li><a href="#">Sữa Tắm </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-4 list">
                            <div class="footerLink">
                                <h4>Liên kết </h4>
                                <ul class="list-unstyled">
                                    <li><a href="san-pham.html">Sản phẩm </a></li>
                                    <li><a href="chinh-sach-doi-tra.html">Chính sách đổi trả</a></li>
                                    <li><a href="chinh-sach-thanh-toan.html">Chính sách thanh toán</a></li>
                                    <li><a href="chinh-sach-giao-hang.html">Chính sách giao hàng </a></li>
                                    <li><a href="lien-he.html">Liên hệ </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-4 list">
                            <div class="footerLink">
                                <h4>Liên hệ với chúng tôi </h4>
                                <ul class="list-unstyled">
                                    <li>Phone: 0932.538.468</li>
                                    <li><a href="mailto:nguyenhuulocla2006@gmail.com">Mail:
                                            nguyenhuulocla2006@gmail.com</a></li>
                                </ul>
                                <ul class="list-inline">
                                    <li><a href="https://www.facebook.com/HocLapTrinhWebTaiNha.ThayLoc"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="https://www.pinterest.com/"><i class="fab fa-pinterest"></i></a></li>
                                    <li><a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12 list">
                            <div class="newsletter clearfix">
                                <h4>Bản tin</h4>
                                <p>Nhập Email của bạn để chúng tôi cung cấp thông tin nhanh nhất cho bạn về những sản
                                    phẩm mới!!</p>
                                <form action="" method="POST">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Nhập email của bạn.."
                                            name="email">
                                        <button type="submit" class="btn btn-primary send pull-right">Gửi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->
    <!-- BACK TO TOP -->
    <div class="back-to-top" class="bg-color">▲</div>
    <!-- END BACK TO TOP -->
    <!-- REGISTER DIALOG -->
    <div class="modal fade" id="modal-register" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-color">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title text-center">Đăng ký</h3>
                </div>
                <form action="#" method="POST" role="form">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="fullname" placeholder="Họ và tên"
                                required oninvalid="this.setCustomValidity('Vui lòng nhập tên của bạn')"
                                oninput="this.setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control" name="mobile" placeholder="Số điện thoại"
                                required pattern="[0][0-9]{9,}"
                                oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại bắt đầu bằng số 0 và ít nhất 9 con số theo sau')"
                                oninput="this.setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" required
                                oninvalid="this.setCustomValidity('Vui lòng nhập email')"
                                oninput="this.setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Mật khẩu"
                                required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$"
                                oninvalid="this.setCustomValidity('Vui lòng nhập ít nhất 8 ký tự: số, chữ hoa, chữ thường')"
                                oninput="this.setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="re-password"
                                placeholder="Nhập lại mật khẩu" required autocomplete="off" autosave="off"
                                pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$"
                                oninvalid="this.setCustomValidity('Vui lòng nhập ít nhất 8 ký tự: số, chữ hoa, chữ thường')"
                                oninput="this.setCustomValidity('')">
                        </div>
                        <div class="form-group g-recaptcha" data-sitekey="6Lcj07oUAAAAALAHcj_WdDa7Vykqzui3mSA5SIoe">
                        </div>
                        <input type="hidden" name="reference" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END REGISTER DIALOG -->
    <!-- LOGIN DIALOG -->
    <div class="modal fade" id="modal-login" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-color">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title text-center">Đăng nhập</h3>
                    <!-- Google login -->
                    <br>
                    <div class="text-center">
                        <a class="btn btn-primary google-login" href="#"><i class="fab fa-google"></i></i> Đăng
                            nhập bằng Google</a>
                        <!-- Facebook login -->
                        <a class="btn btn-primary facebook-login" href="#"><i class="fab fa-facebook-f"></i>
                            Đăng nhập bằng Facebook</a>
                    </div>
                </div>
                <form action="#" method="POST" role="form">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu"
                                required>
                        </div>
                        <input type="hidden" name="reference" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Đăng Nhập</button><br>
                        <div class="text-left">
                            <a href="javascript:void(0)" class="btn-register">Bạn chưa là thành viên? Đăng kí
                                ngay!</a>
                            <a href="javascript:void(0)" class="btn-forgot-password">Quên Mật Khẩu?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END LOGIN DIALOG -->
    <!-- FORTGOT PASSWORD DIALOG -->
    <div class="modal fade" id="modal-forgot-password" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-color">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title text-center">Quên mật khẩu</h3>
                </div>
                <form action="#" method="POST" role="form">
                    <div class="modal-body">
                        <div class="form-group">
                            <input name="email" type="email" class="form-control" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="reference" value="">
                        <button type="submit" class="btn btn-primary">GỬI</button><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END FORTGOT PASSWORD DIALOG -->
    <!-- CART DIALOG -->
    <div class="modal fade" id="modal-cart-detail" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-color">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 class="modal-title text-center">Giỏ hàng</h3>
                </div>
                <div class="modal-body">
                    <div class="page-content">
                        <div class="clearfix hidden-sm hidden-xs">
                            <div class="col-xs-1">
                            </div>
                            <div class="col-xs-3">
                                <div class="header">
                                    Sản phẩm
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div class="header">
                                    Đơn giá
                                </div>
                            </div>
                            <div class="label_item col-xs-3">
                                <div class="header">
                                    Số lượng
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div class="header">
                                    Thành tiền
                                </div>
                            </div>
                            <div class="lcol-xs-1">
                            </div>
                        </div>
                        <div class="cart-product">
                            <hr>
                            <div class="clearfix text-left">
                                <div class="row">
                                    <div class="col-sm-6 col-md-1">
                                        <div><img class="img-responsive"
                                                src="../images/beaumoreSecretWhiteningCream10g.jpg"
                                                alt="Kem làm trắng da 5 trong 1 Beaumore Secret Whitening Cream ">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3"><a class="product-name" href="#">Kem làm
                                            trắng da 5 trong 1 Beaumore Secret Whitening Cream</a></div>
                                    <div class="col-sm-6 col-md-2"><span class="product-item-discount">190,000₫</span>
                                    </div>
                                    <div class="col-sm-6 col-md-3"><input type="hidden" value="1"><input
                                            type="number" onchange="updateProductInCart(this,2)" min="1"
                                            value="1"></div>
                                    <div class="col-sm-6 col-md-2"><span>190,000₫</span></div>
                                    <div class="col-sm-6 col-md-1"><a class="remove-product"
                                            href="javascript:void(0)" onclick="deleteProductInCart(2)"><span
                                                class="glyphicon glyphicon-trash"></span></a></div>
                                </div>
                            </div>
                            <hr>
                            <div class="clearfix text-left">
                                <div class="row">
                                    <div class="col-sm-6 col-md-1">
                                        <div><img class="img-responsive" src="../images/suaRuaMatNgheBeaumore100g.jpg"
                                                alt="Sữa rửa mặt nghệ Beaumore Mới- 100g "></div>
                                    </div>
                                    <div class="col-sm-6 col-md-3"><a class="product-name" href="#">Sữa rửa
                                            mặt nghệ Beaumore Mới- 100g</a></div>
                                    <div class="col-sm-6 col-md-2"><span class="product-item-discount">250,000₫</span>
                                    </div>
                                    <div class="col-sm-6 col-md-3"><input type="hidden" value="1"><input
                                            type="number" onchange="updateProductInCart(this,4)" min="1"
                                            value="2"></div>
                                    <div class="col-sm-6 col-md-2"><span>500,000₫</span></div>
                                    <div class="col-sm-6 col-md-1"><a class="remove-product"
                                            href="javascript:void(0)" onclick="deleteProductInCart(4)"><span
                                                class="glyphicon glyphicon-trash"></span></a></div>
                                </div>
                            </div>
                            <hr>
                            <div class="clearfix text-left">
                                <div class="row">
                                    <div class="col-sm-6 col-md-1">
                                        <div><img class="img-responsive" src="../images/suaTamSandrasShowerGel.jpg"
                                                alt="Sữa tắm Sandras Shower Gel "></div>
                                    </div>
                                    <div class="col-sm-6 col-md-3"><a class="product-name" href="#">Sữa tắm
                                            Sandras Shower Gel</a></div>
                                    <div class="col-sm-6 col-md-2"><span class="product-item-discount">180,000₫</span>
                                    </div>
                                    <div class="col-sm-6 col-md-3"><input type="hidden" value="1"><input
                                            type="number" onchange="updateProductInCart(this,7)" min="1"
                                            value="3"></div>
                                    <div class="col-sm-6 col-md-2"><span>540,000₫</span></div>
                                    <div class="col-sm-6 col-md-1"><a class="remove-product"
                                            href="javascript:void(0)" onclick="deleteProductInCart(7)"><span
                                                class="glyphicon glyphicon-trash"></span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="clearfix">
                        <div class="col-xs-12 text-right">
                            <p>
                                <span>Tổng tiền</span>
                                <span class="price-total">1,230,000₫</span>
                            </p>
                            <input type="button" name="back-shopping" class="btn btn-default"
                                value="Tiếp tục mua sắm">
                            <input type="button" name="checkout" class="btn btn-primary" value="Đặt hàng">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CART DIALOG -->
    <!-- Facebook Messenger Chat -->
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v4.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- Your customer chat code -->
    <div class="fb-customerchat" attribution=setup_tool page_id="112296576811987"
        logged_in_greeting="Chào bạn, bạn muốn mua sản phẩm nào bên GodaShop.com"
        logged_out_greeting="Chào bạn, bạn muốn mua sản phẩm nào bên GodaShop.com">
    </div>
    <!-- End Facebook Messenger Chat -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</body>

</html>
