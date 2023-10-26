@extends('layout_fronend')
@section('content')
    <main id="maincontent" class="page-main">
        <div class="container">
            <div class="row">
                <div class="col-xs-9">
                    <ol class="breadcrumb">
                        <li><a href="/" target="_self">Trang chủ</a></li>
                        <li><span>/</span></li>
                        <li class="active"><span>Tất cả sản phẩm</span></li>
                    </ol>
                </div>
                <div class="col-xs-3 hidden-lg hidden-md">
                    <a class="hidden-lg pull-right btn-aside-mobile" href="javascript:void(0)">Bộ lọc <i
                            class="fa fa-angle-double-right"></i></a>
                </div>
                <div class="clearfix"></div>
                {{-- Sidebar --}}
                @include('sidebar')
                {{-- Danh sách sản phẩm --}}
                <div class="col-md-9 products">
                    <div class="row equal">
                        <div class="col-xs-6">
                            <h4 class="home-title">Tất cả sản phẩm</h4>
                        </div>
                        <div class="col-xs-6 sort-by">
                            <div class="pull-right">
                                <label class="left hidden-xs" for="sort-select">Sắp xếp: </label>
                                <select id="sort-select">
                                    <option value="" selected>Mặc định</option>
                                    <option value="price-asc">Giá tăng dần</option>
                                    <option value="price-desc">Giá giảm dần</option>
                                    <option value="alpha-asc">Từ A-Z</option>
                                    <option value="alpha-desc">Từ Z-A</option>
                                    <option value="created-asc">Cũ đến mới</option>
                                    <option value="created-desc">Mới đến cũ</option>
                                </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        @foreach ($products as $pro)
                            <div class="col-xs-6 col-sm-4">
                                @include('product')
                            </div>
                        @endforeach
                    </div>
                    <!-- Paging -->
                    <ul class="pagination pull-right">
                        <li class="active"><a href="javascript:void(0)" onclick="goToPage(1)">1</a></li>
                        <li class=""><a href="javascript:void(0)" onclick="goToPage(2)">2</a></li>
                        <li class=""><a href="javascript:void(0)" onclick="goToPage(3)">3</a></li>
                        <li><a href="javascript:void(0)" onclick="goToPage(2)">&raquo;</a></li>
                    </ul>
                    <!-- End paging -->
                </div>
            </div>
        </div>
    </main>
@endsection
