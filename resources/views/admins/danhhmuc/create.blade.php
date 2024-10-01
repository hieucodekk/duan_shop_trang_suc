@extends('layouts.admin')
@section('title')
@endsection
@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Danh muc</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h5 class="card-title mb-0">Input Type</h5>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <form action="{{ route('admins.danhmucs.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="ten_danh_muc" class="form-label">tên danh mục</label>
                                            <input type="text" id="ten_danh_muc" name="ten_danh_muc"
                                                class="form-control @error('ten_danh_muc')
                                                is-invalid @enderror"
                                                value="{{ old('ten_danh_muc') }}">
                                            @error('ten_danh_muc')
                                                <p>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="ten_danh_muc" class="form-label ">trạng thái:</label>
                                            <div class="col-sm-10 mb-3 d-flex gap-2">
                                                <div class="form-check">
                                                    <input class="trang_thai" type="radio" name="trang_thai"
                                                        id="gridRadios1" value="1" checked>
                                                    <label class="form-check-label" for="gridRadios1">
                                                        hiện thị
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="trang_thai" type="radio" name="trang_thai"
                                                        id="gridRadios2" value="0">
                                                    <label class="form-check-label" for="gridRadios2">
                                                        ẩn
                                                    </label>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="hinh_anh" class="form-label">hinh anh</label>
                                            <input type="file" id="hinh_anh" name="hinh_anh"
                                            class="form-control" onchange="showIamge(event)">
                                            <img id="img_danh_muc" alt="hinh anh" style="width:150px; display: none">
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
    <script>
        function showIamge(event){
            const img_danh_muc = document.getElementById('img_danh_muc');
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload=function(){
                img_danh_muc.src= reader.result;
                img_danh_muc.style.display= 'block';
            }
            if(file){
                reader.readAsDataURL(file)
            }
        }
    </script>
@endsection