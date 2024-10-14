<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $listDanhMuc = DanhMuc::all();
        $listSanPham =SanPham::all();
        return view('client.home', compact('listDanhMuc', 'listSanPham'));
    }
    public function listDanhMuc($id){
        $sanPham = SanPham::where('danh_muc_id', $id)->get();
        $listDanhMuc = DanhMuc::all();
        return view('client.sanpham.listDanhMuc', compact('sanPham', 'listDanhMuc'));
    }
}
