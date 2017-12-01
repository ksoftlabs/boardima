<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 11/27/2017
 * Time: 12:29 PM
 */
require "connect.php";
require "functions.php";
require "head.php";
require "nav_bar.php";

$u_fname=$u_sname=$u_phone=$u_email=$u_address=$u_pass1=$u_pass2=$u_agree="";

$err_fname=$err_sname=$err_phone=$err_email=$err_address=$err_pass1=$err_pass2=$err_agree="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
        $err_fname="First Name is required";
    }else{
        $u_fname=mysqli_real_escape_string($conn,$_POST["fname"]);
        $err_fname=validate_text($u_fname);
    }

    if (empty($_POST["sname"])) {
        $err_sname="Surname is required";
    }else{
        $u_sname=mysqli_real_escape_string($conn,$_POST["sname"]);
        $err_sname=validate_text($u_sname);
    }

    if (empty($_POST["phone"])) {
        $err_phone="Phone Number is required";
    }else{
        $u_phone=mysqli_real_escape_string($conn,$_POST["phone"]);
        $err_phone=validate_phone($u_phone);
    }

    if (empty($_POST["email"])) {
        $err_email="Email is required";
    }else{
        $u_email=mysqli_real_escape_string($conn,$_POST["email"]);
        $err_email=validate_email($u_email);
    }
    if (empty($_POST["address"])) {
        $err_address="Address is required";
    }else{
        $u_address=mysqli_real_escape_string($conn,$_POST["address"]);
        $err_address=validate_address($u_address);
    }

    if (empty($_POST["pass1"])) {
        $err_pass1="Password is required";
    }else{
        $u_pass1=mysqli_real_escape_string($conn,$_POST["pass1"]);
    }

    if (empty($_POST["pass2"])) {
        $err_pass2="Password is required";
    }else {
        $u_pass2 = mysqli_real_escape_string($conn, $_POST["pass2"]);
    }

    if ($u_pass1!=$u_pass2){
        $err_pass2="Passwords Do not Match";
    }

    if (!isset($_POST['agree'])) {
        $err_agree="You must agree to terms and conditions to proceed";
    }

//    var_dump($_POST);
    if($err_fname=="" and $err_sname=="" and $err_phone=="" and $err_email=="" and $err_address=="" and $err_pass1=="" and $err_pass2=="" and $err_agree==""){
        create_user($u_fname,$u_sname,$u_phone,$u_email,$u_address,$u_pass1);
    }
}
?>
<div class="container">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="row">
            <div class="col-md-6">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $u_fname;?>">
                <span><?php echo $err_fname ?></span>
            </div>
            <div class="col-md-6">
                <label for="sname">Surname</label>
                <input type="text" class="form-control" name="sname" id="sname" value="<?php echo $u_sname;?>">
                <span><?php echo $err_sname ?></span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $u_phone;?>">
                <span><?php echo $err_phone ?></span>
            </div>
            <div class="col-md-6">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="<?php echo $u_email;?>">
                <span><?php echo $err_email ?></span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address" value="<?php echo $u_address;?>">
                <span><?php echo $err_address ?></span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="pass1" id="pass1" >
                <span><?php echo $err_pass1 ?></span>
            </div>
            <div class="col-md-6">
                <label for="password2">Confirm Password</label>
                <input type="password" class="form-control" name="pass2" id="pass2">
                <span><?php echo $err_pass2 ?></span>
            </div>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label><input type="checkbox" value="1" name="agree" id="agree">I agree to terms and conditions</label>
                <br>
                <span><?php echo $err_agree ?></span>
            </div>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>

<?php
require "footer.php";
?>
