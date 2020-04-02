<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => 'required|unique,news,slug,' . $this->berita->id
            'content' => 'required',
            'category' => 'required',
            'image' => 'image|required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Mohon masukkan judul',
            'slug.required' => 'Mohon masukkan slug',
            'slug.unique' => 'Slug sudah digunakan',
            'content.required' => 'Mohon masukkan konten berita',
            'category.required' => 'Mohon pilih kategori berita, atau buat baru di halaman kategori',
            'image.image' => 'Silakan pilih hanya file gambar, jpg|png|webp|bitmap|bmp|gif|svg|webp',
            'image.required' => 'Silakan pilih thumbnail terlebih dahulu'
        ];
    }
}
