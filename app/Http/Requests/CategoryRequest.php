<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|min:5|unique:categories'
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' =>'nom du categorie est obligatoire !',
            'name.min' =>'nom du categorie est trop court <4 !',
            'name.unique' =>'cette  categorie existe deja !'
        ];
    }
    /*
    public function attributes()
    {
        return [
            'name' => 'Category name'
        ];
    }*/
}
