<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFraudRequest extends FormRequest
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
            'tanggal' => 'sometimes|date|after_or_equal:now',
            'shift_pagi' => 'sometimes|string',
            'shift_siang' => 'sometimes|string',
            'shift_malam' => 'sometimes|string',
            'review' => 'sometimes|string',
            'action' => 'sometimes|string',
            'recommendation' => 'sometimes|string',
        ];
    }
}
