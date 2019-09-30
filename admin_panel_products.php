<?php
echo '
<table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">ID</th>
      <th scope="col">Pavadinimas</th>
      <th scope="col">Link\'as</th>
      <th scope="col">Nuotrauka</th>
      <th scope="col">Kaina</th>
      <th scope="col">Spec Kaina</th>
      <th scope="col">Iverinimas</th>
      <th scope="col">Kategorija</th>
      <th scope="col">Rodyti</th>
      <th scope="col">UID</th>
    </tr>
  </thead>
  <tbody>';
  include_once  ("model_view_controller.php");

  $results = get_products_data();

  //print_r($results);

  while($row = $results->fetch_assoc()){
    if($row["Status"]){
      $status = "Taip";
    }
    else{$status = "Ne";}
    echo'
    <tr>
      <th><input type="checkbox" name="pazymetas" value="'.$row["ID"].'"></th>
      <td scope="row">'.$row["ID"].'</th>
      <td>'.$row["Pavadinimas"].'</td>
      <td><a href="product_detail.php?pavadinimas='.$row["Pavadinimas"].'">linkas</a></td>
      <td>'.$row["Nuotrauka"].'</td>
      <td>'.$row["Kaina"].'</td>
      <td>'.$row["Spec_kaina"].'</td>
      <td>'.$row["Ivertinimas"].'</td>
      <td>'.$row["Kategorija"].'</td>
      <td>'.$status.'</td>
      <td>'.$row["UID"].'</td>
    </tr>';
  }
  echo '</tbody>
</table>';
?>
