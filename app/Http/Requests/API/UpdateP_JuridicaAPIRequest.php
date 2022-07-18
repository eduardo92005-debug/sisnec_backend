<?php

namespace App\Http\Requests\API;

use App\Models\P_Juridica;
use InfyOm\Generator\Request\APIRequest;

class UpdateP_JuridicaAPIRequest extends APIRequest
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
        $rules = P_Juridica::$rules;
        
        return $rules;
    }
}
