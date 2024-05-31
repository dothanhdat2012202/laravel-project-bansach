@extends('homeproduct.index')
@section('orderoverview')
<div id="PageContainer" class="">		
<main class="main-content" role="main">
    <section id="page-wrapper">
    <div class="wrapper">
        <div class="inner">
            <h1>TÀI KHOẢN CỦA BẠN</h1>
            <hr class="hr--small">
            <div class="grid">
                <div class="grid__item two-thirds medium-down--one-whole">
                    <h2 class="h4">Lịch sử giao dịch</h2>
                    <div class="table-wrap">
                        <table class="full">
                            <thead>
                                <tr>
                                    <th>Đơn hàng</th>
                                    <th>Ngày</th>
                                    <th>Tình trạng thanh toán</th>
                                    <th>Tổng</th>
                                    <th>Địa chỉ</th>
                                </tr>
                            </thead>
                            <tbody class="full-2">
                                @foreach($orders as $order)
                                <tr>
                                    <td><a href="/account/orders/61b13b2956ce4d02ab850e15cbadd1ac" title="" previewlistener="true">{{$order->id}}</a></td>
                                    <td>{{$order->orderdate}}</td>
                                    <td> @if ($order->status == 0)
                                        Đang xử lí
                                    @elseif ($order->status == 1)
                                        Thanh toán thành công
                                    @elseif ($order->status == 2)
                                        Thanh toán thất bại
                                    @else
                                        Không xác định
                                    @endif</td>
                                    <td>{{$order->total_amount}}</td>
                                    <td>{{$order->shipping_address}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="grid__item one-third medium-down--one-whole" style="padding:30px;">
                    <h2 class="h4">Thông tin tài khoản</h2>
                    <h3 class="h5">{{$user->fullname}}</h3>
                </div>
            </div>
        </div>
    </div>
    </section>
</main>
</div>
@endsection