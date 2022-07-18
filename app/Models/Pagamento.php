<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Pessoa;

/**
 * @SWG\Definition(
 *      definition="Pagamento",
 *      required={""},
 *      @SWG\Property(
 *          property="pessoa_id",
 *          description="pessoa_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="responsavel",
 *          description="responsavel",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="montante",
 *          description="montante",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="juros",
 *          description="juros",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="vencimento",
 *          description="vencimento",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="esta_vencido",
 *          description="esta_vencido",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="pagamento_data",
 *          description="pagamento_data",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="ultima_atualizacao",
 *          description="ultima_atualizacao",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Pagamento extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'pagamentos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'pessoa_id' => 'integer',
        'responsavel' => 'string',
        'montante' => 'decimal:2',
        'juros' => 'decimal:2',
        'vencimento' => 'date',
        'esta_vencido' => 'boolean',
        'pagamento_data' => 'date',
        'ultima_atualizacao' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }
    
}
