<footer class="site-footer">
         <div class="mr-auto">
            <p class="text-primary mb-0">Desenvolvido <i class="fa fa-heart text-success"></i> por <a href="mailto:alissonacioli@hotmail.com">Alisson Acioli</a></p>
         </div>
         <div><a href="javascript:void(0)">All rights reserved &copy; <?php echo website_config('nome_site');?></a></div>
      </footer>
      <!-- /.site-footer -->
   </main>
   <!-- /.site-main -->
</div>
<!-- /.site-wrapper -->
<div class="modal fade video-modal" id="video-modal" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content"><iframe src="about:blank" width="760" height="440" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>
   </div>
</div>
<!-- #video-modal -->
<!-- /.theme-customizer -->

<script>
var baseURL = '<?php echo base_url();?>';
</script>
<!-- core plugins -->
<script src="<?php echo base_url();?>assets/vendor/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/bower_components/tether/dist/js/tether.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/bower_components/switchery/dist/switchery.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/bower_components/waypoints/lib/shortcuts/sticky.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/bower_components/counterup/jquery.counterup.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>assets/global/js/plugins/dropdown-caret.js"></script>
<script src="<?php echo base_url();?>assets/global/js/plugins/firstlitter.js"></script>
<script src="<?php echo base_url();?>assets/global/js/plugins/video-modal.js"></script>


<script src="<?php echo base_url();?>assets/vendor/bower_components/chartist/dist/chartist.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/jvectormap/jquery-jvectormap.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/jvectormap/maps/jquery-jvectormap-world-mill.js"></script>
<script src="<?php echo base_url();?>assets/vendor/flot/jquery.flot.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/flot/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/flot/jquery.flot.categories.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/bower_components/peity/jquery.peity.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/owl-carousel/owl.carousel.min.js"></script>

<!-- site-wide scripts -->
<script src="<?php echo base_url();?>assets/global/js/main.js"></script>
<script src="<?php echo base_url();?>assets/global/js/settings.js"></script>
<script src="<?php echo base_url();?>assets/js/site.js"></script>
<script src="<?php echo base_url();?>assets/js/navbar.js"></script>
<script src="<?php echo base_url();?>assets/js/menubar.js"></script>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script>
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
</script>

<script>
Highcharts.chart('postagem_dia', {

    title: {
        text: 'Postagem por dia'
    },

    subtitle: {
        text: 'Quantidade de postagens feitas por dia'
    },

    yAxis: {
        title: {
            text: 'Quantidade'
        }
    },

    xAxis: {
      categories: [2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016]
    },

    credits:{
      enabled: false
    },

    legend:{
      enabled: false
    },

    series: [{
        name: 'Postagens',
        data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
    }]

});
</script>

<script>
Highcharts.chart('curtidas_dia', {

    title: {
        text: 'Curtidas por dia'
    },

    subtitle: {
        text: 'Curtidas total de todas as páginas por dia'
    },

    yAxis: {
        title: {
            text: 'Quantidade'
        }
    },

    xAxis: {
      categories: ['01/03/2017', '02/03/2017', '03/03/2017', '04/03/2017', '05/03/2017', '06/03/2017', '07/03/2017', '08/03/2017']
    },

    credits:{
      enabled: false
    },

    legend:{
      enabled: false
    },

    series: [{
        name: 'Curtidas',
        data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
    }]

});
</script>

<!-- theme customizer -->
<script src="<?php echo base_url();?>assets/examples/js/theme-customizer.js"></script>
<?php
if(isset($jsLoader)){
   foreach($jsLoader as $jsFile){
      echo '<script src="'.base_url($jsFile).'"></script>';
   }
}
?>

</body>
</html>