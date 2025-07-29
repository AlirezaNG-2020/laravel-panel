<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:2|max:230|regex:/^[ا-یa-zA-Z 0-9\۰-۹ي,. ]+$/u',
            'is_active' => 'required|in:0,1',
            'description' => 'required|min:3|max:300|regex:/^[ا-یa-zA-Z 0-9\۰-۹ي,. ]+$/u',
            'image' => 'required|image|mimes:png,svg,webp,jpg,jpeg',
            'tags' => 'required|min:3|max:300|regex:/^[ا-یa-zA-Z 0-9\۰-۹ي,. ]+$/u',
            'parent_id' => 'exists:post_categories,id',
            'slug' => 'nullable'
        ];
    }



    public function attributes()
    {
        return [
            'name' => 'نام دسته بندی'
        ];
    }
}
