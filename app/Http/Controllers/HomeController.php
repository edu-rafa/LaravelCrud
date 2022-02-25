<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dicas;
use App\TipoVeiculo;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $keyword = $request->get('procurar');
        $dicas   = Dicas::PegaValoresFK($keyword, NULL);

        foreach($dicas as $dica) {

            if( strlen($dica->dica) > 10 ) {
                $dica->dica = substr($dica->dica, 0, 10) . '...';
            }

        }

        return view('home', compact('dicas'));
    }

    public function detalhe($id)
    {
        $data = Dicas::PegaDicaPeloID($id);
        return view('crud.detalhe', compact('data'));
    }
}
