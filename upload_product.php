<?php
if(isset($_POST["pavadinimas"]) && isset($_POST["kaina"]) && isset($_POST["aprasymas"]) && isset($_POST["kategorija"]) && isset($_POST["nuotrauka"]) && isset($_POST["ar_rodyti"])){
  if(isset($_POST["spec_kaina"])){
    include ("model_view_controller.php");
    $conn = connect_to_db('adeo-web-duomenys');
    $pavadinimas = mysqli_real_escape_string($conn,$_POST["pavadinimas"]);
    $spec_kaina = mysqli_real_escape_string($conn,$_POST["spec_kaina"]);
    $kaina = mysqli_real_escape_string($conn,$_POST["kaina"]);
    $aprasymas = mysqli_real_escape_string($conn,$_POST["aprasymas"]);
    $kategorija = mysqli_real_escape_string($conn,$_POST["kategorija"]);
    $nuotrauka = mysqli_real_escape_string($conn,$_POST["nuotrauka"]);
    $arrodyti = mysqli_real_escape_string($conn,$_POST["ar_rodyti"]);

    $uid = rand(10000, 99999);
    $sql1 = "SELECT UID FROM products WHERE UID = '$uid'";
    while($conn->query($sql1) === FAlSE){
      $uid = rand(10000, 99999);
    }
    $sql = "INSERT INTO products (Pavadinimas, aprasymas, nuotrauka, kaina, Spec_kaina, kategorija, UID, Status) VALUES ('$pavadinimas','$aprasymas','$nuotrauka','$kaina','$spec_kaina','$kategorija', '$uid', '$arrodyti')";
    if($conn->query($sql) === TRUE){
        echo "Produktas ikeltas sekmingai!";
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}
else {
    echo "error! variable not set";
  }
?>
