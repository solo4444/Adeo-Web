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

if($row["Spec_kaina"] != 0){
  $line = "<h5 class=\"card-title\">".$row["Spec_kaina"]."$ <strike>".$formattedNum."$ </strike></h5>";
}
else if($konfiguracija["g_nuolaida_procentais"] != 0 && $row["Spec_kaina"] == 0){
  $formattedNumWithDiscount = $formattedNum - $formattedNum * ($konfiguracija["g_nuolaida_procentais"] / 100) ;
  $formattedNumWithDiscount = number_format($formattedNumWithDiscount, 2);
  $line = "<h3 class=\"card-title\"> ".$formattedNumWithDiscount."$</h3> <strike>".$formattedNum."$ </strike>";
}
else if($konfiguracija["g_nuolaida_fiksuota"] != 0 && $row["Spec_kaina"] == 0){
  $formattedNumWithDiscount = $formattedNum - $konfiguracija["g_nuolaida_fiksuota"];
  $formattedNumWithDiscount = number_format($formattedNumWithDiscount, 2);
  $line = "<h3 class=\"card-title w-15\">".$formattedNumWithDiscount."$</h3> <strike>".$formattedNum."$ </strike>";
}
else {
  $line = "<h5 class=\"card-title w-15\">".$formattedNum."$ </h5>";
}

if($konfiguracija["rodyti_su_mokesciais"]){$line= $line."<p style=\"font-style: italic; \"> su PVM</p>";}
else{$line= $line."<p style=\"font-style: italic; \"> + PVM</p>";}
$rating = $result["Ivertinimo_vidurkis"]*10*2;
echo"<a href=\"product_detail.php?pavadinimas=".$row["UID"]."\"><div class=\"card product-card \">";
echo"<div class=\"card-body\">";
echo"<h5 class=\"card-title product-name\">".$row["Pavadinimas"]."</h5>";
echo"<h5 class=\"card-title product-name\" style=\"float: right\">".$row["UID"]."</h5>";
echo"</div>";
echo"<img class=\"card-img-top\" src=\"img/".$row["Nuotrauka"]."\"alt=\"Card image\" height=\"100%\" width=\"100%\">";
echo"</a><div class=\"card-body\">";
echo "<div class=\"d-flex flex-row\">".$line."</div>";
echo "<form action=\"\" method=\"POST\" class=\"add-to-cart\">";
echo"<button type=\"button\" name=\"Į krepšelį\" class=\"add-to-shopping-cart-button btn-success\">Į krepšelį</button>";
echo "<div class=\"star-ratings-sprite\"><span style=\"width:".$rating."%\" class=\"star-ratings-sprite-rating\"></span></div>";
echo "</form>";
echo"</div>";
echo "</div>";
echo "<br>";

?>
