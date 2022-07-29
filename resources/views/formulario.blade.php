@extends('layout')

@section('content')

<form method="POST" action="/colaboradores">
    @csrf
    <div class="row">
        <div class="col-md-7">
            <label>Nome</label>
            <input type="text" name="nome" id="nome" value="{{ !empty($data['nome']) ? $data['nome'] : old('nome') }}" class="form-control">
            @error('nome')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>
        <div class="col-md-5">
            <label>Email</label>
            <input type="email" name="email" id="email" value="{{ !empty($data['email']) ? $data['email'] : old('email') }}" class="form-control">
            @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="col-md-12">&nbsp;</div>

        <div class="col-md-4">
            <label>CPF</label>
            <input type="text" name="cpf" id="cpf" value="{{ !empty($data['cpf']) ? $data['cpf'] : old('cpf') }}" class="form-control">
            @error('cpf')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>
        <div class="col-md-3">
            <label>RG</label>
            <input type="text" name="rg" id="rg" value="{{ !empty($data['rg']) ? $data['rg'] : old('rg') }}" class="form-control">
            @error('rg')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>
        <div class="col-md-2">
            <label>Nascimento</label>
            <input type="date" name="nascimento" id="nascimento" value="{{ !empty($data['nascimento']) ? $data['nascimento'] : old('nascimento') }}" class="form-control">
            @error('nascimento')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>
        <div class="col-md-3">
            <label>CEP</label>
            <input type="text" name="cep" id="cep" value="{{ !empty($data['cep']) ? $data['cep'] : old('cep') }}" class="form-control">
            @error('cep')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="col-md-12">&nbsp;</div>

        <div class="col-md-8">
            <label>Endereço</label>
            <input type="text" name="endereco" id="endereco" value="{{ !empty($data['endereco']) ? $data['endereco'] : old('endereco') }}" class="form-control">
            @error('endereco')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>
        <div class="col-md-4">
            <label>Número</label>
            <input type="text" name="numero" id="numero" value="{{ !empty($data['numero']) ? $data['numero'] : old('numero') }}" class="form-control">
            @error('numero')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>
        <div class="col-md-4">
            <label>Bairro</label>
            <input type="text" name="bairro" id="bairro" value="{{ !empty($data['bairro']) ? $data['bairro'] : old('bairro') }}" class="form-control">
            @error('bairro')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="col-md-12">&nbsp;</div>

        <div class="col-md-4">
            <label>Cidade</label>
            <input type="text" name="cidade" id="cidade" value="{{ !empty($data['cidade']) ? $data['cidade'] : old('cidade') }}" class="form-control">
            @error('cidade')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>
        <div class="col-md-3">
            <label>Estado</label>
            <input type="text" name="estado" id="estado" value="{{ !empty($data['estado']) ? $data['estado'] : old('estado') }}" class="form-control">
            @error('estado')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>
        <div class="col-md-5">
            <label>Telefone</label>
            <input type="text" name="telefone" id="telefone" value="{{ !empty($data['telefone']) ? $data['telefone'] : old('telefone') }}" class="form-control">
            @error('telefone')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="col-md-12">&nbsp;</div>
        <div class="col-md-9"></div>
        <div class="col-md-3"><button type="submit" class="btn btn-success btn-block">Salvar</button>
        </div>
        <input type="hidden" name="id" id="id" value="{{ !empty($id) ? $id : Null }}">
    </div>
</form>

@endsection