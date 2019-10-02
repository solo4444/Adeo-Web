<?php
function connect_to_db($dbname){

    $servername = "localhost:3306";
    $username = "root";
    $password = "root";


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}


function get_products_data(){
    $sql = "SELECT ID, Pavadinimas, Aprasymas, Nuotrauka, Kaina, Ivertinimas, Kategorija, UID, Status, Spec_kaina FROM products";
    $result = connect_to_db("adeo-web-duomenys")->query($sql);
    if($result){
    return $result;
    }
    else {
        echo connect_to_db("adeo-web-duomenys")->error;
    }
}
function get_product_data($pavadinimas){
    $row = "";
    $sql = "SELECT ID, Pavadinimas, Aprasymas, Nuotrauka, Kaina, Ivertinimas, Kategorija, UID, Status, Spec_kaina FROM products";
    $result = connect_to_db("adeo-web-duomenys")->query($sql);
    while($row = $result->fetch_assoc()){
        // $message = $row["Pavadinimas"];
        // echo "<script type='text/javascript'>alert('$message');</script>";
    if($row["UID"] == $pavadinimas){
    return $row;
    }
    else{
        echo connect_to_db("adeo-web-duomenys")->error;
    }
}
}
function get_products_data_for_grid(){
  $sql = "SELECT ID, Pavadinimas, Aprasymas, Nuotrauka, Kaina, Ivertinimas, Kategorija, UID, Status, Spec_kaina FROM products WHERE Status ='1'";
  $result = connect_to_db("adeo-web-duomenys")->query($sql);
  if($result){
  return $result;
  }
  else {
      echo connect_to_db("adeo-web-duomenys")->error;
  }
}
function get_filter_by_category($category)
{
    $sql = "SELECT ID, Pavadinimas, Aprasymas, Nuotrauka, Kaina, Ivertinimas, Kategorija, UID FROM products WHERE kategorija = \"$category\"";
    $result = connect_to_db("adeo-web-duomenys")->query($sql);
    if($result){
    return $result;
    }
    else {
        echo connect_to_db("adeo-web-duomenys")->error;
    }
}
function get_user_password($username){
    //var_dump($username);
    $sql = "SELECT Password FROM users WHERE Username = \"$username\"";
    $result = connect_to_db("adeo-web-duomenys")->query($sql);
    if($result){
    return $result;
    }
    else {
        echo connect_to_db("adeo-web-duomenys")->error;
    }

}
function get_user_info_by_username($username)
{
    $sql = "SELECT Email FROM users WHERE Username = \"$username\"";
    $results = connect_to_db("adeo-web-duomenys")->query($sql);
    if($results){
    return $results;
    }
    else {
        echo connect_to_db("adeo-web-duomenys")->error;
    }
}
function get_product_rating_average($pavadinimas)
{
    $conn = connect_to_db("adeo-web-duomenys");
    $sql = "SELECT AVG(Ivertinimas) AS Ivertinimo_vidurkis FROM produkto_komentarai WHERE Produktas = \"$pavadinimas\"";
    $result = $conn->query($sql);
    if($result){
    return $rating = $result->fetch_assoc();
    }

}
function get_configuration()
{
  $sql = "SELECT * FROM konfiguracija";
  $results = connect_to_db("adeo-web-duomenys")->query($sql);
  if($results){
  return $results;
  }
  else {
      echo connect_to_db("adeo-web-duomenys")->error;
  }
}

?>
