<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title ="";
        $listDonHang = DonHang::query()->orderByDesc('id')->get();
        $trangThaiDonHang = DonHang::TRANG_THAI_DON_HANG;
        return view('admins.donhang.index', compact('listDonHang','trangThaiDonHang', 'title'));
    }

    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $title = "san pham don hang";
        $donHang = DonHang::query()->findOrFail($id);
        $trangThaiDonHang = DonHang::TRANG_THAI_DON_HANG;
        $trangThaiThanhToan = DonHang::TRANG_THAI_THANH_TOAN;
         return view('admins.donhang.show', compact('donHang', 'trangThaiDonHang', 'trangThaiThanhToan', 'title'));
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $donHang = DonHang::query()->findOrFail($id);
        $curentTrangThai = $donHang->trang_thai;
        $newTrangThai = $request->input('trang_thai');
        $trangThais = array_keys(DonHang::TRANG_THAI_DON_HANG);    

        if($curentTrangThai == DonHang::HUY_DON_HANG){
            return redirect()->route('admins.donhang1s.index')->with('error', 'don hang da bi huy khong the thay doi');
        }

        if(array_search($newTrangThai,$trangThais)< array_search($curentTrangThai,$trangThais)){
            return redirect()->route('admins.donhang1s.index')->with('error', 'khong cap nhat nguoc lai trang thai');
        }
        $donHang->trang_thai = $newTrangThai;
        $donHang->save();
        return redirect()->route('admins.donhang1s.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
