<?php

namespace App\Repositories;

use App\Models\Plano;
use App\Repositories\BaseRepository;

/**
 * Class PlanoRepository
 * @package App\Repositories
 * @version June 7, 2022, 10:08 pm UTC
*/

class PlanoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'p__fisicas_id',
        'p__juridicas_id'
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
        return Plano::class;
    }
}
