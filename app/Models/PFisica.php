<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Pessoa;

class PFisica extends Model
{
    use SoftDeletes;
    protected $table = 'p__fisicas';

    protected $fillable = [
        'cpf',
        'pessoa_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'deleted_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/p-fisicas/'.$this->getKey());
    }

    public function pessoas(){
        return $this->belongsTo(Pessoa::class, 'pessoa_id');
    }

}
