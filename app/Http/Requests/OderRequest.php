<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OderRequest extends FormRequest
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
    public function rules(): array{
        return [
            //
            'ten_nguoi_nhan' => 'required|string|max:255',
            'so_dien_thoai_nguoi_nhan' => 'required|string',
            'email_nguoi_nhan' => 'required|string|email|max:255',
            'dia_chi_nguoi_nhan' => 'required|string|max:255',
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
            'ten_nguoi_nhan.required' =>'bắt buộc điền',
            'ten_nguoi_nhan.string' =>'điền 1 chuỗi',
            'ten_nguoi_nhan.max' =>'giới hạn 255 kí tự',
            'so_dien_thoai_nguoi_nhan.required' =>'bắt buộc điền',
            'so_dien_thoai_nguoi_nhan.string' =>'điền 1 chuỗi',
            'email_nguoi_nhan.required' =>'bắt buộc điền',
            'email_nguoi_nhan.string' =>'điền 1 chuỗi',
            'email_nguoi_nhan.email' =>'điền email',
            'email_nguoi_nhan.max' =>'giới hạn 255 kí tự',
            'dia_chi_nguoi_nhan.required' =>'bắt buộc điền',
            'dia_chi_nguoi_nhan.string' =>'điền 1 chuỗi',
            'dia_chi_nguoi_nhan.max' =>'giới hạn 255 kí tự',
        ];
    }
}
