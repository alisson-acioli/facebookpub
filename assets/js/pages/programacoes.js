$(document).ready(function(){

    $("input#selecionarTudo").on('change', function(){

        if($(this).is(':checked')){
            $("input#excluir").prop('checked', true);
        }else{
            $("input#excluir").prop('checked', false);
        }
    });
});