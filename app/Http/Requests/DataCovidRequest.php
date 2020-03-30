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
            'jumlah_positif' => 'exclude_if:nama_kecamatan,true|integer',
            'jumlah_meninggal' => 'exclude_if:nama_kecamatan,true|integer',
            'jumlah_sembuh' => 'exclude_if:nama_kecamatan,true|integer',
            'jumlah_odp' => 'exclude_if:nama_kecamatan,true|integer',
            'jumlah_pdp' => 'exclude_if:nama_kecamatan,true|integer'
        ];
    }

    public function attributes()
    {
        return [
            'nama_kecamatan' => 'nama kecamatan'
        ];
    }
}
