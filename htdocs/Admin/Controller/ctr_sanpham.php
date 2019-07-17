<?php
    include_once ("../../Model/model_sanpham.php");
    include_once ("../../Model/model_danhmuc.php");

    if(isset($_POST["btnthem"]) || isset($_POST["btnsua"])){
        $checkadd = 1;
        if(isset($_POST["matruoc"]) && isset($_POST["kichcotruoc"])){
            $matruoc = $_POST["matruoc"];
            $kichcotruoc = $_POST["kichcotruoc"];
        }
        $ma = $_POST["ma"];
        $ten = $_POST["ten"];
        $loai = $_POST["loaisp"];
        $gianhap = $_POST["gianhap"];
        $giaban = $_POST["giaban"];
        $nhacc = $_POST["nhacc"];
        $anh = $_POST["anh"];
            if(isset($_POST["chuthich"]))
            $chuthich = $_POST["chuthich"];
        else $chuthich = " ";
        if(isset($_POST["btnthem"])) { // thêm sản phẩm
            if (!checkId($ma)) { // chưa tồn tại sản phẩm
                if (isset($_POST["kichcos"])) {
                    $kts = $_POST["kichcos"];
                    $sls = $_POST["soluongs"];
                    if (insertLuongSP($ma, $kts, $sls)) $checkadd =2 ;else $checkadd =3 ;
                }
                if (isset($_POST["kichcom"])) {
                    $ktm = $_POST["kichcom"];
                    $slm = $_POST["soluongm"];
                    if (insertLuongSP($ma, $ktm, $slm)) $checkadd =2 ;else $checkadd =3 ;
                }
                if (isset($_POST["kichcol"])) {
                    $ktl = $_POST["kichcol"];
                    $sll = $_POST["soluongl"];
                    if (insertLuongSP($ma, $ktl, $sll)) $checkadd =2 ;else $checkadd =3 ;
                }
                if (isset($_POST["kichcoxl"])) {
                    $ktxl = $_POST["kichcoxl"];
                    $slxl = $_POST["soluongxl"];
                    if (insertLuongSP($ma, $ktxl, $slxl)) $checkadd =2 ;else $checkadd =3 ;
                }
                if (insertSp($ma, $ten, $loai, $gianhap, $giaban, $nhacc, $anh, $chuthich)) {
                    $checkadd = 2;
                } else
                    $checkadd = 3;
            }else {                 // nếu tồn tại sản phẩm rồi
                if (isset($_POST["kichcos"])) {
                    $kts = $_POST["kichcos"];
                    $sls = $_POST["soluongs"];
                    if (insertLuongSP($ma, $kts, $sls)) $checkadd =2 ;else $checkadd =3 ;
                }
                if (isset($_POST["kichcom"])) {
                    $ktm = $_POST["kichcom"];
                    $slm = $_POST["soluongm"];
                    if (insertLuongSP($ma, $ktm, $slm)) $checkadd =2 ;else $checkadd =3 ;
                }
                if (isset($_POST["kichcol"])) {
                    $ktl = $_POST["kichcol"];
                    $sll = $_POST["soluongl"];
                    if (insertLuongSP($ma, $ktl, $sll)) $checkadd =2 ;else $checkadd =3 ;
                }
                if (isset($_POST["kichcoxl"])) {
                    $ktxl = $_POST["kichcoxl"];
                    $slxl = $_POST["soluongxl"];
                    if (insertLuongSP($ma, $ktxl, $slxl)) $checkadd =2 ;else $checkadd =3 ;
                }
            }
            if($checkadd ==2) {
                echo '
                <div class="alert alert-success alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Thêm Thành Công!</strong></div>';
                $checkadd = 1;
//                unset($checkadd);
            }else if($checkadd==3){
                echo '
                <div class="alert alert-warning alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Thêm Thất Bại!</strong></div>';
                $checkadd=1;
//                unset($checkadd);
            }

        }
            if (isset($_POST["btnsua"])) { // sửa sản phẩm
                $checkedit = 1;
                $kichco = $_POST["kichco"];
                $soluong = $_POST["soluong"];
                if(isset($_POST["chuthich"]))
                    $chuthich = $_POST["chuthich"];
                else $chuthich = " ";
                if(editSP($ma,$ten,$loai,$gianhap,$giaban,$nhacc,$anh,$chuthich,$kichco,$soluong,$matruoc,$kichcotruoc)){
                    $checkedit = 2;
                }else $checkedit =3;
                if($checkedit == 2) {
                    echo '
                <div class="alert alert-success alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sửa Thành Công!</strong></div>';
                    $checkedit = 1;
//                    unset($checkedit);
                }else if($checkedit==3){
                    echo '
                <div class="alert alert-warning alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sửa Thất Bại!</strong></div>';
                    $checkedit = 1;
//                    unset($checkedit);
                }
            }

    }

        // sự kiện xóa
        if(isset($_POST["btnxoa"])) {
        $check = 1;
            if(isset($_POST["maxoa"]) && isset($_POST["sizexoa"])){
                $ma = $_POST["maxoa"];
                $size = $_POST["sizexoa"];
                if (deleteSP($ma,$size)) {
                    $check = 2;
                    $result_event = "delete";
                } else {
                    $check = 3;
                    $result_event = "delete error";
                }
            }
            if($check == 2) {
                echo '
                <div class="alert alert-success alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Xóa Thành Công!</strong></div>';
                $check = 1;
                unset($check);
            }else if($check==3){
                echo '
                <div class="alert alert-warning alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Xóa Thất Bại!</strong></div>';
                unset($check);
            }
        }
    // phần phân trang
    $sotin =4 ;
    if(isset($_POST["btntim"])){
        $timkiem = $_POST["chontimkiem"];
        $value = $_POST["tim"];
        if($timkiem == "ma"){
            $arr_sp = spTimKiem(0,$value);
        }else{
            $arr_sp = spTimKiem(1,$value);
        }
        if($arr_sp == null){
            echo '
                <div class="alert alert-success alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Rất Tiếc Không Tìm Thấy Sản Phẩm Nào</strong></div>';
        }else { // phân trang tìm kiếm

        }
    }else{   //phân trong không tìm kiếm
        $trang = laySoTrang($sotin);
        if(isset($_GET["trang"])){
            $tr = $_GET["trang"];
            if($tr > $trang){
                $tr = $trang;
            }else if($tr ==0 ){
                $tr = 1;
            }
        } else $tr = 1;
        $arr_sp = laySoSP(($tr-1)*$sotin,$sotin);
    }
    if(isset($_GET["ktma"])){
        echo 'alert("heell")';
        $ma = $_GET["ktma"];
        if(checkId($ma)) echo "<h1>Mã đã trùng </h1>";
    }
    if(isset($_GET["suasanpham"])&& isset($_GET["kichco"])){
        $ma = $_GET["suasanpham"];
        $kichco = $_GET["kichco"];
        $arr_edit = getSp($ma,$kichco);
    }
    $arr_loaisp = getLoaiSP();
    $arr_all = getAll();
?>

