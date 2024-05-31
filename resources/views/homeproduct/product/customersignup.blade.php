<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="heading">
					<h4>Xin chào,</h4>
					<p>
						<a href="javascript:void(0)" class="btn_login_form">Đăng nhập</a>
						hoặc 
						<a href="javascript:void(0)" class="btn_register_form">Tạo tài khoản</a>
					</p>
				</div>
                <!-- Form đăng nhập -->
                <form method="POST" action="{{route('client_signup')}}">
                    @csrf
                    <!-- Thêm các trường đăng nhập ở đây -->
                    <div class="form-group">
                        <label for="name" class="hidden-lable">Họ tên</label>
                        <input placeholder="Họ tên" type="text" class="form-control" id="fullname" name="fullname" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="hidden-lable">Số điện thoại</label>
                        <input placeholder="Số điện thoại" type="text" class="form-control" id="phone" name="phone" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="hidden-lable">Email</label>
                        <input placeholder="Email" type="email" class="form-control" id="email" name="email" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="hidden-lable">Mật khẩu</label>
                        <input type="password" placeholder="Mật khẩu" class="form-control" id="password" autocomplete="off" name="password" required>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="gender" value="Nam" checked>Nam
                        </label>
                        <label>
                            <input type="radio" name="gender" value="Nữ">Nữ
                        </label>                    
                    </div>
                    <div class="form-group">
                        <label for="birthday" style="margin-bottom:0px;">Ngày sinh</label>
                        <input type="date" placeholder="dd/mm/YYYY" class="form-control" id="birthday" name="birthday" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label style="display: inline-flex;">
                        <input type="checkbox" class="form-control" name="customer[accepts_marketing]" style="margin-top: 5px;width: 13px;height: 13px;">
                        Nhận thông tin và chương trình khuyến mãi của NXB BA qua Email
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%;">Đăng ký</button>
                </form>
                <div class="logo-section">
                    <div class="image_login">
                        <img src="../home/img/pngegg.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script>
    function openLoginModal() {
    const loginModal = document.getElementById('loginModal'); 
    const registerModal = document.getElementById('signupModal'); 
    loginModal.style.display = 'block'; // Hiển thị modal đăng nhập
    registerModal.style.display = 'none'; // Đóng modal đăng ký
    }
    function openRegisterModal() {
    const loginModal = document.getElementById('loginModal'); 
    const registerModal = document.getElementById('signupModal'); 
    loginModal.style.display = 'none'; // Đóng modal đăng nhập
    registerModal.style.display = 'block'; // Hiển thị modal đăng ký
    }
</script> --}}