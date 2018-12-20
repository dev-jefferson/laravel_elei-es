<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    public $timestamps = false;
    protected $table = 'candidatos';
    protected $fillable = [
        "nome",
        "numero",
        "partido",
        "categoria",
        "img",
        "votos",
    ];
}
