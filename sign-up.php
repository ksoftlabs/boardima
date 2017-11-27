<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 11/27/2017
 * Time: 12:29 PM
 */
require "functions.php";
require "head.php";
require "nav_bar.php";
?>
<div class="container">
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
        <div class="form-group">
            <div class="checkbox">
                <label><input type="checkbox" value="agree">I agree to terms and conditions</label>
            </div>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>

<?php
require "footer.php";
?>
