<?php

/**
    @example dd/mm/YYYY -> YYYY/mm/dd e YYYY/mm/dd -> dd/mm/YYYY

    @data data de entrada
    @separador_atual separador da data de entrada
    @separador separador que será colocado na nova data
**/

function converter_data($data, $separador_atual = '-', $separador = '/'){

    $quebra = explode($separador_atual, $data);

    return $quebra[2].$separador.$quebra[1].$separador.$quebra[0];

}
?>