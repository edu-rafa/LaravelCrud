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
        $perPage = 25;
        $dicas   = Dicas::PegaValoresFK($keyword, $perPage, NULL);

        foreach($dicas as $dica) {

            if( strlen($dica->dica) > 10 ) {
                $dica->dica = substr($dica->dica, 0, 10) . '...';
            }

        }

        if ( !empty($dica) ) {
            return view('home', compact('dicas'));
        } else {
            return view('home');
        }
    }

    public function detalhe($id)
    {
        $dicas = Dicas::PegaDicaPeloID($id);
        $dicas->tiposVeiculo = TipoVeiculo::get();

        return view('crud.detalhe', compact('dicas'));
    }
}
