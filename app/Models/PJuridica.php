<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PJuridica extends Model
{
    use SoftDeletes;
    protected $table = 'p__juridicas';

    protected $fillable = [
        'cnpj',
        'nome_fantasia',
        'inscricao_estadual',
        'razao_social',
        'pessoa_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/p-juridicas/'.$this->getKey());
    }

    public function pessoas(){
        return $this->belongsTo(Pessoa::class, 'pessoa_id');
    }
}
