<?php

namespace App\Repositories;

use App\Models\Pagamento;
use App\Repositories\BaseRepository;

/**
 * Class PagamentoRepository
 * @package App\Repositories
 * @version July 18, 2022, 5:24 am UTC
*/

class PagamentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pessoa_id',
        'responsavel',
        'montante',
        'juros',
        'vencimento',
        'esta_vencido',
        'pagamento_data',
        'ultima_atualizacao'
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
        return Pagamento::class;
    }
}
