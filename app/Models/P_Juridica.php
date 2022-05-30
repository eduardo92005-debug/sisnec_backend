<?php

namespace App\Models;

use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class P_Juridica extends Model
{
    use HasFactory;

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }
}
