<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDatabaseRequest extends FormRequest
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
            'dbms_id' => 'required|exists:dbmses,id',
            'hostname_id' => 'required|exists:hostname_alpros,id',
            'activity_id' => 'required|exists:activities,id',
            'shift_id' => 'required|exists:shifts,id',
            'time_id' => 'required|exists:times,id',
            'status' => 'required|string',
            'detail' => 'required|string',
            'action' => 'required|string'
        ];
    }
}
