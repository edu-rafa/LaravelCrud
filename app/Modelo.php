<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Modelo extends Model
{
    protected $table = 'modelos';

    protected $primaryKey = 'id_modelo';

    protected $fillable = ['modelo, tipo, id_fk_marca'];

    public static function GetModeloByIdMarca($id)
    {
        $data = DB::table('modelos')
            ->select('modelo', 'id_modelo')
            ->where('id_fk_marca', $id)
            ->get();

        return $data;
            
    }

    public static function GetTipoByIdModelo($id)
    {
        $data = DB::table('modelos')
            ->select('tipo')
            ->where('id_modelo', $id)
            ->first();

        return $data;
            
    }
}
