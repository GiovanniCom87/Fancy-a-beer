<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBreweries extends FormRequest
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
            'name' => 'required | max:20',
            'description' => 'required | min:30 | max:500',
            'img'=>'required | image | mimes:jpeg,jpg,bmp,png',
            'lat' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'lon' => ['required', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'address' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required'=> 'Abbiamo bisogno di un nome per questa birreria',
            'description.required'=> 'Raccontaci qualcosa della birreria',
            'name.max'=> 'Il nome è troppo lungo',
            'description.max'=> 'La descrizione è troppo lunga',
            'description.min'=> 'La descrizione è troppo corta',
            'address.required' => 'Non dimenticare l\'indirizzo',
        ];
    }
}
