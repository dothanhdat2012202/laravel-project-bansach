@extends('homeproduct.index')
@section('productdetails')
<section >
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-left">
                <div class="breadcrumb__text">
                    <div class="breadcrumb__option">
                        <a href="{{route('product.index')}}">Trang chủ /</a>
                        <a href="{{route('product.productbycategory',$productdetails->category_id)}}">{{$productdetails->category->category_name}}/</a>
                        <span>{{$productdetails->name}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                            src="../home/img/productimage/{{$productdetails->image}}" alt="">
                    </div>
                    <div class="sale-percentage-btn">{{$productdetails->discount}}%</div>
                    <div class="product__details__pic__slider owl-carousel">
                        @foreach($productdetails->productGaleries as $media)
                            <img data-imgbigurl="../home/img/thumb_images/{{$media->file_name}}"
                            src="../home/img/thumb_images/{{$media->file_name}}" alt="">
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="product__details__text">
                    <h3>{{ $productdetails->name }}</h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div>
                    <div class="proprice" style="display:flex;gap:20px;align-items:center;">
                        <div class="product__details__price">{{$productdetails->price_sale}}đ</div>
                        <div class="product__details__price"><s style="color: #bebebe";>{{ str_replace('.00', '',number_format($productdetails->output_price, 2, '.', '')) }}đ</s></div>
                        <div class="sale-percentage"><span class="PriceSaving">(Bạn đã tiết kiệm được {{$productdetails->output_price-$productdetails->price_sale}}đ)</span></div>
                    </div>
                    <form action="{{route('add_to_cart')}}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$productdetails->id}}">
                    <input type="hidden" name="quantity" value="1">
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" value="1" name="quantity">
                            </div>
                        </div>
                    </div>
                    {{-- <a type="submit" href="{{route('add_to_cart',$productdetails->id)}}" class="primary-btn">Thêm vào giỏ hàng</a> --}}
                    <button type="submit" class="primary-btn">Thêm vào giỏ hàng</button>
                    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                    </form>
                    <ul>
                        <li>Tác giả: <span>{{$productdetails->author}}</span></li>
                        <li>Đối tượng:<span><a href="{{route('product.productbycategory',['category_id'=>$productdetails->category_id])}}" style="color: red"> {{$productdetails->category_name}} </a></span></li>
                        <li>Khuôn khổ: <span>{{$productdetails->size}}</span></li>
                        <li>Số trang: <span>{{$productdetails->pages}}</span></li>
                        <li>Định dạng: <span>{{$productdetails->format}}</span></li>
                        <li>Trọng lượng: <span>{{$productdetails->weight}}</span></li>
                        <li>Bộ sách:<span><a href="{{route('product.productbysob',$productdetails->setofbook_id)}}" style="color: red;">{{$productdetails->setofbook_name}}</a></span></li>
                        <li><b>Chia sẻ trên</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                aria-selected="true">Mô tả-Đánh giá</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                aria-selected="false">Bình luận</a>
                                {{-- <div id="fb-root"></div>
                                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0&appId=151019850990527" nonce="jl9hPH5C"></script>
                                <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="" data-numposts="5"></div> --}}
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <p>{{$productdetails->description}}</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Sách cùng thể loại</h2>
                </div>
            </div>
        </div>
        <div class="row product__detail__slider owl-carousel">
            @foreach($relatedBooks as $relatedBook)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="featured__item ">
                    <div class="featured__item__pic set-bg" data-setbg="../home/img/productimage/{{$relatedBook->image}}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product-tags">
                        <div class="tag-saleoff text-center">
                            -{{$relatedBook->discount}}%
                        </div>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{ route('product.detail',['id'=>$relatedBook->id]) }}">{{ $relatedBook->name }}</a></h6>
                        <span class="current-price">{{$relatedBook->price_sale}}đ</span>
                        <span class="original-price">
                            <s >{{ str_replace('.00', '',number_format($relatedBook->output_price, 2, '.', '')) }}đ</s>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Sách cùng bộ</h2>
                </div>
            </div>
        </div>
        <div class="row product__detail__slider owl-carousel">
            @foreach($relatedbysets as $relatedbyset)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="featured__item ">
                    <div class="featured__item__pic set-bg" data-setbg="../home/img/productimage/{{$relatedbyset->image}}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product-tags">
                        <div class="tag-saleoff text-center">
                            -{{$relatedbyset->discount}}%
                        </div>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{ route('product.detail',['id'=>$relatedbyset->id]) }}">{{ $relatedbyset->name }}</a></h6>
                        <span class="current-price">{{$relatedbyset->price_sale}}đ</span>
                        <span class="original-price">
                            <s >{{ str_replace('.00', '',number_format($relatedbyset->output_price, 2, '.', '')) }}đ</s>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection