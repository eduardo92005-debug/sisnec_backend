<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="P_Juridica",
 *      required={""},
 *      @SWG\Property(
 *          property="cnpj",
 *          description="cnpj",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nome_fantasia",
 *          description="nome_fantasia",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="inscricao_estadual",
 *          description="inscricao_estadual",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="razao_social",
 *          description="razao_social",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="pessoa_id",
 *          description="pessoa_id",
 *          type="integer",
 *          format="int32"
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
class P_Juridica extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'p__juridicas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'cnpj',
        'nome_fantasia',
        'inscricao_estadual',
        'razao_social',
        'pessoa_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cnpj' => 'string',
        'nome_fantasia' => 'string',
        'inscricao_estadual' => 'string',
        'razao_social' => 'string',
        'pessoa_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
