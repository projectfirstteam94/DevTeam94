<?php require_once ("../../Controller/ctr_sanpham.php");?>
<?php
    if(isset($_GET["ma"])){
        $ma = $_GET["ma"];
        if(strpos($ma,"SP")!=false){
            echo "<h1 style='color: red'> Mã Phải Bắt Đầu Là SP__</h1>";
        }else if(checkId($ma)){
            echo "<h1 style='color: red'> Mã Đã Trùng</h1>";
        }else if(strlen($ma) > 4){
            echo "<h1 style='color: red'> Mã Không Được Quá 4 ký tự</h1>";
        }
    }
if(isset($_GET["masua"])){
    $ma = $_GET["masua"];
    $mahientai = $_GET["mahientai"];
    if(strpos($ma,"SP")!=false){
        echo "<h1 style='color: red'> Mã Phải Bắt Đầu Là SP__</h1>";
    }else if(checkIdEdit($ma,$mahientai)){
        echo "<h1 style='color: red'> Mã Đã Trùng</h1>";
    }else if(strlen($ma) > 4){
        echo "<h1 style='color: red'> Mã Không Được Quá 4 ký tự</h1>";
    }
}
?>
