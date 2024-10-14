@extends('layouts.admin')
@section('title')
@endsection
@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">quan li don hang</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h5 class="card-title mb-0">Input Type</h5>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Thông tin tài khoản đặt hàng</th>
                                    <th>Thông tin người nhận hàng</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <ul>
                                                <li>Tên tài khoản: <b>{{$donHang->user->name}}</b></li>
                                                <li>Email: <b>{{$donHang->user->email}}</b></li>
                                                <li>số diện thoại: <b>{{$donHang->user->phone}}</b></li>
                                                <li>Địa chỉ: <b>{{$donHang->user->address}}</b> </li>
                                                <li>Tài khoản: <b>{{$donHang->user->role}}</b></li>
                                            </ul>
                                        </td>
                                        <td>
                                            <li>Tên người nhận: {{$donHang->ten_nguoi_nhan}}</li>
                                            <li>Email: {{$donHang->email_nguoi_nhan}}</li>
                                            <li>Phone: {{$donHang->so_dien_thoai_nguoi_nhan}}</li>
                                            <li>Địa chỉ: {{$donHang->dia_chi_nguoi_nhan}}</li>
                                            <li>Ghi chú: {{$donHang->ghi_chu}}</li>
                                            <li>Trạng thái đơn hàng: {{$trangThaiDonHang[$donHang->trang_thai]}}</li>
                                            <li>trạng thái thanh toán: {{$trangThaiThanhToan[$donHang->trang_thai_thanh_toan]}}</li>
                                            <li>tiền hàng: {{number_format( $donHang->tien_hang)}} đ</li>
                                            <li>tiền ship: {{number_format($donHang->tien_ship)}} đ</li>
                                            <li>tổng tiền: {{number_format($donHang->tong_tien)}} đ</li>
                                        </td>
                                    </tr>
                                </tbody>
                            </Table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h5 class="card-title mb-0">{{ $title }}</h5>
                        </div><!-- end card header -->

                        <div class="card-body">
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
                                            $sanPham = $item->sanPham;
                                        @endphp
                                        <tr>
                                            <td>
                                                <img class="img-fluid" src="{{ Storage::url($sanPham->hinh_anh) }}"
                                                    alt="" width="100px">
                                            </td>
                                            <td>{{ $sanPham->ma_san_pham }}</td>
                                            <td>{{ $sanPham->ten_san_pham }}</td>
                                            <td>{{ $item->don_gia }}</td>
                                            <td>{{ $item->so_luong }}</td>
                                            <td>{{ $item->thanh_tien }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>


        </div> <!-- container-fluid -->
    </div>
@endsection
@section('js')
    <script>
        function showIamge(event) {
            const img_danh_muc = document.getElementById('img_danh_muc');
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function() {
                img_danh_muc.src = reader.result;
                img_danh_muc.style.display = 'block';
            }
            if (file) {
                reader.readAsDataURL(file)
            }
        }
    </script>
@endsection
