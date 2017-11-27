<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 11/26/2017
 * Time: 4:51 PM
 */
require "functions.php";
require "head.php";
require "nav_bar.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <form>
                <div class="form-group">
                    <p>Location</p>
                    <label for="sel_city">City</label>
                    <select class="form-control" id="sel_location">
                        <option>1</option>
                        <option>2</option>
                    </select>
                    <label for="sel_district">District</label>
                    <select class="form-control" id="sel_district">
                        <option>1</option>
                        <option>2</option>
                    </select>
                </div>
                <hr>
                <div class="form-group">
                    <p>Gender</p>
                    <div class="checkbox">
                    <label><input type="checkbox" value="1">Male</label>
                    </div>
                    <div class="checkbox">
                    <label><input type="checkbox" value="2">Female</label>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <p>Type</p>
                    <div class="checkbox">
                    <label><input type="checkbox" value="1">Single Room</label>
                    </div>
                    <div class="checkbox">
                    <label><input type="checkbox" value="2">Shared Room</label>
                    </div>
                    <div class="checkbox">
                    <label><input type="checkbox" value="3">Annex</label>
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
                    <p>Negotiable Rent</p>
                    <div class="checkbox">
                        <label><input type="checkbox" value="1">Yes</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="2">No</label>
                    </div>
                </div>
                <hr>

                <div class="form-group">
                    <p>Occupation</p>
                    <div class="checkbox">
                        <label><input type="checkbox" value="1">Student</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="2">Undergraduate</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="2">Office Worker</label>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<?php
require "footer.php";
?>
