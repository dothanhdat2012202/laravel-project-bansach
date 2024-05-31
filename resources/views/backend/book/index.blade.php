<div class="scrollable_content">
<div class="card">
    <div class="card-body">
      <h4 class="card-title">Danh mục sách</h4>
      <div>
        <span>
        <form action="" onchange="this.submit();">
          <input type="text" name="search" id="search" placeholder="Nhập từ khóa bạn muốn tìm kiếm">
          <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>
        </span>
        <span>
          <a class="btn btn-danger" href="{{route('book.create')}}">Thêm mới 1 sản phẩm</a>
        </span>
      </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th> # </th>
          <th>Ảnh đại diện</th>
          <th width="200"> Tên sách </th>
          <th> Tác giả </th>
          <th> Thể loại </th>
          <th> Bộ sách </th>
          <th> Giá  </th>
          <th> Số trang</th>
          <th> Đinh dạng</th>
          <th> Khuôn khổ</th>
          <th> Khối lượng</th>
          <th> Số lượng</th>
          <th> Sách mới</th>
        </tr>
      </thead>
      <tbody>
          @if(isset($books) && is_object($books))
          @foreach($books as $book)
        <tr>
          <td> {{ $book->id }} </td>
          <td> <img src="{{ asset('home/img/productimage/'. $book->image)}}" style="border-radius:0%!important; width:85px!important; height:auto!important;"></td>
          <td>
              {{ $book->name }}
          </td>
          <td> {{ $book->author }} </td>
          <td>
            @if(isset($book->category_id))
             {{ $book->category->category_name }}
            @else
              {{ 'null' }} 
            @endif
          </td>
          <td>
            @if(isset($book->setofbook_id))
            {{ $book->setofbooks->setofbook_name }}
        @else
            {{ 'null' }}
        @endif
         </td>
          <td> Giá nhập : {{ $book->input_price }}đ<br><br> 
               Giá bán : {{ $book->output_price }}đ<br><br>
               Giảm giá : {{ $book->discount }}%<br><br>
               Giá sau giảm giá : {{ $book->price_sale }}đ</td>
          <td> {{ $book->pages }} </td>
          <td> {{ $book->format }} </td>
          <td> {{ $book->size }} </td>
          <td> {{ $book->weight }} </td>
          <td> {{ $book->quantity }} </td>
          <td>
            @if($book->book_pages == 1)
            <i class="fa fa-check-circle" aria-hidden="true" style="color: green;"></i>
            @else
            <i class="fa fa-times-circle" aria-hidden="true" style="color: red;"></i>
            @endif
          </td>
          <td>
              <a href="{{route('product.detail',$book->id)}}" class="btn btn-light btna"><i class="fa fa-eye"></i></a>
              <a href="{{route('book.edit',$book->id)}}" class="btn btn-success btna"><i class="fa fa-edit"></i></a>
              <a href="javascript:;" data-book-id="{{ $book->id }}" class="showDeleteDialog btn btn-danger btnb"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      @endforeach
      @endif
      </tbody>
    </table>
    @if($books->count() > 15)
    {{ $books->links('pagination::bootstrap-4') }}
    @endif
  </div>
</div>
</div>