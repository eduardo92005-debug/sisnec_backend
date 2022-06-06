<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Pessoa;

/**
 * @SWG\Definition(
 *      definition="P_Fisica",
 *      required={""},
 *      @SWG\Property(
 *          property="cpf",
 *          description="cpf",
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
class P_Fisica extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'p__fisicas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'cpf',
        'pessoa_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cpf' => 'string',
        'pessoa_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function pessoa(){
        return $this->belongsTo(Pessoa::class, 'pessoa_id');
    }
}
