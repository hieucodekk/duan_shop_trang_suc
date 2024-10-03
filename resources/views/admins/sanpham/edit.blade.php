@extends('layouts.admin')
@section('title')
@endsection
@section('css')
    <link href="{{ asset('assets/admin/libs/quill/quill.core.js') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
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
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h5 class="card-title mb-0">Input Type</h5>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <form method="POST" action="{{ route('admins.sanphams.update', $sanPham->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-4 mb-4">
                                        <div class="mb-3">
                                            <label for="ma_san_pham" class="form-label">ma san pham</label>
                                            <input type="text" id="ma_san_pham" name="ma_san_pham"
                                                class="form-control @error('ma_san_pham')
                                                is-invalid @enderror"
                                                value="{{ $sanPham->ma_san_pham }}">
                                            @error('ma_san_pham')
                                                <p>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="ten_san_pham" class="form-label">tên san pham</label>
                                            <input type="text" id="ten_san_pham" name="ten_san_pham"
                                                class="form-control @error('ten_san_pham')
                                                is-invalid @enderror"
                                                value="{{ $sanPham->ten_san_pham }}">
                                            @error('ten_san_pham')
                                                <p>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="gia_san_pham" class="form-label">gia san pham</label>
                                            <input type="number" id="gia_san_pham" name="gia_san_pham"
                                                class="form-control @error('gia_san_pham')
                                                is-invalid @enderror"
                                                value="{{ $sanPham->gia_san_pham }}">
                                            @error('gia_san_pham')
                                                <p>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="gia_khuyen_mai" class="form-label">gia khuyen mai</label>
                                            <input type="text" id="gia_khuyen_mai" name="gia_khuyen_mai"
                                                class="form-control @error('gia_khuyen_mai')
                                                is-invalid @enderror"
                                                value="{{ $sanPham->gia_khuyen_mai }}">
                                            @error('gia_khuyen_mai')
                                                <p>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="danh_muc_id" class="form-label">Danh mục</label>
                                            <select name="danh_muc_id" class="form-select">
                                                <option value="">--Chon danh muc--</option>
                                                @foreach ($danhMuc as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == $sanPham->danh_muc_id ? 'selected' : '' }}>
                                                        {{ $item->ten_danh_muc }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="so_luong" class="form-label">so luong</label>
                                            <input type="number" id="so_luong" name="so_luong"
                                                class="form-control @error('so_luong')
                                                is-invalid @enderror"
                                                value="{{ $sanPham->so_luong }}">
                                            @error('so_luong')
                                                <p>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="ngay_nhap" class="form-label">ngay nhap</label>
                                            <input type="date" id="ngay_nhap" name="ngay_nhap"
                                                class="form-control @error('ngay_nhap')
                                                is-invalid @enderror"
                                                value="{{ $sanPham->ngay_nhap }}">
                                            @error('ngay_nhap')
                                                <p>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="mo_ta_ngan" class="form-label">mo ta</label>
                                            <input type="text" id="mo_ta_ngan" name="mo_ta_ngan"
                                                class="form-control @error('mo_ta_ngan')
                                                is-invalid @enderror"
                                                value="{{ $sanPham->ngay_nhap }}">
                                            @error('mo_ta_ngan')
                                                <p>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="is_type" class="form-label ">trạng thái:</label>
                                            <div class="col-sm-10 mb-3 d-flex gap-2">
                                                <div class="form-check">
                                                    <input class="is_type" type="radio" name="is_type" id="gridRadios1"
                                                        value="1" {{ $sanPham->is_type == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="gridRadios1">
                                                        hiện thị
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="is_type" type="radio" name="is_type"
                                                        id="gridRadios2" value="0"
                                                        {{ $sanPham->is_type == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="gridRadios2">
                                                        ẩn
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <label for="is_type" class="form-label ">tuy chinh:</label>
                                        <div class=" form-switch mb-2 ps-3 d-flex  justify-content-between">

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="is_new"
                                                    name="is_new" {{ $sanPham->is_new == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_new">New</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="is_hot"
                                                    name="is_hot" {{ $sanPham->is_hot == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_hot">Hot</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="is_hot_deal"
                                                    name="is_hot_deal" {{ $sanPham->is_hot_deal == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_hot_deal">HotDeal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="is_show_home"
                                                    name="is_show_home"
                                                    {{ $sanPham->is_show_home == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_show_home">ShowHome</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-8 ">
                                        <div class="mb-3">
                                            <label for="is_type" class="form-label ">Mo ta chi tiet</label>
                                            <div id="quill-editor" style="height: 400px;">

                                            </div>
                                            <textarea name="noi_dung" id="noi_dung_content" class="d-none"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="hinh_anh" class="form-label">hinh anh</label>
                                            <input type="file" id="hinh_anh" name="hinh_anh" class="form-control"
                                                onchange="showIamge(event)">
                                            <img id="img_danh_muc" src="{{ Storage::url($sanPham->hinh_anh) }}"
                                                alt="hinh anh" style="width:150px; display:none">
                                        </div>
                                        <div class="mb-3">
                                            <label for="hinh_anh" class="form-label">Album hinh anh</label>
                                            <i id="add-row"
                                                class="mdi mdi-plus text-muted fs-18 rounded-2 border ms-3 p-1"
                                                style="cursor: pointer"></i>
                                            <table class="table align-middle table-nowrap mb-0">
                                                <tbody id="image-table-body">
                                                    @foreach ($sanPham->hinhAnhSanPham as $index=> $hinhAnh)
                                                    <tr>
                                                        <td class="d-flex align-items-center">
                                                            <img id="preview_{{$index}}"
                                                                src="{{ Storage::url($hinhAnh->hinh_anh) }}"
                                                                alt="hinh anh" style="width:50px" class="me-3">
                                                            <input type="file" id="hinh_anh"
                                                                name="list_hinh_anh[{{$hinhAnh->id}}]" class="form-control"
                                                                onchange="previewImage(this,{{$index}})">
                                                                <input type="hidden" name="list_hinh_anh[{{$hinhAnh->id}}]" value="{{$hinhAnh->id}}">
                                                        </td>
                                                        <td class="">
                                                            <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1"
                                                                style="cursor: pointer" onclick="removeRow(this)"></i>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="d-flex"><button type="submit" class="btn btn-primary">thêm mới</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/admin/libs/quill/quill.core.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/quill/quill.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var quill = new Quill("#quill-editor", {
                theme: "snow",
            })

            var old_content = `{!! $sanPham->noi_dung !!}`
            quill.root.innerHTML = old_content

            quill.on('text-chagne', function() {
                var html = quill.root.innerHTML;
                document.getElementById('noi_dung_content').value = html
            })
        })
    </script>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var rowCount = {{count($sanPham->hinhAnhSanPham)}};
            document.getElementById('add-row').addEventListener('click', function() {
                var tableBody = document.getElementById('image-table-body')
                var newRow = document.createElement('tr');
                newRow.innerHTML = ` 
                    <td class="d-flex align-items-center">
                        <img id="preview_${rowCount}" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0Wr3oWsq6KobkPqznhl09Wum9ujEihaUT4Q&s" alt="hinh anh"
                            style="width:50px" class="me-3">
                        <input type="file" id="hinh_anh" name="list_hinh_anh[id_${rowCount}]"
                            class="form-control" onchange="previewImage(this,${rowCount})">                                                            
                    </td>
                    <td class="">
                        <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1" 
                        style="cursor: pointer" onclick="removeRow(this)"></i>
                    </td>
                    `;
                tableBody.appendChild(newRow);
                rowCount++;
            });
        })

        function previewImage(input, rowIndex) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById(`preview_${rowIndex}`).setAttribute('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0])
            }
        }

        function removeRow(item) {
            var row = item.closest('tr');
            row.remove();
        }
    </script>
@endsection
