<?php

namespace App\Repositories;

use App\Models\Veiculo;
use App\Repositories\BaseRepository;

/**
 * Class VeiculoRepository
 * @package App\Repositories
 * @version June 7, 2022, 10:22 pm UTC
*/

class VeiculoRepository extends BaseRepository
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
        return Veiculo::class;
    }
}
