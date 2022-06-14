<?php

namespace App\Repositories;

use App\Models\P_Fisica;
use App\Repositories\BaseRepository;

/**
 * Class P_FisicaRepository
 * @package App\Repositories
 * @version June 2, 2022, 5:15 am UTC
*/

class P_FisicaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cpf',
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
        return P_Fisica::class;
    }
}
