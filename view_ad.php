<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 12/1/2017
 * Time: 12:28 AM
 */
$ad_id=$_GET['ad_id'];
require "functions.php";
require "head.php";
require "nav_bar.php";

$ad_details=get_ad_details($ad_id);

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2><?php echo $ad_details['ad_title'];?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <img src="images/placeholder-image.png" height="200" width="200">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2><?php echo $ad_details['ad_rent'];?> LKR</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p><?php echo $ad_details['ad_description'];?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3><?php echo $ad_details['ad_city'];?></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <p>University</p>
        </div>
        <div class="col-md-3">
            <p><?php echo $ad_details['ad_uni1'];?></p>
        </div>
        <div class="col-md-3">
            <p>University</p>
        </div>
        <div class="col-md-3">
            <p><?php echo $ad_details['ad_uni2'];?></p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <p>Distance from University</p>
        </div>
        <div class="col-md-3">
            <p><?php echo $ad_details['ad_distance1'];?> km</p>
        </div>
        <div class="col-md-3">
            <p>Distance from University</p>
        </div>
        <div class="col-md-3">
            <p><?php echo $ad_details['ad_distance2'];?> km</p>
        </div>

    </div>
    <div class="row">

        <div class="col-md-3">
            <p>Route</p>
        </div>
        <div class="col-md-3">
            <p><?php echo $ad_details['ad_route1'];?></p>
        </div>
        <div class="col-md-3">
            <p>Route</p>
        </div>
        <div class="col-md-3">
            <p><?php echo $ad_details['ad_route2'];?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <p>Boarding Type</p>
        </div>
        <div class="col-md-3">
            <p><?php echo $ad_details['ad_type'];?></p>
        </div>
        <div class="col-md-3">
            <p>Gender</p>
        </div>
        <div class="col-md-3">
            <p><?php echo $ad_details['ad_gender'];?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <p>Key Money</p>
        </div>
        <div class="col-md-3">
            <p><?php echo $ad_details['ad_keymoney'];?> LKR</p>
        </div>
        <div class="col-md-3">
            <p>Occupation</p>
        </div>
        <div class="col-md-3">
            <p>
                <?php
                    $occupation=(int)$ad_details['ad_occupation'];
                    if($occupation==1 or $occupation==3 or $occupation==5 or $occupation==7){
                        echo "Undergraduate  ";
                    }
                    if($occupation==2 or $occupation==3 or $occupation==6 or $occupation==7){
                        echo "Student  ";
                    }

                    if($occupation==4 or $occupation==5 or $occupation==6 or $occupation==7){
                        echo "Office Worker";
                    }
                ?>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <p>Previous Occupents</p>
        </div>
        <div class="col-md-3">
            <p><?php echo $ad_details['ad_occupants'];?></p>
        </div>
<!--        <div class="col-md-3">-->
<!--            <p>Route</p>-->
<!--        </div>-->
<!--        <div class="col-md-3">-->
<!--            <p>138 Bus</p>-->
<!--        </div>-->
    </div>
</div>

<?php
require "footer.php";
?>
