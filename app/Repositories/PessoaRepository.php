<?php

namespace App\Repositories;

use App\Models\Pessoa;
use App\Repositories\BaseRepository;

/**
 * Class PessoaRepository
 * @package App\Repositories
 * @version May 31, 2022, 5:48 am UTC
*/

class PessoaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'telefone_1',
        'telefone_2',
        'email'
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
        return Pessoa::class;
    }
}
