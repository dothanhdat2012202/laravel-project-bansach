<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="scrollable_content">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Thể loại</h4>
          <div>
            <span>
              <input type="text" name="search" id="search" placeholder="Nhập từ khóa bạn muốn tìm kiếm">
              <button class="btn btn-primary">Tìm kiếm</button>
            </span>
            <span>
                <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#addCategoryModal">Thêm mới 1 sản phẩm</a>
                @include('backend.category.addcategory')
            </span>
          </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th> # </th>
              <th>Thể loại</th>
            </tr>
          </thead>
          <tbody>
              @if(isset($css) && is_object($css))
              @foreach($css as $cs)
            <tr>
              <input type="hidden" name="getid" value="{{$cs->id}}">
              <td> {{ $cs->id }} </td>
              
              <td>
                  {{ $cs->category_name }}
              </td>
              <td>
                  <a href="" class="btn btn-success btna edit-category" data-toggle="modal" data-target="#updateCategoryModal{{$cs->id}}"><i class="fa fa-edit"></i></a>
                  @include('backend.category.editcategory')
                  <a href="javascript:;" data-category-id="{{ $cs->id }}" class="showDeleteDialogCategory btn btn-danger btnb"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
          @endforeach
          @endif
          </tbody>
        </table>
        
        {{ $css->links('pagination::bootstrap-4') }}
      </div>
    </div>
</div>
{{-- <script>
  $(document).ready(function() {
    var categoryId = 0;
      $('.edit-category').click(function() {
        var name = $(this).data('name');
        categoryId = $(this).data('category-id');
        $('#updateCategoryForm .category_name').val(name);
        $('#updateCategoryModal').modal('show');
        $('#updateCategoryForm').attr('action', $('#updateCategoryForm').attr('action') + '/'+ categoryId);
        
  });

  $(document).submit('#updateCategoryForm', function(e){
    e.preventDefault();

    $.ajax({
          url: $('#updateCategoryForm').attr('action'),
          type: 'POST',
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          dataType: 'json',
          data: $('#updateCategoryForm').serialize(),
          success: function(response) {
              console.log(response);
              $('.category_name').val(response.category_name);
              $('#updateCategoryModal').modal('show');
          },
          error: function(error) {
              console.log('Error:', error);
          }
          });
      });
  });
</script> --}}

