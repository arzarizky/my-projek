<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSecurityRequest extends FormRequest
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
            'waf_pagi' => 'sometimes|string',
            'chde_pagi' => 'sometimes|string',
            'waf_siang' => 'sometimes|string',
            'chde_siang' => 'sometimes|string',
            'waf_malam' => 'sometimes|string',
            'chde_malam' => 'sometimes|string',
            'review' => 'sometimes|string',
            'action' => 'sometimes|string',
            'recommendation' => 'sometimes|string',
        ];
    }
}
