<?php
    $conn = connect_to_db("adeo-web-duomenys");
    // $message = $_GET['pavadinimas'];
    // echo "<script type='text/javascript'>alert('$message');</script>";
    $sql = "SELECT ID, Produktas, Username, Komentaras, Ivertinimas, Data, UID FROM produkto_komentarai WHERE UID = '{$_GET['pavadinimas']}'";
    $results = $conn->query($sql);
    while($row = $results->fetch_assoc()){
        include ("comment_cards.php");
    }
?>
