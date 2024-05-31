@extends('homeproduct.index')
@section('cart')
<section class="breadcrumb-section set-bg" data-setbg="{{asset('home/img/banner/breadcrumb_bg2.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-left">
                <div class="breadcrumb__text">
                    <h2>GIỎ HÀNG CỦA BẠN - NHÀ XUẤT BẢN BA</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('product.index')}}">Trang chủ/</a>
                        <span>Giỏ hàng của bạn - Nhà xuất bản BA</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<form action="{{route('update_cart')}}" method="POST">
@csrf
@method('POST')
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Tổng giá</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $cart=Auth::user() ? Auth::user()->carts : session()->get('cart');
                                $total_price=0;
                            @endphp
                            @if($cart)
                                @foreach($cart as $item)
                                @php
                                    $total_price += ($item['quantity'] * $item['price']);
                                    $price=$item['price']*$item['quantity'];
                                @endphp
                                <tr>
                                    <td class="shoping__cart__item" style="display:flex;align-items:center;">
                                        <img src="../home/img/productimage/{{ $item['image'] }}" alt="" width="150px">
                                        <h5>{{$item['name']}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{$item['price']}}đ
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty"><span class="dec qtybtn">-</span>
                                                <input id="input_quantity" name="input_quantity[]" class="js-qty__num" data-qty="{{$item['quantity']}}" type="number" value="{{$item['quantity']}}" min="1">
                                            <span class="inc qtybtn">+</span></div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        {{$price}}đ
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <input type="hidden" name="pro_id[]" id="pro_id" value="{{$item['id']}}">
                                        <a href="{{route('delete_cart',$item['id'])}}"><span class="icon_close"></span></a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <label for="note" style="margin-bottom:0px">Ghi chú</label>
                        <textarea name="note" id="note" rows="6"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping_checkout">
                    <p>
                        <span class="cart__subtotal-title">Tạm tính : </span>
                        <span class="h3 cart__subtotal">{{$total_price}}đ</span>
                    </p>
                    @endif
                    <button type="submit" name="update" class="btn update-cart"><a style="color:white;" >Cập nhật</a></button>
                    <button type="submit" name="checkout" class="btn"><a style="color:white;" >Thanh toán</a> </button>
                </div>
            </div>
        </div>
    </div>
</section>
</form>
@endsection