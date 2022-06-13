<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Endereco",
 *      required={""},
 *      @SWG\Property(
 *          property="rua",
 *          description="rua",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="complemento",
 *          description="complemento",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="bairro",
 *          description="bairro",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cep",
 *          description="cep",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="estado",
 *          description="estado",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cidade",
 *          description="cidade",
 *          type="string"
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
class Endereco extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'enderecos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'rua',
        'complemento',
        'bairro',
        'cep',
        'estado',
        'cidade',
        'p__fisicas_id',
        'p__juridicas_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'rua' => 'string',
        'complemento' => 'string',
        'bairro' => 'string',
        'cep' => 'string',
        'estado' => 'string',
        'cidade' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
