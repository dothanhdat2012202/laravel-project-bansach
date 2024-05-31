@extends('homeproduct.index')
@section('productbycategory')
@php($category_name = $category->category_name)
<section class="breadcrumb-section set-bg" data-setbg="{{asset('home/img/banner/breadcrumb_bg2.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-left">
                <div class="breadcrumb__text">
                    <h2>{{$category_name}}</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('product.index')}}">Home/</a>
                        <span>{{$category_name}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <div class="grid__item large--one-whole medium--one-half small--one-whole">
                            <div class="collection-filter-price">
                                <button class="accordion cs-title col-sb-trigger active">
                                    <span>KHOẢNG GIÁ</span>
                                </button>
                                <form action="" method="get" onchange="this.submit();">
                                <div class="panel sidebar-sort">
                                    <ul class="no-bullets filter-price clearfix">
                                        <li>
                                            <label>
                                                <input type="radio" name="price-filter" data-price="0:500000" value="0:500000">
                                                <span>Tất cả</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" name="price-filter" data-price="0:100000" value="0:100000">
                                                <span>Nhỏ hơn 100,000₫</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" name="price-filter" data-price="100000:200000" value="100000:200000">
                                                <span>Từ 100,000₫ - 200,000₫</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" name="price-filter" data-price="200000:300000" value="200000:300000">
                                                <span>Từ 200,000₫ - 300,000₫</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" name="price-filter" data-price="300000:400000" value="300000:400000">
                                                <span>Từ 300,000₫ - 400,000₫</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" name="price-filter" data-price="400000:500000" value="400000:500000">
                                                <span>Từ 400,000₫ - 500,000₫</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" name="price-filter" data-price="500000:max" value="500000:max">
                                                <span>Lớn hơn 500,000₫</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar__item">
                        <div class="grid__item large--one-whole medium--one-half small--one-whole">
                            <div class="collection-filter-price">
                                <button class="accordion cs-title col-sb-trigger active">
                                    <span>TÁC GIẢ</span>
                                </button>
                                <div class="panel sidebar-sort">
                                    <ul class="no-bullets filter-price clearfix">
                                        <li>
                                            <label>
                                                <input type="radio" name="price-filter" data-price="0:max" value="((price:product>=0))">
                                                <span>Khác</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar__item">
                        <div class="grid__item large--one-whole medium--one-half small--one-whole">
                            <div class="collection-filter-price">
                                <button class="accordion cs-title col-sb-trigger active">
                                    <span>THỂ LOẠI</span>
                                </button>
                                <div class="panel sidebar-sort">
                                    <ul class="no-bullets filter-price clearfix">
                                        <li>
                                            <label>
                                                <input type="radio" name="price-filter" data-price="0:max" value="((price:product>=0))">
                                                <span>Tất cả</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>{{$category_name}}</h2>
                    </div>
                </div>
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sắp xếp</span>
                                <select>
                                    <option value="0">Tùy chọn</option>
                                    <option value="0">Bán chạy nhất</option>
                                    <option value="0">Tên từ A-Z</option>
                                    <option value="0">Tên từ Z-A</option>
                                    <option value="0">Giá tăng dần</option>
                                    <option value="0">Giá giảm dần</option>
                                    <option value="0">Mới nhất</option>
                                    <option value="0">Cũ nhất</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>{{count($productsbycate)}}</span> Sản phẩm tìm được</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($productsbycate as $product)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="../home/img/productimage/{{$product->image}}">
                                <ul class="product__item__pic__hover">
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
                            <div class="product__item__text">
                                <h6><a href="{{ route('product.detail',['id'=>$product->id]) }}">{{$product->name}}</a></h6>
                                <h5>{{number_format($product->output_price)}}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="product__pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection