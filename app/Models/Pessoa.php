<?php

namespace App\Models;

use App\Models\P_Fisica;
use App\Models\P_Juridica;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pessoa extends Model
{
    use HasFactory;

    public function p_juridica() {
        return $this->hasOne(P_Juridica::class);
    }

    public function p_fisica(){
        return $this->hasOne(P_Fisica::class);
    }
}
