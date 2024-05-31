<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="scrollable_content">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Bộ sách</h4>
          <div>
            <span>
              <input type="text" name="search" id="search" placeholder="Nhập từ khóa bạn muốn tìm kiếm">
              <button class="btn btn-primary">Tìm kiếm</button>
            </span>
            <span>
                <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#addSetOfBookModal">Thêm mới 1 bộ sách</a>
                 @include('backend.setofbook.addsetofbook') 
            </span>
          </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th> # </th>
              <th>Bộ sách</th>
            </tr>
          </thead>
          <tbody>
              @if(isset($sobs) && is_object($sobs))
              @foreach($sobs as $sob)
            <tr>
              <td> {{ $sob->id }} </td>
              
              <td>
                  {{ $sob->setofbook_name }}
              </td>
              <td>
                  <a href="" class="btn btn-success btna edit-category" data-toggle="modal" data-target="#updateSetOfBookModal{{$sob->id}}"><i class="fa fa-edit"></i></a>
                  @include('backend.setofbook.editsetofbook')
                  <a href="javascript:;" data-sob-id="{{ $sob->id }}" class="showDeleteDialogSOB btn btn-danger btnb"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
          @endforeach
          @endif
          </tbody>
        </table>
        
        {{ $sobs->links('pagination::bootstrap-4') }}
      </div>
    </div>
</div>

