<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'autos';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id_auto';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['marca', 'modelo', 'versao','id_fk_tpv'];

    
}
