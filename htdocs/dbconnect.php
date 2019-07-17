<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/AppConfig.php";

use configs\AppConfig;

// データベースへ接続
$db = new mysqli(AppConfig::DB_HOST, AppConfig::DB_USER, AppConfig::DB_PASS, AppConfig::DB_NAME);


// 接続エラーの確認
if ($db->connect_error) {
    echo $db->connect_error;
    exit();
} else {
    $db->set_charset("utf8");
}

?>
