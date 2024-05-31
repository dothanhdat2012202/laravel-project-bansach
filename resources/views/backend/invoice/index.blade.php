
<div class="scrollable_content">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Đơn đặt hàng</h4>
          <div>
            <span>
              <input type="text" name="search" id="search" placeholder="Nhập từ khóa bạn muốn tìm kiếm">
              <button class="btn btn-primary">Tìm kiếm</button>
            </span>
          </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th> # </th>
              <th>Ngày đặt</th>
              <th> Tình trạng thanh toán </th>
              <th> Tổng tiền </th>
              <th> Địa chỉ giao hàng  </th>
              <th> Phương thức thanh toán</th>
              <th> Mã giảm giá</th>
            </tr>
          </thead>
          <tbody>
              @if(isset($invoices) && is_object($invoices))
              @foreach($invoices as $invoice)
            <tr>
              <td> {{ $invoice->id }} </td>
              <td>
                  {{ $invoice->orderdate }}
              </td>
              <td> 
                    @if($invoice->status == 0)
                    Đang xử lí
                    @elseif($invoice->status == 1)
                    Thành công
                    @elseif($invoice->status == 2)
                    Thất bại
                    @endif
              </td>
              <td>
                {{$invoice->total_amount}}
              </td>
              <td>
                {{$invoice->shipping_address}}
              </td>
              <td>
                {{$invoice->payment_method}}
              </td>
              <td>
                {{$invoice->coupon}}
              </td>
              <td>
                  <a href="{{route('getInvoiceDetail',$invoice->id)}}" class="btn btn-light btna" data-invoice-id="{{$invoice->id}}"><i class="fa fa-eye"></i></a>
                  <a href="#" class="btn btn-success btna"><i class="fa fa-edit"></i></a>
                  {{-- <a href="javascript:;" data-book-id="{{ $$invoice->id }}" class="showDeleteDialog btn btn-danger btnb"><i class="fa fa-trash"></i></a> --}}
                  <a href="#" class="showDeleteDialog btn btn-danger btnb"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
          @endforeach
          @endif
          </tbody>
        </table>
        
        {{ $invoices->links('pagination::bootstrap-4') }}
      </div>
    </div>
</div>
    {{-- <script>
    $(document).ready(function () {
        $('.btn-info').click(function(e) {
            e.preventDefault();
            var button = $(this); 
            //var modal = $('#invoiceDetailModal'); 
            var invoiceId = button.data('invoice-id'); 
            $.ajax({
                url: 'http://127.0.0.1:8000/invoice/get_invoice_detail/' + invoiceId,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#invoiceDetailModal .modal-body #bookid').text(123);
                    $('#invoiceDetailModal .modal-body #bookname').text(data.name);
                    console.log(data.id,data.name);
                    $('#invoiceDetailModal .modal-body #quantity').text(data.quantity);
                    $('#invoiceDetailModal .modal-body #price').text(data.price);
                    $('#invoiceDetailModal .modal-body #subtotal').text(data.sub_total);
                    $('#invoiceDetailModal .modal-body #customername').text(data.name);
                    $('#invoiceDetailModal .modal-body #customeremail').text(data.email);
                    $('#invoiceDetailModal .modal-body #customerphone').text(data.phone);
                    $("#invoiceDetailModal").modal("show");
                },
                error: function () {
                    alert("Có lỗi xảy ra khi lấy dữ liệu đơn hàng.");
                }
            });
        });
    });
    </script> --}}