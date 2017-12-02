<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 11/27/2017
 * Time: 12:47 PM
 */
require "functions.php";
require "head.php";
require "nav_bar.php";
$u_fname=$u_sname=$u_phone=$u_email=$u_address=$u_pass1=$u_pass2="";
$tmp_phone=$tmp_email=$tmp_address=$tmp_pass1=$tmp_pass2="";
$err_phone=$err_email=$err_address=$err_pass1=$err_pass2="";

$details=load_user_details($_SESSION["userid"]);
$u_fname=$details['fname'];
$u_sname=$details['sname'];
$u_phone=$details['phone'];
$u_email=$details['email'];
$u_address=$details['address'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

}
?>
<div class="container">
    <h2>Profile</h2>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Profile</a></li>
        <li><a data-toggle="tab" href="#menu1">My Ads</a></li>
    </ul>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="row">
                    <div class="col-md-6">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="fname" value="<?php echo $u_fname;?>" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="surname">Surname</label>
                        <input type="text" class="form-control" id="surname" name="sname" value="<?php echo $u_sname;?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $u_phone;?>">
                    </div>
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $u_email;?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $u_address;?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="pass1">Password</label>
                        <input type="password" class="form-control" id="pass1" name="pass1" >
                    </div>
                    <div class="col-md-6">
                        <label for="pass2">Confirm Password</label>
                        <input type="password" class="form-control" id="pass2" name="pass2">
                    </div>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <div id="menu1" class="tab-pane fade">
            <?php load_my_ads($_SESSION["userid"]) ?>
        </div>

    </div>
</div>

<?php
require "footer.php";
?>
