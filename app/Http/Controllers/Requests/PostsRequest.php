<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
            'title' => 'required|max:50|min:3',
            'content' => 'required|max:225|min:3',
        ];
    }

    public function messages()
    {
        return
            [
                'title.required' => 'Title is obbligatory',
                'title.max' => 'Title must have max :max characters',
                'title.min' => 'Title must have minimum :min character',
                'content.required' =>  'Type is obbligatory',
                'content.max' => 'Type must have max :max characters',
                'content.min' => 'Type must have minimum :min character',
            ];
    }
}
