<?php
if(isset($_SESSION["logged_in_user"]) && isset($_SESSION["show_admin"])){
    include_once  ("model_view_controller.php");
    $results = get_user_info_by_username($_SESSION["logged_in_user"]);
    $mail = $results->fetch_assoc();
    if($_SESSION["logged_in_user"] == "kabakaba" && $_SESSION["show_admin"] == "true"){
        echo '<form class="" action="" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h2 class="current_username">Username: '.$_SESSION["logged_in_user"].'</h2>
                </div>
                <div class="form-group col-md-6">
                    <label for="outputEmail">El. Pastas</label>
                    <input type="email" class="form-control" id="outputEmail" placeholder="" value="'.$mail["Email"].'">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword">Current Password</label>
                    <input type="password" class="form-control" id="CurrentPassword" placeholder="Password...">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword">New Password</label>
                    <input type="password" class="form-control" id="NewPassword" placeholder="Password...">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword">Repeat New Password</label>
                    <input type="password" class="form-control" id="RepeatNewPassword" placeholder="Password...">
                </div>
            </div>
            <input type="button" name="Submit" value="Submit" class="btn btn-success siusti">
            <h3 class="status_messsage1"></h3>
        </form>

        ';
    }
    else{

        echo '<form class="" action="" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h2 class="current_username">Username: '.$_SESSION["logged_in_user"].'</h2>
                </div>
                <div class="form-group col-md-6">
                    <label for="outputEmail">El. Pastas</label>
                    <input type="email" class="form-control" id="outputEmail" placeholder="" value="'.$mail["Email"].'">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword">Current Password</label>
                    <input type="password" class="form-control" id="CurrentPassword" placeholder="Password...">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword">New Password</label>
                    <input type="password" class="form-control" id="NewPassword" placeholder="Password...">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword">Repeat New Password</label>
                    <input type="password" class="form-control" id="RepeatNewPassword" placeholder="Password...">
                </div>
            </div>
            <input type="button" name="Submit" value="Submit" class="btn btn-success siusti">
            <h3 class="status_messsage1"></h3>
        </form>';
    }
}
 ?>
