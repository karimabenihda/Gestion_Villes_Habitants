<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHabitantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize() 
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
            'cin' => 'required|string|max:20|unique:habitants,cin',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'ville_id' => 'required|exists:villes,id', // Ensure the city ID exists in the 'villes' table
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image upload if provided
      
        ];
    }
}
