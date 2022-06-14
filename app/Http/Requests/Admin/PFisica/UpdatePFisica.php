<?php

namespace App\Http\Requests\Admin\PFisica;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdatePFisica extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.p-fisica.edit', $this->pFisica);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'cpf' => ['sometimes', Rule::unique('p__fisicas', 'cpf')->ignore($this->pFisica->getKey(), $this->pFisica->getKeyName()), 'string'],
            'pessoa_id' => ['sometimes', Rule::unique('p__fisicas', 'pessoa_id')->ignore($this->pFisica->getKey(), $this->pFisica->getKeyName()), 'string'],
            
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
