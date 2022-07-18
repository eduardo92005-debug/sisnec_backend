<?php

namespace App\Http\Requests\Admin\Endereco;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateEndereco extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.endereco.edit', $this->endereco);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'bairro' => ['sometimes', 'string'],
            'cep' => ['sometimes', 'string'],
            'cidade' => ['sometimes', 'string'],
            'complemento' => ['sometimes', 'string'],
            'estado' => ['sometimes', 'string'],
            'p__fisicas_id' => ['nullable', Rule::unique('enderecos', 'p__fisicas_id')->ignore($this->endereco->getKey(), $this->endereco->getKeyName()), 'string'],
            'p__juridicas_id' => ['nullable', Rule::unique('enderecos', 'p__juridicas_id')->ignore($this->endereco->getKey(), $this->endereco->getKeyName()), 'string'],
            'rua' => ['sometimes', 'string'],
            
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
