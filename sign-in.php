<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 11/27/2017
 * Time: 12:42 PM
 */
require "functions.php";
require "head.php";
require "nav_bar.php";
require "connect.php";
$u_email=$u_pass="";
$err_email=$err_pass="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $err_email = "Username is required";
    } else {
        $u_email = mysqli_real_escape_string($conn,$_POST["email"]);
        $err_email = validate_email($u_email);
    }

    if (empty($_POST["pass"])) {
        $err_pass = "Password is required";
    } else {
        $u_pass = mysqli_real_escape_string($conn,$_POST["pass"]);
    }

    if($err_email=="" and $err_pass==""){
        user_login($u_email,$u_pass);

    }
}
?>
<div class="container">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="row">
            <div class="col-md-12">
                <label for="email">E-Mail</label>
                <input type="text" class="form-control" id="email" name="email">
                <span><?php echo $err_email ?></span>
            </div>
            <div class="col-md-12">
                <label for="passowrd">Password</label>
                <input type="password" class="form-control" id="pass" name="pass">
                <span><?php echo $err_pass ?></span>
            </div>
        </div>
        <button type="submit" class="btn btn-default">Sign In</button>
    </form>
</div>
<?php
require "footer.php";
?>
