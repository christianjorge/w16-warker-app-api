<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelCidades extends Model
{
    use HasFactory;
    protected $table='cidades';

    public function relPostos(){
        return $this->hasMany('App\Models\ModelPostos', 'cidades_id');
    }
}
