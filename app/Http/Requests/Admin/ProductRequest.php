<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->isMethod('post')) {
            return [
                'name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'introduction' => 'required|max:1000|min:5',
                'price' => 'required|numeric',
                'image' => 'required|image|mimes:png,jpg,jpeg,gif',
                'status' => 'required|numeric|in:0,1',
                'published_at' => 'required|numeric',
            ];
        } else {
            return [
                'name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'introduction' => 'required|max:1000|min:5',
                'price' => 'required|numeric',
                'image' => 'image|mimes:png,jpg,jpeg,gif',
                'status' => 'required|numeric|in:0,1',
                'published_at' => 'required|numeric',
            ];
        }
    }
}
