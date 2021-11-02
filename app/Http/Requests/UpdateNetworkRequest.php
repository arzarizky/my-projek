<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNetworkRequest extends FormRequest
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
            'interconnection_id' => 'required|exists:interconnections,id',
            'name_id' => 'required|exists:names,id',
            'shift_id' => 'required|exists:shifts,id',
            'time_id' => 'required|exists:times,id',
            'utility' => 'required|integer',
            'cpu' => 'required|integer',
            'memory' => 'required|integer'
        ];
    }
}
