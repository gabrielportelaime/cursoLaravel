<?php

namespace App\Http\Controllers;

class SobreNosController extends Controller
{
    public function __construct(){
        $this->middleware('log.acesso');
    }
    public function sobre(){
        return view('site.sobrenos');
    }
}
