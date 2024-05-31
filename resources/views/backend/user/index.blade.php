
<div class="card">
      <div class="card-body">
        <h4 class="card-title">Bảng thành viên</h4>
        <div>
          <span>
            <input type="text" name="search" id="search" placeholder="Nhập từ khóa bạn muốn tìm kiếm">
            <button class="btn btn-primary">Tìm kiếm</button>
          </span>
          <span>
            <a class="btn btn-danger" href="{{ route('user.create') }}">Thêm mới 1 thành viên</a>
          </span>
        </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th> # </th>
            <th> Họ tên </th>
            <th> Email </th>
            <th> Số điện thoại </th>
            <th> Địa chỉ </th>
            <th> Tình trạng </th>
            <th> Thao tác </th>
          </tr>
        </thead>
        <tbody>
            @if(isset($users) && is_object($users))
            @foreach($users as $user)
          <tr>
            <td> {{ $user->id }} </td>
            <td> {{ $user->fullname }} </td>
            <td>
                {{ $user->email }}
            </td>
            <td> {{ $user->phone }} </td>
            <td> {{ $user->address }} </td>
            <td>
                <input type="checkbox" checked/>
            </td>
            <td>
                <a href="{{ route('user.edit',$user->id) }}" class="btn btn-success btna"><i class="fa fa-edit"></i></a>
                <a href="{{ route('user.delete',$user->id) }}" class="btn btn-danger btnb"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
        @endforeach
        @endif
        </tbody>
      </table>
      {{ $users->links('pagination::bootstrap-4') }}
    </div>
  </div>