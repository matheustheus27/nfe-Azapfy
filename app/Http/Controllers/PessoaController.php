<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PessoaController extends Controller
{
   public function registrar(Request $request){
       dd($request->all());
   }
}
