<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required','min:2'],
            'last_name' => ['required', 'min:2'],
            'document_id' => ['required'],
            'document_number' => ['required'],
            'birthday' => ['required'],
            'country_id' => ['required']
        ];
    }

    public function messages(){
          return [
            'first_name.required' => 'Molimo Vas da unesete ime',
            'first_name.min' => 'Ime mora da sadrzi najmanje :min karaktera',
            'last_name.required' => 'Molimo Vas da unesete prezime',
            'last_name.min' => 'Prezime mora da sadrzi najmanje :min karaktera',
            'document_id.required' => 'Morate izabrati tip dokumenta',
            'document_number.required' => 'Morate unijeti broj dokumenta',
            'birthday.required' => 'Morate izabrati datum rodjenja',
            'country_id.required' => 'Morate izabrati drzavu'
          ];
    }
}
