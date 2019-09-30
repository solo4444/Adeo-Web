<?php
if(isset($_POST["productsID"])){
  include_once  ("model_view_controller.php");
  $products = $_POST["productsID"];
  for($i = 0 ; $i < sizeof($products); $i++){
    $sql = "DELETE FROM products WHERE ID = '$products[$i]'";
    $result = connect_to_db("adeo-web-duomenys")->query($sql);
    if($result){
      
    }
    else{
      echo'Klaida su ID: '.$products[$i];
    }
  }
}
?>
