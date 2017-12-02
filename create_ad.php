<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 11/29/2017
 * Time: 11:22 PM
 */
require "connect.php";
require "functions.php";
require "head.php";
require "nav_bar.php";

$ad_title=$ad_description=$ad_img1=$ad_img2=$ad_img3=$ad_img4=$ad_img5=$ad_city=$ad_district="";
$ad_type=$ad_gender=$ad_key_money=$ad_rent=$ad_negotiable=$ad_occupation="";
$ad_uni1=$ad_uni2=$ad_distance1=$ad_distance2=$ad_route1=$ad_route2=$ad_occupants="";

$err_title=$err_description=$err_img1=$err_img2=$err_img3=$err_img4=$err_img5=$err_city=$err_district="";
$err_type=$err_gender=$err_key_money=$err_rent=$err_negotiable=$err_occupation="";
$err_uni1=$err_uni2=$err_distance1=$err_distance2=$err_route1=$err_route2="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["title"])) {
        $err_title = "Title is required";
    } else {
        $ad_title = mysqli_real_escape_string($conn,$_POST["title"]);
        $err_title = validate_text_and_numbers($ad_title);
    }

    if (empty($_POST["description"])) {
        $err_description = "Description is required";
    } else {
        $ad_description = mysqli_real_escape_string($conn,$_POST["description"]);
        $err_description = validate_text_and_numbers($ad_description);
    }

    if (empty($_POST["img1"])) {
        $err_description = "One image is required";
    } else {

    }

    if (empty($_POST["city"])) {
        $err_city = "City is required";
    } else {
        $ad_city = mysqli_real_escape_string($conn,$_POST["city"]);
        $err_city = validate_text($ad_city);
    }

    if (empty($_POST["district"])) {
        $err_district = "District is required";
    } else {
        $ad_district = mysqli_real_escape_string($conn,$_POST["district"]);
//        $err_district = validate_text($ad_district);
    }

    if (empty($_POST["type"])) {
        $err_type = "Boarding type is required";
    } else {
        $ad_type = mysqli_real_escape_string($conn,$_POST["type"]);
//        $err_type = validate_text($ad_type);
    }

    if (empty($_POST["gender"])) {
        $err_gender= "Preferred gender is required";
    } else {
        $ad_gender = mysqli_real_escape_string($conn,$_POST["gender"]);
//        $err_gender = validate_text($ad_gender);
    }

    if (empty($_POST["key_money"])) {
        $err_key_money= "Key Money is required";
    } else {
        $ad_key_money = mysqli_real_escape_string($conn,$_POST["key_money"]);
        $err_key_money = validate_number($ad_key_money);
    }

    if (empty($_POST["rent"])) {
        $err_rent= "Rent is required";
    } else {
        $ad_rent = mysqli_real_escape_string($conn,$_POST["rent"]);
        $err_rent = validate_number($ad_rent);
    }

    if (empty($_POST["occupation"])) {
        $err_occupation= "Select at least one";
    } else {
        $ad_occupation = mysqli_real_escape_string($conn,$_POST["occupation"]);
        $err_occupation= validate_text($ad_occupation);
    }

    if (empty($_POST["uni1"])) {
//        $err_uni1= "Select at least one";
    } else {
        $ad_uni1 = mysqli_real_escape_string($conn,$_POST["uni1"]);
//        $err_uni1= validate_text($ad_occupation);
    }

    if (empty($_POST["uni2"])) {
//        $err_uni2= "Select at least one";
    } else {
        $ad_uni2 = mysqli_real_escape_string($conn,$_POST["uni2"]);
//        $err_uni2= validate_text($ad_uni2);
    }

    if (empty($_POST["previous"])) {
        $err_distance1= "Previous occupants required.";
    } else {
        $ad_distance1 = mysqli_real_escape_string($conn,$_POST["distance1"]);
        $err_distance1= validate_text($ad_distance1);
    }




    if(1==1){
        create_ad($_SESSION['userid'],$ad_title,$ad_description,$ad_img1,$ad_city,$ad_district,
        $ad_type,$ad_gender,$ad_key_money,$ad_rent,$ad_negotiable,$ad_occupation,
        $ad_uni1,$ad_uni2,$ad_distance1,$ad_distance2,$ad_route1,$ad_route2,$ad_occupants);

    }
}

?>
<div class="container">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="row">
            <div class="col-md-12">
                <h2>Create AD</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="description">Description</label>
                <textarea class="form-control" rows="5" id="description" name="description"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>Images</label>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-2">
                    <input type="file" id="image1" name="image1">
                </div>
                <div class="col-md-2">
                    <input type="file" id="image2" name="image2">
                </div>
                <div class="col-md-2">
                    <input type="file" id="image3" name="image3">
                </div>
                <div class="col-md-2">
                    <input type="file" id="image4" name="image4">
                </div>
                <div class="col-md-2">
                    <input type="file" id="image5" name="image5">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>Loaction</label>
            </div>
        </div>

        <div class="row">

            <div class="col-md-6">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city">
            </div>
            <div class="col-md-6">
                <label for="district">District</label>
                <select class="form-control" id="district" name="district">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <label>Boarding Type</label>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <label class="radio-inline"><input type="radio" name="type">Single Room</label>
                <label class="radio-inline"><input type="radio" name="type" checked>Shared Room</label>
                <label class="radio-inline"><input type="radio" name="type">Annex</label>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <label>Gender</label>
            </div>

        </div>
        <div class="row">

            <div class="col-md-12">
                <label class="radio-inline"><input type="radio" name="gender">Male</label>
                <label class="radio-inline"><input type="radio" name="gender">Female</label>
                <label class="radio-inline"><input type="radio" name="gender" checked>No Preference</label>
            </div>

        </div>

        <div class="row">

            <div class="col-md-4">
                <label for="key_money">Key Money</label>
                <input type="text" class="form-control" id="key_money" name="key_money">
            </div>
            <div class="col-md-4">
                <label for="Rent">Rent</label>
                <input type="text" class="form-control" id="rent" name="rent">
            </div>
            <div class="col-md-4">
                <label class="radio-inline"><input type="radio" name="negotiable" checked>Negotiable</label>
                <label class="radio-inline"><input type="radio" name="negotiable">Non-Negotiable</label>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <label>Occupation</label>
            </div>

        </div>
        <div class="row">

            <div class="col-md-12">
                <label class="checkbox-inline"><input type="checkbox" value="1" id="occupation" name="occupation">Undergraduate</label>
                <label class="checkbox-inline"><input type="checkbox" value="2" id="occupation" name="occupation">Student</label>
                <label class="checkbox-inline"><input type="checkbox" value="3" id="occupation" name="occupation">Office Worker</label>
            </div>

        </div>

        <div class="row">

            <div class="col-md-12">
                <label for="distance">Suitable for Undergraduates of</label>
            </div>

        </div>

        <div class="row">

            <div class="col-md-6">
                <select class="form-control" id="uni1" name="uni1" disabled>
                    <option value="dis" disabled selected>Select the University or Institution</option>
                    <option value="UCSC">University of Colombo School of Computing</option>
                    <option value="UoC">University of Colombo</option>
                    <option value="EU ">Eastern University</option>
                    <option value="UoJ">University of Jaffna</option>
                    <option value="UoK">University of Kelaniya</option>
                    <option value="UoM">University of Moratuwa</option>
                    <option value="open">Open University of Sri Lanka</option>
                    <option value="UoP">University of Peradeniya</option>
                    <option value="raja">University of Rajarata</option>
                    <option value="ruhu">University of Ruhuna</option>
                    <option value="sab">Sabaragamuwa University of Sri Lanka</option>
                    <option value="SEU">South Eastern University of Sri Lanka</option>
                    <option value="UoSJ">University of Sri Jayewardenepura</option>
                    <option value="Uva">Uva Wellassa University</option>
                    <option value="visual">University of the Visual and Performing Arts</option>
                    <option value="wayamba">Wayamba University</option>
                    <option value="KDU">General Sir John Kotelawala Defence University</option>
                    <option value="vocational">University of Vocational Technology</option>
                    <option value="sliit">Sri Lanka Institute of Information Technology</option>
                    <option value="nibm">National Institute of Business Management</option>
                    <option value="nsbm">National School of Business Management</option>
                    <option value="icbt">International College of Business &amp; Technology</option>
                    <option value="appit">Asia Pacific Institute of Information Technology</option>
                    <option value="iit">Informatics Institute of Technology</option>
                    <option value="none">N/A</option>
                </select>
            </div>
            <div class="col-md-6">
                <select class="form-control" id="uni2" name="uni2" disabled>
                    <option value="dis" disabled selected>Select the University or Institution</option>
                    <option value="UCSC">University of Colombo School of Computing</option>
                    <option value="UoC">University of Colombo</option>
                    <option value="EU ">Eastern University</option>
                    <option value="UoJ">University of Jaffna</option>
                    <option value="UoK">University of Kelaniya</option>
                    <option value="UoM">University of Moratuwa</option>
                    <option value="open">Open University of Sri Lanka</option>
                    <option value="UoP">University of Peradeniya</option>
                    <option value="raja">University of Rajarata</option>
                    <option value="ruhu">University of Ruhuna</option>
                    <option value="sab">Sabaragamuwa University of Sri Lanka</option>
                    <option value="SEU">South Eastern University of Sri Lanka</option>
                    <option value="UoSJ">University of Sri Jayewardenepura</option>
                    <option value="Uva">Uva Wellassa University</option>
                    <option value="visual">University of the Visual and Performing Arts</option>
                    <option value="wayamba">Wayamba University</option>
                    <option value="KDU">General Sir John Kotelawala Defence University</option>
                    <option value="vocational">University of Vocational Technology</option>
                    <option value="sliit">Sri Lanka Institute of Information Technology</option>
                    <option value="nibm">National Institute of Business Management</option>
                    <option value="nsbm">National School of Business Management</option>
                    <option value="icbt">International College of Business &amp; Technology</option>
                    <option value="appit">Asia Pacific Institute of Information Technology</option>
                    <option value="iit">Informatics Institute of Technology</option>
                    <option value="none">N/A</option>
                </select>
            </div>

        </div>

        <div class="row">

            <div class="col-md-6">
                <label for="distance1">Distance from University (km)</label>
                <input type="text" class="form-control" id="distance1" name="distance1" disabled>
            </div>
            <div class="col-md-6">
                <label for="distance2">Distance from University (km)</label>
                <input type="text" class="form-control" id="distance2" name="distance2" disabled>
            </div>


        </div>
        <div class="row">

            <div class="col-md-6">
                <label for="route1">Route</label>
                <input type="text" class="form-control" id="route1" name="route1" disabled>
            </div>
            <div class="col-md-6">
                <label for="route2">Route</label>
                <input type="text" class="form-control" id="route2" name="route2" disabled>
            </div>

        </div>
        <div class="row">

            <div class="col-md-12">
                <label for="previous">Privious Occupants</label>
                <input type="text" class="form-control" id="previous" name="previous">
            </div>


        </div>

        <button type="submit" class="btn btn-default">Create Ad</button>

    </form>
</div>


<script>
    var $uni_checkbox =$('#occupation')
    $uni_checkbox.on('change',function (e) {
        if($(this).is(':checked')){
            document.getElementById('uni1').disabled=false;
            document.getElementById('uni2').disabled=false;
            document.getElementById('distance1').disabled=false;
            document.getElementById('distance2').disabled=false;
            document.getElementById('route1').disabled=false;
            document.getElementById('route2').disabled=false;
        }else{
            document.getElementById('uni1').value='dis';
            document.getElementById('uni1').disabled=true;

            document.getElementById('uni2').value='dis';
            document.getElementById('uni2').disabled=true;

            document.getElementById('distance1').value="";
            document.getElementById('distance1').disabled=true;

            document.getElementById('distance2').value="";
            document.getElementById('distance2').disabled=true;

            document.getElementById('route1').value="";
            document.getElementById('route1').disabled=true;

            document.getElementById('route2').value="";
            document.getElementById('route2').disabled=true;
        }

    })
</script>
<?php
require "footer.php";
?>
