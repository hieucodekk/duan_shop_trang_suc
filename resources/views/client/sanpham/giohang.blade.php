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
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">cart</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Cart Table Area -->
                        <form action=""></form>
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Thumbnail</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>
                                        <th class="pro-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $key=> $item)
                                        <tr>
                                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid"
                                                src="{{ Storage::url($item['hinh_anh'])}}" alt="Product" /></a></td>
                                            <td class="pro-title"><a href="{{route('products.detail',$key)}}">{{$item['ten_san_pham']}} </a></td>
                                            <td class="pro-price"><span>{{$item['gia']}} đ</span></td>
                                            <td class="pro-quantity">
                                                <div class="pro-qty"><input type="text" class="quantityInput" data-price="{{$item['gia']}}" value="{{$item['so_luong']}}"></div>
                                            </td>
                                            <td class="pro-subtotal"><span class="subtotal">{{$item['gia']* $item['so_luong']}} đ</span></td>
                                            <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- Cart Update Option -->
                        <div class="cart-update-option d-block d-md-flex justify-content-between">
                            <div class="apply-coupon-wrapper">
                                <form action="#" method="post" class=" d-block d-md-flex">
                                    <input type="text" placeholder="Enter Your Coupon Code" required />
                                    <button class="btn btn-sqr">Apply Coupon</button>
                                </form>
                            </div>
                            <div class="cart-update">
                                <a href="#" class="btn btn-sqr">Update Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 ml-auto">
                        <!-- Cart Calculation Area -->
                        <div class="cart-calculator-wrapper">
                            <div class="cart-calculate-items">
                                <h6>Cart Totals</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td>Sub Total </td>
                                            <td class="sub-total">{{$subtotal}} đ</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping</td>
                                            <td class="shipping">{{$shipping}} đ</td>
                                        </tr>
                                        <tr class="total">
                                            <td>Total</td>
                                            <td class="total-amount">{{$total}} đ</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <a href="checkout.html" class="btn btn-sqr d-block">Proceed Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('.pro-qty').prepend('<span class="dec qtybtn">-</span>');
        $('.pro-qty').append('<span class="inc qtybtn">+</span>');

        function updateTotal(){
            var subTotal = 0;
            $('.quantityInput').each(function(){
                var $input = $(this);
                var price = parseFloat($input.data('price'));
                var quantity = parseFloat($input.val());
                subTotal += price  * quantity;
            })
            var shipping = parseFloat($('.shipping').text().replace(/\./g,'').replace('đ', ''));
            var total = subTotal + shipping;
            $('.sub-total').text(subTotal.toLocaleString('vi-VN') + 'đ');
            $('.total-amount').text(total.toLocaleString('vi-VN') + 'đ');
        }
        $('.qtybtn').on('click', function() {
            var $button = $(this);     
            var $input = $button.parent().find('input')
            var oldValue = parseFloat($input.val());
            if($button.hasClass('inc')){
                var newVal = oldValue+1;
            }else{
                if(oldValue>1){
                     var newVal = oldValue-1;
                }else{
                    var newVal = 1;
                }
            }
            $input.val(newVal);

            var price = parseFloat($input.data('price'));
            var subtotalElement = $input.closest('tr').find('.subtotal');
            var newSubtotal =newVal * price;
            subtotalElement.text(newSubtotal.toLocaleString( 'vi-VN') + 'đ' )
            updateTotal();
        });


        $('.quantityInput').on('change', function(){
            var value = parseInt($(this).val(),10)
            if(isNaN(value) || value <1 ){
                alert('so luong phai lon hon = 1');
                $(this).val(1)
            }
            updateTotal();

        })
        $('.pro-remove').on('click', function(){
            event.preventDefault();
            var $row =$(this).closest('tr');
            $row.remove();
            updateTotal();

        })
      updateTotal();
    </script>
@endsection
