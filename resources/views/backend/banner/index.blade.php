<div class="scrollable_content">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Danh mục banner</h4>
          <div>
            <span>
              <input type="text" name="search" id="search" placeholder="Nhập từ khóa bạn muốn tìm kiếm">
              <button class="btn btn-primary">Tìm kiếm</button>
            </span>
            <span>
              <a class="btn btn-danger" href="{{route('banner.create')}}">Thêm mới 1 banner</a>
            </span>
          </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th> # </th>
              <th>Ảnh banner</th>
              <th> Link banner </th>
              <th> Hết hạn </th>
              <th> Trạng thái </th>
              <th> Mã sách  </th>
            </tr>
          </thead>
          <tbody>
              @if(isset($banners) && is_object($banners))
              @foreach($banners as $banner)
            <tr>
              <td> {{ $banner->id }} </td>
              <td> <img src="{{ asset('home/img/banner/'. $banner->image)}}" style="border-radius:0%!important; width:300px!important; height:auto!important;"></td>
              <td>
                  {{ $banner->image_link }}
              </td>
              <td> {{ $banner->expired }} </td>
              <td>
                @if($banner->is_active == 1)
                <i class="fa fa-check-circle" aria-hidden="true" style="color: green;"></i>
                @else
                <i class="fa fa-times-circle" aria-hidden="true" style="color: red;"></i>
                @endif
              </td>
              <td> {{ $banner->book_id }} </td>
              <td>
                  <a href="#" class="btn btn-light btna"><i class="fa fa-eye"></i></a>
                  <a href="{{route('banner.edit',$banner->id)}}" class="btn btn-success btna"><i class="fa fa-edit"></i></a>
                  <a href="javascript:;" data-banner-id="{{ $banner->id }}" class="showDeleteDialogBanner btn btn-danger btnb"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
          @endforeach
          @endif
          </tbody>
        </table>
        
        {{ $banners->links('pagination::bootstrap-4') }}
      </div>
    </div>
</div>
