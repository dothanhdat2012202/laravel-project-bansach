@if($search_products->count())
<div id="product">
    <div class="smart_search_prod">
        <div class="search_prod_title">
            <span class="left">Sản phẩm</span>
            <a id="view_article" href="/search?q=filter=(title:product**tôi solo)&amp;type=product" class="left">Xem thêm(2)</a>
        </div>
        @foreach($search_products as $s_pro)
        <div class="search-wrapper">
            <div class="prod_img">
                <a href="{{route('product.detail',$s_pro->id)}}">
                    <img src="../home/img/productimage/{{$s_pro->image}}" alt="Solo ...">
                </a>
            </div>
            <div class="prod_info">
                <span class="prod_title"><a style="color: black;" href="{{route('product.detail',$s_pro->id)}}">{{$s_pro->name}}</a></span>
                <div class="prod_info_price">
                    <span class="compare_at_price">{{$s_pro->price_sale}} đ</span>
                    <span class="price">{{$s_pro->output_price}}đ</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
 @else   
<div id="article"><p class="article_null">Không có tin tức nào cho: <span>{{$getstring}}</span></p></div>
<div id="load" class="">
    <img src="//theme.hstatic.net/200000343865/1001052087/14/loading1.gif?v=372" alt="loading">
</div>
@endif