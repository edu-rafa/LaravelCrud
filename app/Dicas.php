<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dicas extends Model
{
    protected $table = 'dicas';

    protected $primaryKey = 'id_dica';

    protected $fillable = ['id_fk_user', 'id_fk_marca', 'id_fk_modelo', 'versao', 'dica'];

    public static function PegaValoresFK($keyword, $idUser)
    {
        $data = DB::table('dicas as t')
            ->select('t.dica', 'usr.name', 'mod.modelo', 't.id_dica')
            ->join('users as usr', 'usr.id', '=', 't.id_fk_user')
            ->join('modelos as mod', 't.id_fk_modelo', '=', 'mod.id_modelo')
            ->join('marcas as m', 'm.id_marca', '=', 't.id_fk_marca');

        if (!empty($idUser)) {
            $data->where('t.id_fk_user', $idUser);
        }

        if (!empty($keyword)) {
            $data->where('mod.modelo', 'LIKE', "%$keyword%")
                ->orWhere('mod.tipo', 'LIKE', "%$keyword%")
                ->orWhere('m.marca', 'LIKE', "%$keyword%")
                ->orWhere('t.versao', 'LIKE', "%$keyword%");
        }

        $data = $data->orderBy('t.id_dica', 'desc')->get();

        return $data;
    }

    public static function PegaDicaPeloID($id)
    {
        $data = DB::table('dicas as t')
            ->select(
                't.dica', 'mod.modelo', 'm.marca', 
                'm.id_marca', 't.versao', 't.id_dica', 
                't.id_fk_user', 'mod.tipo', 'mod.id_modelo'
            )
            ->join('users as usr', 'usr.id', '=', 't.id_fk_user')
            ->join('modelos as mod', 't.id_fk_modelo', '=', 'mod.id_modelo')
            ->join('marcas as m', 'm.id_marca', '=', 't.id_fk_marca')
            ->where('t.id_dica', $id)
            ->first();
            
        return $data;
    }
}
