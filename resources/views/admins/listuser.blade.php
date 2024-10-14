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
                    <h4 class="fs-18 fw-semibold m-0">Danh muc</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title mb-0 align-content-center">Danh sach danh muc</h5>                          
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">name</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">email</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Chức vụ</th>                                       
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listUser as $index=> $item)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->address}}</td>
                                            <td>{{$item->role}}</td>
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
