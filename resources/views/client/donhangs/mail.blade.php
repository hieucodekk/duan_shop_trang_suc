@component('mail::message')
    # Xác nhận đơn hàng

    Xin chào {{$donHang->ten_nguoi_nhan}} ,

    Cảm ơn bạn đã đặt hàng từ cửa hàng chúng tôi:

    *** Mã đơn hàng ** {{$donHang->ma_don_hang}}

    *** Sản phẩm đã đặt ** 
    @foreach ($donHang->chiTietDonHang as $chiTiet)
        - {{$chiTiet->sanPham->ten_san_pham}} x {{$chiTiet->so_luong }}: {{number_format($chiTiet->thanh_tien)}} VND
    @endforeach

    *** Tổng tiền ** {{number_format($donHang->tong_tien)}} VND

    Chúng tôi sẽ liên hệ với bạn sớm nhất thông tin giao hàng.

    Trân trọng.
@endcomponent