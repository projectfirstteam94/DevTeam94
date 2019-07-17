<?php
//データベース読み込み
require('dbconnect.php');

//エラーチェック
ini_set("display_errors", 1);
error_reporting(E_ALL);

//ゲットチェック
$errorJump = "newsEdit.php?ID=8"; //エラーの際のジャンプ先指定

if (isset($_GET['ID']) && ctype_digit($_GET['ID'])){
	$newsID = htmlspecialchars($_GET['ID'], ENT_QUOTES, 'UTF-8'); //文字の漂白
	$newsIDsql = mysqli_query( $db, 'SELECT news_id FROM `news` WHERE news_id='.$newsID); //news_idを読み込み
	$newsIDchk = mysqli_real_escape_string( $db, mysqli_num_rows($newsIDsql) ); //news_idの行数を確認
	if(!$newsIDchk){ header('Location: '.$errorJump );
	}
}else{ header('Location: '.$errorJump); }

$sql = sprintf("DELETE FROM news WHERE news_id=%d", 
	mysqli_real_escape_string( $db, $_REQUEST['ID'] )
	);
	mysqli_query($db, $sql) or die (mysqli_error($db) );
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>削除</title>
<link href="css/hs.css" rel="stylesheet" type="text/css">
</head>

<body>

<section class="mainContent">
	<h1 class="underLine2 textCenter">情報を削除しました</h1>
	<br class="split">
	<hr>
	<br class="split">
	
	<a href="#"><input ID="submitButton" type="button" value="戻　る"></a>
    
</section>

</body>
</html>