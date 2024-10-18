<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'titulo' => 'required',
            'autor' => 'nullable',
            'isbn' => ['required', 'integer'],
        ];

        if ($this->method() == 'PATCH' || $this->method() == 'PUT') {
            array_push($rules['isbn'], 'unique:livros,isbn,' . $this->livro->id);
        } else {
            array_push($rules['isbn'], 'unique:livros,isbn');
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'isbn.required' => 'Digite um campo ISBN!',
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'isbn' => preg_replace('/[^0-9]/', '', $this->isbn),
        ]);
    }
}
