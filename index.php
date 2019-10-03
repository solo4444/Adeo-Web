
<!DOCTYPE html>
<?php
session_start();

$cookie_name = "shopping-cart-tracker";
if(!isset($_COOKIE[$cookie_name])){
$cookie_value = "";
setcookie($cookie_name, $cookie_value, time() + (86400*30), '/');
}

?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include "styles.php" ?>
    <script type="text/javascript" >
   $(document).ready(function(){
   $(".product-card").mouseenter(function(){
       $(this).find("img").animate({
           paddingLeft:'3%',
           paddingRight:'3%',
           paddingTop:'3%',
           paddingBottom:'3%',
       }, 100);
   });
   $(".product-card").mouseleave(function(){
       $(this).find("img").animate({
           paddingLeft:'-6%',
           paddingRight:'-6%',
           paddingTop:'-6%',
           paddingBottom:'-6%',
       }, 100);


   });

 })
    </script>
  </head>
  <body>
    <?php include "header.php" ?>
    <div class="container">
      <div class="col-12 border d-inline-flex ml-5 products-paragraph">
        <?php include "results.php" ?>
      </div>
    </div>
  </body>
</html>
