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
                    <h4 class="fs-18 fw-semibold m-0">Don hang</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title mb-0 align-content-center">Danh sach don hang</h5>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive">
                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-babel="Close">
                                        </button>
                                    </div>
                                @endif
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th class="">Mã đơn hàng</th>
                                            <th class="">ngày đặt</th>
                                            <th class="">tổng tiền</th>
                                            <th class="">trang thai</th>
                                            <th class="">hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listDonHang as $item)
                                            <tr>
                                                <th class="">
                                                    <a
                                                        href="{{ route('admins.donhang1s.show',$item->id) }}">{{ $item->ma_don_hang }}</a>
                                                </th>
                                                <td>
                                                    {{ $item->created_at->format('d-m-y') }}
                                                </td>
                                                <td>
                                                    {{ number_format($item->tong_tien) }} đ
                                                </td>
                                                <td>
                                                    <form action="{{ route('admins.donhang1s.update',$item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <select name="trang_thai" id="" class="form-select w-75"
                                                            onchange="confirmSubmit(this)"
                                                            data-default-value="{{ $item->trang_thai }}">
                                                            @foreach ($trangThaiDonHang as $key => $value)
                                                                <option value="{{ $key }}"
                                                                    {{ $key == $item->trang_thai ? 'selected' : '' }}
                                                                    {{ $key == 'huy_don_hang' ? 'disabled' : '' }}
                                                                    {{ $key == 'da_giang_hang' ? 'disabled' : '' }}>
                                                                    {{ $value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </form>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admins.donhang1s.show',$item->id) }}"><i
                                                            class="mdi mdi-eye text-muted fs-18 rounded-2 border p-1 me-1"></i></a>
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
@section('js')
    <script>
        function confirmSubmit(selectElement) {
            var form = selectElement.form;
            var selctedOption = selectElement.options[selectElement.selectedIndex].text;
            var defaultValue = selectElement.getAttribute('data-default-value');
            if (confirm('ban muốn thay đổi trạng thái')) {
                form.submit();
            } else {
                selectElement.value = defaultValue;
            }
        }
    </script>
@endsection
