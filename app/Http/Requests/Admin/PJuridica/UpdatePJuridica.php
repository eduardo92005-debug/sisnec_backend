<?php

namespace App\Http\Requests\Admin\PJuridica;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdatePJuridica extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.p-juridica.edit', $this->pJuridica);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'cnpj' => ['sometimes', Rule::unique('p__juridicas', 'cnpj')->ignore($this->pJuridica->getKey(), $this->pJuridica->getKeyName()), 'string'],
            'nome_fantasia' => ['sometimes', 'string'],
            'inscricao_estadual' => ['sometimes', Rule::unique('p__juridicas', 'inscricao_estadual')->ignore($this->pJuridica->getKey(), $this->pJuridica->getKeyName()), 'string'],
            'razao_social' => ['sometimes', 'string'],
            'pessoa_id' => ['sometimes', Rule::unique('p__juridicas', 'pessoa_id')->ignore($this->pJuridica->getKey(), $this->pJuridica->getKeyName()), 'string'],
            
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

    public function getPessoaId(){
        if ($this->has('pessoa')){
            return $this->get('pessoa')['id'];
        }
        return null;
    }
}
