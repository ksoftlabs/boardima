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
?>
<div class="container">
    <h2>Profile</h2>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Profile</a></li>
        <li><a data-toggle="tab" href="#menu1">My Ads</a></li>
    </ul>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name">
                    </div>
                    <div class="col-md-6">
                        <label for="surname">Surname</label>
                        <input type="text" class="form-control" id="surname">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone">
                    </div>
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <div class="col-md-6">
                        <label for="password2">Confirm Password</label>
                        <input type="password" class="form-control" id="password2">
                    </div>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <div id="menu1" class="tab-pane fade">

        </div>

    </div>
</div>

<?php
require "footer.php";
?>
