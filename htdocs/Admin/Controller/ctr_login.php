<?php  include_once ("../../Model/model_login.php"); ?>

<?php 
session_start();
session_unset(); 
$_SESSION['loginsuccess'] = "false";
// thực hiện đăng nhập
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            if($username === ""){
                echo '
                <div class="alert alert-warning alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Bạn chưa nhập username!</strong></div>';
            }else{
                if($password === ""){
                    echo '
                    <div class="alert alert-warning alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Bạn chưa nhập password!</strong></div>';
                }else{
                    if(CheckLogin($username,$password)){
                        $_SESSION['loginsuccess'] = "true";
                        header("Location:Home.php");
                    }else{
                        echo '
                        <div class="alert alert-warning alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Tài khoản hoặc mật khẩu không đúng!</strong></div>';
                    }
                }
            }
        }else{
            $username = '';
            $password =  '';
        }
?>