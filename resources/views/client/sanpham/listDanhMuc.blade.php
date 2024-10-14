@extends('layouts.client')
@section('css')
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
                                <li class="breadcrumb-item active" aria-current="page">shop</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding">
        <div class="container">
            <div class="row">
                <!-- sidebar area start -->
                <div class="col-lg-3 order-2 order-lg-1">
                    <aside class="sidebar-wrapper">
                        <!-- single sidebar start -->
                        <div class="sidebar-single">
                            <h5 class="sidebar-title">categories</h5>
                            <div class="sidebar-body">
                                <ul class="shop-categories">
                                    @foreach ($listDanhMuc as $danhMuc)
                                        <li><a href="{{route('spdanhmuc',$danhMuc->id)}}">{{$danhMuc->ten_danh_muc}}</a></li>
                                    @endforeach
                                    
                                    
                                </ul>
                            </div>
                        </div>
                        <!-- single sidebar end -->
                     
                      

                        <!-- single sidebar start -->
                        <div class="sidebar-banner">
                            <div class="img-container">
                                <a href="#">
                                    <img src="{{ asset('assets/client/img/banner/sidebar-banner.jpg') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- single sidebar end -->
                    </aside>
                </div>
                <!-- sidebar area end -->

                <!-- shop main wrapper start -->
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="shop-product-wrapper">
                        <!-- shop product top wrap start -->
                        <div class="shop-top-bar">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                    <div class="top-bar-left">
                                        <div class="product-view-mode">
                                            <a class="active" href="#" data-target="grid-view"
                                                data-bs-toggle="tooltip" title="Grid View"><i class="fa fa-th"></i></a>
                                            <a href="#" data-target="list-view" data-bs-toggle="tooltip"
                                                title="List View"><i class="fa fa-list"></i></a>
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6 order-1 order-md-2">
                                    <div class="top-bar-right">
                                        <div class="product-short">
                                            <p>Sort By : </p>
                                            <select class="nice-select" name="sortby">
                                                <option value="trending">Relevance</option>
                                                <option value="sales">Name (A - Z)</option>
                                                <option value="sales">Name (Z - A)</option>
                                                <option value="rating">Price (Low &gt; High)</option>
                                                <option value="date">Rating (Lowest)</option>
                                                <option value="price-asc">Model (A - Z)</option>
                                                <option value="price-asc">Model (Z - A)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- shop product top wrap start -->

                        <!-- product item list wrapper start -->
                        <div class="shop-product-wrap grid-view row mbn-30">
                            <!-- product single item start -->
                            @foreach ($sanPham as $item)
                                <div class="col-md-4 col-sm-6">
                                    <!-- product grid start -->
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="{{ route('products.detail', $item->id) }}">
                                                <img class="pri-img" src="{{ Storage::url($item->hinh_anh) }}"
                                                    alt="product">
                                                <img class="sec-img" src="{{ Storage::url($item->hinh_anh) }}"
                                                    alt="product">
                                            </a>
                                            <div class="product-badge">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>10%</span>
                                                </div>
                                            </div>
                                            <div class="button-group">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                                    title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                                    title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#quick_view"><span data-bs-toggle="tooltip"
                                                        data-bs-placement="left" title="Quick View"><i
                                                            class="pe-7s-search"></i></span></a>
                                            </div>
                                            <form action="{{ route('cart.add') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="quantity" value="1">
                                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                <div class="cart-hover">
                                                    <button class="btn btn-cart">add to cart</button>
                                                </div>
                                            </form>
                                            
                                        </figure>
                                        <div class="product-caption text-center">
                                            <div class="product-identity">
                                                <p class="manufacturer-name"><a
                                                        href="{{ route('products.detail', $item->id) }}">{{ $item->danhMuc->ten_danh_muc }}</a>
                                                </p>
                                            </div>

                                            <h6 class="product-name">
                                                <a
                                                    href="{{ route('products.detail', $item->id) }}">{{ $item->ten_san_pham }}</a>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular">{{ number_format($item->gia_khuyen_mai) }}
                                                    d</span>
                                                <span class="price-old"><del>{{ number_format($item->gia_san_pham) }}
                                                        d</del></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product grid end -->

                                </div>
                            @endforeach

                            <!-- product single item start -->

                        </div>
                        <!-- product item list wrapper end -->

                        <!-- start pagination area -->

                        <!-- end pagination area -->
                    </div>
                </div>
                <!-- shop main wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->
@endsection
