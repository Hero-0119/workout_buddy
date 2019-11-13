<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
                'gym_img' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048',
                'title' => 'required|max:20',
                'about_group' => 'required|max:140',
                'fee' => 'nullable',
                'number_limit' => 'required',
                'sex_limit' => 'required',
                'user_id' => 'required|numeric',
                'gym_id' => 'required',
                'event_date' => 'required|date',
                'start_time' => 'required|date_format:H:i:s',
                'end_time' => 'required|date_format:H:i:s',
        ];
    }
}
