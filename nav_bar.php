<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 11/26/2017
 * Time: 5:03 PM
 */
?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Boardima.com</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="create_ad.php">Create Ad</a></li>
<!--            <li><a href="#">Page 2</a></li>-->
<!--            <li><a href="#">Page 3</a></li>-->
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <?php
        if(!isset($_SESSION['userid'])){
            echo '<li><a href="sign-up.php"><span class="fa fa-user"></span> Sign Up</a></li>';
            echo '<li><a href="sign-in.php"><span class="fa fa-sign-in"></span>Login</a></li>';
        }
        else{
            echo '<li><a href="profile.php">'.$_SESSION["userfirstname"].' '.$_SESSION["usersurname"].'</a></li>';
            echo '<li><a href="logout.php"><span class="fa fa-sign-out"></span> Logout</a></li>';
        }
        ?>
        </ul>
    </div>
</nav>
