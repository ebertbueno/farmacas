<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Colaboradores_Repositories
{

    static function index()
    {
        $data = Model('Colaborador')::query();
        $data = $data->orderby('nome');

        if (!empty($_GET['busca_colaborador'])) {
            $busca = $_GET['busca_colaborador'];
            $data = $data->where('id', $busca)->orWhere('cpf', 'like', '%' . $busca . '%');
        }
        $data = $data->orderby('id')->paginate(10);

        return $data;
    }

    static function show($id)
    {
        return Model('Colaborador')::with('quaisSalarios')->find($id);
    }

    public static function store($data)
    {
        $validator = Validator::make($data, [
            'nome' => ['required', 'max:255'],
            'email' => ['required', 'unique:colaborador'],
            'cpf' => ['required', 'unique:colaborador', 'max:14'],
            'cep' => ['required', 'min:8', 'max:8'],

            'email' => ['required', Rule::unique('colaborador')->ignore($data['id'])],
            'cpf' => ['required', Rule::unique('colaborador')->ignore($data['id'])],
        ]);

        if ($validator->fails()) {
            if (!empty($data['id'])) {
                return redirect('/colaboradores/' . $data['id'] . '/edit')->withErrors($validator)->withInput();
            }
            return redirect('/colaboradores/create')->withErrors($validator)->withInput();
        }

        if (!empty($data['id'])) {
            Model('Colaborador')::find($data['id'])->update($data);
            $retorno = 'Atualizado com sucesso!';
        } else {
            Model('Colaborador')::create($data);
            $retorno = 'Cadastrado com sucesso!';
        }

        return redirect('/colaboradores')->with('mensagem', $retorno);
    }

    public static function edit($id)
    {
        return Model('Colaborador')::find($id);
    }

    public static function destroy($id)
    {
        Model('Colaborador')::destroy($id);
        return redirect('/colaboradores')->with('mensagem', 'Removido com sucesso!');
    }

    public static function altera_salario($data)
    {
        $validator = Validator::make($data, [
            'colaborador' => ['required', 'Integer'],
            'salario' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect('/colaboradores')->withErrors($validator)->withInput();
        }

        Model('Salario')::where('colaborador_id', $data['colaborador'])->delete();
        Model('Salario')::create([
            'colaborador_id' => $data['colaborador'],
            'salario' => formataMoeda($data['salario'], 2),
        ]);

        $requisicao = strpos($_SERVER['REQUEST_URI'], '/api/');
        if ($requisicao === false) {
            return redirect('/colaboradores/' . $data['colaborador'])->with('mensagem_salario', 'Salário atualizado!');
        }
        return response()->json([
            'status' => 200,
            'mensagem' => 'Inserido com sucesso',
        ]);
    }
}
