<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 11/26/2017
 * Time: 4:51 PM
 */
require "connect.php";
require "functions.php";
require "head.php";
require "nav_bar.php";

$city ="%";
$distrcit = $gender = $type = $key_min = $key_max = $rent_min = $rent_max = $occupation = "";
$err_keymoney = $err_rent = "";
$the_results="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $city = $_POST['city'];
    $distrcit = $_POST['district'];
    $gender=$_POST['gender'];
    $type=$_POST['type'];

    if (empty($_POST["key_min"])) {
        $key_min=0;
    } else {
        $key_min = mysqli_real_escape_string($conn,$_POST["key_min"]);
        $err_keymoney = validate_number($key_min);
    }

    if (empty($_POST["key_max"])) {
        $key_max=999999999;
    } else {
        $key_max = mysqli_real_escape_string($conn,$_POST["key_max"]);
        $err_keymoney = validate_number($key_max);
    }

    if (empty($_POST["rent_min"])) {
        $rent_min=0;
    } else {
        $rent_min = mysqli_real_escape_string($conn,$_POST["rent_min"]);
        $err_rent = validate_number($rent_min);
    }

    if (empty($_POST["rent_max"])) {
        $rent_max=999999999;
    } else {
        $rent_max = mysqli_real_escape_string($conn,$_POST["rent_max"]);
        $err_rent = validate_number($rent_max);
    }


    $occupation=(int)$_POST['occupation'];

//    if($err_rent="" and $err_keymoney=""){
//        $the_results=search_boarding_place($city, $distrcit, $gender,$type,$key_min,$key_max,$rent_min ,$rent_max ,$occupation);
//    }


}

?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <p>Location</p>
                    <label for="city">City</label>
                    <select class="form-control" id="city" name="city">
                        <?php
                        construct_city_list();
                        ?>

                    </select>
                    <label for="district">District</label>
                    <select class="form-control" id="district" name="district">
                        <option value="Ampara">Ampara</option>
                        <option value="Anuradhapura">Anuradhapura</option>
                        <option value="Badulla">Badulla</option>
                        <option value="Batticaloa">Batticaloa</option>
                        <option value="Colombo">Colombo</option>
                        <option value="Galle">Galle</option>
                        <option value="Gampaha">Gampaha</option>
                        <option value="Hambantota">Hambantota</option>
                        <option value="Jaffna">Jaffna</option>
                        <option value="Kalutara">Kalutara</option>
                        <option value="Kandy">Kandy</option>
                        <option value="Kegalle">Kegalle</option>
                        <option value="Kilinochchi">Kilinochchi</option>
                        <option value="Kurunegala">Kurunegala</option>
                        <option value="Mannar">Mannar</option>
                        <option value="Matale">Matale</option>
                        <option value="Matara">Matara</option>
                        <option value="Monaragala">Monaragala</option>
                        <option value="Mullaitivu">Mullaitivu</option>
                        <option value="Nuwara Eliya">Nuwara Eliya</option>
                        <option value="Polonnaruwa">Polonnaruwa</option>
                        <option value="Puttalam">Puttalam</option>
                        <option value="Ratnapura">Ratnapura</option>
                        <option value="Trincomalee">Trincomalee</option>
                        <option value="Vavuniya">Vavuniya</option>
                    </select>
                </div>
                <hr>
                <div class="form-group">
                    <p>Gender</p>
                    <label class="radio-inline"><input type="radio" name="gender" value="Male" checked>Male</label>
                    <label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
                </div>
                <hr>
                <div class="form-group">
                    <p>Type</p>
                    <div class="radio">
                        <label><input type="radio" name="type" value="1" checked>Single Room</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="type" value="2">Shared Room</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="type" value="4">Annex</label>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <p>Key Money</p>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="key_min">Min</label>
                            <input type="text" class="form-control" id="key_min">
                        </div>

                        <div class="col-md-6">
                            <label for="key_max">Max</label>
                            <input type="text" class="form-control" id="key_max">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <p>Rent</p>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="rent_min">Min</label>
                            <input type="text" class="form-control" id="rent_min">
                        </div>

                        <div class="col-md-6">
                            <label for="rent_max">Max</label>
                            <input type="text" class="form-control" id="rent_max">
                        </div>
                    </div>
                </div>
                <hr>

                <div class="form-group">
                    <p>Occupation</p>
                    <div class="radio">
                        <label><input type="radio" name="occupation" value="1" checked>Undergraduate</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="occupation" value="2">Student</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="occupation" value="4">Office Worker</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-default">Search</button>
            </form>

        </div>

        <div class="col-md-9">
            <?php echo search_boarding_place($city, $distrcit, $gender,$type,$key_min,$key_max,$rent_min ,$rent_max ,$occupation);?>
        </div>
    </div>
</div>

<?php
require "footer.php";
?>
