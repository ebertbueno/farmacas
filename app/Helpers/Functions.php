<?php

function Model($model)
{
    // conecta na model para não precisar declarar as models no topo de cada local que for utilizado
    $conexao = '\App\Models\\' . $model;
    return new $conexao();
}

function listaColaboradores($paginacao = 0)
{
    // lista os colaboradores da plataforma, o parâmetro paginacao em zero pula a paginação
    $data = Model('Colaborador')::query();
    $lista = $data->orderby('nome');

    if ($paginacao > 0) {
        $lista = $data->paginate($paginacao);
    } else {
        $lista = $data->get();
    }

    return $lista;
}

function formataData($data, $formato = 'd/m/Y')
{
    // se vier data em formato YYYY-mm-dd hh:mm:ss
    $consulta = strpos($data, ' ');
    if ($consulta === false) {
        $data = $data;
    } else {
        $data = explode(' ', $data)[0];
    }

    // retorna a data no formato que foi passado
    return date($formato, strtotime($data));
}


function formataMoeda($curr, $casas = 2, $formata = false)
{
    if (!empty($curr)) {
        $curr = (is_numeric($curr) ? number_format($curr, 8) : $curr);
        $curr = str_replace(',', '.', $curr);
        $curr = explode('.', $curr);
        $nova = '';

        foreach ($curr as $key => $data) {
            if (count($curr) - 1 > $key) {
                $nova .= $data;
            }
        }

        $nova .= ',' . $curr[$key];

        $curr = $nova;

        $curr = str_replace(' ', '', $curr);
        $curr = str_replace('R$', '', $curr);
        $curr = str_replace(',', '.', $curr);
        $curr = @number_format($curr, $casas);
        $curr = str_replace(',', '', $curr);

        if ($formata) {
            if (!empty($curr)) {
                $curr = number_format($curr, $casas);
                $curr = str_replace(',', '|', $curr);
                $curr = str_replace('.', ',', $curr);
                $curr = str_replace('|', '.', $curr);

                switch (idiomaPadrao()) {
                    case 'pt-br':
                        $simbolo = 'R$ ';
                        break;

                    default:
                        $simbolo = '$ ';
                        break;
                }

                return $simbolo . ' ' . $curr;
            }
            return number_format(0, $casas);
        }

        return $curr;
    }
    return number_format(0, 2);
}