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
      <button type="button" class="btn btn-danger istrinti">Ištrinti</button>
      <button type="button" class="btn btn-warning"><a href="konfiguracija.php" style="color: white">Konfiguracija</a></button>
      <h3 class="status_messsage1"></h3>
      <?php include 'admin_panel_products.php'; ?>

      <h2 style="margin-left: 30%">Ikelti i duomenu baze duomenis</h2>

      <form class="upload-to-database" action="" method="post">
          <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="ProductNameInput">Produkto pavadinimas</label>
                  <input type="email" class="form-control" id="ProductNameInput" placeholder="Pavadinimas...">
              </div>
              <div class="form-group col-md-2">
                  <label for="ProductPriceInput">Kaina</label>
                  <input type="number" class="form-control" id="ProductPriceInput" placeholder="$">
              </div>
              <div class="form-group col-md-2">
                  <label for="ProductSPriceInput">Spec. Kaina</label>
                  <input type="number" class="form-control" id="ProductSPriceInput" placeholder="$">
              </div>
              <div class="form-group col-md-2">
                <label for="RodytiInput">Rodyti</label>
                <input type="checkbox" id="RodytiInput" checked data-toggle="toggle">
              </div>

          </div>
          <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="AprasymoInput">Produkto Aprasymas</label>
                  <textarea class="form-control" rows="5" id="AprasymoInput" placeholder="Tekstas..."></textarea>
              </div>
              <div class="form-group col-md-3">
                  <label for="PictureInput">Nuotraukos link\'as</label>
                  <input type="text" class="form-control" id="PictureInput" placeholder="img/">

              </div>
              <div class="form-group col-md-3">
                  <label for="CategoryInput">Kategorija</label>
                  <input type="text" class="form-control" id="CategoryInput" placeholder="kategorija">
                  <input type="button" name="Submit" value="Submit" class="btn btn-success siusti-i-duombaze" style="margin-left: 10%; margin-top: 5%;">
              </div>
          </div>
          <div class="form-row">

          </div>
          <h3 class="status_messsage2"></h3>
      </form>
    </div>
    <script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.siusti-i-duombaze', function() {
            var produkto_pavadinimas = $("#ProductNameInput").val();
            var produkto_kaina = $("#ProductPriceInput").val();
            var produkto_spec_kaina = $("#ProductSPriceInput").val();
            var produkto_kategorija = $("#CategoryInput").val();
            var produkto_aprasymas = $("#AprasymoInput").val();
            var produkto_nuotraukos_linkas = $("#PictureInput").val();

            if($("#RodytiInput").prop('checked')){
            var ar_rodyti = 1;
          }else{
            var ar_rodyti = 0;
          }
            if(produkto_pavadinimas.length > 0 && produkto_kaina.length > 0 && produkto_kategorija.length > 0 && produkto_aprasymas.length > 0 && produkto_nuotraukos_linkas.length > 0){
                $.ajax({
                    type: "POST",
                    url: "upload_product.php",
                    data: { pavadinimas: produkto_pavadinimas, kaina: produkto_kaina, spec_kaina: produkto_spec_kaina, aprasymas: produkto_aprasymas, kategorija: produkto_kategorija, nuotrauka: produkto_nuotraukos_linkas, ar_rodyti: ar_rodyti} ,
                    success: function(response) {
                        $(".status_messsage2").text(response);
                    }
                });
            }
        });
        $(document).on('click', '.istrinti', function() {
          var checkboxes = document.getElementsByName("pazymetas");
          var checkboxesChecked = [];
          for (var i=0; i<checkboxes.length; i++) {
             if (checkboxes[i].checked) {
                checkboxesChecked.push(checkboxes[i].value);
             }
          }
          if(checkboxes.length>0){
                $.ajax({
                    type: "POST",
                    url: "delete_product.php",
                    data: {productsID: checkboxesChecked} ,
                    success: function(response) {
                        location.reload();
                        $(".status_messsage1").text(response);
                    }
                });
            }
        });
      })
    </script>
  </body>
</html>
