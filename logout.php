<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 12/1/2017
 * Time: 6:52 PM
 */
session_start();
session_destroy();

header("Location:index.php");