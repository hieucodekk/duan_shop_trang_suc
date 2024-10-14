@extends('layouts.client')
@section('css')
    <style>
        .tab-one {
            img {
                max-width: 250px;
            }
        }
    </style>
@endsection
@section('content')
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Đặt Hàng</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- checkout main wrapper start -->
    <div class="checkout-page-wrapper section-padding">
        <div class="container">
            <form action="{{ route('donhangs.store') }}" method="POST">
                @csrf
                <div class="row">
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h5 class="checkout-title">Billing Details</h5>
                            <div class="billing-form-wrap">

                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="single-input-item">
                                    <label for="name" class="required">ten nguoi nhan</label>
                                    <input type="text" id="name" name="ten_nguoi_nhan"
                                        value="{{ Auth::user()->name }}">
                                    @error('ten_nguoi_nhan')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="single-input-item">
                                    <label for="email" class="required">Email </label>
                                    <input type="email" id="email" placeholder="email_nguoi_nhan" name="email_nguoi_nhan"
                                        value="{{ Auth::user()->email }}">
                                    @error('email_nguoi_nhan')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="single-input-item">
                                    <label for="email" class="required">phone</label>
                                    <input type="number" id="email" placeholder="email" name="so_dien_thoai_nguoi_nhan"
                                        value="{{ Auth::user()->phone }}">
                                    @error('so_dien_thoai_nguoi_nhan')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="single-input-item">
                                    <label for="dia_chi_nguoi_nhan" class="required">address</label>
                                    <input type="text" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan"
                                        value="{{ Auth::user()->address }}">
                                    @error('dia_chi_nguoi_nhan')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="single-input-item">
                                    <label for="ordernote">Order Note</label>
                                    <textarea name="ghi_chu" id="ordernote" cols="30" rows="3"
                                        placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Order Summary Details -->
                    <div class="col-lg-6">
                        <div class="order-summary-details">
                            <h5 class="checkout-title">Your Order Summary</h5>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Products</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($carts as $key => $item)
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('products.detail', $key) }}">
                                                            {{ $item['ten_san_pham'] }}<strong> ×
                                                                {{ $item['so_luong'] }}</strong></a>
                                                    </td>
                                                    <td>{{ number_format($item['gia'] * $item['so_luong'], 0, '', '.') }} đ
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Sub Total</td>
                                                <td>
                                                    <strong>{{ number_format($subTotal, 0, '', '.') }}</strong>
                                                    <input type="hidden" name="tien_hang" id=""
                                                        value="{{ $subTotal }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Shipping</td>
                                                <td>
                                                    {{ number_format($shipping, 0, '', '.') }} d
                                                    <input type="hidden" name="tien_ship" value="{{ $shipping }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Total Amount</td>
                                                <td>
                                                    <strong>{{ number_format($total, 0, '', '.') }} d</strong>
                                                    <input type="hidden" value="{{ $total }}" name="tong_tien">
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- Order Payment Method -->
                                <div class="order-payment-method">
                                    <div class="single-payment-method show">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="cashon" value="cash"
                                                    class="custom-control-input" checked />
                                                <label class="custom-control-label" for="cashon">Thanh toán khi giao
                                                    hàng</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="cash">
                                            <p>Thanh toán bằng tiền mặt khi nhận hàng.</p>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-sqr">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    <!-- checkout main wrapper end -->
@endsection
@section('js')
    <script>
        $('.pro-qty').prepend('<span class="dec qtybtn">-</span>');
        $('.pro-qty').append('<span class="inc qtybtn">+</span>');

        function updateTotal() {
            var subTotal = 0;
            $('.quantityInput').each(function() {
                var $input = $(this);
                var price = parseFloat($input.data('price'));
                var quantity = parseFloat($input.val());
                subTotal += price * quantity;
            })
            var shipping = parseFloat($('.shipping').text().replace(/\./g, '').replace(' đ', ''));
            var total = subTotal + shipping;
            $('.sub-total').text(subTotal.toLocaleString('vi-VN') + ' đ');
            $('.total-amount').text(total.toLocaleString('vi-VN') + ' đ');
        }
        $('.qtybtn').on('click', function() {
            var $button = $(this);
            var $input = $button.parent().find('input')
            var oldValue = parseFloat($input.val());
            if ($button.hasClass('inc')) {
                var newVal = oldValue + 1;
            } else {
                if (oldValue > 1) {
                    var newVal = oldValue - 1;
                } else {
                    var newVal = 1;
                }
            }
            $input.val(newVal);

            var price = parseFloat($input.data('price'));
            var subtotalElement = $input.closest('tr').find('.subtotal');
            var newSubtotal = newVal * price;
            subtotalElement.text(newSubtotal.toLocaleString('vi-VN') + ' đ')
            updateTotal();
        });


        $('.quantityInput').on('change', function() {
            var value = parseInt($(this).val(), 10)
            if (isNaN(value) || value < 1) {
                alert('so luong phai lon hon = 1');
                $(this).val(1)
            }
            updateTotal();

        })
        $('.pro-remove').on('click', function() {
            event.preventDefault();
            var $row = $(this).closest('tr');
            $row.remove();
            updateTotal();

        })
        updateTotal();
    </script>
@endsection
