<?php
session_start();

    if(isset($_POST["Produktas"]) && isset($_POST["Komentaras"]) && isset($_POST["Reitingas"]) && isset($_POST["Data"]) && isset($_POST["UId"])){
        include ("model_view_controller.php");
        $conn = connect_to_db('adeo-web-duomenys');
        $produktas = mysqli_real_escape_string($conn,$_POST["Produktas"]);
        $username = mysqli_real_escape_string($conn,$_SESSION["logged_in_user"]);
        $komentaras = mysqli_real_escape_string($conn,$_POST["Komentaras"]);
        $reitingas = mysqli_real_escape_string($conn,$_POST["Reitingas"]);
        $data = mysqli_real_escape_string($conn,$_POST["Data"]);
        $uid = mysqli_real_escape_string($conn,$_POST["UId"]);
        $sql = "INSERT INTO produkto_komentarai (Produktas, Username, Komentaras, Ivertinimas, Data, UID) VALUES ('$produktas' , '$username' , '$komentaras' ,'$reitingas' ,'$data', $uid)";

        if($conn->query($sql) === TRUE){
            echo "Komentaras issiustas sekmingai!";
        }else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
 ?>
