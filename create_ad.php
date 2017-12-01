<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 11/29/2017
 * Time: 11:22 PM
 */
require "functions.php";
require "head.php";
require "nav_bar.php";
?>
<div class="container">
    <form>
        <div class="row">
            <div class="col-md-12">
                <h2>Create AD</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="description">Description</label>
                <textarea class="form-control" rows="5" id="description"></textarea>
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
                    <input type="file" id="image1">
                </div>
                <div class="col-md-2">
                    <input type="file" id="image2">
                </div>
                <div class="col-md-2">
                    <input type="file" id="image3">
                </div>
                <div class="col-md-2">
                    <input type="file" id="image4">
                </div>
                <div class="col-md-2">
                    <input type="file" id="image5">
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
                <input type="text" class="form-control" id="city">
            </div>
            <div class="col-md-6">
                <label for="province">Province</label>
                <select class="form-control" id="province">
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
                <label class="radio-inline"><input type="radio" name="type">Shared Room</label>
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
                <label class="radio-inline"><input type="radio" name="gender">No Preference</label>
            </div>

        </div>

        <div class="row">

            <div class="col-md-4">
                <label for="key_money">Key Money</label>
                <input type="text" class="form-control" id="key_money">
            </div>
            <div class="col-md-4">
                <label for="Rent">Rent</label>
                <input type="text" class="form-control" id="rent">
            </div>
            <div class="col-md-4">
                <label class="radio-inline"><input type="radio" name="negotiable">Negotiable</label>
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
                <label class="checkbox-inline"><input type="checkbox" value="">Student</label>
                <label class="checkbox-inline"><input type="checkbox" value="">Undergraduate</label>
                <label class="checkbox-inline"><input type="checkbox" value="">Ofice Worker</label>
            </div>

        </div>

        <div class="row">

            <div class="col-md-12">
                <label for="distance">Suitable for Undergraduates of</label>
            </div>

        </div>

        <div class="row">

            <div class="col-md-6">
                <select class="form-control" id="uni1">
                    <option value="" disabled selected>Select the University or Institution</option>
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
                <select class="form-control" id="uni2">
                    <option value="" disabled selected>Select the University or Institution</option>
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
                <label for="distance">Distance from University (km)</label>
                <input type="text" class="form-control" id="distance">
            </div>
            <div class="col-md-6">
                <label for="route">Route</label>
                <input type="text" class="form-control" id="route">
            </div>

        </div>
        <div class="row">

            <div class="col-md-12">
                <label for="previous">Privious Occupants</label>
                <input type="text" class="form-control" id="previous">
            </div>


        </div>

        <button type="submit" class="btn btn-default">Create Ad</button>

    </form>
</div>
<?php
require "footer.php";
?>
