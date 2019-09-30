
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
   $(document).on("click", ".show-user-button", function(){
       $.ajax({
           type: "POST",
           url: "show-diffrent-view.php",
           data: { what_to_show: "user"} ,
           success: function(response) {

               location.href = "index.php";
           }

       });

   });
   $(document).on("click", ".show-admin-button", function(){
       $.ajax({
           type: "POST",
           url: "show-diffrent-view.php",
           data: { what_to_show: "admin"} ,
           success: function(response) {
               location.href = "index.php";
           }

       });

   });
   $(document).on("click", ".login-button", function(){
        var message, username, password;
        message = $('#error_code').val();
        message.innerHTML = "";
        username = $('#login_username').val();
        password = document.getElementById('login_password').value;
        $('.login-button').popover('dispose');
        try {
            if(username.length < 7 && password.length < 7){
                throw "username and password are too short";
            }
            else if(username.length < 7){
                throw "username is too short";
            }
            else if(password.length < 7){
                throw "password is too short";
            }
            else{
                window.login_parameters_checked = true;
            }

        } catch (err) {
            $('.login-button').popover({title:"Something went wrong!", content: err, placement: "bottom"});
            $('.login-button').popover('show');
        }

        var user_username = $("#login_username");
        var user_password = $("#login_password");

        if(window.login_parameters_checked == true){
            $.ajax({
                type: 'POST',
                url: 'login-check.php',
                data: { user_username: username, user_password: password} ,
                success: function(response) {

                    location.href = "index.php";

                }

            });

        }

    });
    $(document).on("click", ".logout-button", function(){
        $.ajax({
            type: "POST",
            url: "logout.php",
            success: function(response) {
                location.href = "index.php";
            }

        });

    });
 });
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
