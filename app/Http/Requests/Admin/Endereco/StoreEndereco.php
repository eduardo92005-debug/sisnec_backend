<?php

namespace App\Http\Requests\Admin\Endereco;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreEndereco extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.endereco.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'bairro' => ['required', 'string'],
            'cep' => ['required', 'string'],
            'cidade' => ['required', 'string'],
            'complemento' => ['required', 'string'],
            'estado' => ['required', 'string'],
            'p__fisicas_id' => ['nullable', Rule::unique('enderecos', 'p__fisicas_id'), 'string'],
            'p__juridicas_id' => ['nullable', Rule::unique('enderecos', 'p__juridicas_id'), 'string'],
            'rua' => ['required', 'string'],
            
        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
