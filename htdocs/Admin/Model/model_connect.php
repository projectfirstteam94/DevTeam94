<?php
    function connect(){
        $conn = mysqli_connect("localhost","root","","hawaiisky") or die(mysqli_error());
        mysqli_query($conn, "SET NAMES 'utf8'");
        return $conn;
    }
?>