<?php
if(isset($_POST["pavadinimas"]) && isset($_POST["kaina"]) && isset($_POST["aprasymas"]) && isset($_POST["kategorija"]) && isset($_POST["nuotrauka"]) && isset($_POST["og_pavadinimas"]) && isset($_POST["spec_kaina"])){
    if(isset($_POST["ar_rodyti"])){
    include ("model_view_controller.php");
    $conn = connect_to_db('adeo-web-duomenys');
    $pavadinimas = mysqli_real_escape_string($conn,$_POST["pavadinimas"]);
    $kaina = mysqli_real_escape_string($conn,$_POST["kaina"]);
    $aprasamymas = mysqli_real_escape_string($conn,$_POST["aprasymas"]);
    $kategorija = mysqli_real_escape_string($conn,$_POST["kategorija"]);
    $nuotrauka = mysqli_real_escape_string($conn,$_POST["nuotrauka"]);
    $og_pavadinimas = mysqli_real_escape_string($conn,$_POST["og_pavadinimas"]);
    $spec_kaina = mysqli_real_escape_string($conn,$_POST["spec_kaina"]);
    $ar_rodyti = mysqli_real_escape_string($conn,$_POST["ar_rodyti"]);

    $sql = "UPDATE products SET Pavadinimas ='$pavadinimas' , Kaina = '$kaina' , Aprasymas = '$aprasamymas', Kategorija = '$kategorija', Nuotrauka = '$nuotrauka', Spec_kaina = '$spec_kaina', Status = '$ar_rodyti' WHERE UID = \"$og_pavadinimas\"";


    if ($conn->query($sql) === TRUE) {
        echo "Produkto informacija atnaujinta";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
}
else{
    echo 'Neuzpildyti visi privalomi laukai';
}
?>
