<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;
    protected $fillable =[
        'ten_danh_muc',
        'hinh_anh',
        'trang_thai'
    ];
    protected $casts =[
        'trang_thai'=>'boolean' 
    ];
    
    public function sanPham(){
        return $this->hasMany(SanPham::class);
    }
}
