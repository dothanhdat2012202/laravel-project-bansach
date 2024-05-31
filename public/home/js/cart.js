// Lấy tham chiếu đến phần tử quickview-cart
var quickviewCart = document.querySelector('.quickview-cart');
// Lấy tham chiếu đến nút mở quickview-cart (fa-shopping-bag)
var openQuickViewCartBtn = document.querySelector('.cart');
// Lấy tham chiếu đến nút đóng quickview-cart (btnCloseQVCart)
var btnCloseQVCart = document.querySelector('.btnCloseQVCart');

// Kiểm tra xem cả ba phần tử có tồn tại không
if (quickviewCart && openQuickViewCartBtn && btnCloseQVCart) {
    // Thêm sự kiện click vào nút mở quickview-cart
    openQuickViewCartBtn.addEventListener('click', function(event) {
        // Ngăn sự kiện click từ việc lan truyền lên các phần tử cha
        event.stopPropagation();
        // Hiển thị phần tử quickview-cart bằng cách đặt style.display thành 'block'
        quickviewCart.style.display = 'block';
    });
    // Thêm sự kiện click vào nút đóng quickview-cart
    btnCloseQVCart.addEventListener('click', function(event) {
        // Ngăn sự kiện click từ việc lan truyền lên các phần tử cha
        event.stopPropagation();
        // Ẩn phần tử quickview-cart bằng cách đặt style.display thành 'none'
        quickviewCart.style.display = 'none';
    });
}