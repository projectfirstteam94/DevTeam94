<?php
	// データベースへ接続
$db = new mysqli( 'mysql708.db.sakura.ne.jp', 'aquamouse7', 'hawaiiansky1234', 'aquamouse7_hs');


// 接続エラーの確認
if ($db->connect_error) {
    echo $db->connect_error;
    exit();
} else {
    $db->set_charset("utf8");
}

?>
