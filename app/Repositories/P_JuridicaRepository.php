<?php

namespace App\Repositories;

use App\Models\P_Juridica;
use App\Repositories\BaseRepository;

/**
 * Class P_JuridicaRepository
 * @package App\Repositories
 * @version June 1, 2022, 8:14 pm UTC
*/

class P_JuridicaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cnpj',
        'nome_fantasia',
        'inscricao_estadual',
        'razao_social',
        'pessoa_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return P_Juridica::class;
    }
}
