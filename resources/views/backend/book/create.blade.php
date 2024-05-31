@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Thêm sản phẩm</h4>
        <p class="card-description"> Nhập thông tin sản phẩm </p>
        <form action="{{ route('book.store') }}" method="post" id="form" class="forms-sample" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            {{-- <input type="hidden" class="bookid" name="bookid" id="bookid" value=""> --}}
            <label for="name">Tên sách</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên sách">
          </div>
          <div class="form-group">
            <label for="author">Tác giả</label>
            <input type="text" class="form-control" id="author" name="author" placeholder="Nhập tên tác giả">
          </div>
          <div class="form-group">
            <label for="category_id">Thể loại</label>
            <select class="form-control" id="category_id" name="category_id">
              @if(isset($categorys))
                  @foreach($categorys as $category)
                      <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                  @endforeach
              @endif
            </select>
          </div>
          <div class="form-group">
            <label for="setofbook_id">Bộ sách</label>
            <select class="form-control" id="setofbook_id" name="setofbook_id">
              @if(isset($sobs))
                  @foreach($sobs as $sob)
                      <option value="{{ $sob->id }}">{{ $sob->setofbook_name }}</option>
                  @endforeach
              @endif
            </select>
          </div>
          <div class="form-group">
            <label for="input_price">Giá nhập</label>
            <input type="text" class="form-control" id="input_price" name="input_price" placeholder="Giá nhâp">
          </div>
          <div class="form-group">
            <label for="output_price">Giá bán</label>
            <input type="text" class="form-control" id="output_price" name="output_price" placeholder="Giá bán">
          </div>
          <div class="form-group">
            <label for="discount">Giảm giá</label>
            <input type="text" class="form-control" id="discount" name="discount" placeholder="Giảm giá">
          </div>
          <div class="form-group">
            <label for="quantity">Số lượng</label>
            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Nhập số lượng">
          </div>
          <div class="form-group">
            <label for="book_pages">Trạng thái</label>
            <select class="form-control" id="book_pages" name="book_pages">
                <option value="1" >Khả dụng</option>
                <option value="0" >Không khả dụng</option>
            </select>
          </div>
          <div class="form-group">
            <label for="weight">Khối lượng</label>
            <input type="text" class="form-control" id="weight" name="weight" placeholder="Nhập khối lương">
          </div>
          <div class="form-group">
            <label for="image">Ảnh đại diện sản phẩm</label>
            <input type="file" class="form-control" id="image" name="image" />
            <img id="preview" style="display:none;width:200px;max-height:200px;">
            <script>
            document.getElementById("image").addEventListener("change", function() {
                let preview = document.getElementById("preview");
                let file = this.files[0];
                let reader = new FileReader();
                reader.onloadend = function() {
                    preview.src = reader.result;
                    preview.style.display = "block";
                }
                if (file) {
                    reader.readAsDataURL(file);
                } else {
                    preview.src = "";
                }
            });
            </script>
        </div>
          <div class="form-group">
            <label>Hình ảnh khác</label>
            {{-- <input type="file" name="thumb_image" class="file-upload-default"> --}}
            <div class="input-group col-xs-12 field">
              <input type="file" class="form-control file-upload-info" id="files" name="files[]" multiple />
            </div>
          </div>
          <div class="form-group">
            <label for="pages">Số trang</label>
            <input type="number" class="form-control" id="pages" name="pages" placeholder="Nhập số trang">
          </div>
          <div class="form-group">
            <label for="size">Khuôn khổ</label>
            <input type="text" class="form-control" id="size" name="size" placeholder="**x** cm/mm">
          </div>
          <div class="form-group">
            <label for="format">Định dạng</label>
            <input type="text" class="form-control" id="format" name="format" placeholder="bìa mềm/bìa cứng">
          </div>
          <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
          </div>
          <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
<script>

    $(function(){
    var ul = $('#upload ul');
    
    $('#drop a').click(function(){
        // Simulate a click on the file input button
        // to show the file browser dialog
        $(this).parent().find('input').click();
    });
    
    // Initialize the jQuery File Upload plugin
    $('#upload').fileupload({
    
        // This element will accept file drag/drop uploading
        dropZone: $('#drop'),
    
        // This function is called when a file is added to the queue;
        // either via the browse button, or via drag/drop:
        add: function (e, data) {
    
            var tpl = $('<li class="working"><input type="text" value="0" data-width="48" data-height="48"'+
                ' data-fgColor="#0788a5" data-readOnly="1" data-bgColor="#3e4043" /><p></p><span></span></li>');
    
            // Append the file name and file size
            tpl.find('p').text(data.files[0].name)
                         .append('<i>' + formatFileSize(data.files[0].size) + '</i>');
    
            // Add the HTML to the UL element
            data.context = tpl.appendTo(ul);
    
            // Initialize the knob plugin
            tpl.find('input').knob();
    
            // Listen for clicks on the cancel icon
            tpl.find('span').click(function(){
    
                if(tpl.hasClass('working')){
                    jqXHR.abort();
                }
    
                tpl.fadeOut(function(){
                    tpl.remove();
                });
    
            });
    
            // Automatically upload the file once it is added to the queue
            var jqXHR = data.submit();
        },
    
        progress: function(e, data){
    
            // Calculate the completion percentage of the upload
            var progress = parseInt(data.loaded / data.total * 100, 10);
    
            // Update the hidden input field and trigger a change
            // so that the jQuery knob plugin knows to update the dial
            data.context.find('input').val(progress).change();
    
            if(progress == 100){
                data.context.removeClass('working');
            }
        },
    
        fail:function(e, data){
            // Something has gone wrong!
            data.context.addClass('error');
        }
    
    });
    
    
    // Prevent the default action when a file is dropped on the window
    $(document).on('drop dragover', function (e) {
        e.preventDefault();
    });
    
    // Helper function that formats the file sizes
    function formatFileSize(bytes) {
        if (typeof bytes !== 'number') {
            return '';
        }
    
        if (bytes >= 1000000000) {
            return (bytes / 1000000000).toFixed(2) + ' GB';
        }
    
        if (bytes >= 1000000) {
            return (bytes / 1000000).toFixed(2) + ' MB';
        }
    
        return (bytes / 1000).toFixed(2) + ' KB';
    }
    
    });
    </script>