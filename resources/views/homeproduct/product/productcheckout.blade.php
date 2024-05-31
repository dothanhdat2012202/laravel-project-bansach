@extends('homeproduct.index')
@section('checkout')
<section class="breadcrumb-section set-bg" data-setbg="{{asset('home/img/banner/breadcrumb_bg2.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Thanh toán</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('product.index')}}">Trang chủ - </a>
                        <span>Thanh toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Nhà xuất bản BA</h4>
            <form action="{{route('payment')}}">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('showcart')}}">Giỏ hàng</a>
                            </li>
                            <li class="breadcrumb-item breadcrumb-item-current">
                                Thông tin vận chuyển
                            </li>
                            <li class="breadcrumb-item ">
                                <a href="/checkouts/58cb6d69289f4526bcfbeb16f4aa1af1?step=2\" class="breadcrumb-link">
                                    Phương thức thanh toán
                                </a>
                            </li>
                        </ul>
                        <p>Thông tin thanh toán</p>
                        <div>
                            @if(Auth::user())
                            <div class="logged-in-customer-information">
                                <div class="logged-in-customer-information-avatar-wrapper">
                                    <div class="logged-in-customer-information-avatar gravatar" style="background-image: url(//www.gravatar.com/avatar/df0baceb9124b25fc5956ee0231396ad.jpg?s=100&amp;d=blank);filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='//www.gravatar.com/avatar/df0baceb9124b25fc5956ee0231396ad.jpg?s=100&amp;d=blank', sizingMethod='scale')"></div>
                                </div>
                                <p class="logged-in-customer-information-paragraph">
                                    {{$user->email}}
                                    <br>
                                    <a href="{{route('client_logout')}}">Đăng xuất</a>
                                </p>
                            </div>
                            @else
                            <label for="acc">
                                Bạn đã có tài khoản?<span><a href="#"> Đăng nhập</a></span>
                            </label>
                            @endif
                        </div>
                        @if(Auth::user())
                        <div class="checkout__input">
                            <div class="checkout__input">
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <p>Họ và tên<span>*</span></p>
                                <input type="text" name="name" value="{{$user->fullname}}">
                            </div>
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-sm-7">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="email" value="{{$user->email}}">
                                </div>
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5">
                                <div class="checkout__input">
                                    <p>Số điện thoại<span>*</span></p>
                                    <input type="text" name="phone" class="checkout__input__add" value="{{$user->phone}}" >
                                </div>
                                @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Địa chỉ<span>*</span></p>
                            <input type="text" name="address" value="{{$user->address}}">
                            @error('address')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        @else
                        <div class="checkout__input">
                            <div class="checkout__input">
                                <input type="hidden" name="id" value="">
                                <p>Họ và tên<span>*</span></p>
                                <input type="text" name="name">
                            </div>
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-sm-7">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="email">
                                    @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5">
                                <div class="checkout__input">
                                    <p>Số điện thoại<span>*</span></p>
                                    <input type="text" class="checkout__input__add" name="phone">
                                    @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Địa chỉ<span>*</span></p>
                            <input type="text" name="address">
                            @error('address')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif
                        {{-- <div class="checkout__input">
                            <p>Order notes<span>*</span></p>
                            <input type="text" placeholder="Notes about your order, e.g. special notes for delivery.">
                        </div> --}}
                        <div class="step-footer" id="step-footer-checkout">
                            <a class="step-footer-previous-link" href="{{route('showcart')}}">
                                Giỏ hàng
                            </a>			
                            <form action="{{route('payment')}}" id="form_next_step" accept-charset="UTF-8" method="get">
                                <input name="utf8" type="hidden" value="✓">
                                <input name="coupon" id="coupon" type="hidden" value="">
                                <button type="submit" class="step-footer-continue-btn btn">
                                    <span class="btn-content">Phương thức thanh toán</span>
                                    <i class="btn-spinner icon icon-button-spinner"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="checkout__order">
                            <table class="product-table">
                                <thead>
                                    <tr>
                                        <th scope="col"><span class="visually-hidden">Hình ảnh</span></th>
                                        <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                        <th scope="col"><span class="visually-hidden">Số lượng</span></th>
                                        <th scope="col"><span class="visually-hidden">Giá</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total_price=0;
                                    @endphp
                                    @if(Auth::user())
                                        @foreach($cartitems as $cartitem)
                                        @php
                                            $total_price += ($cartitem->quantity * $cartitem->price);
                                        @endphp
                                            <tr class="product" data-product-id="1050623870" data-variant-id="1113697824">
                                                <td class="product-image">
                                                    <div class="product-thumbnail">
                                                        <div class="product-thumbnail-wrapper">
                                                            <img class="product-thumbnail-image" alt="" src="../home/img/productimage/{{$cartitem->image}}">
                                                        </div>
                                                        <span class="product-thumbnail-quantity" aria-hidden="true">{{$cartitem->quantity}}</span>
                                                    </div>
                                                </td>
                                                <td class="product-description" style="padding-left: 2em">
                                                    <span class="product-description-name order-summary-emphasis">{{$cartitem->name}}</span>
                                                    
                                                </td>
                                                <td class="product-quantity visually-hidden">1</td>
                                                <td class="product-price" style="padding-left: 2em">
                                                    <span class="order-summary-emphasis">{{$cartitem->price}}đ</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        @if(count($cartitems))
                                        @foreach($cartitems as $c_detail)
                                        @php
                                            $total_price += ($c_detail['quantity'] * $c_detail['price']);
                                        @endphp
                                            <tr class="product" data-product-id="1050623870" data-variant-id="1113697824">
                                                <td class="product-image">
                                                    <div class="product-thumbnail">
                                                        <div class="product-thumbnail-wrapper">
                                                            <img class="product-thumbnail-image" alt="" src="../home/img/productimage/{{$c_detail['image']}}">
                                                        </div>
                                                        <span class="product-thumbnail-quantity" aria-hidden="true">{{$c_detail['quantity']}}</span>
                                                    </div>
                                                </td>
                                                <td class="product-description" style="padding-left: 2em">
                                                    <span class="product-description-name order-summary-emphasis">{{$c_detail['name']}}</span>
                                                    
                                                </td>
                                                <td class="product-quantity visually-hidden">1</td>
                                                <td class="product-price" style="padding-left: 2em">
                                                    <span class="order-summary-emphasis">{{$c_detail['price']}}đ</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                    @endif
                                </tbody>
                            </table>
                            <div class="checkout__order__subtotal" style="display:block;border-bottom:none;">
                                <form id="form_discount_add" accept-charset="UTF-8" method="post">
                                    <input name="utf8" type="hidden" value="✓">
                                        <div class="fieldset">
                                            <div class="field  ">
                                                <div class="field-input-btn-wrapper">
                                                    <div class="field-input-wrapper">
                                                        {{-- <label class="field-label" for="discount.code">Mã giảm giá</label> --}}
                                                        <input placeholder="Mã giảm giá" class="field-input" data-discount-field="true" autocomplete="false" autocapitalize="off" spellcheck="false" size="30" type="text" id="discount_code" name="discount_code" value="">
                                                    </div>
                                                    <button type="submit" class="field-input-btn btn btn-default btn-disabled">
                                                        <span class="btn-content" style="">Sử dụng</span>
                                                        <i class="btn-spinner icon icon-button-spinner"></i>
                                                    </button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                </form>
                            </div>
                            <div class="checkout__order__total">
                                <ul>
                                    <li>Tạm tính <span>{{$total_price}}đ</span></li>
                                    <li>Phí ship <span>__</span></li>
                                </ul>
                            </div>
                            <div class="checkout__order__total checkout__order__total_global">Tổng tiền <span data-price="{{$total_price}}">{{$total_price}}đ</span></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    $('#form_discount_add .btn-disabled').on('click', function(e){
        e.preventDefault();
        let discountCode = $('#form_discount_add input.field-input').val();
        let total = parseFloat($('.checkout__order__total_global span').attr('data-price'));
        let one_percent = total/100;
        let subTotal;
        $.ajax({
            type: "POST",
            url: "/discount",
            data: { 
                _token: '{{ csrf_token() }}',
                discountCode: discountCode 
            },
            success: function(response) {
                if (response.success) {
                    console.log(response.data);
                    subTotal = parseInt(response.data) * one_percent;
                    total = total - subTotal;
                    $('.checkout__order__total_global span').text(total+'$');
                    $('#coupon').val(discountCode);
                } else {
                    alert('Mã không tồn tại!');
                }
            },
            error: function() {
                //catch lỗi khi gọi api
            }
        });
    });
</script>
@endsection


