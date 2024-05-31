/*  ---------------------------------------------------
    Template Name: Ogani
    Description:  Ogani eCommerce  HTML Template
    Author: Colorlib
    Author URI: https://colorlib.com
    Version: 1.0
    Created: Colorlib
---------------------------------------------------------  */

'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");

        /*------------------
            Gallery filter
        --------------------*/
        $('.featured__controls li').on('click', function () {
            $('.featured__controls li').removeClass('active');
            $(this).addClass('active');
        });
        if ($('.featured__filter').length > 0) {
            var containerEl = document.querySelector('.featured__filter');
            var mixer = mixitup(containerEl);
        }
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    //Humberger Menu
    $(".humberger__open").on('click', function () {
        $(".humberger__menu__wrapper").addClass("show__humberger__menu__wrapper");
        $(".humberger__menu__overlay").addClass("active");
        $("body").addClass("over_hid");
    });

    $(".humberger__menu__overlay").on('click', function () {
        $(".humberger__menu__wrapper").removeClass("show__humberger__menu__wrapper");
        $(".humberger__menu__overlay").removeClass("active");
        $("body").removeClass("over_hid");
    });

    /*------------------
		Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*-----------------------
        Categories Slider
    ------------------------*/
    $(".categories__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 4,
        dots: false,
        nav: true,
        navText: ["<span class='fa fa-angle-left'><span/>", "<span class='fa fa-angle-right'><span/>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {

            0: {
                items: 1,
            },

            480: {
                items: 2,
            },

            768: {
                items: 3,
            },

            992: {
                items: 4,
            }
        }
    });


    $('.hero__categories__all').on('click', function(){
        $('.hero__categories ul').slideToggle(400);
    });

    //  ---------------------------
    //     Product_slider
    //  ---------------------------
    $(".product_slider").owlCarousel({
        loop: false,
        margin: 0,
        items: 5,
        dots: false,
        autoHeight: false,
        responsive: {

            320: {
                items: 1,
            },

            480: {
                items: 2,
            },

            768: {
                items: 2,
            },

            992: {
                items: 5,
            }
        }
    });
    $(".sync1").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: false,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {

            320: {
                items: 1,
            },

            480: {
                items: 1,
            },

            768: {
                items: 1,
            },

            992: {
                items: 1,
            }
        }
    });
    /*--------------------------
        Latest Product Slider
    ----------------------------*/
    $(".latest-product__slider").owlCarousel({
        loop: false,
        margin: 0,
        items: 1,
        dots: false,
        nav: true,
        navText: ["<span class='fa fa-angle-left'><span/>", "<span class='fa fa-angle-right'><span/>"],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true
    });

    /*-----------------------------
        Product Discount Slider
    -------------------------------*/
    $(".product__discount__slider").owlCarousel({
        loop: false,
        margin: 0,
        items: 3,
        dots: true,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {

            320: {
                items: 1,
            },

            480: {
                items: 2,
            },

            768: {
                items: 2,
            },

            992: {
                items: 3,
            }
        }
    });
    /////////////////////////////////////////////////
    $(".product__detail__slider").owlCarousel({
        loop: false,
        margin: 0,
        items: 4,
        dots: true,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {

            320: {
                items: 1,
            },

            480: {
                items: 2,
            },

            768: {
                items: 2,
            },

            992: {
                items: 4,
            }
        }
    });
    //////////////////////////////////////////
    /*---------------------------------
        Product Details Pic Slider
    ----------------------------------*/
    $(".product__details__pic__slider").owlCarousel({
        loop: false,
        margin: 20,
        items: 4,
        dots: true,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true
    });

    /*-----------------------
		Price Range Slider
	------------------------ */
    var rangeSlider = $(".price-range"),
        minamount = $("#minamount"),
        maxamount = $("#maxamount"),
        minPrice = rangeSlider.data('min'),
        maxPrice = rangeSlider.data('max');
    rangeSlider.slider({
        range: true,
        min: minPrice,
        max: maxPrice,
        values: [minPrice, maxPrice],
        slide: function (event, ui) {
            minamount.val('$' + ui.values[0]);
            maxamount.val('$' + ui.values[1]);
        }
    });
    minamount.val('$' + rangeSlider.slider("values", 0));
    maxamount.val('$' + rangeSlider.slider("values", 1));

    /*--------------------------
        Select
    ----------------------------*/
    $("select").niceSelect();

    /*------------------
		Single Product
	--------------------*/
    $('.product__details__pic__slider img').on('click', function () {

        var imgurl = $(this).data('imgbigurl');
        var bigImg = $('.product__details__pic__item--large').attr('src');
        if (imgurl != bigImg) {
            $('.product__details__pic__item--large').attr({
                src: imgurl
            });
        }
    });

    /*-------------------
		Quantity change
	--------------------- */
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });
    /*----------------------------sort---------------------------*/
    const accordions = document.querySelectorAll('.accordion');
    const panels = document.querySelectorAll('.panel');

    // Lặp qua tất cả các cặp và thêm sự kiện click
    accordions.forEach((accordion, index) => {
        accordion.addEventListener('click', function () {
            // Toggle lớp "active" trên thẻ accordion tương ứng
            accordion.classList.toggle('active');

            // Toggle hiển thị/ẩn panel tương ứng dựa trên trạng thái "active" của accordion
            if (accordion.classList.contains('active')) {
                panels[index].style.display = 'block';
            } else {
                panels[index].style.display = 'none';
            }
        });
        if (accordion.classList.contains('active')) {
            panels[index].style.display = 'block';
        }
    });
function updateTotalCart(){
    let total = 0;
    $('#popup-card li.cart-item').each(function(){
        let qty = $(this).find('.quantity').attr('data-quantity');
        qty = parseInt(qty);
        total += qty;
    });
    $('.header-card-number').text(total);
    if($(document).find('#popup-card').text() == ''){
        $('.header-card-number').text(0);
    }
}
updateTotalCart();
    // Lấy tất cả các nút xóa
var removeButtons = document.querySelectorAll('.cart__remove');

// Lặp qua từng nút xóa và thêm sự kiện click
removeButtons.forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của nút
        
        var productId = this.getAttribute('data-id');
        // Tìm phần tử cha (li.cart-item) chứa nút xóa
        var cartItem = event.target.closest('.cart-item');
        // Xóa phần tử cha (li.cart-item) khỏi danh sách giỏ hàng
        if (cartItem) {
            cartItem.remove();
            // Tính lại giá tiền tạm tính sau khi xóa sản phẩm
            calculateTotalPrice();
            updateTotalCart();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : '/delete_from_cart/'+ productId,
                type : 'GET',
                dataType : 'json',
                success : function(result){
                    console.log("===== " + result + " =====");
                },
                error: function(xhr, status, error) {
                    console.error('Lỗi khi xóa sản phẩm:', error);
                }
            });
        }

        // update qty
        // var totalQty = $('.qv-cart-total').data('total-quantity');
        // var itemQty = $(this).closest('.cart-item').find('.quantity').data('quantity');
        // var resultQty = parseInt(totalQty) - parseInt(itemQty);

        
        // $('.header-card-number').text(resultQty);
        // $('.qv-cart-total').attr('data-total-quantity', resultQty);

    });

    

        
});
// Hàm tính lại giá tiền tạm tính
function calculateTotalPrice() {
    var totalPrice = 0;
    var cartItems = document.querySelectorAll('.cart-item');
    cartItems.forEach(function(cartItem) {
        var quantity = cartItem.querySelector('.quantity').textContent.split(': ')[1];
        var price = cartItem.querySelector('.current-price').textContent.split(': ')[1].replace('đ', '');
        totalPrice += quantity * price;
    });
    // Cập nhật giá tiền tạm tính
    var totalPriceElement = document.querySelector('.qv-cart-total span');
    totalPriceElement.textContent = 'Tạm tính: ' + totalPrice + 'đ';
}

$(document).ready(function() {
    // When the search button is clicked
    $('#search').keyup(function() {
        // Get the keyword from the input field
        var keyword = $(this).val();
        var route = $(this).data('route');
        // Make an AJAX request to your server
        console.log(keyword.length);
        if(keyword.length > 2) {
            $.ajax({
                url: route, 
                type: 'GET', 
                data: { keyword: keyword },
                success: function(response) {
                    $('#search_smart').show().html(response);
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        }else if(keyword.length === 0) {
            $('#search_smart').hide();
        }
    });
});
})(jQuery);