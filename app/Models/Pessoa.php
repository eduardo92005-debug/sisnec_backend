<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\P_Fisica;
use App\Models\P_Juridica;

/**
 * @SWG\Definition(
 *      definition="Pessoa",
 *      required={"nome", "email"},
 *      @SWG\Property(
 *          property="nome",
 *          description="nome",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="telefone_1",
 *          description="telefone_1",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="telefone_2",
 *          description="telefone_2",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
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
class Pessoa extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'pessoas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nome',
        'telefone_1',
        'telefone_2',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nome' => 'string',
        'telefone_1' => 'string',
        'telefone_2' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required|max:255',
        'email' => 'required|email'
    ];

    public function p_fisica(){
        return $this->hasOne(P_Fisica::class);
    }

    public function p_juridica(){
        return $this->hasOne(P_Juridica::class);
    }
}
