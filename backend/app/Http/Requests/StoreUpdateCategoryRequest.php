<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCategoryRequest extends FormRequest
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
            'title' => "required|min:3|max:100|unique:categories,title,{$id},id",
            // 'slug' => "required|min:3|max:100|unique:categories,slug,{$id},id",
        ];
    }
}
