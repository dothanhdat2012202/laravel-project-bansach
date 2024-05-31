<div>
    <div class="card">
        <div class="card-body">
                <h4 class="card-title">Đơn hàng #{{$invoice->id}}</h4>
                <a style="float: right;margin-top:-44px;" class="btn" href="javascript:history.back()">Trở lại</a>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <table class="table table-bordered">
                        <tr>
                            <th> Khách hàng </th>
                            <td>{{$invoice->name}}</td>
                        </tr>
                        <tr>
                            <th> Email </th>
                            <td>{{$invoice->email}}</td>
                        </tr>
                        <tr>
                            <th> Số điện thoại </th>
                            <td>{{$invoice->phone_number}}</td>
                        </tr>
                        <tr>
                            <th> Địa chỉ giao hàng  </th>
                            <td>{{$invoice->shipping_address}}</td>
                        <tr>
                    </table>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <table class="table table-bordered">
                        <tr>
                            <th> Code </th>
                            <td>{{$invoice->id}}</td>
                        </tr>
                        <tr>
                            <th> Phương thức thanh toán </th>
                            <td> Tiền mặt </td>
                        </tr>
                        <tr>
                            <th> Trạng thái </th>
                            <td>  @if($invoice->status == 0)
                                Đang xử lí
                                @elseif($invoice->status == 1)
                                Thành công
                                @elseif($invoice->status == 2)
                                Thất bại
                                @endif 
                            </td>
                        </tr>
                        <tr>
                            <th> Thời gian  </th>
                            <td>{{$invoice->orderdate}}</td>
                        <tr>
                        <tr>
                            <th> Ghi chú  </th>
                            <td> abc</td>
                        <tr>
                        <tr>
                            <th> Tổng tiền  </th>
                            <td> {{$invoice->total_amount}}đ</td>
                        <tr>
                        <tr>
                            <th> Coupon  </th>
                            <td> ANnguyenasda</td>
                        <tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Danh sách sản phẩm</h4>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th>Hình ảnh</th>
                  <th> Sản phẩm </th>
                  <th> Giá </th>
                  <th> Số lượng </th>
                  <th> Tạm tính</th>
                </tr>
              </thead>
              <tbody>
                 @if(isset($invoiceDetail) && is_object($invoiceDetail))
                @foreach($invoiceDetail as $invDetail)
                <tr>
                    @foreach($booksInfo as $bookInfo)
                    @if($bookInfo->id == $invDetail->book_id)
                  <td>  
                    {{$bookInfo->id}}
                  </td>
                  <td>
                    <img src="{{ asset('home/img/productimage/'. $bookInfo->image)}}" style="border-radius:0%!important; width:85px!important; height:auto!important;">  
                  </td>
                  <td>
                    {{$bookInfo->name}}
                  </td>
                    @endif
                    @endforeach
                  <td> 
                    {{$invDetail->price}}đ
                  </td>
                  <td>
                    {{$invDetail->quantity}}
                  </td>
                  <td>
                    {{$invDetail->sub_total}}
                  </td>
                </tr>
              @endforeach
              @endif
              </tbody>
            </table>
            
            {{-- {{ $invoices->links('pagination::bootstrap-4') }} --}}
          </div>
        </div>
    </div>
</div>