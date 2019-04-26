<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
        $id = $this->segment(config('api.segment'));

        return [
            'title' => "required|min:3|max:100|unique:posts,title,{$id},id",
            'category_id' => 'required|exists:categories,id',
            'body' => 'required|max:10000'
        ];
    }
}
