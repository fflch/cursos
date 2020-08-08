<?php

function formatar_padrao($str){
    $aux = $str;
    $aux = mb_strtoupper($aux);
    $aux = trim($aux);
    
    if(!is_numeric($aux)){
        //set empty if string has no words (i.e.: '*', '---------', '_____', '@#@$')
        if(strlen(preg_replace('/[^a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇ]/', '', $aux)) == 0){
            $aux = preg_replace('/[^a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇ]/', '', $aux);
        }
    }
    return $aux;
}

function get_departamento($str, $empty){
    
    //remove all spaces and points
    $aux = preg_replace('/\s|\./', '', $str);
    if(preg_match('/CI(E|Ê)NCIAS*\s*POL(I|Í)T+ICA|DP|^DCP$|^CP$|POL(I|Í)TICA/', $aux, $match)){
        return "CIÊNCIA POLÍTICA";
    }
    else if(preg_match('/SOCIOLOGIA|DS/', $aux, $match)){
        return "SOCIOLOGIA";
    }
    else if(preg_match('/ANTR?OPOLOGIU?A|DA/', $aux, $match)){
        return "ANTROPOLOGIA";
    }
    else if(preg_match('/FILO(S|Z)(O|I)FIA|DF/', $aux, $match)){
        return "FILOSOFIA";
    }
    else if(preg_match('/GEOGRAFIA|DG/', $aux, $match)){
        return "GEOGRAFIA";
    }
    else if(preg_match('/H(I|Í)ST(Ó|O)RIA|DH/', $aux, $match)){
        return "HISTÓRIA";
    }
    else if(
        (
            preg_match('/LETRAS*|L(I|Í)NGUA+S*/', $aux, $match)
            &&
            (
                preg_match('/CL(Á|A)SSICAS*/', $aux, $match)
                ||
                preg_match('/VERN(Á|A)CULAS*/', $aux, $match)    
            )

        )
        ||
        preg_match('/LETRAS*\s*CL(Á|A)SSICAS*\s*E*\s*VERN(Á|A)CULAS*|DLCV|LCV|DCV|CL(Á|A)SSICAS*\s*E*\s*VERN(Á|A)CULAS*|LETRAS*\s*CL(Á|A)SSICAS*|^FLC$|^DLC$/', $aux, $match)){
        return "LETRAS CLÁSSICAS E VERNÁCULAS";
    }
    else if(
        (
            preg_match('/LETRAS*|L(I|Í)NGUA+S*/', $aux, $match)
            &&
            preg_match('/MODERNAS*/', $aux, $match)    
        )
        ||
        preg_match('/LETRAS*\s*MODERNAS*|LM|DLM/', $aux, $match)){
        return "LETRAS MODERNAS";
    }
    else if(
        (
            preg_match('/LETRAS*|L(I|Í)NGUA+S*/', $aux, $match)
            &&
            preg_match('/ORIENTAIS*/', $aux, $match)    
        )
        ||
        preg_match('/LETRAS*\s*ORIENTAIS*|DLO|^LO$/', $aux, $match)){
        return "LETRAS ORIENTAIS";
    }
    else if(preg_match('/L?ING(U|Ü)(Í|I)STICA+|^DL$/', $aux, $match)){
        return "LINGUÍSTICA";
    }
    else if(preg_match('/TEORIA\s*LIT(E|É)R(Á|A)RIA\s*E\s*LITERATURA\s*COMPARADA|DTLL|TLL|TEORIA\s*LIT(E|É)R(Á|A)RIA/', $aux, $match)){
        return "TEORIA LITERÁRIA E LITERATURA COMPARADA";
    }else{
        return $empty ? "" : $str;
    }
}

function get_grau($str, $empty){
    //remove all spaces and points
    $aux = preg_replace('/\s|\./', '', $str);
    if(preg_match('/DO?(U|Y)T(O|I)R*A+D(O|A)|^D$|DOUTORAMENTO|DOUTOR|DOURADO|DOUTRORADO/', $aux, $match)){
        return "DOUTORADO";
    }
    else if(preg_match('/ME?S?TRA?D(O|A)|^M$|MESTRE|MSETRADO|MESTR?ARDO/', $aux, $match)){
        return "MESTRADO";
    }
    else if(preg_match('/LIVRE\s*-*DOC(Ê|E)NA?CIA|LIVRE\s*-*DOCENTE/', $aux, $match)){
        return "LIVRE DOCÊNCIA";
    }
    else{
        return $empty ?  "" : $str;
    }
}

function get_paginas($page, $empty){
    //check if it's roman 
    if(preg_match('/^M{0,3}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/', $page, $_match)){
        return roman2number($page);
    }//get first sequence of digit in $page. So "154 + ANEXO" returns 154
    if(preg_match('/^\d{1}$|\d{2,}/', $page, $match)){    
        return $match[0];
    }else{
        return $empty ? "" : $page;
    }
}
function get_ano($ano, $empty){
    if(preg_match('/\d{4}/', $ano, $match)){    
        return $match[0];
    }else{
        return $empty ? "" : $ano;
    }
}


function roman2number($roman){
    $conv = array(
        array("letter" => 'I', "number" => 1),
        array("letter" => 'V', "number" => 5),
        array("letter" => 'X', "number" => 10),
        array("letter" => 'L', "number" => 50),
        array("letter" => 'C', "number" => 100),
        array("letter" => 'D', "number" => 500),
        array("letter" => 'M', "number" => 1000),
        array("letter" => 0, "number" => 0)
    );
    $arabic = 0;
    $state = 0;
    $sidx = 0;
    $len = strlen($roman);

    while ($len >= 0) {
        $i = 0;
        $sidx = $len;

        while ($conv[$i]['number'] > 0) {
            if (strtoupper(@$roman[$sidx]) == $conv[$i]['letter']) {
                if ($state > $conv[$i]['number']) {
                    $arabic -= $conv[$i]['number'];
                } else {
                    $arabic += $conv[$i]['number'];
                    $state = $conv[$i]['number'];
                }
            }
            $i++;
        }

        $len--;
    }
    return($arabic);
}

function add_to_array($item, $array){
    if(!in_array($item, $array) && strlen($item) > 0){
        $array[] = $item;
    }
    return $array;
}


function save_csv($file_name, $colunm_name, $table, $range = 0){
    $limit = $range == 0 ? count($table) : $range;
    $init = 0;
   
    while($init < count($table)){

        $fp = fopen($file_name.$init.'.csv', 'w');
        $aux_col_name = array();
        foreach ($colunm_name as $col_name) {
            if($col_name == 'nid'){
                $aux_col_name[] = 'nid';
                continue;
            } 
            $aux_col_name[] = $col_name == 'titulo' ? 'title' : 'field_'.$col_name.'_ricardosantos';
        }
        fputcsv($fp, $aux_col_name, ',', '"');
                        
        for($i = $init; $i < $limit ; $i++){
            $aux = array();
            
            foreach($table[$i] as $key => $value){
                $aux[] = $value;
            }
        
            fputcsv($fp, $aux, ',', '"');
            $init++;
            if($i == count($table)-1){
                fclose($fp);
                return;
            }
        }
        fclose($fp);
        if($init == $limit){
            $init = $limit;
            $limit += $range;
        }
        
    }
}
function save_file($file_name,$data){
    $fp = fopen($file_name, 'w');
    foreach($data as $val){
        fwrite($fp, $val . PHP_EOL);
    }
    fclose($fp);
}


/*
REGEX EXPRESSION


ANCHORS
^t -> match str starts with 't'
end$ -> match str ends with 'end'
^The end$  -> exact string match
test -> matchs any string that has the text 'test' in it
abc* -> match a string that has 'ab' and may be followed by 'c'


QUANTIFIERS 
abc*        matches a string that has ab followed by zero or more c 
abc+        matches a string that has ab followed by one or more c
abc?        matches a string that has ab followed by zero or one c
abc{2}      matches a string that has ab followed by 2 c
abc{2,}     matches a string that has ab followed by 2 or more c
abc{2,5}    matches a string that has ab followed by 2 up to 5 c
a(bc)*      matches a string that has a followed by zero or more copies of the sequence bc
a(bc){2,5}  matches a string that has a followed by 2 up to 5 copies of the sequence bc

OR operator 
a(b|c)     matches a string that has a followed by b or c (and captures b or c) 
a[bc]      same as previous, but without capturing b or c

\d         matches a single character that is a digit 
\w         matches a word character (alphanumeric character plus underscore) 
\s         matches a whitespace character (includes tabs and line breaks)
.          matches any character 
\d, \w and \s also present their negations with \D, \W and \S respectively.


GROUPING AND CAPTURING
a(bc)           parentheses create a capturing group with value bc 
a(?:bc)*        using ?: we disable the capturing group 
a(?<foo>bc)     using ?<foo> we put a name to the group 

Bracket expressions — []
[abc]            matches a string that has either an a or a b or a c -> is the same as a|b|c 
[a-c]            same as previous
[a-fA-F0-9]      a string that represents a single hexadecimal digit, case insensitively 
[0-9]%           a string that has a character from 0 to 9 before a % sign
[^a-zA-Z]        a string that has not a letter from a to z or from A to Z. 
                 In this case the ^ is used as negation of the expression 


infos taken from https://medium.com/factory-mind/regex-tutorial-a-simple-cheatsheet-by-examples-649dc1c3f285




















*/
?>





