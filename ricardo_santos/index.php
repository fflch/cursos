<?php

/*
@author Ricardo Fernando dos Santos (st.ricardof@gmail.com)
Este algoritmo trata os campos departamento,paginas,ano,grau,area do arquivo teses.csv (linha24)
e salva um outro .csv com os devidos tratamentos.

Há funções que mostram as variações dos campos, elas não são necessárias para
a tratar o .csv, são apenas auxiliares que permitiram analisar padrões.
Por exemplo, as linhas 18,44, 74-75 e 87 se referem à análise dos registros de departamentos e
podem ser comentadas sem nenhum problema, já que não
interferem para o objetivo principal do programa.

*/
require('functions.php');
setlocale(LC_CTYPE, 'pt_BR.UTF8');

//=============CAMPOS TRATADOS=============================
$departamento = array();
$paginas = array();
$ano = array();
$grau = array();
$area = array();
//=============FIM CAMPOS TRATADOS=============================


$row = -1;
$colunm = array();
$info = array();//data/value
$nid = 290001;

if (($handle = fopen("teses.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
        $num = count($data);
        if($row == -1){
            $colunm = $data;
            $colunm[] = "nid";
        }else{
            $info = $data;
            $table[$row] = array();
            for ($c=0; $c < $num; $c++) {
                $aux = $info[$c];
                $aux = formatar_padrao($aux);
                if($colunm[$c] == 'departamento'){
                    $departamento = add_to_array(get_departamento($aux, false), $departamento); //usado para saber quais são as variações de departamentos. Não é necessário para a obtenção do .csv tratado
                    $aux = get_departamento($aux, true);
                }
                else if($colunm[$c] == 'paginas'){
                    $paginas = add_to_array(get_paginas($aux, false), $paginas); //usado para saber quais são as variações de páginas.  Não é necessário para a obtenção do .csv tratado
                    $aux = get_paginas($aux, true);
                }
                else if($colunm[$c] == 'ano'){
                    $ano = add_to_array(get_ano($aux, false), $ano);// usado para saber quais são as variações de anos . Não é necessário para a obtenção do .csv tratado
                    $aux = get_ano($aux, true);
                }
                else if($colunm[$c] == 'grau'){
                    $grau = add_to_array(get_grau($aux, false), $grau);// usado para saber quais são as variações de graus . Não é necessário para a obtenção do .csv tratado
                    $aux = get_grau($aux, true);
                }
                else if($colunm[$c] == 'area'){
                    $area = add_to_array($aux, $area);// usado para saber quais são as variações de areas . Não é necessário para a obtenção do .csv tratado
                }
                $table[$row][$colunm[$c]] = $aux;
            }
            $table[$row]['nid'] = $nid++;
        }
        $row++;
    }
    fclose($handle);
    save_csv('testes_normalizadas', $colunm, $table, 2000);

    //salva os campos padrões e as variações que fugiram do padrão. Para pegar apenas os valores padrões use get_field_name(field_name, true) acima, assim os valores fora do padrão não serão incluídos no array.
    sort($area);
    save_file('area_copy_listagem.txt',$area);
    sort($departamento);
    save_file('departamento_variacoes.txt',$departamento);
    sort($grau);
    save_file('grau_variacoes.txt',$grau);
    sort($paginas);
    save_file('paginas_variacoes.txt',$paginas);
    sort($ano);
    save_file('ano_variacoes.txt',$ano);
    
}

echo '<pre>';
//sort($departamento);
//print_r($departamento);
//print_r($colunm);
//print_r($table);
//print_r($area);
//print_r($ano);
//print_r($paginas);
//print_r($departamento);
//print_r($grau);
echo '</pre>';
?>