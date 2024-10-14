@extends('layouts.client')
@section('css')
@endsection
@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">my order</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="myaccount-content">
                        <h5>Thông tin đơn hàng: <span class="text-danger">{{ $donHang->ma_don_hang }}</span></h5>
                        <div class="welcome">
                            <p>Hello: <strong>{{ $donHang->ten_nguoi_nhan }}</strong></p>
                            <p>Email người nhận: <strong>{{ $donHang->email_nguoi_nhan }}</strong></p>
                            <p>số diện thoại: <strong>{{ $donHang->so_dien_thoai_nguoi_nhan }}</strong></p>
                            <p>địa chỉ: <strong>{{ $donHang->dia_chi_nguoi_nhan }}</strong></p>
                            <p>ngày đặt hàng: <strong>{{ $donHang->created_at->format('d-m-Y') }}</strong></p>
                            <p>ghi chú: <strong>{{ $donHang->ghi_chu }}</strong></p>
                            <p>trạng thái: <strong>{{ $trangThaiDonHang[$donHang->trang_thai] }}</strong></p>
                            <p>trạng thái thanh toán:
                                <strong>{{ $trangThaiThanhToan[$donHang->trang_thai_thanh_toan] }}</strong>
                            </p>
                            <p>tiền hàn: <strong>{{ number_format($donHang->tien_hang) }} đ</strong></p>
                            <p>tiền ship: <strong>{{ number_format($donHang->tien_ship) }} đ</strong></p>
                            <p>tổng tiền: <strong>{{ number_format($donHang->tong_tien) }} đ</strong></p>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="myaccount-content">
                        <h5>Sản phẩm</h5>
                        <div class="myaccount-table table-responsive text-center">
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th>mã sản phẩm</th>
                                        <th>ten sản pham</th>
                                        <th>đơn giá</th>
                                        <th>số lượng</th>
                                        <th>thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donHang->chiTietDonHang as $item)
                                    @php
                                        $sanPham= $item->sanPham;
                                    @endphp
                                        <tr>
                                            <td>
                                                <img class="img-fluid" src="{{Storage::url($sanPham->hinh_anh)}}" alt="" width="100px">
                                            </td>
                                            <td>{{$sanPham->ma_san_pham}}</td>
                                            <td>{{$sanPham->ten_san_pham}}</td>
                                            <td>{{$item->don_gia}}</td>
                                            <td>{{$item->so_luong}}</td>
                                            <td>{{$item->thanh_tien}}</td>                                                                                 
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
