<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 11/26/2017
 * Time: 2:19 AM
 */
function validate_text($data){
    if (!preg_match("/^[a-zA-Z .]*$/",$data)) {
        return  "Only letters and white space allowed";
    }
}

function validate_text_and_numbers($data){
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$data)) {
        return  "Only letters and numbers allowed";
    }
}

function validate_number($data){
    if (!preg_match("/^[0-9.]*$/",$data)) {
        return  "Only numbers allowed";
    }
}

function validate_phone($data){
    if (!preg_match("/^[0-9+]*$/",$data)) {
        return  "Only numbers allowed";
    }
}

function validate_email($data){
    if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
        return  "Invalid email format";
    }
}

function validate_address($data){
    if (!preg_match("#^[0-9. ,/\a-zA-Z]*$#",$data)) {
        return  "Invalid Address";
    }
}

function create_user($fname,$sname,$phone,$email,$address,$pass){
    require "connect.php";
    $hash=md5($pass);
    $sql="INSERT INTO user(user_firstname, user_surname, user_phone,user_email,  user_address, user_password) VALUES ('$fname','$sname','$phone','$email','$address','$hash')";

    if (mysqli_query($conn, $sql)) {
        echo "<span class='text-center' >User Added Successfully</span>";
    } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

function user_login($u_email,$pass){
    require "connect.php";
    //$hashed=password_hash($pass,PASSWORD_DEFAULT);
    $hashed=md5($pass);

    $sql="SELECT * FROM user WHERE user_email='$u_email' AND user_password='$hashed'";

    if (mysqli_query($conn, $sql)) {
        $result=$conn->query($sql);
    } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    if($result->num_rows==0){
        echo "<span class='text-center'>Invalid Username/Password</span>";
    } else{
        echo "User Logged In";
        $row = $result->fetch_array(MYSQLI_ASSOC);
        session_start();
        $_SESSION['userid']=$row['user_id'];
        $_SESSION['userfirstname']=$row['user_firstname'];
        $_SESSION['usersurname']=$row['user_surname'];
        header("location:profile.php");
    }

}

function load_user_details($id){
    require "connect.php";
    $sql="SELECT user_firstname,user_surname,user_email,user_phone,user_address FROM user WHERE user_id='$id'";

    if (mysqli_query($conn, $sql)) {
        $result=$conn->query($sql);
    } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return array("fname"=>$row['user_firstname'],"sname"=>$row['user_surname'],"email"=>$row['user_email'],"phone"=>$row['user_phone'],"address"=>$row['user_address']);
}

function load_my_ads($id){
    require "connect.php";
    $sql="SELECT ad_id,ad";
}

function create_ad($userid,$ad_title,$ad_description,$ad_img1,$ad_city,$ad_district,
        $ad_type,$ad_gender,$ad_key_money,$ad_rent,$ad_negotiable,$ad_occupation,
        $ad_uni1,$ad_uni2,$ad_distance1,$ad_distance2,$ad_route1,$ad_route2,$ad_occupants){
    require "connect.php";

    $sql="INSERT INTO ad (user_user_id, ad_title, ad_description, ad_imgcount, ad_city, ad_district, ad_type, ad_gender, ad_keymoney, ad_rent, ad_occupation, ad_uni1, ad_uni2, ad_distance1, ad_distance2, ad_route1, ad_route2, ad_occupants) VALUES ('$userid','$ad_title','$ad_description','1','$ad_city','$ad_district',
        '$ad_type','$ad_gender','$ad_key_money','$ad_rent','$ad_negotiable','$ad_occupation',
        '$ad_uni1','$ad_uni2','$ad_distance1','$ad_distance2','$ad_route1','$ad_route2','$ad_occupants')";


    if (mysqli_query($conn, $sql)) {
        echo "<span class='text-center' >User Added Successfully</span>";
    } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
