<?php

namespace App\Repositories;

use App\Models\Endereco;
use App\Repositories\BaseRepository;

/**
 * Class EnderecoRepository
 * @package App\Repositories
 * @version June 2, 2022, 6:18 am UTC
*/

class EnderecoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'rua',
        'complemento',
        'bairro',
        'cep',
        'estado',
        'cidade',
        'p_fisica_id',
        'p_juridica_id'
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
        return Endereco::class;
    }
}
