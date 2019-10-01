<?php
if(isset($_POST["mokesciai"]) && isset($_POST["rodyti"]) && isset($_POST["g_nuolaida_procentais"]) && isset($_POST["g_nuolaida_fixed"])){
  include ("model_view_controller.php");
  $conn = connect_to_db('adeo-web-duomenys');
  $mokesciai = mysqli_real_escape_string($conn,$_POST["mokesciai"]);
  $rodyti = mysqli_real_escape_string($conn,$_POST["rodyti"]);
  $gnprocentais = mysqli_real_escape_string($conn,$_POST["g_nuolaida_procentais"]);
  $gnfixed = mysqli_real_escape_string($conn,$_POST["g_nuolaida_fixed"]);
  $sql = "UPDATE konfiguracija SET mokesciai = '$mokesciai', rodyti_su_mokesciais = '$rodyti', g_nuolaida_procentais = '$gnprocentais', g_nuolaida_fiksuota = '$gnfixed'";

  if($conn->query($sql) === TRUE){
    echo'Konfiguracija atnaujinta sekmingai!';
  }
}
?>
