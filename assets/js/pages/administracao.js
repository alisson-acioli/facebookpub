$(document).ready(function(){
    $("a#AbrirModal").on('click', function(){

        var type = $(this).attr('data-type');
        var id   = $(this).attr('data-id');

        if(type == 'detalhes'){

            var urlRequest = 'user_details';

        }else if(type == 'editar'){
            var urlRequest = 'user_edit';
        }

        $.ajax({
            url: baseURL+'requests/'+urlRequest,
            type: 'POST',
            data: {id: id},
            dataType: 'json',
            Async: false,

            success: function(callback){

                if(type == 'detalhes'){

                    $("#msg-return-detalhes").removeClass();
                    $("#msg-return-detalhes").empty();
                    $("td[data-attr]").empty();

                    if(callback.status == 1){

                        $("td[data-attr='nome']").text(callback.fields.nome);
                        $("td[data-attr='email']").text(callback.fields.email);
                        $("td[data-attr='login']").text(callback.fields.login);
                        $("td[data-attr='status']").text(callback.fields.status);
                        $("td[data-attr='admin']").text(callback.fields.admin);
                    }else{
                        $('#msg-return-detalhes').addClass(callback.class);
                        $("#msg-return-detalhes").html(callback.error);
                    }

                    
                }else if(type == 'editar'){

                    $("input[name='nome']").val('');
                    $("input[name='email']").val('');
                    $("input[name='login']").val('');
                    $("input[name='status']").prop('checked', false);
                    $("input[name='administrador']").prop('checked', false);
                    $("#id_usuario").val(id);

                    if(callback.status == 1){

                        $("input[name='nome']").val(callback.fields.nome);
                        $("input[name='email']").val(callback.fields.email);
                        $("input[name='login']").val(callback.fields.login);

                        if(callback.fields.status == '0'){
                            $("input[data-name='naoativo']").prop('checked', true);
                        }else if(callback.fields.status == '1'){
                            $("input[data-name='ativo']").prop('checked', true);
                        }else if(callback.fields.status == '2'){
                            $("input[data-name='bloqueado']").prop('checked', true);
                        }

                        if(callback.fields.admin == '0'){
                            $("input[data-name='nao']").prop('checked', true);
                        }else if(callback.fields.admin == '1'){
                            $("input[data-name='sim']").prop('checked', true);
                        }
                    }else{

                        $("#msg-return-editar").addClass(callback.class);
                        $("#msg-return-editar").html(callback.error);
                        $("#salvarAlteracoesBtn").prop('disabled', true);
                    }
                }
            }
        });

        $("#"+type).click();
    });
});


$(document).ready(function(){

    $("#salvarAlteracoesBtn").on('click', function(){

        var nome = $("input[name='nome']").val();
        var email = $("input[name='email']").val();
        var login = $("input[name='login']").val();
        var senha = $("input[name='senha']").val();
        var status = $("input[name='status']:checked").val();
        var admin = $("input[name='administrador']:checked").val();
        var iduser = $("#id_usuario").val();
        var error = false;

        if(nome == '' || email == '' || login == ''){

            swal('Erro', 'Preencha todos os campos para finalizar a edição', 'error');

            error = true;
        }

        if(error == false){

            $.ajax({
                url: baseURL+'requests/save_user',
                type: 'POST',
                data: {id:iduser, nome:nome, email:email, login: login, senha: senha, status: status, admin: admin},
                dataType: 'json',
                Async: false,

                success: function(callback){

                    $("#msg-return-editar").addClass(callback.class);
                    $("#msg-return-editar").html(callback.message);
                }
            });
        }
    });
});

$(document).ready(function(){

    $("a#excluirUsuario").on('click', function(){

        var id = $(this).attr('data-id');
        var tr = $(this).closest('tr');

        swal({
            title: tem_certeza,
            text: tem_certeza_excluir_usuario,
            type: "warning",
            showCancelButton: true,
            cancelButtonText: cancelar,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: sim_deletar,
            closeOnConfirm: false 
            }, function(){

            $.ajax({
                url: baseURL+'requests/delete_user',
                type: 'POST',
                dataType: 'json',
                data: {id: id},

                success: function(callback){

                    if(callback.status == 1){

                        swal(deletado, usuario_deletado, "success"); 

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
});