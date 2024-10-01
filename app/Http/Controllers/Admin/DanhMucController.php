<?php

namespace App\Http\Controllers\Admin;

use App\Models\DanhMuc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DanhMucRequest;
use Illuminate\Support\Facades\Storage;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Danh muc";
        $listDanhMuc= DanhMuc::get();
        return view('admins.danhhmuc.index', compact('title','listDanhMuc'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Danh muc";
        return view('admins.danhhmuc.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DanhMucRequest $request)
    {
        //
        if($request->isMethod('POST')){
            $param = $request->except('_token');
            if($request->hasFile('hinh_anh')){
                $filepath =$request->file('hinh_anh')->store('uploads/danhmuc', 'public');
            }else{
                $filepath =null;
            }
            $param['hinh_anh']=$filepath;
            DanhMuc::create($param);
            return redirect()->route('admins.danhmucs.index')->with('sussess', 'them danh muc thanh cong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $title = "Danh muc";
        $danhMuc = DanhMuc::find($id);
        return view('admins.danhhmuc.edit', compact('title', 'danhMuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         if($request->isMethod(method: 'PUT')){
            $param = $request->except('_token','_method');
            $danhMuc = DanhMuc::find($id);
            if($request->hasFile('hinh_anh')){
                if($danhMuc->hinh_anh && Storage::disk('public')->exists($danhMuc->hinh_anh)){
                    Storage::disk('public')->delete($danhMuc->hinh_anh);
                }
                $filepath =$request->file('hinh_anh')->store('uploads/danhmuc', 'public');
            }else{
                $filepath =$danhMuc->hinh_anh;
            }
            $param['hinh_anh']=$filepath;
            $danhMuc->update($param);
            return redirect()->route('admins.danhmucs.index')->with('sussess', 'cap nhat muc thanh cong');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $danhMuc = DanhMuc::find($id);
            $danhMuc->delete();
                if($danhMuc->hinh_anh && Storage::disk('public')->exists($danhMuc->hinh_anh)){
                    Storage::disk('public')->delete($danhMuc->hinh_anh);
                }
               return redirect()->route('admins.danhmucs.index')->with('sussess', 'xoa danh muc thanh cong'); 
            

    }
}
