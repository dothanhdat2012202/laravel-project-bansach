<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('home/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/customize.css')}}" type="text/css">
<style>
.section .section-content .content-box {
    box-shadow: 0 0 0 1px #d9d9d9;
    border-radius: 4px;
    background: #fff;
    color: #737373;
    margin-top: 1em;
}
.section .section-content .content-box .content-box-row:before {
    content: "";
    display: table;
}
.section .section-content:before {
    content: "";
    display: table;
}
.section .section-content .content-box .content-box-row:first-child {
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    border-top: none;
}
.section .section-content .content-box .content-box-row {
    display: table;
    box-sizing: border-box;
    width: 100%;
    border-top: 1px solid #d9d9d9;
    zoom: 1;
}
.section .section-content .content-box .content-box-row:after, .section .section-content .content-box .content-box-row:before {
    content: "";
    display: table;
}
.radio-wrapper .two-page, .checkbox-wrapper .checkbox-label {
    display: flex;
    cursor: pointer;
    align-items: center;
    padding: 1.3em;
    width: auto;
}
.section .section-content .content-box .content-box-row:after{
    content: "";
    display: table;
}
.radio-wrapper .payment-method-checkbox {
    display: flex;
    align-self: center;
}
.radio-wrapper .radio-content-input {
    display: flex;
    align-items: center;
    gap: 10px;
}
.radio-wrapper .radio-input{
    padding-right: 0.75em;
    white-space: nowrap;
}
.radio-wrapper .radio-input .input-radio:checked, .checkbox-wrapper .checkbox-input .input-checkbox:checked {
    border: none;
    box-shadow: 0 0 0 10px #338dbc inset;
}
.radio-wrapper .radio-input .input-radio {
    border-radius: 50%;
}
.radio-wrapper .radio-input .input-radio{
    width: 18px;
    height: 18px;
    box-shadow: 0 0 0 0 #338dbc inset;
    transition: all 0.2s ease-in-out;
    position: relative;
    cursor: pointer;
    vertical-align: -4px;
    outline: 0;
    border: solid 1px #d9d9d9;
}
input{
    color: inherit;
    font: inherit;
    margin: 0;
    padding: 0;
    -webkit-appearance: none;
    -webkit-font-smoothing: inherit;
    border: none;
    background: transparent;
    line-height: normal;
}
.radio-wrapper .radio-input .input-radio:after {
    width: 4px;
    height: 4px;
    margin-left: -2px;
    margin-top: -2px;
    background-color: #fff;
    border-radius: 50%;
}
.radio-wrapper .radio-input .input-radio:after {
    content: "";
    display: block;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: scale(0.2);
    transition: all 0.2s ease-in-out 0.1s;
    opacity: 0;
}
.radio-wrapper .radio-input .input-radio:checked:after{
    transform: scale(1);
    opacity: 1;
}
.radio-wrapper .radio-content-input .main-img {
    margin-right: 10px;
    display: flex;
    align-self: center;
    width: 40px;
    height: 40px;
}
.radio-label{
    display: flex;
    align-items: center;
    padding: 1.3em;
    margin-bottom: 0px;
}
.section .section-content .content-box .content-box-row {
    display: table;
    box-sizing: border-box;
    width: 100%;
    border-top: 1px solid #d9d9d9;
    zoom: 1;
}
.radio-label-primary{
    font-size: 14px
}
.radio-accessory{
    padding-left: 15px
}
.section .section-content .content-box .content-box-row:before {
    content: "";
    display: table;
}
.radio-wrapper {
    display: table;
    box-sizing: border-box;
    width: 100%;
    zoom: 1;
}
.radio-wrapper:before {
    content: "";
    display: table;
}
.section .section-header {
    margin-bottom: 0.5em;
}
.section-title{
    margin-bottom: 0px;
    text-align: left;
    margin-top: 10px;
    font-size: 20px
}
.step-footer{
    margin-top: 20px;
    display: flex;
    flex-direction: row-reverse;
    align-items: center;
}
</style>
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Nhà xuất bản BA</h4>
            <form action="{{route('vn_payment')}}" method="post">
            @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('showcart')}}">Giỏ hàng</a>
                            </li>
                            <li class="breadcrumb-item breadcrumb-item-current">
                                <a href="#">
                                    Thông tin vận chuyển
                                </a>
                            </li>
                            <li class="breadcrumb-item ">
                                Phương thức thanh toán
                            </li>
                        </ul>
                        <div class="step">
                            <div class="step-sections " step="2">
                                <div id="section-shipping-rate" class="section">
                                    <div class="order-checkout__loading--box">
                                        <div class="order-checkout__loading--circle"></div>  
                                    </div>
                                    <div class="section-header">
                                        <h2 class="section-title">Phương thức vận chuyển</h2>
                                    </div>
                                    @if(Str::contains(Str::lower($des['address']), 'hà nội'))
                                    <div class="section-content">
                                        <div class="content-box">
                                            <div class="content-box-row">
                                            <div class="radio-wrapper">
                                                <label class="radio-label" for="shipping_rate_id_1000020787">
                                                    <div class="radio-input">
                                                        <input id="shipping_rate_id_1000020787" class="input-radio" type="radio" name="shipping_rate_id" value="1000020787" checked="">
                                                    </div>
                                                    <span class="radio-label-primary">Vận chuyển Hà Nội - 25.000 VND</span>
                                                    <span class="radio-accessory content-box-emphasis">
                                                        25,000₫
                                                    </span>
                                                </label>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="section-content">
                                        <div class="content-box">
                                            <div class="content-box-row">
                                            <div class="radio-wrapper">
                                                <label class="radio-label" for="shipping_rate_id_1000020787">
                                                    <div class="radio-input">
                                                        <input id="shipping_rate_id_1000020787" class="input-radio" type="radio" name="shipping_rate_id" value="1000020787" checked="">
                                                    </div>
                                                    <span class="radio-label-primary">Vận chuyển các tỉnh thành khác -35.000 VND</span>
                                                    <span class="radio-accessory content-box-emphasis">
                                                        35,000₫
                                                    </span>
                                                </label>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                    <div id="section-payment-method" class="section">
                                        <div class="order-checkout__loading--box">
                                            <div class="order-checkout__loading--circle"></div>  
                                        </div>
                                        <div class="section-header">
                                            <h2 class="section-title">Phương thức thanh toán</h2>
                                        </div>
                                        <div class="section-content">
                                            <div class="content-box">
                                                <div class="radio-wrapper content-box-row">
                                                    <label class="two-page" for="payment_method_id_1002830518">
                                                        <div class="radio-input payment-method-checkbox">
                                                            <input type-id="1" id="payment_method_id_1002830518" class="input-radio" name="payment_method_id" type="radio" value="1002830518" checked="">
                                                        </div>
                                                        
                                                        <div class="radio-content-input">
                                                            <img class="main-img" src="https://hstatic.net/0/0/global/design/seller/image/payment/cod.svg?v=5">
                                                            <div class="content-wrapper">
                                                            <span class="radio-label-primary">Thanh toán khi giao hàng (COD)</span>
                                                            <span class="quick-tagline hidden"></span>
                                                            
                                                                
                                                                </div>
                                                                    </div>
                                                    </label>
                                                </div>
                                                <div class="radio-wrapper content-box-row">
                                                    <label class="two-page" for="payment_method_id_1002911324">
                                                        <div class="radio-input payment-method-checkbox">
                                                            <input type-id="21" id="payment_method_id_1002911324" class="input-radio" name="payment_method_id" type="radio" value="1002911324">
                                                        </div>
                                                        
                                                        <div class="radio-content-input">
                                                            <img class="main-img" src="https://hstatic.net/0/0/global/design/seller/image/payment/momo.svg?v=5">
                                                            <div class="content-wrapper">
                                                            <span class="radio-label-primary">Ví MoMo</span>
                                                            <span class="quick-tagline hidden"></span>
                                                            
                                                                
                                                                </div>
                                                                    </div>
                                                    </label>
                                                </div>
                                                <div class="radio-wrapper content-box-row">
                                                    <label class="two-page" for="payment_method_id_1002911338">
                                                        <div class="radio-input payment-method-checkbox">
                                                            <input type-id="22" id="payment_method_id_1002911338" class="input-radio" name="payment_method_id" type="radio" value="vnpay_qr">
                                                        </div>
                                                        
                                                        <div class="radio-content-input">
                                                            <img class="main-img" src="../home/img/vnpay-seeklogo.com.jpg" style="object-fit:contain;">
                                                            <div class="content-wrapper">
                                                            <span class="radio-label-primary">Ví VNPay bằng QRCode</span>
                                                            <span class="quick-tagline hidden"></span>
                                                            
                                                                
                                                                </div>
                                                                    </div>
                                                    </label>
                                                </div>
                                                <div class="radio-wrapper content-box-row">
                                                    <label class="two-page" for="payment_method_id_1002911340">
                                                        <div class="radio-input payment-method-checkbox">
                                                            <input type-id="24" id="payment_method_id_1002911340" class="input-radio" name="payment_method_id" type="radio" value="1002911340">
                                                        </div>
                                                        
                                                        <div class="radio-content-input">
                                                            <img class="main-img" src="https://hstatic.net/0/0/global/design/seller/image/payment/zalopay.svg?v=5">
                                                            <div class="content-wrapper">
                                                            <span class="radio-label-primary">Thẻ Visa/Master/JCB qua cổng ZaloPay</span>
                                                            <span class="quick-tagline hidden"></span>
                                                            
                                                                
                                                                    <img class="child-img" src="https://hstatic.net/0/0/global/design/seller/image/payment/visa_master_jcb.svg?v=5">
                                                        
                                                                </div>
                                                                    </div>
                                                    </label>
                                                </div>
                                                <div class="radio-wrapper content-box-row">
                                                    <label class="two-page" for="payment_method_id_1002911342">
                                                        <div class="radio-input payment-method-checkbox">
                                                            <input type-id="23" id="payment_method_id_1002911342" class="input-radio" name="payment_method_id" type="radio" value="1002911342">
                                                        </div>
                                                        
                                                        <div class="radio-content-input">
                                                            <img class="main-img" src="https://hstatic.net/0/0/global/design/seller/image/payment/zalopay.svg?v=5">
                                                            <div class="content-wrapper">
                                                            <span class="radio-label-primary">Thẻ ATM nội địa qua cổng ZaloPay</span>
                                                            <span class="quick-tagline hidden"></span>
                                                            
                                                                
                                                                    <img class="child-img" src="https://hstatic.net/0/0/global/design/seller/image/payment/type_atm.svg?v=5">
                                                        
                                                                </div>
                                                                    </div>
                                                    </label>
                                                </div>
                                                <div class="radio-wrapper content-box-row">
                                                    <label class="two-page" for="payment_method_id_1003013252">
                                                        <div class="radio-input payment-method-checkbox">
                                                            <input type-id="38" id="payment_method_id_1003013252" class="input-radio" name="payment_method_id" type="radio" value="1003013252">
                                                        </div>
                                                        
                                                        <div class="radio-content-input">
                                                            <img class="main-img" src="https://hstatic.net/0/0/global/design/seller/image/payment/shopeepay_new.svg?v=5">
                                                            <div class="content-wrapper">
                                                            <span class="radio-label-primary">Ví ShopeePay</span>
                                                            <span class="quick-tagline hidden"></span>
                                                            
                                                                
                                                                </div>
                                                                    </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="step-footer" id="step-footer-checkout">
                                <form action="{{route('vn_payment')}}" id="checkout_complete" method="post">
                                    <input name="form_type" type="hidden" value="checkout">
                                    <input name="utf8" type="hidden" value="✓">
                                    <input name="data_type" type="hidden" value="liquid">
                                    <input name="name_payment" type="hidden" value="{{$des['name']}}">
                                    <input name="email_payment" type="hidden" value="{{$des['email']}}">
                                    <input name="phone_payment" type="hidden" value="{{$des['phone']}}">
                                    <input name="address_payment" type="hidden" value="{{$des['address']}}">
                                    <input name="coupon" type="hidden" value="{{$_GET['coupon']}}">
                                    <button type="submit" class="step-footer-continue-btn btn">
                                        <span class="btn-content">Đặt hàng</span>
                                        <i class="btn-spinner icon icon-button-spinner"></i>
                                    </button>
                                    <input name="__RequestVerificationToken" type="hidden" value="">
                                </form>														
                                <a class="step-footer-previous-link" href="{{route('showcart')}}">Giỏ hàng</a>
                            </div>
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
                            @if(!empty($des['coupon']))
                            <div class="checkout__order__subtotal" style="display:block;border-bottom:none;">
                                <form id="form_discount_add" accept-charset="UTF-8" method="post">
                                    <input name="utf8" type="hidden" value="✓">
                                        <div class="fieldset">
                                            <div class="field  ">
                                                <div class="field-input-btn-wrapper">
                                                    <div class="field-input-wrapper">
                                                        {{-- <label class="field-label" for="discount.code">Mã giảm giá</label> --}}
                                                        <input placeholder="Mã giảm giá" class="field-input" data-discount-field="true" autocomplete="false" autocapitalize="off" spellcheck="false" size="30" type="text" id="discount.code" name="discount.code" value="">
                                                    </div>
                                                    {{$des['coupon']}}%
                                                </div>
                                                
                                            </div>
                                        </div>
                                </form>
                            </div>
                            @endif
                            <div class="checkout__order__total">
                                <ul>
                                    <li>Tạm tính <span>{{$total_price}}đ</span></li>
                                    <li>Phí ship <span>__</span></li>
                                </ul>
                            </div>
                            @php
                                $one_percent = $total_price/100;
                                $total_price =  $total_price - ($des['coupon'] * $one_percent);
                            @endphp
                            <div class="checkout__order__total">Tổng tiền <span>{{number_format($total_price, 0, ',', ',')}}đ</span></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="{{asset('home/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('home/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('home/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('home/js/mixitup.min.js')}}"></script>
    <script src="{{asset('home/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('home/js/main.js')}}"></script>
    <script src="{{asset('home/js/cart.js')}}"></script>