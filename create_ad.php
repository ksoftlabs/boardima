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
$err_uni1=$err_uni2=$err_distance1=$err_distance2=$err_route1=$err_route2=$err_occupants="";


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
//        $err_img1 = "One image is required";
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

    if (empty($_POST["negotiable"])) {
        $err_negotiable= "This field is required";
    } else {
        $ad_negotiable = mysqli_real_escape_string($conn,$_POST["negotiable"]);
//        $err_negotiable = validate_number($ad_negotiable);
    }


    if (!isset($_POST["occupation"])) {
        $err_occupation= "Select at least one";
    } else {
        $occ_got=$_POST["occupation"];
        $total=0;
        foreach ($occ_got as $occupation){
            $total+=(int)$occupation;
        }
        $ad_occupation=$total;
    }

    if (empty($_POST["uni1"])) {
//        $err_uni1= "Select at least one";
    } else {
        $ad_uni1 = mysqli_real_escape_string($conn,$_POST["uni1"]);
//        $err_uni1= validate_text($ad_occupation);
    }

    if($ad_occupation==1 or $ad_occupation==3 or $ad_occupation==5 or $ad_occupation==7){
        if($ad_uni1=="none" or $ad_uni1=="dis"){
            $err_uni1="Select the university";
        }else{
            if($ad_distance1=""){
                $err_distance1="Distance is required";
            }else{
                $ad_distance1 = mysqli_real_escape_string($conn,$_POST["distance1"]);
                $err_distance1 = validate_number($ad_distance1);

            }
            if($ad_route1=""){
                $err_route1="Route is required";
            }else{
                $ad_route1 = mysqli_real_escape_string($conn,$_POST["route1"]);
                $err_route1 = validate_text_and_numbers($ad_route1);
            }
        }

        if($ad_uni2=="none" or $ad_uni2=="dis"){

        }else{
            if (empty($_POST["uni2"])) {
//        $err_uni1= "Select at least one";
            } else {
                $ad_uni2 = mysqli_real_escape_string($conn,$_POST["uni2"]);
//        $err_uni1= validate_text($ad_occupation);
            }

            if($ad_distance2=""){
                $err_distance2="Distance is required";
            }else{
                $ad_distance2 = mysqli_real_escape_string($conn,$_POST["distance2"]);
                $err_distance2 = validate_number($ad_distance2);
            }
            if($ad_route2=""){
                $err_route2="Route is required";
            }else{
                $ad_route2 = mysqli_real_escape_string($conn,$_POST["route2"]);
                $err_route2= validate_text_and_numbers($ad_route2);
            }
        }
    }




    if (empty($_POST["occupants"])) {
        $err_occupants= "Previous occupants required.";
    } else {
        $ad_occupants = mysqli_real_escape_string($conn,$_POST["occupants"]);
        $err_occupants= validate_text($ad_occupants);
    }

//Image Upload
    $image_count=0;
//    $ad_img1=$_FILES['image1'];
//    $ad_img2=$_FILES['image2'];
//    $ad_img3=$_FILES['image3'];
//    $ad_img4=$_FILES['image4'];
//    $ad_img5=$_FILES['image5'];
//
//    if($ad_img1['size']>0){
//        $image_count++;
//    }
//    if($ad_img2['size']>0){
//        $image_count++;
//    }
//    if($ad_img3['size']>0){
//        $image_count++;
//    }
//    if($ad_img4['size']>0){
//        $image_count++;
//    }
//    if($ad_img5['size']>0){
//        $image_count++;
//    }
//    var_dump($_FILES);
//    echo $image_count;

    if($err_title=="" and $err_description=="" and $err_img1=="" and $err_img2=="" and $err_img3=="" and $err_img4=="" and $err_img5=="" and $err_city=="" and $err_district=="" and
        $err_type=="" and $err_gender=="" and $err_key_money=="" and $err_rent=="" and $err_negotiable=="" and $err_occupation=="" and
        $err_uni1=="" and $err_uni2=="" and $err_distance1=="" and $err_distance2=="" and $err_route1=="" and $err_route2=="" and $err_occupants==""){
        create_ad($_SESSION['userid'],$ad_title,$ad_description,$image_count,$ad_city,$ad_district,
        $ad_type,$ad_gender,$ad_key_money,$ad_rent,$ad_negotiable,$ad_occupation,
        $ad_uni1,$ad_uni2,$ad_distance1,$ad_distance2,$ad_route1,$ad_route2,$ad_occupants,$ad_img1,$ad_img2,$ad_img3,$ad_img4,$ad_img5);

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
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $ad_title;?>">
                <span><?php echo $err_title ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="description">Description</label>
                <textarea class="form-control" rows="5" id="description" name="description"><?php echo $ad_description;?></textarea>
                <span><?php echo $err_description ?></span>
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
                    <span><?php echo $err_img1 ?></span>
                </div>
                <div class="col-md-2">
                    <input type="file" id="image2" name="image2">
                    <span><?php echo $err_img2 ?></span>
                </div>
                <div class="col-md-2">
                    <input type="file" id="image3" name="image3">
                    <span><?php echo $err_img3 ?></span>
                </div>
                <div class="col-md-2">
                    <input type="file" id="image4" name="image4">
                    <span><?php echo $err_img4 ?></span>
                </div>
                <div class="col-md-2">
                    <input type="file" id="image5" name="image5">
                    <span><?php echo $err_img5 ?></span>
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
                <input type="text" class="form-control" id="city" name="city" value="<?php echo $ad_city;?>">
                <span><?php echo $err_city ?></span>
            </div>
            <div class="col-md-6">
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
                <span><?php echo $err_district ?></span>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <label>Boarding Type</label>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <label class="radio-inline"><input type="radio" name="type" value="Single Room">Single Room</label>
                <label class="radio-inline"><input type="radio" name="type" value="Shared Room" checked>Shared Room</label>
                <label class="radio-inline"><input type="radio" name="type" value="Annex">Annex</label>
                <span><?php echo $err_type ?></span>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <label>Gender</label>
            </div>

        </div>
        <div class="row">

            <div class="col-md-12">
                <label class="radio-inline"><input type="radio" name="gender" value="Male">Male</label>
                <label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
                <label class="radio-inline"><input type="radio" name="gender" value="No Preference"checked>No Preference</label>
                <span><?php echo $err_gender ?></span>
            </div>

        </div>

        <div class="row">

            <div class="col-md-4">
                <label for="key_money">Key Money</label>
                <input type="text" class="form-control" id="key_money" name="key_money" value="<?php echo $ad_key_money;?>">
                <span><?php echo $err_key_money ?></span>
            </div>
            <div class="col-md-4">
                <label for="Rent">Rent</label>
                <input type="text" class="form-control" id="rent" name="rent" value="<?php echo $ad_rent;?>">
                <span><?php echo $err_rent ?></span>
            </div>
            <div class="col-md-4">
                <label class="radio-inline"><input type="radio" name="negotiable" value="Negotiable" checked>Negotiable</label>
                <label class="radio-inline"><input type="radio" name="negotiable" value="Non-Negotiable">Non-Negotiable</label>
                <span><?php echo $err_negotiable ?></span>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <label>Occupation</label>
            </div>

        </div>
        <div class="row">

            <div class="col-md-12">
                <label class="checkbox-inline"><input type="checkbox" value="1" id="occupation" name="occupation[]">Undergraduate</label>
                <label class="checkbox-inline"><input type="checkbox" value="2" id="occupation" name="occupation[]">Student</label>
                <label class="checkbox-inline"><input type="checkbox" value="4" id="occupation" name="occupation[]">Office Worker</label>
                <span><?php echo $err_occupation ?></span>
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
                    <option value="University of Colombo School of Computing">University of Colombo School of Computing</option>
                    <option value="University of Colombo">University of Colombo</option>
                    <option value="Eastern University ">Eastern University</option>
                    <option value="University of Jaffna">University of Jaffna</option>
                    <option value="University of Kelaniya">University of Kelaniya</option>
                    <option value="University of Moratuwa">University of Moratuwa</option>
                    <option value="Open University of Sri Lanka">Open University of Sri Lanka</option>
                    <option value="University of Peradeniya">University of Peradeniya</option>
                    <option value="University of Rajarata">University of Rajarata</option>
                    <option value="University of Ruhuna">University of Ruhuna</option>
                    <option value="Sabaragamuwa University of Sri Lanka">Sabaragamuwa University of Sri Lanka</option>
                    <option value="South Eastern University of Sri Lanka">South Eastern University of Sri Lanka</option>
                    <option value="University of Sri Jayewardenepura">University of Sri Jayewardenepura</option>
                    <option value="Uva Wellassa University">Uva Wellassa University</option>
                    <option value="University of the Visual and Performing Arts">University of the Visual and Performing Arts</option>
                    <option value="Wayamba University of Sri Lanka">Wayamba University of Sri Lanka</option>
                    <option value="General Sir John Kotelawala Defence University">General Sir John Kotelawala Defence University</option>
                    <option value="University of Vocational Technology">University of Vocational Technology</option>
                    <option value="Sri Lanka Institute of Information Technology">Sri Lanka Institute of Information Technology</option>
                    <option value="National Institute of Business Management">National Institute of Business Management</option>
                    <option value="National School of Business Management">National School of Business Management</option>
                    <option value="International College of Business &amp; Technology">International College of Business &amp; Technology</option>
                    <option value="Asia Pacific Institute of Information Technology">Asia Pacific Institute of Information Technology</option>
                    <option value="Informatics Institute of Technology">Informatics Institute of Technology</option>
                    <option value="none">N/A</option>
                </select>
                <span><?php echo $err_uni1 ?></span>
            </div>
            <div class="col-md-6">
                <select class="form-control" id="uni2" name="uni2" disabled onchange="uni2_dropbox()">
                    <option value="dis" disabled selected>Select the University or Institution</option>
                    <option value="University of Colombo School of Computing">University of Colombo School of Computing</option>
                    <option value="University of Colombo">University of Colombo</option>
                    <option value="Eastern University ">Eastern University</option>
                    <option value="University of Jaffna">University of Jaffna</option>
                    <option value="University of Kelaniya">University of Kelaniya</option>
                    <option value="University of Moratuwa">University of Moratuwa</option>
                    <option value="Open University of Sri Lanka">Open University of Sri Lanka</option>
                    <option value="University of Peradeniya">University of Peradeniya</option>
                    <option value="University of Rajarata">University of Rajarata</option>
                    <option value="University of Ruhuna">University of Ruhuna</option>
                    <option value="Sabaragamuwa University of Sri Lanka">Sabaragamuwa University of Sri Lanka</option>
                    <option value="South Eastern University of Sri Lanka">South Eastern University of Sri Lanka</option>
                    <option value="University of Sri Jayewardenepura">University of Sri Jayewardenepura</option>
                    <option value="Uva Wellassa University">Uva Wellassa University</option>
                    <option value="University of the Visual and Performing Arts">University of the Visual and Performing Arts</option>
                    <option value="Wayamba University of Sri Lanka">Wayamba University of Sri Lanka</option>
                    <option value="General Sir John Kotelawala Defence University">General Sir John Kotelawala Defence University</option>
                    <option value="University of Vocational Technology">University of Vocational Technology</option>
                    <option value="Sri Lanka Institute of Information Technology">Sri Lanka Institute of Information Technology</option>
                    <option value="National Institute of Business Management">National Institute of Business Management</option>
                    <option value="National School of Business Management">National School of Business Management</option>
                    <option value="International College of Business &amp; Technology">International College of Business &amp; Technology</option>
                    <option value="Asia Pacific Institute of Information Technology">Asia Pacific Institute of Information Technology</option>
                    <option value="Informatics Institute of Technology">Informatics Institute of Technology</option>
                    <option value="none">N/A</option>
                </select>

            </div>

        </div>

        <div class="row">

            <div class="col-md-6">
                <label for="distance1">Distance from University (km)</label>
                <input type="text" class="form-control" id="distance1" name="distance1" value="<?php echo $ad_distance1;?>" disabled>
                <span><?php echo $err_distance1 ?></span>
            </div>
            <div class="col-md-6">
                <label for="distance2">Distance from University (km)</label>
                <input type="text" class="form-control" id="distance2" name="distance2" value="<?php echo $ad_distance2;?>" disabled>
                <span><?php echo $err_distance2 ?></span>
            </div>


        </div>
        <div class="row">

            <div class="col-md-6">
                <label for="route1">Route</label>
                <input type="text" class="form-control" id="route1" name="route1" value="<?php echo $ad_route1;?>" disabled>
                <span><?php echo $err_route1 ?></span>
            </div>
            <div class="col-md-6">
                <label for="route2">Route</label>
                <input type="text" class="form-control" id="route2" name="route2" value="<?php echo $ad_route2;?>" disabled>
                <span><?php echo $err_route2 ?></span>
            </div>

        </div>
        <div class="row">

            <div class="col-md-12">
                <label for="occupants">Previous Occupants</label>
                <input type="text" class="form-control" id="occupants" name="occupants" value="<?php echo $ad_occupants;?>">
                <span><?php echo $err_occupants ?></span>
            </div>


        </div>

        <button type="submit" class="btn btn-default">Create Ad</button>

    </form>
</div>


<script>
    var $uni_checkbox =$('#occupation');
    $uni_checkbox.on('change',function (e) {
        if($(this).is(':checked')){
            document.getElementById('uni1').disabled=false;
            document.getElementById('uni2').disabled=false;
            document.getElementById('distance1').disabled=false;
//            document.getElementById('distance2').disabled=false;
            document.getElementById('route1').disabled=false;
//            document.getElementById('route2').disabled=false;
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
<script>
    function uni2_dropbox() {
        if(document.getElementById('uni2').options[document.getElementById('uni2').selectedIndex].value!="none"){
            document.getElementById('distance2').disabled=false;
            document.getElementById('route2').disabled=false;
        }else{
            document.getElementById('distance2').value="";
            document.getElementById('distance2').disabled=true;
            document.getElementById('route2').value="";
            document.getElementById('route2').disabled=true;
        }
    }


</script>
<?php
require "footer.php";
?>
