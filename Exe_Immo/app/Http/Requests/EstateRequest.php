<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
        //ou logique si connecté etc
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>[
                'required',
                'min:8',
            ],
            'square_meters'=>[
                'required',
                'min:1',
                'numeric',
            ],
            'price'=>[
                'required',
                'min:1',
                'numeric',
            ],
            'description'=>[
                'required',
                'min:8',
            ],
            'localisation'=>[
                "required",
            ],
        ];
    }
}
