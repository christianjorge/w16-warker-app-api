<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPostos extends Model
{
    use HasFactory;
    protected $table = 'postos';
    //Campos que vou permitir cadastro:
    protected $fillable = ['reservatorio','latitude', 'longitude', 'cidades_id'];

    public function relCidades(){
        return $this->hasOne('App\Models\ModelCidades', 'id', 'cidades_id');
    }
}
