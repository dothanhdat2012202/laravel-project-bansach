
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Nhà xuất bản BA</title>

    <!-- Google Font -->
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
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="../home/img/pngegg.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="../home/img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="#">Pages</a>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> cskh_online@nxbba.com.vn</li>
                <li>Chào mừng bạn đến với NXB BA</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> cskh_online@nxbba.com.vn</li>
                                <li>Chào mừng bạn đến với NXB BA</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            @if($user = Auth::user())
                                <div class="header__top__right__auth">
                                    <a href="{{route('order',Auth::id())}}"><i class="fa fa-user"></i>{{$user->fullname}}</a>
                                </div>
                                <div class="header__top__right__auth">
                                    <a href="{{route('client_logout')}}"><i class="fa fa-sign-out"></i> Đăng xuất</a>
                                </div>
                            @else
                            <div class="header__top__right__auth">
                                <a href="#" id="openLoginModal" data-toggle="modal" data-target="#loginModal"><i class="fa fa-sign-in"></i>Đăng nhập</a>
                                @include('homeproduct.product.customerlogin')
                            </div>
                            <div class="header__top__right__auth">
                                <a href="#" id="openLoginModal" data-toggle="modal" data-target="#signupModal"><i class="fa fa-pencil-square-o"></i> Đăng kí</a>
                                @include('homeproduct.product.customersignup')
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row" style="align-items: center">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{route('product.index')}}"><img src="../home/img/pngegg.png" alt="" width="130px" height="130px"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{route('product.index')}}">Trang chủ</a></li>
                            <li><a href="./shop-grid.html">Shop</a></li>
                            <li><a href="#">Bài viết</a>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            @php $cart = Auth::user() ? Auth::user()->carts  : session()->get('cart'); @endphp
                            @if(empty($cart))
                            <li><a href="#"><i class="fa fa-heart"></i> <span>0</span></a></li>
                            <li><a href="#"><i class="cart fa fa-shopping-bag"></i><span>0</span></a>
                            @else
                            <li><a href="#"><i class="fa fa-heart"></i> <span>0</span></a></li>
                            <li><a href="#"><i class="cart fa fa-shopping-bag"></i><span class="header-card-number">{{ count($cart) }}</span></a>
                            </li>
                            @endif
                            <div class="quickview-cart">
                                @if(empty($cart))
                                <h6>
                                    Giỏ hàng trống
                                    <span class="btnCloseQVCart"><i class="fa fa-times" aria-hidden="true"></i></span>
                                </h6>
                                <ul class="no-bullets">
                                    <li>Bạn chưa có sản phẩm nào trong giỏ hàng!</li>
                                </ul>
                                @else
                                <h6>
                                    Giỏ hàng của tôi(<i class="header-card-number">{{ count($cart) }}</i> SẢN PHẨM)
                                    <span class="btnCloseQVCart"><i class="fa fa-times" aria-hidden="true"></i></span>
                                </h6>
                                <ul class="no-bullets" id="popup-card">
                                    @php
                                        $totalPrice = 0; // Khởi tạo biến để tính tổng giá trị
                                        $totalQuantity = 0;
                                    @endphp
                                    @if(Auth::user())
                                        @foreach($cart as $item)
                                            <li class="cart-item">
                                                <a href="#" class="cart__remove" data-id="{{$item->id}}"><i class="fa fa-times" aria-hidden="true" style="color: red"></i></a>
                                                <div class="grid mg-left-15">
                                                    <div class="grid__item cart_item_image">
                                                        <div class="cart-item-img text-left">
                                                            <a href="#">
                                                                <img src="../home/img/productimage/{{$item->image}}" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="grid__item cart_item_infor">
                                                        <div class="cart-item-info text-left">
                                                            <a href="#">{{$item->name}}</a> 
                                                        </div>
                                                        <div class="cart-item-price-quantity text-left">
                                                            <span class="quantity" data-quantity="{{$item->quantity}}">Số lượng: {{$item->quantity}}</span>
                                                            <br>
                                                            <span class="current-price">Giá/sp: {{$item->price}}đ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @php
                                        // Tính tổng giá trị của sản phẩm hiện tại và cộng vào tổng tổng
                                            $totalPrice += $item->quantity * $item->price;
                                            $totalQuantity += $item->quantity;
                                        @endphp
                                        @endforeach
                                    @else
                                    @foreach($cart as $item)
                                        <li class="cart-item">
                                            <a href="#" class="cart__remove" data-id="{{$item['id']}}"><i class="fa fa-times" aria-hidden="true" style="color: red"></i></a>
                                            <div class="grid mg-left-15">
                                                <div class="grid__item cart_item_image">
                                                    <div class="cart-item-img text-left">
                                                        <a href="#">
                                                            <img src="../home/img/productimage/{{ $item['image'] }}" alt="Bluelock - Tập 16 (Tặng Kèm PVC Card)">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="grid__item cart_item_infor">
                                                    <div class="cart-item-info text-left">
                                                        <a href="#">{{$item['name']}}</a> 
                                                    </div>
                                                    <div class="cart-item-price-quantity text-left">
                                                        <span class="quantity" data-quantity="{{$item['quantity']}}">Số lượng: {{$item['quantity']}}</span>
                                                        <br>
                                                        <span class="current-price">Giá/sp: {{$item['price']}}đ</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @php
                                    // Tính tổng giá trị của sản phẩm hiện tại và cộng vào tổng tổng
                                        $totalPrice += ($item['quantity'] * $item['price']);
                                        $totalQuantity += $item['quantity']
                                    @endphp
                                    @endforeach
                                    @endif
                                </ul>
                                <div class="qv-cart-total" data-total-quantity="{{$totalQuantity}}">
                                    <span>Tạm tính: {{$totalPrice}}đ</span>
                                </div>
                                <div class="quickview-cartactions clearfix">
                                    <a href="{{route('showcart')}}">Xem giỏ hàng</a>
                                    <a href="{{route('checkout_page')}}">Thanh toán</a>
                                </div>
                                @endif
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Danh mục sản phẩm</span>
                        </div>
                        <ul>
                            @foreach($categories as $category)
                            <li><a href="{{route('product.productbycategory',['category_id'=>$category->id])}}">{{$category->category_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{route('search')}}" method="GET">
                                <div class="input-group">
                                    <input type="text" placeholder="Bạn cần tìm gì?" data-route="{{route('search')}}" name="search" id="search">
                                    <button type="submit" class="site-btn">Tìm kiếm</button>
                                </div>
                                <div id="search_smart" class="smart-search-wrapper search-wrapper" style="width: 100%; left: 62.3333px; top: 97px;">

                                </div>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>(+84)346706794</h5>
                            </div>
                        </div>
                    </div>
                    <div class="main-slider">
                        <div id="sync1" class="sync1 owl-carousel owl-theme">
                            @foreach($banners as $banner)
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                @if($banner->book_id)
                                    <a href="{{route('product.detail', $banner->book_id)}}"><img src="../home/img/banner/{{$banner->image}} " style="max-height:330px;max-width:818px;"></a>
                                @else
                                    @if($banner->image_link)
                                        <a href="{{$banner->image_link}}"><img src="../home/img/banner/{{$banner->image}} " style="max-height:330px;max-width:818px;"></a>
                                    @else
                                        <a href="#"><img src="../home/img/banner/{{$banner->image}} " style="max-height:330px;max-width:818px;"></a>
                                    @endif
                                @endif
                            </div>
                            {{-- <div class="col-lg-12 col-md-12 col-sm-12">
                                <img src="../home/img/banner/ms_banner_img4.jpg">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <img src="../home/img/banner/ms_banner_img5.jpg">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <img src="../home/img/banner/ms_banner_img1_1.jpg">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <img src="../home/img/banner/ms_banner_img3_1.jpg">
                            </div> --}}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
   
    <!-- Categories Section End -->
{{-- fromhere --}}
    @yield('productlist')
    @yield('productdetails')
    @yield('productbycategory')
    @yield('cart')
    @yield('checkout')
    @yield('productbyset')
    @yield('orderoverview')
{{-- tohere --}}
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <h4>NHÀ XUẤT BẢN BA</h4>
                        <ul>
                            <li>Giám đốc: Nguyễn Bình An</li>
                            <li>Địa chỉ: Linh Đàm,Hoàng Liệt,Hoàng Mai,Hà Nội</li>
                            <li>Số điện thoại: (+84) 34.640.6794</li>
                            <li>Email: cskh_online@nxbba.com.vn</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 offset-lg-1">
                    <div class="footer__widget">
                        <h4>Dịch vụ</h4>
                        <ul>
                            <li><a href="#">Điều khoản sử dụng</a></li>
                            <li><a href="#">Chính sách bảo mật</a></li>
                            <li><a href="#">Liên hệ</a></li>
                            <li><a href="#">Hệ thống nhà sách</a></li>
                            <li><a href="#">Tra cứu đơn hàng</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 offset-lg-1">
                    <div class="footer__widget">
                        <h4>Hỗ trợ</h4>
                        <ul>
                            <li><a href="#">Hướng dẫn đặt hàng</a></li>
                            <li><a href="#">Chính sách đổi trả-hoàn tiền</a></li>
                            <li><a href="#">Phương thức vận chuyển</a></li>
                            <li><a href="#">Phương thức thanh toán</a></li>
                            <li><a href="#">Chính sách khách hàng mua sỉ</a></li>
                            <li><a href="#">Chính sách khách hàng cho trường học</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="footer__widget">
                        <h6>Đăng kí nhận tin</h6>
                        <p>Hãy nhập địa chỉ email của bạn vào ô dưới đây để có thể nhận được tất cả các tin tức mới nhất của NXB Kim Đồng về các sản phẩm mới, các chương trình khuyến mãi mới. NXB Kim Đồng xin đảm bảo sẽ không gửi mail rác, mail spam tới bạn.</p>
                        <form action="#">
                            <input type="text" placeholder="Nhâp email của bạn">
                            <button type="submit" class="site-btn">Đăng ký</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | POWERED BY HARAVAN</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="../home/img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
    

    <!-- Js Plugins -->
    <script src="{{asset('home/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('home/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('home/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('home/js/mixitup.min.js')}}"></script>
    <script src="{{asset('home/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('home/js/main.js')}}"></script>
    <script src="{{asset('home/js/cart.js')}}"></script>
    @yield('script');


</body>

</html>