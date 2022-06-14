<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\P_Juridica;
use App\Models\P_Fisica;

/**
 * @SWG\Definition(
 *      definition="Veiculo",
 *      required={""},
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
class Veiculo extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'veiculos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'p__fisicas_id',
        'p__juridicas_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function p_juridica(){
         return $this->belongsTo(P_Juridica::class, 'p__juridicas_id');
    }

    public function p_fisica(){
        return $this->belongsTo(P_Fisica::class, 'p__fisicas_id');
   }

    
}
