<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
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
						<a href="javascript:void(0)" class="btn_login_form"  onclick="openLoginModal()">Đăng nhập</a>
						hoặc 
						<a href="javascript:void(0)" class="btn_register_form" data-toggle="modal" data-target="#signupModal">Tạo tài khoản</a>
					</p>
				</div>
                <!-- Form đăng nhập -->
                <form method="POST" action="{{route('client_login')}}">
                    @csrf
                    @method("POST")
                    <!-- Thêm các trường đăng nhập ở đây -->
                    <div class="form-group">
                        <label for="email" class="hidden-lable">Email</label>
                        <input placeholder="Email" type="email" class="form-control" id="email" name="email" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="hidden-lable">Mật khẩu</label>
                        <input type="password" placeholder="Mật khẩu" class="form-control" id="password" autocomplete="off" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%;">Đăng nhập</button>
                    <div id="wrap-social-login-plus">
                        <button class="btn-login-plus btn-google-login" id="btn-google-login-styled" style=" padding: 0px 10px 0px 0px; border: none; color: rgb(255, 255, 255); font-weight: 500; border-radius: 5px; display: block; margin-bottom: 8px; background-color: rgb(221, 75, 57);"><div class="pre-btn-login" style="background-repeat: no-repeat; width: 40px; height: 40px; float: left; border-radius: 5px; background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAMAAACdt4HsAAAAA3NCSVQICAjb4U/gAAAACXBIWXMAAAMKAAADCgGCv3mMAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAAelQTFRF/////wAAzDMz1VUr6EYu20k930o12Uw53k4320043U063ks720w43Ek63k063kw43Us43kw63ks53ko43Ew43Es63Uo53Uo53Us53ks53Us43Us53Us53Uo43Uw63Us53kw53Ew53Us43Us63Uo53Uo53Uw53Uw53Us53Us43Us53Us63Us53Uo53Us63kw53Uw53Us53ks53Us53Us53Us53Us53Us53Us53Us53Us53Us53Us53Us53Uw63Uw73U073k483lA+3lFA3lNC31NC31RD31ZF31hH4FhI4FpJ4FtL4FxM4F1M4F1N4WJS4mNT4mZX4mdX42la42pb42tc421e5HFj5XNl5XRm5nhr5npt5ntu5nxv535x54Bz54J26IN26IN36IZ66Yt/6YyA6Y2B6o2C6o6D6pKH65OI65SK65eM7JmP7JyS7Z+V7aKZ7qOa7qWc7qad7qee7qef8K+m8K+n8LGq8bOr8bau8bav8rix8r2288G788K79MK89MS+9MbA9MfC9cnE9crF9s/K99XR+NjU+NrW+NrX+d3a+d7b+d/b+uTh+ubj+ufl++jm++nn++vp/O3s/O7s/O/t/PHv/fTz/ff2/vf2/vj3/vn5/vv6/vv7/vz8//39//7+////0I4vHAAAAD10Uk5TAAEFBgsVGBsuMjU9QEJGTVJUVVZXWFlaYmNpcH5/gIGKoqOkr7Kztru+wsPIyszO2Nzd3uDj5vL09ff9/v4lm+oAAAK9SURBVFjDvVdpVxMxFJ2RVhSVqohAi1IsILUoZS20jawKKi6474goqIOIqKi4gxs4LlRERRCdX+pk2tKXWTJLzvF+6n3JvT2ZJC/vcZwBXB6fPxAMRyLhYMDv87g4W3AXlkcRgWh5oduqepU3FEM6iO3yZlnR59UgQ9Ru4c3k66oQFbvX09dehkxRsdpYv6YeWUDDWiP9xiZkCc2bdOV8cRxZRHybzrfkS5ENlGodipEtbNesP27PIL5Z9f2bkE00E3vhrke20QDPQxlygJ3g/CJH2LBiUOXMYE96L/OQQ2xN3f8apwa1yfzg1Y50XRkURq52mzp4FYOQKto++HpJwvj78UEX3SCknAFV/ur9IGXw/QbVIIbzZBEZG/opEXjVTnMokg0qiMiwpMIYPT3J+Z/I35f+KKr5p/0nz/Q9XzLTo6iL80DeMafon+1P0kMvxsz2wcP5IL2j6AWj2ScEQThAhnycH9IE1k8Z/p0gj54mQ34uANhBrP9x2I5BgAsCdhkbTCA7BkEuDNgoNriZJk9WoIREUfwqD38SxZdAEuYigE1K4C/EzFmYwTxDRSCJEAZTePiY1kCkGcAl3MfD/QYGRkuAH3EAz76bJoKCd3LoLe0jwm3sxQbTLXDC3s/gPuhuIzxILQvY4Tac0IcjF2gHiTjKj/D0haOZwJF5ObDcSTvKxGXq+YUdEufT/Ows5o+pl4m8zreSuWy8B5Pu0WXMZvdRr7MqoUykdm7uzWQi9fMiPaGoUlrruCoj/R42S2nqpHrtG9R/OWeaVDVpvWNkejGpXnx/vc08res9LG2nhh7eGzjeau1hcf601WUxPq4FjM97Nc9YYOQyljiVjEVWYzZbmRfNYSs0UT5jqVvCWGzv4JnKfVTCMzUc0Xy2lqcxh63pqsxmavuqc5kaz7oC/j+0vuzNt732/x+k+ISHLlgFkwAAAABJRU5ErkJggg==&quot;); background-color: rgb(221, 75, 57); background-size: 40px 40px; background-position-x: 3px;"></div><div class="label-btn-login" style="float: left; line-height: 40px;">Đăng nhập Google</div></button>
                        <button class="btn-login-plus btn-facebook-login" id="btn-facebook-login-styled" style=" padding: 0px 10px 0px 0px; border: none; color: rgb(255, 255, 255); font-weight: 500; border-radius: 5px; display: block; margin-bottom: 8px; background-color: rgb(59, 89, 152);"><div class="pre-btn-login" style="background-repeat: no-repeat; width: 40px; height: 40px; float: left; border-radius: 5px; background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAMAAACdt4HsAAAAA3NCSVQICAjb4U/gAAAACXBIWXMAAAflAAAH5QFPDbM3AAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAAPZQTFRF////VVWqM02ZQFWVOVWXOlqUPFmZPFuXO1iWPFiXO1mZO1iYO1mZO1iYO1mYO1qZO1mYO1iYO1qXO1mYOlmXO1mYO1mYO1mYO1mZO1mXO1mYO1mYO1mYO1mYO1mYPVqZQ2CcRGGdRWGdSmWgTWihTWmiUGujUWujWnOoXXaqZX2uZ36va4KxbIOyeIy4eI24eo65f5K8hZe/iZvBipzCjJ3CjJ7DkKHEkaLFlKXHlaXHmqrKnazLn67No7HPpLLPp7TRqbbSqrfTq7jTrbnUrrrUrrvVucTaztXl0djn1dzp2uDs2+Ds3+Tu8/X5+/z9/Pz9////575kmQAAAB50Uk5TAAMKDBsfPExOYmRocHSKjqSwtr7Ay9XY5ery+Pn+bfME6gAAAflJREFUWMOtl9d2wjAMhk1ZIWRBEkYAd1K66N4bWjrpyPu/TIESDhApVo75L2P0HSxrMoYoqWiGZZc9r2xbhqYkWSyl8sUan1GtmE9RrZd0t8EBNVx9iWCeUCscVUVNiOyzJR6pUjbSPO1woZw0bp+pcoKqGcw+V+ck1XOw90xOlgn4MlHgMVQIE0weS2bo/jym5vyQwfy3fXLbe+k9P3Wv5z058xZp5P32vvxA/dBrTscDEj/nvz4O4M5U/ML29/6UPsPnk6hOwPG/+TMN6AN5EbylCv+BR18A4Oo4/5H8/RYCKv/1QYftNya2H91Op3MF/UYfAVwYsBvYv+PR5I7qXwM+3A8AZzigMayTeeTwIAAcRQR0fgAoygCKg/pfkwHUkkyBvq80m83jAHDaHGodJihMgz5f+iG9wQCNGUTAKwwwmEUEPMAAi9lEwAUMsFmZCDiEAWXmEQE7MMAjA1oYALxCq91u3wSmd+2hlrEr2FwmEgdOtOQAFhxIdIABhzIdoMHJRAco8uksXVDkSxpWVCmAUVHFyjoF4EY1FgpAj2ptBMC4tSHNlQBQI9u7GDBp7/CAIQZko0ccIcARDFkiwMyQBY15AkA9Ixo0BYCccNSNBpjiYXt1a6w12rAtPe7LLxwLWHnkly75tW8Bi6f86ruA5Tve+v8H8zzT+VH/LzgAAAAASUVORK5CYII=&quot;); background-color: rgb(59, 89, 152); background-position: 5px 4px; background-size: 30px 30px;"></div><div class="label-btn-login" style="float: left; line-height: 40px;">Đăng nhập Facebook</div></button>
                        <div id="g_id_onload" data-client_id="" data-context="signin" data-callback="googleLoginOneTap" data-close_on_tap_outside="false"></div>
                    </div>
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