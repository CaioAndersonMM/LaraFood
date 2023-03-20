<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdate extends FormRequest
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
        $url = $this->segment(4); //pegando o segmento 3 da rota onde há o nome do plano

        return [
            'name' => "required|min:5|max:20|unique:plans,name,{$url},id", //passando a exceção caso o nome do plano na url seja igual ao nome do plano (para que seja editado)
            'description' => 'nullable|min:3|max:255',
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
             
        ];
    }
}
