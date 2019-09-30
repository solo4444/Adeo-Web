<!DOCTYPE html>
<?php  session_start();?>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <?php include_once ("styles.php");  ?>
    <body>

        <?php
        include_once ("header.php");
        include_once  ("model_view_controller.php"); ?>
        <div class="container">
            <?php include ("check_if_admin.php") ?>
        </div>
    </body>

    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '.siusti', function() {
                var email = $("#outputEmail").val();
                var current_password = $("#CurrentPassword").val();
                var new_password = $("#NewPassword").val();
                var repeat_new_password = $("#RepeatNewPassword").val();
                if(new_password == repeat_new_password){
                    $.ajax({
                        type: "POST",
                        url: "info_update.php",
                        data: { new_email: email, password: current_password, new_password: new_password} ,
                        success: function(response) {
                            $(".status_messsage1").text(response);
                        }
                    });
                }
            });
        })
    </script>
</html>
