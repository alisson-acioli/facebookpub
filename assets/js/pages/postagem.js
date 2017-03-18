$(document).on("change", 'input[name="tipo"]', function(){

  var TipoPublicacao = $(this).val();

  $(".texto").css('display', 'none');
  $(".link").css('display', 'none');
  $(".imagem").css('display', 'none');
  $(".video").css('display', 'none');

  $("."+TipoPublicacao).css('display', 'block');
});

$(document).on("change", 'input[name="repetir_post"]', function(){

  var Repetir = $(this).val();

  if(Repetir == 1){
    $(".repeticao_postagem").css('display', 'block');
  }else{
    $(".repeticao_postagem").css('display', 'none');
  }
});





/* Validação do formulário */
$(function() {
   ! function() {
      function e() {
         return !!$("#bootstrap-wizard-form").valid() || (o.focusInvalid(), !1)
      }
      var o = $("#bootstrap-wizard-form").validate({
         rules: {

            tipo: "required",
            mensagem_texto: {
               required: 1,
               minlength: 10
            },

            url_link_link:{
               required: 1,
               url: 1
            },

            imagem_imagem:{
               required: 1
            },

            url_video_video:{
               required: 1,
               url: 1
            },

            data_agendamento:{
               required: 1,
               dateITA: true
            },

            hora_agendamento: {
               required: 1,
               time: true
            },

            repetir_post: "required",
            intervalo: "required",

            data_final:{
               required: 1,
               dateITA: true
            },

            paginas_programacao_select: "required"
         },
         errorElement: "div",
         errorPlacement: function(e, o) {
            e.addClass("form-control-feedback"), o.closest(".form-group").addClass("has-danger"), "checkbox" === o.prop("type") ? e.insertAfter(o.parent(".checkbox")) : e.insertAfter(o)
         },
         highlight: function(e, o, r) {
            $(e).closest(".form-group").addClass("has-danger").removeClass("has-success"), $(e).removeClass("form-control-success").addClass("form-control-danger")
         },
         unhighlight: function(e, o, r) {
            $(e).closest(".form-group").addClass("has-success").removeClass("has-danger"), $(e).removeClass("form-control-danger").addClass("form-control-success")
         }
      });
      $("#bootstrap-wizard-1").bootstrapWizard({
         tabClass: "nav-tabs",
         nextSelector: ".pager>.btn.next",
         previousSelector: ".pager>.btn.previous",
         onTabShow: function(e, o, r) {
            $(e).addClass("visited");
            var n = $("#finish-btn"),
               s = $("#next-btn"),
               t = o.find("li").length;
            r + 1 == t ? (n.show(), s.hide()) : (n.hide(), s.show())
         },
         onTabClick: function() {
            return e()
         },
         onPrevious: function(e, o, r) {
            $(e).removeClass("visited")
         },
         onNext: function(o, r, n) {
            return e()
         }
      }), 

      $("#finish-btn").on("click", function(o) {

         if(e()){

            var TipoPostagem = $("input[name='tipo']:checked").val();
            var DataAgendamento = $("input[name='data_agendamento']").val();
            var HoraAgendamento = $("input[name='hora_agendamento']").val();
            var RepetirPostagem = $("input[name='repetir_post']:checked").val();
            var Intervalo       = $("select[name='intervalo'] option:selected").val();
            var DataFinal       = $("input[name='data_final']").val();
            var Paginas         = '';

            $("select[name='paginas_programacao_select'] option:selected").each(function(){

               Paginas += $(this).val()+',';

            });

            if(TipoPostagem == 'texto'){

               var mensagem = $("textarea[name='mensagem_texto']").val();

               $.ajax({
                  url: baseURL+'requests/post_texto',
                  type: 'POST',
                  dataType: 'json',
                  data: {
                        mensagem: mensagem,
                        data_agendamento: DataAgendamento,
                        hora_agendamento: HoraAgendamento,
                        repetir_postagem: RepetirPostagem,
                        intervalo: Intervalo,
                        data_final: DataFinal,
                        paginas: Paginas
                     },

                  success: function(callback){

                     if(callback.status == 1){

                        swal({
                           title: 'Feito',
                           text: 'Programação feita com sucesso. Na data e hora programada sua postagem será feita!',
                           type: 'success'
                        }, function(){

                           window.location.href = baseURL+'conta/programacoes';

                        });

                     }else{

                        swal("Erro", "Ocorreu um erro ao fazer a programação: "+callback.erro, "error");

                        return false;
                     }

                  },

                  error: function(error){
                     console.log(error.responseText);
                  }

               });

            }else if(TipoPostagem == 'link'){

               var mensagem = $("textarea[name='mensagem_link']").val();
               var titulolink = $("input[name='titulo_link_link']").val();
               var descricaolink = $("textarea[name='descricao_link_link']").val();
               var imagemlink = $("input[name='imagem_link_link']").val();
               var urllink = $("input[name='url_link_link']").val();

               $.ajax({
                  url: baseURL+'requests/post_link',
                  type: 'POST',
                  dataType: 'json',
                  data: {
                        mensagem: mensagem,
                        titulo_link: titulolink,
                        descricao_link: descricaolink,
                        imagem_link: imagemlink,
                        url_link: urllink,
                        data_agendamento: DataAgendamento,
                        hora_agendamento: HoraAgendamento,
                        repetir_postagem: RepetirPostagem,
                        intervalo: Intervalo,
                        data_final: DataFinal,
                        paginas: Paginas
                     },

                  success: function(callback){

                     if(callback.status == 1){

                        swal({
                           title: 'Feito',
                           text: 'Programação feita com sucesso. Na data e hora programada sua postagem será feita!',
                           type: 'success'
                        }, function(){

                           window.location.href = baseURL+'conta/programacoes';

                        });

                     }else{

                        swal("Erro", "Ocorreu um erro ao fazer a programação: "+callback.erro, "error");

                        return false;
                     }

                  },

                  error: function(error){
                     console.log(error.responseText);
                  }

               });

            }else if(TipoPostagem == 'imagem'){

               var mensagem = $("textarea[name='mensagem_post_imagem']").val();
               var imagemimagem = $("input[name='imagem_imagem']").val();

               $.ajax({
                  url: baseURL+'requests/post_imagem',
                  type: 'POST',
                  dataType: 'json',
                  data: {
                        mensagem: mensagem,
                        imagem_imagem: imagemimagem,
                        data_agendamento: DataAgendamento,
                        hora_agendamento: HoraAgendamento,
                        repetir_postagem: RepetirPostagem,
                        intervalo: Intervalo,
                        data_final: DataFinal,
                        paginas: Paginas
                     },

                  success: function(callback){

                     if(callback.status == 1){

                        swal({
                           title: 'Feito',
                           text: 'Programação feita com sucesso. Na data e hora programada sua postagem será feita!',
                           type: 'success'
                        }, function(){

                           window.location.href = baseURL+'conta/programacoes';

                        });

                     }else{

                        swal("Erro", "Ocorreu um erro ao fazer a programação: "+callback.erro, "error");

                        return false;
                     }

                  },

                  error: function(error){
                     console.log(error.responseText);
                  }

               });

            }else if(TipoPostagem == 'video'){


               var titulovideo = $("input[name='titulo_video_video']").val();
               var descricaovideo = $("textarea[name='descricao_video_video']").val();
               var urlvideo = $("input[name='url_video_video']").val();
               var mensagem = $("textarea[name='mensagem_post_video']").val();

               $.ajax({
                  url: baseURL+'requests/post_video',
                  type: 'POST',
                  dataType: 'json',
                  data: {
                        mensagem: mensagem,
                        titulo_video: titulovideo,
                        descricao_video: descricaovideo,
                        url_video: urlvideo,
                        data_agendamento: DataAgendamento,
                        hora_agendamento: HoraAgendamento,
                        repetir_postagem: RepetirPostagem,
                        intervalo: Intervalo,
                        data_final: DataFinal,
                        paginas: Paginas
                     },

                  success: function(callback){

                     if(callback.status == 1){

                        swal({
                           title: 'Feito',
                           text: 'Programação feita com sucesso. Na data e hora programada sua postagem será feita!',
                           type: 'success'
                        }, function(){

                           window.location.href = baseURL+'conta/programacoes';

                        });

                     }else{

                        swal("Erro", "Ocorreu um erro ao fazer a programação: "+callback.erro, "error");

                        return false;
                     }

                  },

                  error: function(error){
                     console.log(error.responseText);
                  }

               });

            }else{

               swal("Erro", "Não foi identificado o tipo de postagem que você está tentando fazer. Recarregue essa página e tente novamente.", "error");

               return false;
            }

         }else{

            swal("Erro", "Por favor, preencha todos os campos!", "error")
         }

      
      })

   }()
});