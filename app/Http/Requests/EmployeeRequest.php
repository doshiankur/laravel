<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//need to change default value
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'emp_name' => 'required|max:255',
            'emp_address' => 'required|email',
            'join_date' => 'required|date',
            'emp_photo'=>'required|max:10000|mimes:jpg,jpeg,png'
        ];
    }
}
