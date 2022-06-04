<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FastKegiatanRequest extends FormRequest
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
             'title' => 'required|min:3',
             'start' => 'date_format:H:i:s|before:end',
             'end' => 'date_format:H:i:s|after:start',
         ];
     }

     public function messages()
     {
         return [
             'title.required' => 'Duplikat Judul',
             'title.min' => 'Judul Perlu 3',
             'start.date_format' => 'Tabel mulai tidak valid',
             'start.before' => '0 data/initial aslkdjflsadf final',
             'end.date_format' => 'Tabel tidak final valid',
             'end.after' => '0 data/final aslkdjflsadf inital',
         ];
     }
}
