<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Farmacas!</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="/layout/css/bootstrap.min.css" rel="stylesheet">
    <link href="/layout/css/style.css" rel="stylesheet">

</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <img alt="Logotipo" src="/layout/img/logotipo.png">
            </div>
            <div class="col-md-3">
                @if(Auth()->check())
                <div class="media">
                    <div class="media-body text-right">
                        Logado como: <h5 class="mt-0">{!! Auth()->user()->name !!}</h5>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="row" style="display: none">
            <div class="col-md-12">
                <div class="alert alert-dismissable alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>Alert!</h4>
                    <strong>Warning!</strong>
                    Best check yo self, you're not looking too good.
                    <a href="#" class="alert-link">alert link</a>
                </div>
            </div>
        </div>
        @if(Auth()->check())
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-2">
                        <a href="/home">
                            <li class="btn btn-{!! Request::is('home') ? 'success' : 'link' !!} btn-block">Início</li>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="/colaboradores/create">
                            <li class="btn btn-{!! Request::is('colaboradores/create') ? 'success' : 'link' !!} btn-block">Novo colaborador</li>
                        </a>
                    </div>
                    <div class="col-md-1">
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="btn btn-link">Sair</button>
                        </form>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-6">
                        <form method="GET" action="/colaboradores">
                            <div class="row">
                                <div class="col-md-12">Filtrar colaborador</div>
                                <div class="col-md-8">
                                    <input class="form-control mr-sm-2" type="text" name="busca_colaborador" placeholder="Filtro por ID ou CPF" value="{!! !empty($_GET['busca_colaborador']) ? $_GET['busca_colaborador'] : Null !!}">
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-primary btn-block my-2 my-sm-0" type="submit">Filtrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <form method="POST" action="/colaboradores/altera_salario">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">Alterar salário de colaborador</div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="colaborador" required="required" placeholder="ID" value="{{ old('colaborador') }}">
                            @error('colaborador')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="salario" required="required" placeholder="1000.00" value="{{ old('salario') }}">
                            @error('salario')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                        <div class="col-md-3"><button type="submit" class="btn btn-primary">Salvar</button></div>
                    </div>
                </form>
            </div>
        </div>
        @endif

        <div class="col-md-12">&nbsp;</div>
        @if (session('mensagem'))
        <div class="col-md-12 bg-success">{!! session('mensagem') !!}</div>
        @endif

        <div class="row">
            <div class="col-md-12">@yield('content')</div>
        </div>
    </div>

    <script src="//code.jquery.com/jquery-2.2.2.min.js"></script>
    <script src="/layout/js/jquery.min.js"></script>
    <script src="/layout/js/bootstrap.min.js"></script>
    <script src="/layout/js/scripts.js"></script>
</body>

</html>