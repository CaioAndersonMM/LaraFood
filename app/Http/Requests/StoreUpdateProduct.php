<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProduct extends FormRequest
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
            'title' => "required|min:5|max:20|unique:products,title,{$id},id", //passando a exceção caso o id seja igual ao $id (da rota) - para que seja editado
            'description' => 'required|min:3|max:255',
            'image' => 'required|mimes:jpeg,png,jpg,gif',
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
        ];
        if ($this->method() == 'PUT') { //quando tiver editando
            //$rules['image'] = ['nullable', 'image'];
            $rules['image'] = 'nullable|mimes:jpeg,png,jpg,gif';
        }
        return $rules;
    }
}
