@extends('layout_fronend')
@section('content')
    <main id="maincontent" class="page-main">
        <div class="container">
            <div class="row">
                <div class="col-xs-9">
                    <ol class="breadcrumb">
                        <li><a href="/" target="_self">Trang chủ</a></li>
                        <li><span>/</span></li>
                        <li class="active"><span>{{$product->category->name}}</span></li>
                    </ol>
                </div>
                <div class="col-xs-3 hidden-lg hidden-md">
                    <a class="hidden-lg pull-right btn-aside-mobile" href="javascript:void(0)">Bộ lọc <i
                            class="fa fa-angle-double-right"></i></a>
                </div>
                <div class="clearfix"></div>
                @include('sidebar')
                <div class="col-md-9 product-detail">
                    <div class="row product-info">
                        <div class="col-md-6">
                            <img data-zoom-image="{{asset('')}}/images/{{$product->featured_image}}"
                                class="img-responsive thumbnail main-image-thumbnail"
                                src="{{asset('')}}/images/{{$product->featured_image}}" alt="">
                            <div class="product-detail-carousel-slider">
                                <div class="owl-carousel owl-theme">
                                    @foreach ($product->image_items as $image)
                                        <div class="item thumbnail"><img src="{{asset('')}}/images/{{$image->name}}" alt=""></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="product-name">{{$product->name}}</h5>
                            <div class="brand">
                                <span>Nhãn hàng: </span> <span>REDWIN</span>
                            </div>
                            <div class="product-status">
                                <span>Trạng thái: </span>
                                <span class="label-warning">Hết hàng</span>
                            </div>
                            <div class="product-item-price">
                                <span>Giá: </span>
                                <span class="product-item-discount">849,000₫</span>
                            </div>
                        </div>
                    </div>
                    <div class="row product-description">
                        <div class="col-xs-12">
                            <div role="tabpanel">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#product-description" aria-controls="home" role="tab"
                                            data-toggle="tab">Mô tả</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#product-comment" aria-controls="tab" role="tab"
                                            data-toggle="tab">Đánh giá</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="product-description">
                                        <p>Mô tả chi tiết</p>
                                        <p>– Với chiết từ lá dâu tằm, chất Arbutin trong quả dâu gấu cùng các thành phần
                                            thảo dược thiên nhiên giúp tăng cường hàng rào biểu bì, ngăn ngừa lão hóa da</p>

                                        <p>– Làm da trắng sáng, giữ ẩm và tăng độ đàn hồi cho da</p>

                                        <p>– Diệt khuẩn, kháng viêm, làm mịn và sáng vùng bikini</p>

                                        <p>– Tăng cường hàng rào biểu bì, giữ ẩm, ngăn ngừa lão hóa da</p>

                                        <p>– Tăng dộ đàn hồi cho da, mang lại vẻ sáng và mềm mại cho da</p>

                                        <p>– Làm sáng da bằng cách ức chế sự hình thành của Melanin</p>

                                        <p>– Chăm sóc da bị kích ứng và tấy đỏ, chống bong tróc. Giúp làm giảm các ban đỏ
                                            gây ra bởi tia UV cháy nắng.</p>

                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="product-comment">
                                        <form class="form-comment" action="" method="POST" role="form">
                                            <label>Đánh giá của bạn</label>
                                            <div class="form-group">
                                                <input type="hidden" name="product_id" value="3">
                                                <input class="rating-input" name="rating" type="text" title=""
                                                    value="4" />
                                                <input type="text" class="form-control" id=""
                                                    name="fullname" placeholder="Tên *" required>
                                                <input type="email" name="email" class="form-control" id=""
                                                    placeholder="Email *" required>
                                                <textarea name="description" id="input" class="form-control" rows="3" required placeholder="Nội dung *"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Gửi</button>
                                        </form>
                                        <div class="comment-list">
                                            <hr>
                                            <span class="date pull-right">2019-11-29 16:11:07</span>
                                            <input class="answered-rating-input" name="rating" type="text"
                                                title="" value="4" readonly />
                                            <span class="by">abc</span>
                                            <p>test</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row product-related equal">
                        <div class="col-md-12">
                            <h4 class="text-center">Sản phẩm liên quan</h4>
                            <div class="owl-carousel owl-theme">
                                <div class="item thumbnail">
                                    <div class="product-container">
                                        <div class="image">
                                            <img class="img-responsive" src="../images/kemLuaLamDepDaBeaumore.jpg"
                                                alt="">
                                        </div>
                                        <div class="product-meta">
                                            <h5 class="name">
                                                <a class="product-name" href="chi-tiet-san-pham.html"
                                                    title="Kem lụa làm đẹp da Beaumore- 30ml">Kem lụa làm đẹp da Beaumore-
                                                    30ml</a>
                                            </h5>
                                            <div class="product-item-price">
                                                <span class="product-item-discount">1,500,000₫</span>
                                            </div>
                                        </div>
                                        <div class="button-product-action clearfix">
                                            <div class="cart icon">
                                                <a class="btn btn-outline-inverse buy" product-id="5"
                                                    href="javascript:void(0)" title="Thêm vào giỏ">
                                                    Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="quickview icon">
                                                <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html"
                                                    title="Xem nhanh">
                                                    Xem chi tiết <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item thumbnail">
                                    <div class="product-container">
                                        <div class="image">
                                            <img class="img-responsive" src="../images/kemLamDepTucThiInstantBeauMore.jpg"
                                                alt="">
                                        </div>
                                        <div class="product-meta">
                                            <h5 class="name">
                                                <a class="product-name" href="chi-tiet-san-pham.html"
                                                    title="Kem làm đẹp tức thì  Instant Beaumore">Kem làm đẹp tức thì
                                                    Instant Beaumore</a>
                                            </h5>
                                            <div class="product-item-price">
                                                <span class="product-item-discount">762,000₫</span>
                                            </div>
                                        </div>
                                        <div class="button-product-action clearfix">
                                            <div class="cart icon">
                                                <a class="btn btn-outline-inverse buy" product-id="6"
                                                    href="javascript:void(0)" title="Thêm vào giỏ">
                                                    Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="quickview icon">
                                                <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html"
                                                    title="Xem nhanh">
                                                    Xem chi tiết <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item thumbnail">
                                    <div class="product-container">
                                        <div class="image">
                                            <img class="img-responsive" src="../images/suaTamSandrasShowerGel.jpg"
                                                alt="">
                                        </div>
                                        <div class="product-meta">
                                            <h5 class="name">
                                                <a class="product-name" href="chi-tiet-san-pham.html"
                                                    title="Sữa tắm Sandras Shower Gel">Sữa tắm Sandras Shower Gel</a>
                                            </h5>
                                            <div class="product-item-price">
                                                <span class="product-item-discount">180,000₫</span>
                                            </div>
                                        </div>
                                        <div class="button-product-action clearfix">
                                            <div class="cart icon">
                                                <a class="btn btn-outline-inverse buy" product-id="7"
                                                    href="javascript:void(0)" title="Thêm vào giỏ">
                                                    Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="quickview icon">
                                                <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html"
                                                    title="Xem nhanh">
                                                    Xem chi tiết <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item thumbnail">
                                    <div class="product-container">
                                        <div class="image">
                                            <img class="img-responsive" src="../images/suaDuongTheSandraschai88ml.jpg"
                                                alt="">
                                        </div>
                                        <div class="product-meta">
                                            <h5 class="name">
                                                <a class="product-name" href="chi-tiet-san-pham.html"
                                                    title="Sữa dưỡng thể Sandras chai 88ml">Sữa dưỡng thể Sandras chai
                                                    88ml</a>
                                            </h5>
                                            <div class="product-item-price">
                                                <span class="product-item-discount">180,000₫</span>
                                            </div>
                                        </div>
                                        <div class="button-product-action clearfix">
                                            <div class="cart icon">
                                                <a class="btn btn-outline-inverse buy" product-id="8"
                                                    href="javascript:void(0)" title="Thêm vào giỏ">
                                                    Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="quickview icon">
                                                <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html"
                                                    title="Xem nhanh">
                                                    Xem chi tiết <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item thumbnail">
                                    <div class="product-container">
                                        <div class="image">
                                            <img class="img-responsive" src="../images/kemDuongTrangDaNgayVaDem.jpg"
                                                alt="">
                                        </div>
                                        <div class="product-meta">
                                            <h5 class="name">
                                                <a class="product-name" href="chi-tiet-san-pham.html"
                                                    title="Kem Dưỡng Trắng Da Ngày vs Đêm">Kem Dưỡng Trắng Da Ngày vs
                                                    Đêm</a>
                                            </h5>
                                            <div class="product-item-price">
                                                <span class="product-item-discount">265,000₫</span>
                                            </div>
                                        </div>
                                        <div class="button-product-action clearfix">
                                            <div class="cart icon">
                                                <a class="btn btn-outline-inverse buy" product-id="10"
                                                    href="javascript:void(0)" title="Thêm vào giỏ">
                                                    Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="quickview icon">
                                                <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html"
                                                    title="Xem nhanh">
                                                    Xem chi tiết <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item thumbnail">
                                    <div class="product-container">
                                        <div class="image">
                                            <img class="img-responsive"
                                                src="../images/kemNenTrangDiemDuongDaSandrasBB.jpg" alt="">
                                        </div>
                                        <div class="product-meta">
                                            <h5 class="name">
                                                <a class="product-name" href="chi-tiet-san-pham.html"
                                                    title="Kem nền trang điểm dưỡng da Sandras BB 24h- 15ml">Kem nền trang
                                                    điểm dưỡng da Sandras BB 24h- 15ml</a>
                                            </h5>
                                            <div class="product-item-price">
                                                <span class="product-item-discount">321,000₫</span>
                                            </div>
                                        </div>
                                        <div class="button-product-action clearfix">
                                            <div class="cart icon">
                                                <a class="btn btn-outline-inverse buy" product-id="11"
                                                    href="javascript:void(0)" title="Thêm vào giỏ">
                                                    Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="quickview icon">
                                                <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html"
                                                    title="Xem nhanh">
                                                    Xem chi tiết <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item thumbnail">
                                    <div class="product-container">
                                        <div class="image">
                                            <img class="img-responsive" src="../images/nhamSamSandrasBeauty20g.jpg"
                                                alt="">
                                        </div>
                                        <div class="product-meta">
                                            <h5 class="name">
                                                <a class="product-name" href="chi-tiet-san-pham.html"
                                                    title="Kem làm trắng da và mờ nếp nhăn từ Nhân sâm Sandras Beauty- 20g ">Kem
                                                    làm trắng da và mờ nếp nhăn từ Nhân sâm Sandras Beauty- 20g </a>
                                            </h5>
                                            <div class="product-item-price">
                                                <span class="product-item-discount">380,000₫</span>
                                            </div>
                                        </div>
                                        <div class="button-product-action clearfix">
                                            <div class="cart icon">
                                                <a class="btn btn-outline-inverse buy" product-id="13"
                                                    href="javascript:void(0)" title="Thêm vào giỏ">
                                                    Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="quickview icon">
                                                <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html"
                                                    title="Xem nhanh">
                                                    Xem chi tiết <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item thumbnail">
                                    <div class="product-container">
                                        <div class="image">
                                            <img class="img-responsive" src="../images/beaumoreContourEyeCream.jpg"
                                                alt="">
                                        </div>
                                        <div class="product-meta">
                                            <h5 class="name">
                                                <a class="product-name" href="chi-tiet-san-pham.html"
                                                    title="Kem dưỡng da vùng mắt Beaumore Contour Eye Cream- 10g">Kem dưỡng
                                                    da vùng mắt Beaumore Contour Eye Cream- 10g</a>
                                            </h5>
                                            <div class="product-item-price">
                                                <span class="product-item-discount">300,000₫</span>
                                            </div>
                                        </div>
                                        <div class="button-product-action clearfix">
                                            <div class="cart icon">
                                                <a class="btn btn-outline-inverse buy" product-id="14"
                                                    href="javascript:void(0)" title="Thêm vào giỏ">
                                                    Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="quickview icon">
                                                <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html"
                                                    title="Xem nhanh">
                                                    Xem chi tiết <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item thumbnail">
                                    <div class="product-container">
                                        <div class="image">
                                            <img class="img-responsive" src="../images/kemGiaiDocToPh20ml.jpg"
                                                alt="">
                                        </div>
                                        <div class="product-meta">
                                            <h5 class="name">
                                                <a class="product-name" href="chi-tiet-san-pham.html"
                                                    title="Kem giải độc tố pH Beaumore- 20ml">Kem giải độc tố pH Beaumore-
                                                    20ml</a>
                                            </h5>
                                            <div class="product-item-price">
                                                <span class="product-item-discount">239,000₫</span>
                                            </div>
                                        </div>
                                        <div class="button-product-action clearfix">
                                            <div class="cart icon">
                                                <a class="btn btn-outline-inverse buy" product-id="18"
                                                    href="javascript:void(0)" title="Thêm vào giỏ">
                                                    Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="quickview icon">
                                                <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html"
                                                    title="Xem nhanh">
                                                    Xem chi tiết <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item thumbnail">
                                    <div class="product-container">
                                        <div class="image">
                                            <img class="img-responsive"
                                                src="../images/kemTrangDaLinhChiDongTrungHaThao.jpg" alt="">
                                        </div>
                                        <div class="product-meta">
                                            <h5 class="name">
                                                <a class="product-name" href="chi-tiet-san-pham.html"
                                                    title="Kem làm trắng da từ Linh Chi và Đông Trùng Hạ Thảo Sandras Beauty-15g">Kem
                                                    làm trắng da từ Linh Chi và Đông Trùng Hạ Thảo Sandras Beauty-15g</a>
                                            </h5>
                                            <div class="product-item-price">
                                                <span class="product-item-discount">905,000₫</span>
                                            </div>
                                        </div>
                                        <div class="button-product-action clearfix">
                                            <div class="cart icon">
                                                <a class="btn btn-outline-inverse buy" product-id="20"
                                                    href="javascript:void(0)" title="Thêm vào giỏ">
                                                    Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="quickview icon">
                                                <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html"
                                                    title="Xem nhanh">
                                                    Xem chi tiết <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
