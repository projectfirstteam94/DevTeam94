<?php

function ShowPageSize($trang,$namepage){
    if(isset($trang)){
        if($trang < 8){
            if(isset($tr)){
                $tien = $tr + 1;
                if($tien > $trang) $tien = $trang;
                $lui = $tr - 1;
                if($lui == 0 ) $lui = 1;
            }
            echo "<li><a href='$namepage?trang=$lui'>«</a></li>";
            for ($i=0;$i<$trang;$i++){
                $j = $i +1;
                echo "<li><a href='$namepage?trang=$j'>".$j."</a></li>";
            }
            echo "<li><a href='$namepage?trang=$tien'>»</a></li>";
        }else {
            if(isset($tr)){
                $tien = $tr + 1;
                if($tien > $trang) $tien = $trang;
                $lui = $tr - 1;
                if($lui == 0 ) $lui = 1;
            }
            echo "<li><a href='$namepage?trang=$lui'>«</a></li>";
            if($tr < 4){
                for ($i=$tr;$i<($tr+3);$i++){
                    echo "<li><a href='$namepage?trang=$i'>".$i."</a></li>";
                    if($i == ($tr+2)){
                        echo "<li><a href='#'>.......</a></li>";
                    }
                }
            }else  if($tr < ($trang-3)){
                for ($i=$tr;$i<($tr+3);$i++){
                    echo "<li><a href='$namepage?trang=$i'>".$i."</a></li>";
                    if($i == ($tr+2)){
                        echo "<li><a href='#'>.......</a></li>";
                    }
                }
            }else{
                for ($i=$trang-3;$i<$trang;$i++){
                    echo "<li><a href='$namepage?trang=$i'>".$i."</a></li>";
                }
            }
            echo "<li><a href='$namepage?trang=$trang'>".$trang."</a></li>";
            echo "<li><a href='$namepage?trang=$tien'>»</a></li>";
        }
    }
}

?>