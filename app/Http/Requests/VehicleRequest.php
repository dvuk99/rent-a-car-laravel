<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
            'brand_id' => 'exists:brands,id',
            'cmodel_id' => 'required|exists:cmodels,id',
            'year_production' => 'min:4',
            'registration_plate' => 'required',
            'transmission' => 'in:Manual,Automatik',
            'fuel_type' => 'in:Dizel,Benzin,Elektricno,Hibrid',
            'type_id' => 'required|exists:types,id'
        ];
    }

    public function messages(): array {
        return [
            
            'cmodel_id.exists' => 'Morate izabrati model auta',
            'brand_id.exists' => 'Morate izabrati marku i model auta',
            'cmodel_id.required' => 'Morate izabrati marku i model auta',
            'year_production.min' => 'Morate izabrati godiste',
            'registration_plate.required' => 'Morate unijeti registarske oznake',
            'transmission.in' => 'Morate izabrati tip mjenjaca',
            'fuel_type.in' => 'Morate izabrati tip goriva',
            'type_id.exists' => 'Morate izabrati klasu vozila'
        ];
}
}