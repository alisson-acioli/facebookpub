$(document).ready(function(){

    /**
        Seleciona todos os itens de programação
    **/
    $("input#selecionarTudo").on('change', function(){

        if($(this).is(':checked')){
            $("input#excluir").prop('checked', true);
        }else{
            $("input#excluir").prop('checked', false);
        }
    });

    /**
        Exclui uma programação
    **/
    $("a#deletaProgramacao").on('click', function(){

        var idProgramacao = $(this).attr('data-id');
        var tr = $(this).closest('tr');

        swal({
            title: tem_certeza,
            text: tem_certeza_excluir_programacao,
            type: "warning",
            showCancelButton: true,
            cancelButtonText: cancelar,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: sim_deletar,
            closeOnConfirm: false 
            }, function(){

            $.ajax({
                url: baseURL+'requests/delete_programming',
                type: 'POST',
                dataType: 'json',
                data: {id: idProgramacao},

                success: function(callback){

                    if(callback.status == 1){

                        swal(deletado, programacao_deletada, "success"); 

                        tr.addClass('bg-danger').fadeOut(2000);

                    }else{
                        swal(erro, erro_deletar+": "+callback.erro, "danger");
                    }
                },

                error: function(error){
                    console.log(error.responseText);
                }
            });    
        });

    });

    /**
        Exclui várias programação
    **/
    $("button#deletarSelecionados").on('click', function(){

        var ids = '';

        $("input#excluir:checked").each(function(){
            
            ids += $(this).val()+',';
        });

        if(ids != ''){

            swal({
                title: tem_certeza,
                text: tem_certeza_excluir_programacoes,
                type: "warning",
                showCancelButton: true,
                cancelButtonText: cancelar,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: sim_deletar,
                closeOnConfirm: false 
                }, function(){

                $.ajax({
                    url: baseURL+'requests/delete_programming',
                    type: 'POST',
                    dataType: 'json',
                    data: {id: ids},

                    success: function(callback){

                        if(callback.status == 1){

                            swal(deletado, programacoes_deletadas, "success"); 

                            $("input#excluir:checked").each(function(){
                
                                $(this).closest('tr').addClass('bg-danger').fadeOut(2000);
                            });


                        }else{
                            swal(erro, erro_deletar+": "+callback.erro, "error");
                        }
                    },

                    error: function(error){
                        console.log(error.responseText);
                    }
                });    
            });
        }else{
            swal(ops, selecione_um_deletar, "error");
        }
    });

    /**
        Mostra detalhes da programação
    **/

    $("a#detalhesProgramacao").on('click', function(){

        var idProgramacao = $(this).attr('data-id');

        $.ajax({
            url: baseURL+'requests/details_programming',
            type: 'POST',
            data: {id:idProgramacao},

            success: function(html){

                $("#contentDetalhesProgramacao").empty();
                $("#contentDetalhesProgramacao").html(html);

                $("#verDetalhes").click();

            },

            error: function(error){
                console.log(error.responseText);
            }
        });
        
    });
});