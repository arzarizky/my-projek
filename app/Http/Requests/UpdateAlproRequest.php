<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAlproRequest extends FormRequest
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
            'date' => 'required|date',
            'ip_address_id' => 'required|exists:ip_addresses,id',
            'hostname_alpro_id' => 'required|exists:hostname_alpros,id',
            'shift_id' => 'required|exists:shifts,id',
            'time_id' => 'required|exists:times,id',
            'cpu' => 'required|integer',
            'disk' => 'required|integer',
            'memory' => 'required|integer'
        ];
    }
}
