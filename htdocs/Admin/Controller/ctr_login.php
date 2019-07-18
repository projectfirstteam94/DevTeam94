<?php 
// thực hiện đăng nhập
        if(isset($_POST["btnlogin"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            if($email === ""){
                echo '
                <div class="alert alert-warning alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Bạn chưa nhập email!</strong></div>';
            }else{
                if($password === ""){
                    echo '
                    <div class="alert alert-warning alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Bạn chưa nhập password!</strong></div>';
                }else{
                    if($email === "admin@gmail" && $password ==="123456"){
                        header("Location:Home.php");
                    }else{
                        echo '
                        <div class="alert alert-warning alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Tài khoản hoặc mật khẩu không đúng!</strong></div>';
                    }
                }
            }
        }
?>