<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function listCart(){
        $cart = session()->get('cart',[]);
        $total =0 ;
        $subtotal = 0;
        foreach($cart as $item ){
            $subtotal += $item['gia'] *$item['so_luong'];
        }
        $shipping = 300;
        $total = $subtotal + $shipping;
        return view('client.sanpham.giohang', compact('cart','total','shipping','subtotal'));
    }
    public function addCart(Request $request){
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $sanPham = SanPham::query()->findOrFail($productId);
        //khoi tao 1 mang chua thong tin gio hang tren session
        $cart = session()->get('cart',[]);
        if(isset($cart[$productId])){
            //san pham da ton tai trong gio hang
            $cart[$productId]['so_luong'] +=$quantity;          
        }else{
            //san pham chua co
             $cart[$productId] =[
                'ten_san_pham'=> $sanPham->ten_san_pham,
                'so_luong'=> $quantity,
                'gia'=> isset($sanPham->gia_khuyen_mai) ? $sanPham->gia_khuyen_mai : $sanPham->gia_san_pham ,
                'hinh_anh'=> $sanPham->hinh_anh,
             ];
        }
        session()->put('cart',$cart);
        return redirect()->back();
    }
    public function updateCart(){
        
    }
}
