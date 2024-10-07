<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'ma_san_pham'=>'required|max:10|unique:san_phams,ma_san_pham,' . $this->route('id'),
            'ten_san_pham'=>'required|max:255',
            'hinh_anh'=>'image|mimes:png,jpg,jpeg',
            'gia_san_pham'=>'required|numeric|min:0',
            'gia_khuyen_mai'=>'numeric|min:0|lt:gia_san_pham',
            'mo_ta_ngan'=>'string|max:255',
            'so_luong'=>'required|integer|min:0',
            'ngay_nhap'=>'required|date',
            'danh_muc_id'=>'required|exists:"danh_mucs",id',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'ma_san_pham.required' => 'bắt buộc điền',
            'ma_san_pham.max' => 'điền ít thôi',
            'ma_san_pham.unique' => 'trùng ny rồi',
            'ten_san_pham.required' => 'bắt buộc điền ',
            'ten_san_pham.max' => 'điền ít thôi ',
            'hinh_anh.image' => 'đây ko phải hình ảnh ',
            'hinh_anh.mimes' => 'ko đúng định dạng ',
            'gia_san_pham.required' => 'bắt buộc điền ',
            'gia_san_pham.numeric' => 'điền số thôi ',
            'gia_san_pham.min' => 'bán cho người âm  ',
            'gia_khuyen_mai.numeric' => 'bđiền số thôi  ',
            'gia_khuyen_mai.min' => 'bán cho người âm ',
            'gia_khuyen_mai.lt' => 'bán cho người âm ',
            'mo_ta_ngan.string' => 'điền j đấy ',
            'mo_ta_ngan.max' => 'điền ít thôi ',
            'so_luong.required' => 'bắt buộc điền ',
            'so_luong.integer' => 'điền số thôi ',
            'so_luong.min' => 'điền j đấy ',
            'ngay_nhap.required' => 'bắt buộc điền ',
            'ngay_nhap.date' => 'nhập sai rồi ',
            'danh_muc_id.required' => 'bắt buộc điền ',
            'danh_muc_id.exists' => 'sai rồi ',

        ];
    }
}
