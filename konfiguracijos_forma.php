<?php
include_once "model_view_controller.php";
$results = get_configuration();
$row = $results->fetch_assoc();
echo '<form class="upload-to-database" action="" method="post">
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="ProductNameInput">Mokesciai %</label>
            <input type="email" class="form-control" id="TaxInput" placeholder="%" value='.$row["mokesciai"].'>
        </div>
        <div class="form-group col-md-3">
          <label for="RodytiInput">Rodyti kaina su mokesciais</label>
          <input type="checkbox" id="RodytiInput" checked data-toggle="toggle">
        </div>
        <div class="form-group col-md-3">
            <label for="ProductSPriceInput">Globali fiksuota nuolaida $</label>
            <input type="number" class="form-control" id="ProductPriceInput" placeholder="-$" value='.$row["g_nuolaida_fiksuota"].'>
        </div>
        <div class="form-group col-md-3">
        <label for="ProductPInput">Globali nuolaida %</label>
            <input type="number" class="form-control" id="ProductPInput" placeholder="-%" value='.$row["g_nuolaida_procentais"].'>
        </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-2">
        <input type="button" name="Submit" value="Submit" class="btn btn-success siusti-i-duombaze" style="margin-left: 10%; margin-top: 5%;">
      </div>
    </div>
    <h3 class="status_messsage2"></h3>
</form>';
?>
