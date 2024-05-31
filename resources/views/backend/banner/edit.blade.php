<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
        <h4 class="card-title">Sửa banner</h4>
        <p class="card-description"> Thông tin banner #{{$idbe->id}} </p>
        <form action="{{ route('banner.update',$idbe->id) }}" method="post" id="form" class="forms-sample" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Chọn ảnh banner</label>
            <input type="file" class="form-control" onchange="readURL(this);" id="image" name="image" />
            <img id="image-preview" src="{{asset('home/img/banner/'.$idbe->image)}}" style="width:300px;max-height:200px;">
            <script>
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
            
                        reader.onload = function (e) {
                            $('#image-preview')
                                .attr('src', e.target.result)
                                .css('max-width', '100%')
                                .css('max-height', '300px');
                        };
            
                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>
        </div>
          <div class="form-group">
            <label for="image_link">Link banner</label>
            <input type="text" class="form-control" id="image_link" name="image_link" value="{{$idbe->image_link}}">
          </div>
          <div class="form-group">
            <label for="expired">Ngày hết hạn</label>
            <input type="datetime-local" class="form-control" id="expired" name="expired" value="{{$idbe->expired}}">
          </div>
          <div class="form-group">
            <label for="is_active">Trạng thái</label>
            <select class="form-control" id="is_active" name="is_active">
                <option value="1" {{ $idbe->is_active == 1 ? 'selected' : '' }}>Khả dụng</option>
                <option value="0" {{ $idbe->is_active == 0 ? 'selected' : '' }}>Không khả dụng</option>
            </select>
          </div>
          <div class="form-group">
            <label for="book_id">Id của sách</label>
            <input type="number" class="form-control" id="book_id" name="book_id" value="{{$idbe->book_id}}">
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
<script>
    // Lắng nghe sự kiện khi giá trị của book_id thay đổi
    document.getElementById('book_id').addEventListener('input', function() {
        // Lấy giá trị của book_id
        var bookId = this.value;
        
        // Tạo link dựa trên giá trị bookId và đặt nó vào trường banner_link
        document.getElementById('image_link').value = "http://127.0.0.1:8000/product/" + bookId;
    });
</script>