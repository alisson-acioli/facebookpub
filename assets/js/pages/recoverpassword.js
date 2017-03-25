$(document).ready(function(){

    $("#recoverPasswordBtn").on('click', function(){

        var email = $("input[name='emailRecuperarSenha']").val();

        $("#msg-return").removeClass();
        $("#msg-return").html('');

        $.ajax({
            url: baseURL+'requests/send_link_recoverpassword',
            data: {email: email},
            type: 'POST',
            dataType: 'json',
            Async: false,

            success: function(callback){

                $("#msg-return").addClass(callback.class);
                $("#msg-return").html(callback.message);
            }
        });
    });
});