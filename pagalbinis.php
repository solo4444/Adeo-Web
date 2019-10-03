<?php

 echo'<script type="text/javascript" >
$(document).ready(function(){
  $(document).on("click", ".show-user-button", function(){
      $.ajax({
          type: "POST",
          url: "show-diffrent-view.php",
          data: { what_to_show: "user"} ,
          success: function(response) {

             location.reload();
          }

      });

  });
  $(document).on("click", ".show-admin-button", function(){
      $.ajax({
          type: "POST",
          url: "show-diffrent-view.php",
          data: { what_to_show: "admin"} ,
          success: function(response) {
             location.reload();
          }

      });
});
  $(document).on("click", ".login-button", function(){
       var message, username, password;
       message = $(\'#error_code\').val();
       message.innerHTML = "";
       username = $(\'#login_username\').val();
       password = document.getElementById(\'login_password\').value;
       $(\'.login-button\').popover(\'dispose\');
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
           $(\'.login-button\').popover({title:"Something went wrong!", content: err, placement: "bottom"});
           $(\'.login-button\').popover(\'show\');
       }

       var user_username = $("#login_username");
       var user_password = $("#login_password");

       if(window.login_parameters_checked == true){
           $.ajax({
               type: \'POST\',
               url: \'login-check.php\',
               data: { user_username: username, user_password: password} ,
               success: function(response) {

                   location.reload();

               }

           });

       }

   });
   $(document).on("click", ".logout-button", function(){
       $.ajax({
           type: "POST",
           url: "logout.php",
           success: function(response) {
               location.href ="index.php";
           }

       });

   });
   });
  </script>'; ?>
