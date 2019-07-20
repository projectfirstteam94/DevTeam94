<?php  include_once ("model_connect.php"); ?>

<?php

    function CheckLogin($username,$password){
        $sql = "SELECT * FROM user WHERE active=1 AND username='$username' AND password= '$password'" ;
        $result = mysqli_query(connect(),$sql);
        if(mysqli_num_rows($result)>0){
            return true;
        }else return false;
    }
?>