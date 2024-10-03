<?php

namespace App\Http\Controllers\Admin;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SanPhamRequest;
use App\Models\HinhAnhSanPham;
use Illuminate\Support\Facades\Storage;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title ="San pham";
        $sanPham = SanPham::orderByDesc('is_type')->get();
        return view('admins.sanpham.index', compact('title','sanPham'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title ="San pham";
        $danhMuc = DanhMuc::get();
        return view('admins.sanpham.create', compact('title', 'danhMuc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SanPhamRequest $request)
    {
        //
        
        if($request->isMethod('POST')){
            $params = $request->except('_token');

            $params['is_new']=$request->has('is_new')? 1 :0;
            $params['is_hot']=$request->has('is_hot')? 1 :0;
            $params['is_hot_deal']=$request->has('is_hot_deal')? 1 :0;
            $params['is_show_home']=$request->has('is_show_home')? 1 :0;

            if($request->hasFile('hinh_anh')){
                $params['hinh_anh'] =$request->file('hinh_anh')->store('uploads/sanpham', 'public');
            }else{
                $params['hinh_anh'] =null;
            }
            
            $sanPham = SanPham::create($params);
            //lay id sp vua create
            $sanPhamID = $sanPham->id;
            if($request->has('list_hinh_anh')){
                foreach($request->file('list_hinh_anh') as $image){
                    if($image){
                        $path = $image->store('uploads/hinhanhsanpham/id_'.$sanPhamID, 'public');
                        $sanPham->hinhAnhSanPham()->create(
                            ['san_pham_id'=>$sanPhamID,
                            'hinh_anh'=>$path,]);
                    }
                }
            }
            return redirect()->route('admins.sanphams.index')->with('success', 'them moi thanh cong');
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
        $title ="Cap nhat San pham";
        $sanPham = SanPham::find($id);
        $danhMuc = DanhMuc::get();
        return view('admins.sanpham.edit', compact('title', 'sanPham','danhMuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SanPhamRequest $request, string $id)
    {
        //
        
        if($request->isMethod(method: 'PUT')){
            $params = $request->except('_token','_method');

            $params['is_new']=$request->has('is_new')? 1 :0;
            $params['is_hot']=$request->has('is_hot')? 1 :0;
            $params['is_hot_deal']=$request->has('is_hot_deal')? 1 :0;
            $params['is_show_home']=$request->has('is_show_home')? 1 :0;

            $sanPham =SanPham::find($id);

            if($request->hasFile('hinh_anh')){
                if($sanPham->hinh_anh && Storage::disk('public')->exists($sanPham->hinh_anh)){
                    Storage::disk('public')->delete($sanPham->hinh_anh);
                }
                $params['hinh_anh'] =$request->file('hinh_anh')->store('uploads/sanpham', 'public');
            }else{
                $params['hinh_anh'] =$sanPham->hinh_anh;
            }
            
           
                $currentImages= $sanPham->hinhAnhSanPham()->pluck('id')->toArray();
                $arrayCombine = array_combine($currentImages, $currentImages);
                foreach($arrayCombine as $key => $values){
                    if(!array_key_exists($key, $request->list_hinh_anh)){
                        $hinhAnhSp = HinhAnhSanPham::query()->find($key);
                        if($hinhAnhSp->hinh_anh && Storage::disk('public')->exists($hinhAnhSp->hinh_anh)){
                            Storage::disk('public')->delete($hinhAnhSp->hinh_anh);
                            $hinhAnhSp->delete();
                        }
                    }
                }

                foreach($request->list_hinh_anh as $key=>$image){
                    if(!array_key_exists($key, $arrayCombine)){
                        if($request->hasFile("list_hinh_anh.$key")){
                            $path = $image->store('uploads/hinhanhsanpham/id_'.$id, 'public');
                            $sanPham->hinhAnhSanPham()->create([
                                'san_pham_id'=>$id,
                                'hinh_anh'=>$path
                            ]);
                        }
                    }else if(is_file($image) && $request->hasFile("list_hinh_anh.$key")){
                        $hinhAnhSp = HinhAnhSanPham::query()->find($key);
                        if($hinhAnhSp && Storage::disk('public')->exists($hinhAnhSp->hinh_anh)){
                            Storage::disk('public')->delete($hinhAnhSp->hinh_anh);
                        }
                        $path= $image->store('uploads/hinhanhsanpham/id_'.$id, 'public');
                        $hinhAnhSp->update([
                                'hinh_anh'=>$path
                            ]);
                    }            
                }

            
            $sanPham->update($params);
            return redirect()->route('admins.sanphams.index')->with('success', 'cap nhat thanh cong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $sanPham= SanPham::find($id);
        
        if($sanPham->hinh_anh && Storage::disk('public')->exists($sanPham->hinh_anh)){
            Storage::disk('public')->delete($sanPham->hinh_anh);
        }

        $sanPham->hinhAnhSanPham()->delete();
        $path = 'uploads/hinhanhsanpham/id_'.$id;
        if(  Storage::disk('public')->exists($path)){
            Storage::disk('public')->deleteDirectory($path);
        }
        $sanPham->delete();
        return redirect()->route('admins.sanphams.index')->with('success', 'xoa thanh cong');
    }
}
