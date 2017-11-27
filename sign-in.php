<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 11/27/2017
 * Time: 12:42 PM
 */
require "functions.php";
require "head.php";
require "nav_bar.php";
?>
<div class="container">
    <form>
        <div class="row">
            <div class="col-md-12">
                <label for="email">E-Mail</label>
                <input type="text" class="form-control" id="email">
            </div>
            <div class="col-md-12">
                <label for="passowrd">Password</label>
                <input type="password" class="form-control" id="passowrd">
            </div>
        </div>
        <button type="submit" class="btn btn-default">Sign In</button>
    </form>
</div>
<?php
require "footer.php";
?>
