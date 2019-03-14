<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserRequest extends FormRequest
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
        $id = $this->segment(3);

        $rules = [
            'name'      => "required|min:3|max:60|unique:users,name,{$id},id",
            'email'     => "required|email|min:3|max:100|unique:users,email,{$id},id",
            'password'  => 'required|min:6|max:20',
        ];

        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['password'] = ($this->password) ? 'min:3|max:20' : 'max:20';
        }

        return $rules;
    }
}
