<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function detailSanPham(string $id){
        $sanPham = SanPham::query()->findOrFail($id);
        $listSP = SanPham::query()->get();
        return view('client.sanpham.chitiet', compact('sanPham', 'listSP'));
    }
}
