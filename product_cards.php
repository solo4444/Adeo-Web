<?php
include_once ("model_view_controller.php");
$pavadinimas = $row["Pavadinimas"];
$result = get_product_rating_average($pavadinimas);
$result1 = get_configuration();
$formattedNumWithDiscount = 0;
$line = "";
$konfiguracija = $result1->fetch_assoc();
if($result["Ivertinimo_vidurkis"] == null){
    $result["Ivertinimo_vidurkis"] = 0.5;
}
if($konfiguracija["rodyti_su_mokesciais"]){
  $formattedNum = number_format($row["Kaina"], 2);

  $formattedNum = $formattedNum * ($konfiguracija["rodyti_su_mokesciais"] / 100) + $formattedNum;

}
else{
  $formattedNum = number_format($row["Kaina"], 2);
}
if($konfiguracija["g_nuolaida_procentais"] != 0 && $result["Spec_kaina"]){
  $formattedNumWithDiscount = $formattedNum * ($konfiguracija["g_nuolaida_procentais"] / 100) + $formattedNum;
}
else if($konfiguracija["g_nuolaida_fiksuota"] != 0 && $result["Spec_kaina"]){
  $formattedNumWithDiscount = $formattedNum - $konfiguracija["g_nuolaida_fiksuota"];
}
else {
  $line = "<h5 class=\"card-title\">".$formattedNum."$ </h5>";
}
$rating = $result["Ivertinimo_vidurkis"]*10*2;
echo"<a href=\"product_detail.php?pavadinimas=".$row["Pavadinimas"]."\"><div class=\"card product-card \">";
echo"<div class=\"card-body\">";
echo"<h5 class=\"card-title product-name\">".$row["Pavadinimas"]."</h5>";
echo"</div>";
echo"<img class=\"card-img-top\" src=\"img/".$row["Nuotrauka"]."\"alt=\"Card image\" height=\"100%\" width=\"100%\">";
echo"</a><div class=\"card-body\">";
echo"<h5 class=\"card-title\">".$formattedNum."$ ".$formattedNumWithDiscount."$</h5>";
echo "<form action=\"\" method=\"POST\" class=\"add-to-cart\">";
echo"<button type=\"button\" name=\"Į krepšelį\" class=\"add-to-shopping-cart-button btn-success\">Į krepšelį</button>";
echo "<div class=\"star-ratings-sprite\"><span style=\"width:".$rating."%\" class=\"star-ratings-sprite-rating\"></span></div>";
echo "</form>";
echo"</div>";
echo "</div>";
echo "<br>";

?>
