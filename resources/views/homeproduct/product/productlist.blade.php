@extends('homeproduct.index')
@section('productlist')
<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sách mới</h2>
                </div>
            </div>
        </div>
        <div class="row product_slider owl-carousel">
            @foreach($newbooks as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood vegetables">
                <div class="featured__item ">
                    <div class="featured__item__pic set-bg" data-setbg="../home/img/productimage/{{$product->image}}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product-tags">
                        <div class="tag-saleoff text-center">
                            -{{$product->discount}}%
                        </div>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{ route('product.detail',['id'=>$product->id]) }}">{{ $product->name }}</a></h6>
                        <span class="current-price">{{$product->price_sale}}đ</span>
                        <span class="original-price">
                            <s >{{ str_replace('.00', '',number_format($product->output_price, 2, '.', '')) }}đ</s>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{-- sách bán chạy --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sách bán chạy</h2>
                </div>
            </div>
        </div>
        <div class="row product_slider owl-carousel">
            @foreach($bestsellers as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood vegetables">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="../home/img/productimage/{{$product->image}}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product-tags">
                        <div class="tag-saleoff text-center">
                            -{{$product->discount}}%
                        </div>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{ route('product.detail',['id'=>$product->id]) }}">{{ $product->name }}</a></h6>
                        <span class="current-price">{{$product->price_sale}}đ</span>
                        <span class="original-price">
                            <s >{{ str_replace('.00', '',number_format($product->output_price, 2, '.', '')) }}đ</s>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="banner__pic">
                    <img src="../home/img/banner/banner_home_pro_4.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Latest Product Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>COMBO</h2>
                </div>
            </div>
        </div>
        <div class="row product_slider owl-carousel">
            @foreach($combos as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood vegetables">
                <div class="featured__item ">
                    <div class="featured__item__pic set-bg" data-setbg="../home/img/productimage/{{$product->image}}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product-tags">
                        <div class="tag-saleoff text-center">
                            -{{$product->discount}}%
                        </div>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{ route('product.detail',['id'=>$product->id]) }}">{{ $product->name }}</a></h6>
                        <span class="current-price">{{$product->price_sale}}đ</span>
                        <span class="original-price">
                            <s >{{ str_replace('.00', '',number_format($product->output_price, 2, '.', '')) }}đ</s>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Latest Product Section End -->
<div class="banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="banner__pic">
                    <img src="../home/img/banner/banner_home_pro_5.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>MANGA-COMIC</h2>
                </div>
            </div>
        </div>
        <div class="row product_slider owl-carousel">
            @foreach($mangas as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 mix an">
                <div class="featured__item ">
                    <div class="featured__item__pic set-bg" data-setbg="../home/img/productimage/{{$product->image}}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product-tags">
                        <div class="tag-saleoff text-center">
                            -{{$product->discount}}%
                        </div>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{ route('product.detail',['id'=>$product->id]) }}">{{ $product->name }}</a></h6>
                        <span class="current-price">{{$product->price_sale}}đ</span>
                        <span class="original-price">
                            <s >{{ str_replace('.00', '',number_format($product->output_price, 2, '.', '')) }}đ</s>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<div class="banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="banner__pic">
                    <img src="../home/img/banner/banner_home_pro_7.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>WINGSBOOKS</h2>
                </div>
            </div>
        </div>
        <div class="row product_slider owl-carousel">
            @foreach($wings as $wing)
            <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood vegetables">
                <div class="featured__item ">
                    <div class="featured__item__pic set-bg" data-setbg="../home/img/productimage/{{$wing->image}}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product-tags">
                        <div class="tag-saleoff text-center">
                            -{{$wing->discount}}%
                        </div>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{ route('product.detail',['id'=>$wing->id]) }}">{{ $wing->name }}</a></h6>
                        <span class="current-price">{{$wing->price_sale}}đ</span>
                        <span class="original-price">
                            <s >{{ str_replace('.00', '',number_format($wing->output_price, 2, '.', '')) }}đ</s>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Blog Section End -->
@endsection