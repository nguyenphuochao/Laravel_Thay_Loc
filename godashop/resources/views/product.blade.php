<div class="product-container">
    <div class="image">
        <img class="img-responsive" src="../images/{{ $pro->featured_image }}" alt="">
    </div>
    <div class="product-meta">
        <h5 class="name">
            @php
                $slugName=\Str::slug($pro->name);
                $slug="{$slugName}-{$pro->id}";
            @endphp
            <a class="product-name" href="{{route('fe.detail',['slug'=>$slug])}}"
                title="{{ $pro->name }}">{{ $pro->name }}</a>
        </h5>
        <div class="product-item-price">
            @if ($pro->price != $pro->sale_price)
                <span class="product-item-regular">{{ number_format($pro->price) }}₫</span>
            @endif
            <span class="product-item-discount">{{ number_format($pro->sale_price) }}₫</span>
        </div>
    </div>
    <div class="button-product-action clearfix">
        <div class="cart icon">
            <a class="btn btn-outline-inverse buy" product-id="{{ $pro->id }}"
                href="javascript:void(0)" title="Thêm vào giỏ">
                Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
            </a>
        </div>
        <div class="quickview icon">
            <a class="btn btn-outline-inverse" href="{{route('fe.detail',['slug'=>$slug])}}" title="Xem nhanh">
                Xem chi tiết <i class="fa fa-eye"></i>
            </a>
        </div>
    </div>
</div>
