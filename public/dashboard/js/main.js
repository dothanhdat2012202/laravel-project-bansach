const deleteButtons = document.querySelectorAll('.showDeleteDialog');
deleteButtons.forEach(button => {
  button.addEventListener('click', function() {
    const productId = this.getAttribute('data-book-id');
    Swal.fire({
      title: 'Bạn có chắc muốn xóa không?',
      text: "Bạn sẽ không thể khôi phục trở lại!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Hủy bỏ',
      confirmButtonText: 'Có, tôi muốn xóa nó!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
            method: 'DELETE',
            url:'/book/destroy/'+productId,
            dataType:'json',
            data: {
              _token: $('meta[name="csrf-token"]').attr('content'),
              _method: 'DELETE'
          },
            success:function(response)
            {
                Swal.fire(
                    'Xóa thành công!',
                    'Sản phẩm đã bị xóa.',
                    'success'
                  );
                  setTimeout(function() { 
                    window.location.reload();
                  }, 2000);
            },
            error:function()
            {
                Swal.fire(
                    'Lỗi!',
                    'Đã xảy ra lỗi khi xóa',
                    'error'
                );
            }
        });
      }
    });
  });
});
/////////////////////////////////////xóa banner/////////////////////////////////
const deleteBannerButtons = document.querySelectorAll('.showDeleteDialogBanner');
deleteBannerButtons.forEach(button => {
  button.addEventListener('click', function() {
    const bannerId = this.getAttribute('data-banner-id');
    Swal.fire({
      title: 'Bạn có chắc muốn xóa không?',
      text: "Bạn sẽ không thể khôi phục trở lại!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Hủy bỏ',
      confirmButtonText: 'Có, tôi muốn xóa nó!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
            method: 'DELETE',
            url:'/banner/destroy/'+bannerId,
            dataType:'json',
            data: {
              _token: $('meta[name="csrf-token"]').attr('content'),
              _method: 'DELETE'
          },
            success:function(response)
            {
                Swal.fire(
                    'Xóa thành công!',
                    'Sản phẩm đã bị xóa.',
                    'success'
                  );
                  setTimeout(function() { 
                    window.location.reload();
                  }, 2000);
            },
            error:function()
            {
                Swal.fire(
                    'Lỗi!',
                    'Đã xảy ra lỗi khi xóa',
                    'error'
                );
            }
        });
      }
    });
  });
});
////////////////////xóa thumb////////////////////////////////////////////
const removeThumbImageButtons = document.querySelectorAll('.remove');

removeThumbImageButtons.forEach(removeButton => {
    removeButton.addEventListener('click', function() {
        const thumbId = this.getAttribute('data-thumb-id');
        const $this = jQuery(this);
        $.ajax({
          url: '/book/deleteImage/'+thumbId,
          type: 'DELETE',
          dataType:'json',
          data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            _method: 'DELETE'
          },
          success: function(response) {
            $this.parent().remove();
            console.log('ok');
          },
          error: function(error) {
              console.log('Error:', error);
          }
      });

        // // Thiết lập hàm xử lý khi yêu cầu hoàn thành
        // xhr.onload = function() {
        //     if (xhr.status === 200) {
        //         // Xóa phần tử div chứa ảnh sau khi xóa thành công
        //         const imageDiv = removeButton.parentElement;
        //         imageDiv.remove();
        //     }
        // };

        // // Gửi dữ liệu (có thể chứa id của ảnh) nếu cần thiết
        // const data = new FormData();
        // data.append('thumbId', thumbId);

        // // Gửi yêu cầu
        // xhr.send(data);
    });
});
//////////////////////xóa category//////////////////////////////////////////////
const deleteCategoryButtons = document.querySelectorAll('.showDeleteDialogCategory');
deleteCategoryButtons.forEach(button => {
  button.addEventListener('click', function() {
    const categoryId = this.getAttribute('data-category-id');
    Swal.fire({
      title: 'Bạn có chắc muốn xóa không?',
      text: "Bạn sẽ không thể khôi phục trở lại!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Hủy bỏ',
      confirmButtonText: 'Có, tôi muốn xóa nó!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
            method: 'DELETE',
            url:'/category/destroy/'+categoryId,
            dataType:'json',
            data: {
              _token: $('meta[name="csrf-token"]').attr('content'),
              _method: 'DELETE'
          },
            success:function(response)
            {
                Swal.fire(
                    'Xóa thành công!',
                    'Sản phẩm đã bị xóa.',
                    'success'
                  );
                  setTimeout(function() { 
                    window.location.reload();
                  }, 2000);
            },
            error:function()
            {
                Swal.fire(
                    'Lỗi!',
                    'Đã xảy ra lỗi khi xóa',
                    'error'
                );
            }
        });
      }
    });
  });
});
//////////////////////xóa sob//////////////////////////////////////////////
const deleteSOBButtons = document.querySelectorAll('.showDeleteDialogSOB');
deleteSOBButtons.forEach(button => {
  button.addEventListener('click', function() {
    const sobId = this.getAttribute('data-sob-id');
    Swal.fire({
      title: 'Bạn có chắc muốn xóa không?',
      text: "Bạn sẽ không thể khôi phục trở lại!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Hủy bỏ',
      confirmButtonText: 'Có, tôi muốn xóa nó!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
            method: 'DELETE',
            url:'/setofbook/destroy/'+sobId,
            dataType:'json',
            data: {
              _token: $('meta[name="csrf-token"]').attr('content'),
              _method: 'DELETE'
          },
            success:function(response)
            {
                Swal.fire(
                    'Xóa thành công!',
                    'Sản phẩm đã bị xóa.',
                    'success'
                  );
                  setTimeout(function() { 
                    window.location.reload();
                  }, 2000);
            },
            error:function()
            {
                Swal.fire(
                    'Lỗi!',
                    'Đã xảy ra lỗi khi xóa',
                    'error'
                );
            }
        });
      }
    });
  });
});
  
  
  
  