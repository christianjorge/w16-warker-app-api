<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPostos extends Model
{
    use HasFactory;
    protected $table = 'postos';

    public function relCidades(){
        return $this->hasOne('App\Models\ModelCidades', 'id', 'cidades_id');
    }
}
