<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="heading">
					<h2>Thêm thể loại</h2>
				</div>
                <form id="addCategoryForm" method="POST" action="{{route('category.store')}}">
                    @csrf
                    <input type="text" class="category_name" name="category_name" placeholder="Tên thể loại">
                    <button type="submit">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Xử lý khi form được gửi
        $("#addCategoryForm").submit(function(event) {
          event.preventDefault();
          $.ajax({
              url: '/category/store',
              type: 'POST',
              dataType:'json',
              data: $('#addCategoryForm').serialize(),
              success: function(response) {
                setTimeout(function() { 
                    window.location.reload();
                  }, 500);
              },
              error: function(error) {
                  console.log('Error:', error);
              }
          });
          $("#addCategoryModal").hide();
        });
      });
    </script>
