<h1>Thêm mới thành viên</h1>
<form action="{{ route('user.destroy',$user->id) }}" method="post" class="box">
    @csrf
    @method('delete')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title mb-15">Thông tin chung</div>
                    <div class="panel-description mb-15">Bạn đang muốn xóa người dùng có email là : {{ $user->email }} </div>
                    <div class="panel-description">Lưu ý:Không thể khôi phục thành viên sau khi xóa.Hãy chắc chắn bạn muốn thực hiện chức năng này</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row ml-15 mt-15">
                                    <label for="" class="control-lable text-left">Email<span class="text-danger">(*)</span></label>
                                    <input type="text" name="email" id="email" class="form-control mb-15 " placeholder="" autocomplete="off" value="{{ old('email',($user->email) ?? '') }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row mt-15">
                                    <label for="" class="control-lable text-left">Họ tên<span class="text-danger">(*)</span></label>
                                    <input type="text" name="fullname" id="fullname" class="form-control mb-15" placeholder="" autocomplete="off" value="{{ old('fullname',($user->fullname) ?? '') }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right">
        <button class="btn btn-primary" type="submit" name="send" id="send">Xác nhận xóa</button>
    </div>
</form>