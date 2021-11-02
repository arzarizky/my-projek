<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIncidentRequest extends FormRequest
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
            'source' => 'required|string',
            'segment_id' => 'required|exists:segments,id',
            'description' => 'required|string',
            'status_id' => 'required|exists:statuses,id',
            'start' => 'required|date',
            'start_date' => 'required|date',
            'close' => 'required|date',
            'close_date' => 'required|date',
            'summary' => 'required|string',
            'action' => 'required|string'
        ];
    }
}
