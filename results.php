<?php

include_once  ("model_view_controller.php");

$results = get_products_data_for_grid();

//print_r($results);

while($row = $results->fetch_assoc()){
    //print_r ($row);
    include ("product_cards.php");

}

?>
