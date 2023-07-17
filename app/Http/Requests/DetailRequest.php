<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetailRequest extends FormRequest
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
            'name' => 'required',
            'organizer' => 'required',
            'date' => 'required',
            'location' => 'required',
            'logo' => 'image',
            'quantity' => 'required|numeric',
            'participant_auto' => 'mimes:xls,xlsx,csv',
            'destination' => 'required',
        ];
    }
}
