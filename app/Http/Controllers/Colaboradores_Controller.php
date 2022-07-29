<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Colaborador_Request;
use App\Http\Controllers\Colaboradores_Repositories;

class Colaboradores_Controller extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Colaboradores_Repositories::index();
        return view('home', compact('data'));
    }

    public function create()
    {
        return view('formulario');
    }

    public function store(Request $request)
    {
        return Colaboradores_Repositories::store($request->all());
    }

    public function show($id)
    {
        $data = Colaboradores_Repositories::show($id);
        return view('detalhar', compact('data'));
    }

    public function edit($id)
    {
        $data = Colaboradores_Repositories::edit($id);
        return view('formulario', compact('id', 'data'));
    }

    public function destroy($id)
    {
        return Colaboradores_Repositories::destroy($id);
    }
    
    public function altera_salario(Request $request)
    {
        return Colaboradores_Repositories::altera_salario($request->all());
    }
}
