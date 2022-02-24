<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoVeiculo extends Model
{
    protected $table = 'tipo_veiculos';

    protected $primaryKey = 'id_auto';

    protected $fillable = ['tipo'];
}
