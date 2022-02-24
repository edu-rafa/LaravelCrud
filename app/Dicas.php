<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dicas extends Model
{
    protected $table = 'dicas';

    protected $primaryKey = 'id_dica';

    protected $fillable = ['id_fk_user', 'id_fk_auto', 'dica'];

    public static function PegaValoresFK($keyword, $perPage, $idUser)
    {
        $dicas = DB::table('dicas as t')
            ->select('t.dica', 'usr.name', 'at.modelo', 't.id_dica')
            ->join('users as usr', 'usr.id', '=', 't.id_fk_user')
            ->join('autos as at', 'at.id_auto', '=', 't.id_fk_auto')
            ->join('tipo_veiculos as tp', 'tp.id_tp', '=', 'at.id_fk_tpv');

        if (!empty($idUser)) {
            $dicas->where('t.id_fk_user', '=', $idUser);
        }

        if (!empty($keyword)) {
            $dicas->where('at.modelo', 'LIKE', "%$keyword%")
                ->orWhere('at.marca', 'LIKE', "%$keyword%")
                ->orWhere('atp.tipo', 'LIKE', "%$keyword%")
                ->orWhere('at.versao', 'LIKE', "%$keyword%");
        }

        $dicas = $dicas->orderBy('t.id_dica', 'desc')->paginate($perPage);
        return $dicas;
    }

    public static function PegaDicaPeloID($id)
    {
        $dicas = DB::table('dicas as t')
            ->select('t.dica', 'at.modelo', 'at.marca', 'at.versao', 't.id_dica', 't.id_fk_user', 'atp.tipo','atp.id_tp')
            ->join('users as usr', 'usr.id', '=', 't.id_fk_user')
            ->join('autos as at', 'at.id_auto', '=', 't.id_fk_auto')
            ->join('tipo_veiculos as tp', 'tp.id_tp', '=', 'at.id_fk_tpv')
            ->where('t.id_dica', '=', $id)
            ->first();

        return $dicas;
    }
}
