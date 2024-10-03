@extends('layouts.admin')
@section('title')
    Category
@endsection
@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">San pham</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title mb-0 align-content-center">Danh sach San pham</h5>
                            <a href="{{ route('admins.sanphams.create') }}" class="btn btn-success"><i
                                    data-feather="plus-square"></i>Them moi</a>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Ma san pham</th>
                                            <th scope="col">Ten san pham</th>
                                            <th scope="col">Hinh anh</th>
                                            <th scope="col">Danh muc</th>
                                            <th scope="col">Gia san pham</th>
                                            <th scope="col">gia khuyen mai</th>
                                            <th scope="col">so luong</th>
                                            <th scope="col">status</th>
                                            <th scope="col">hanh dong</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sanPham as $index => $item)
                                            <tr>
                                                <th scope="row">{{ $item->ma_san_pham }}</th>
                                                <td>{{ $item->ten_san_pham }}</td>
                                                <td>
                                                    <img src="{{ Storage::url($item->hinh_anh) }}" alt=""
                                                        width="150px">
                                                </td>
                                                <td>{{ $item->danhMuc->ten_danh_muc }}</td>
                                                <td>{{ number_format($item->gia_san_pham) }}</td>
                                                <td>{{ empty($item->gia_khuyen_mai) ? 0: $item->gia_khuyen_mai }}</td>
                                                <td>{{ $item->so_luong }}</td>
                                                <td>{{ $item->is_type == true ? 'hien thi' : 'an' }}</td>
                                                <td>
                                                    <a href="{{ route('admins.sanphams.edit', $item->id) }}"><i
                                                            class="mdi mdi-pencil text-muted fs-18 rounded-2 border p-1 me-1"></i></a>
                                                    <form action="{{ route('admins.sanphams.destroy', $item->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return comfirm('ban muon xoa a')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="border-0 bg-white ">
                                                            <i
                                                                class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1"></i>
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div>
@endsection
