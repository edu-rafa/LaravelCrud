<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Dicas;
use App\Auto;
use App\TipoVeiculo;
use Illuminate\Http\Request;

class DicasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $keyword = $request->get('procurar');
        $perPage = 25;
        $dicas = Dicas::PegaValoresFK($keyword, $perPage, $user->id);

        foreach($dicas as $dica) {
            
            if( strlen($dica->dica) > 10 ) {
                $dica->dica = substr($dica->dica, 0, 10) . '...';
            }

        }

        if ( !empty($dicas) ) {
            return view('crud.index', compact('dicas'));
        } else {
            return view('crud.index');
        }
    }

    public function create()
    {
        $dicas = Auth::user();
        $dicas->tiposVeiculo = TipoVeiculo::get();

        return view('crud.create',compact('dicas'));
    }

    public function store(Request $request)
    {
        $requestData = $request->all();
        $user = Auth::user();

        $idAuto = Auto::Create([
            'marca'     => $requestData['marca']  ?? '',
            'modelo'    => $requestData['modelo']  ?? '',
            'versao'    => $requestData['versao']  ?? '',
            'id_fk_tpv' => $requestData['tipo']
        ]);

        Dicas::create([
            'id_fk_user' => $user->id,
            'id_fk_auto' => $idAuto->id_auto,
            'dica'       => $requestData['dica']
        ]);

        return redirect('/')->with('success', 'Dica Adicionada!');
    }

    public function edit($id)
    {
        $user  = Auth::user();
        $dicas = Dicas::PegaDicaPeloID($id);
        $dicas->tiposVeiculo = TipoVeiculo::get();

        if($dicas->id_fk_user != $user->id) {
            return redirect('/')->with('error', 'Permissão Negada');
        }

        return view('crud.edit', compact('dicas'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
 
        $dicas = Dicas::find($id);
        $auto  = Auto::find($dicas->id_fk_auto);

        //Atualiza autos
        $auto->marca     = $requestData['marca'];
        $auto->modelo    = $requestData['modelo'];
        $auto->versao    = $requestData['versao'];
        $auto->id_fk_tpv = $requestData['tipo'];
        $auto->save();

        //Atualiza Dica
        $dicas->dica = $requestData['dica'];
        $dicas->save();

        return redirect('/')->with('success', 'Dica Atualizada');
    }

    public function destroy($id)
    {
        $dicas = Dicas::PegaDicaPeloID($id);
        $user  = Auth::user();

        if($dicas->id_fk_user != $user->id) {
            return redirect('/')->with('error', 'Permissão Negada');
        } else {
            Dicas::destroy($id);
            return redirect('/')->with('success', 'Dica Excluida');
        }

    }
}
