
function GeraGraficosRelatorios(paginas, periodo){

    var paginas = paginas || '';
    var periodo = periodo || '';

    $("#postagem_dia").empty();
    $("#curtidas_dia").empty();

    $.ajax({
        url: baseURL+'requests/relatorios/postagens',
        type: 'POST',
        data: {paginas: paginas, periodo: periodo},
        dataType: 'json',
        Async: false,

        success: function(callback){

            Highcharts.chart('postagem_dia', {

                title: {
                    text: postagem_por_dia
                },

                subtitle: {
                    text: quantidade_postagem_dia
                },

                yAxis: {
                    title: {
                        text: quantidade
                    }
                },

                xAxis: {
                  categories: callback.categories
                },

                credits:{
                  enabled: false
                },

                legend: {
                    align: 'center',
                    verticalAlign: 'bottom',
                    x: 0,
                    y: 0
                },

                series: callback.series

            });
        }
    });

    $.ajax({
        url: baseURL+'requests/relatorios/curtidas',
        type: 'POST',
        data: {paginas: paginas, periodo: periodo},
        dataType: 'json',
        Async: false,

        success: function(callback){

            Highcharts.chart('curtidas_dia', {

                title: {
                    text: curtidas_por_dia
                },

                subtitle: {
                    text: curtidas_total_paginas
                },

                yAxis: {
                    title: {
                        text: quantidade
                    }
                },

                xAxis: {
                  categories: callback.categories
                },

                credits:{
                  enabled: false
                },

                legend: {
                    align: 'center',
                    verticalAlign: 'bottom',
                    x: 0,
                    y: 0
                },

                series: callback.series

            });
        }
    });
}


$(document).ready(function(){
    GeraGraficosRelatorios();
});

$(document).ready(function(){
    $("#FiltrarRelatorio").on('click', function(){

        var paginas = $("#paginas option:selected").val();
        var periodo = $("#periodo").val();

        GeraGraficosRelatorios(paginas, periodo);
    });
});