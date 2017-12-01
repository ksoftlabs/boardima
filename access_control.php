<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 12/1/2017
 * Time: 6:38 PM
 */

if(!isset($_SESSION['userid'])){
    header("location:sign-in.php");
}

?>