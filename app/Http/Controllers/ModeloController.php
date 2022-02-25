<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Marca;
use App\Modelo;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
   public function PegaModelosPorId($id)
   {
       $data = Modelo::GetModeloByIdMarca($id);
       return json_encode($data);
   }

   public function PegaTipoPeloId($id)
   {
       $data = Modelo::GetTipoByIdModelo($id);
       return json_encode($data);
   }
}
