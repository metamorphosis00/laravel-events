<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveEventRequest extends FormRequest
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
            'name'            => 'required',
            'surname'         => 'required',
            'phone'           => 'required',
            'email'           => 'required|email',
            'education_level' => 'required',
            'event_id'        => 'required|exists:events,id'
        ];
    }
}
