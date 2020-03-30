<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataCovidRequest extends FormRequest
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
            'nama_kecamatan' => 'required',
            'jumlah_positif' => 'exclude_unless:nama_kecamatan,false|integer',
            'jumlah_meninggal' => 'exclude_unless:nama_kecamatan,false|integer',
            'jumlah_sembuh' => 'exclude_unless:nama_kecamatan,false|integer',
            'jumlah_odp' => 'exclude_unless:nama_kecamatan,false|integer',
            'jumlah_pdp' => 'exclude_unless:nama_kecamatan,false|integer'
        ];
    }

    public function attributes()
    {
        return [
            'nama_kecamatan' => 'nama kecamatan'
        ];
    }
}
