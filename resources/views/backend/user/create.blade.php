<h1>Thêm mới thành viên</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@php
    $url =($config['method'] == 'create') ? route('user.store') : route('user.update',$user->id);
@endphp
<form action="{{ $url }}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title mb-15">Thông tin chung</div>
                    <div class="panel-description mb-15">Nhập thông tin chung của người sử dụng</div>
                    <div class="panel-description">Lưu ý:Những trường đánh dấu(*) là bắt buộc</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row ml-15 mt-15">
                                    <label for="" class="control-lable text-left">Email<span class="text-danger">(*)</span></label>
                                    <input type="text" name="email" id="email" class="form-control mb-15 " placeholder="" autocomplete="off" value="{{ old('email',($user->email) ?? '') }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row mt-15">
                                    <label for="" class="control-lable text-left">Họ tên<span class="text-danger">(*)</span></label>
                                    <input type="text" name="fullname" id="fullname" class="form-control mb-15" placeholder="" autocomplete="off" value="{{ old('fullname',($user->fullname) ?? '') }}">
                                </div>
                            </div>
                        </div>
                        @php
                            $userCatalogue = [
                                '[Chọn nhóm thành viên]',
                                'Quản trị viên',
                                'Cộng tác viên'
                            ];
                            // $userCatalogueSelected = (isset($user->user_catalogue_id)) ? $user->user_catalogue_id : $key;
                        @endphp
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row ml-15">
                                    <label for="" class="control-lable text-left">Nhóm thành viên<span class="text-danger">(*)</span></label>
                                    <select name="user_catalogue_id" class="form-control" style="padding: 16px 0px">
                                        @foreach($userCatalogue as $key => $item)
                                        <option {{$key == old('user_catalogue_id',(isset($user->user_catalogue_id))?
                                        $user->user_catalogue_id : '') ? 'selected' : '' }} value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">Ngày sinh</label>
                                    <input type="date" name="birthday" id="birthday" class="form-control mb-15" placeholder="" autocomplete="off" value="{{ old('birthday',(!empty($user->birthday)) ? date ('Y-m-d',strtotime($user->birthday)) : '') }}">
                                    
                                </div>
                            </div>
                        </div>
                        @if($config['method'] == 'create')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row ml-15">
                                    <label for="" class="control-lable text-left">Mật khẩu<span class="text-danger">(*)</span></label>
                                    <input type="password" name="password" id="password" class="form-control mb-15" placeholder="">

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">Nhập lại mật khẩu<span class="text-danger">(*)</span></label>
                                    <input type="password" name="re-password" id="re-password" class="form-control mb-15" placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-row ml-15">
                                    <label for="" class="control-lable text-left">Ảnh đại diện</label>
                                    <input type="text" name="avatar" id="avatar" class="form-control mb-15 input-img" placeholder="" value="{{ old('avatar',($user->image) ?? '') }}" data-upload="Images">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title mb-15">Thông tin liên hệ</div>
                    <div class="panel-description mb-15">Nhập thông tin liên hệ của người sử dụng</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row ml-15 mb-15">
                                    <label for="" class="control-lable text-left">Thành phố</label>
                                    <select name="province_id" class="form-control setupSelect2 province" style="padding: 16px 0px">
                                        <option value="0">[Thành Phố]</option>
                                        @if(isset($provinces))
                                            @foreach($provinces as $province)
                                                <option value="{{ $province->code }}">{{ $province->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row mb-15">
                                    <label for="" class="control-lable text-left">Quận huyện</label>
                                    <select name="district_id" class="form-control setupSelect2 districts" style="padding: 16px 0px">
                                        <option value="0">[Chọn quận huyện]</option>
                                        @if(isset($districts))
                                        @foreach($districts as $district)
                                            <option value="{{ $district->code }}">{{ $district->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row mb-15 ml-15">
                                    <label for="" class="control-lable text-left">Phường/Xã</label>
                                    <select name="ward_id" class="form-control setupSelect2" style="padding: 16px 0px">
                                        <option value="0">[Chọn phường/xã]</option>
                                        @if(isset($wards))
                                        @foreach($wards as $ward)
                                            <option value="{{ $ward->code }}">{{ $ward->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">Địa chỉ</label>
                                    <input type="text" name="address" id="address" class="form-control mb-15" placeholder="" autocomplete="off" value="{{ old('address',($user->address) ?? '') }}"> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row ml-15">
                                    <label for="" class="control-lable text-left">Số điện thoại</label>
                                    <input type="text" name="phone" id="phone" class="form-control mb-15" placeholder="" value="{{ old('phone',($user->phone) ?? '') }}">

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">Ghi chú</label>
                                    <input type="text" name="description" id="description" class="form-control mb-15" placeholder="" autocomplete="off" value="{{ old('description',($user->description) ?? '') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right">
        <button class="btn btn-primary" type="submit" name="send" id="send">Lưu lại</button>
    </div>
</form>