<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Dicas;
use App\Marca;
use App\Modelo;
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
        $dicas = Dicas::PegaValoresFK($keyword, $user->id);

        foreach($dicas as $dica) {
            
            if( strlen($dica->dica) > 10 ) {
                $dica->dica = substr($dica->dica, 0, 10) . '...';
            }

        }

        return view('crud.index', compact('dicas'));
    }

    public function create()
    {
        $data = Marca::get();
        $data->modelos = Modelo::get();

        return view('crud.create',compact('data'));
    }

    public function store(Request $request)
    {
        $requestData = $request->all();
        $idUser = Auth::id();

        Dicas::create([
            'id_fk_user'   => $idUser,
            'id_fk_marca'  => $requestData['marca'],
            'id_fk_modelo' => $requestData['modelo'],
            'versao'       => $requestData['versao'],
            'dica'         => $requestData['dica']
        ]);

        return redirect('/')->with('success', 'Dica Adicionada!');
    }

    public function edit($id)
    {
        $user  = Auth::user();
        $data = Dicas::PegaDicaPeloID($id);

        if( $data->id_fk_user != $user->id ) {
            return redirect('/')->with('error', 'Permissão Negada');
        } else {
            return view('crud.edit', compact('data'));
        }
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $dicas = Dicas::find($id);

        $dicas->dica = $requestData['dica'];
        $dicas->versao = $requestData['versao'];
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
