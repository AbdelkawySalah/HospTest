<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentsRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'department' => 'required|unique:h_departments,name,'.$this->departid,
        ];
    }

    public function messages()
    {
        return [
           
            'required' => 'Field required',
            'unique' => 'Department Name Already Exists',
        ];
    }
}
