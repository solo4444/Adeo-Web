<!DOCTYPE html>
<?php session_start();?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include "styles.php"?>
  </head>
  <body>
    <?php include 'header.php';?>
    <div class="container">
      <h2>Konfiguracija</h2>
      <?php include "konfiguracijos_forma.php"?>
    <script type="text/javascript">
    $(document).ready(function () {
      $(document).on('click', '.siusti-i-duombaze', function() {
          var mokesciai = $("#TaxInput").val();
          var g_nuolaida_procentais = $("#ProductPInput").val();
          var g_nuolaida_fixed = $("#ProductPriceInput").val();

          if($("#RodytiInput").prop('checked')){
          var ar_rodyti = 1;
        }else{
          var ar_rodyti = 0;
        }
              $.ajax({
                  type: "POST",
                  url: "update_configuration.php",
                  data: { mokesciai: mokesciai, rodyti: ar_rodyti, g_nuolaida_procentais: g_nuolaida_procentais, g_nuolaida_fixed: g_nuolaida_fixed} ,
                  success: function(response) {
                      $(".status_messsage2").text(response);
                  }
              });

      });
    })
    </script>
  </div>
  </body>
</html>
