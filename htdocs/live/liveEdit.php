<?php
session_start();

//データベース読み込み
require('../dbconnect.php');


//エラーチェック
ini_set("display_errors", 1);
error_reporting(E_ALL);

//ゲットチェック
$errorJump = "index.php"; //エラーの際のジャンプ先指定

if (isset($_GET['ID']) && ctype_digit($_GET['ID'])){
	$liveID = htmlspecialchars($_GET['ID'], ENT_QUOTES, 'UTF-8'); //文字のクリーンナップ
	$liveIDsql = mysqli_query( $db, 'SELECT live_id FROM `live` WHERE live_id='.$liveID); //live_idを読み込み
	$liveIDchk = mysqli_real_escape_string( $db, mysqli_num_rows($liveIDsql) ); //live_idの行数を確認
	if(!$liveIDchk){ header('Location: '.$errorJump );
	}
}else{ header('Location: '.$errorJump); }

//ポストチェック
if (!empty($_POST)){
	
	$fileName = $_FILES['upfile']['name'];
	if(!empty($fileName)){
		$ext = substr($fileName, -3);
		if ($ext == 'jpg' || $ext == 'gif' || $ext == 'png'){ //拡張子が jpg, gif, pngであれば
			
		$image = date('Ymd-His') . $_FILES['upfile']['name'];
		move_uploaded_file ($_FILES["upfile"]["tmp_name"], "files/" .$image);
		chmod("files/" . $image, 0644);	 
		} 
	}
		
	$_SESSION['live'] = $_POST;
	$_SESSION['live']['upfile'] = $image;	
	
		if (isset($_SESSION['live'])) {			
		header('Location: liveEditChk.php');
		}
	
}
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<META NAME="ROBOTS" CONTENT="NOARCHIVE">
<META name="robots" content="noindex,nofollow">
<title>リアルタイム情報 編集フォーム</title>

	<!-- ::: CSS / JS ::: -->
	<link rel="stylesheet" href="/common/css/minireset.css">
	<link rel="stylesheet" href="/common/css/layout.css">
	<link rel="stylesheet" href="/common/css/style.css">
	<link rel="stylesheet" href="/live/css/live.css">
    <link rel="stylesheet" href="css/hs.css" type="text/css">
	<script src="/common/js/jquery-1.7.2.min.js"></script>
	<script src="/common/js/common.js"></script>
    
<script type="text/javascript" charset="utf-8">	

 
// 入力内容チェックのための関数
    function input_check(){
    var result = true;
 
// エラー用装飾のためのクラスリセット
    $('#live_title').removeClass("inp_error");
	$('#live_text').removeClass("inp_error");
    $('#live_mail').removeClass("inp_error");
    $('#live_tel').removeClass("inp_error");
    $('#live_image1').removeClass("inp_error");
 
// 入力エラー文をリセット
    $("#title_error").empty();
    $("#text_error").empty();
	$("#mail_error").empty();
    $("#tel_error").empty();
	$("#image1_error").empty();

 
// 入力内容セット
    var title   = $("#live_title").val();
    var text  = $("#live_text").val();
    var mail  = $("#live_mail").val();
    var tel  = $("#live_tel").val().replace(/[━.*‐.*―.*－.*\–.*ー.*\-]/gi,'');
	var image1   = $("#live_image1").val();

// 入力内容チェック
 
// タイトル
    if(title == ""){
        $("#title_error").html("<i class='fa fa-exclamation-circle'></i> タイトルは必須です。");
        $("#live_title").addClass("inp_error");
        result = false;
    }else if(name.length > 20){
        $("#title_error").html("<i class='fa fa-exclamation-circle'></i> タイトルは20文字以内で入力してください。");
        $("#live_title").addClass("inp_error");
        result = false;
    }
	
	// 内容テキスト
    if(text == ""){
        $("#text_error").html("<i class='fa fa-exclamation-circle'></i> 内容は必須です。");
        $("#live_text").addClass("inp_error");
        result = false;
    }

// メールアドレス
    if(mail&&!mail.match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)){
        $('#mail_error').html("<i class='fa fa-exclamation-circle'></i> 正しいメールアドレスを入力してください。");
        $("#live_mail").addClass("inp_error");
        result = false;
    }else if(mail&&mail.length > 255){
        $('#mail_error').html("<i class='fa fa-exclamation-circle'></i> 正しいメールアドレスを入力してください。");
        $("#live_mail").addClass("inp_error");
        result = false;
    }

// 電話番号
	if(tel != ""){
    if((!tel.match(/^[0-9]+$/)) || (tel.length < 10)){
        $('#tel_error').html("<i class='fa fa-exclamation-circle'></i> 正しい電話番号を入力してください。");
        $("#live_tel").addClass("inp_error");
        result = false;
   		}
	}
	
// 画像拡張子
    if(image1 != ""){
		if(!document.getElementById('live_image1').value.toLowerCase().match(/\.(jpg|gif|png)$/i)) {
        $("#image1_error").html("<i class='fa fa-exclamation-circle'></i> 画像の拡張子は jpg gif png のいずれかにしてください。");
        $("#live_image1").addClass("inp_error");
        result = false;
		}
    }


    return result;
}


</script>


</head>
<body>

<!-- ▼コンテンツ▼ -->
<section class="mainContent"> 


<h1 class="underLine2">リアルタイム情報 編集フォーム</h1>
<br>
<?php
//データベースから引用
$cmd = 'SELECT * FROM live WHERE live_id='.$liveID.' ';
$result = mysqli_query($db, $cmd);
if (!$result) {
    $errorMes = "データ取得失敗";
}else  $errorMes = "データ取得成功";

while ($row = mysqli_fetch_assoc($result) ) { ;
	$liveDay = htmlspecialchars($row['live_day'], ENT_QUOTES, 'UTF-8');
	$liveOpen = htmlspecialchars($row['live_open'], ENT_QUOTES, 'UTF-8');
	$liveClose = htmlspecialchars($row['live_close'], ENT_QUOTES, 'UTF-8');
	$liveValue = htmlspecialchars($row['live_value'], ENT_QUOTES, 'UTF-8');
	$liveTitle = htmlspecialchars($row['live_title'], ENT_QUOTES, 'UTF-8');
	$liveCatch = htmlspecialchars($row['live_catch'], ENT_QUOTES, 'UTF-8');
	$liveText = htmlspecialchars($row['live_text'], ENT_QUOTES, 'UTF-8');
	$liveText2 = htmlspecialchars($row['live_text2'], ENT_QUOTES, 'UTF-8');
	$liveAddress = htmlspecialchars($row['live_address'], ENT_QUOTES, 'UTF-8');
	$liveTel = htmlspecialchars($row['live_tel'], ENT_QUOTES, 'UTF-8');
	$liveMail = htmlspecialchars($row['live_mail'], ENT_QUOTES, 'UTF-8');
	$liveGoogle = htmlspecialchars($row['live_google'], ENT_QUOTES, 'UTF-8');
	$liveUrl = htmlspecialchars($row['live_url'], ENT_QUOTES, 'UTF-8');
	$liveImg = htmlspecialchars($row['live_image1'], ENT_QUOTES, 'UTF-8');	
}
?>

<table ID="dataList" class=" wordBreak">
	<tr><td class="dataList_text">【 現在選択中 】　日付：<?php echo date( "Y/m/d H:i" , strtotime($liveDay) ); ?>　（公開期間：<?php echo date( "Y/m/d H:i" , strtotime($liveOpen) ); ?> 〜 <?php echo date( "Y/m/d H:i" , strtotime($liveClose) ); ?>）　重要度：<?php echo $liveValue; ?></td>
    <td rowspan="2" class="dataList_image borderBottom"><?php if($liveImg) { echo ('<img src="files/'.$liveImg.'" alt="'.$liveImg.'" class="image30_1">'); }?></td></tr>
    <tr class="borderBottom"><td class="dataList_text"><?php echo $liveTitle; ?></td></tr>


</table>
    

<p class="wrap_pre">以下の内容を修正の上，上書き修正ボタンをクリックしてください。<br>または削除ボタンで削除してください。</p>
<p class="orange"></p>


<form method="post" action="" enctype="multipart/form-data" onsubmit="return input_check()">
<table ID="contactForm">
<?php
$dt = new DateTime();
?>
<tr>
	<td class="formHead">情報日時</td><td><input type="datetime-local" ID="live_day" name="日付" class="formInput" value="<?php echo date( "Y-m-d\TH:i" , strtotime($liveDay) ); ?>"><span id="day_error" class="error_m"></span></td>
    </tr><tr></tr><tr>
    	<td class="formHead">公開開始</td><td><input type="datetime-local" ID="live_open" name="公開開始" class="formInput" value="<?php echo date( "Y-m-d\TH:i" , strtotime($liveOpen) ); ?>"><span id="open_error" class="error_m"></span></td>
        </tr><tr></tr><tr>
    <td class="formHead">公開終了</td><td><input type="datetime-local" ID="live_close" name="公開終了" value="<?php echo date( "Y-m-d\TH:i" , strtotime($liveClose) ); ?>" class="formInput"><span id="close_error" class="error_m"></span></td>
    </tr><tr></tr><tr>
    <td class="formHead">重要度（-1は非表示）</td><td><input type="number" ID="live_value" name="重要度" class="formInput" min=-1 value=<?php echo $liveValue; ?>><span id="value_error" class="error_m"></span></td>
    </tr><tr></tr><tr>
    <td class="formHead">タイトル（必須）</td><td><input type="text" ID="live_title" name="タイトル" value="<?php echo $liveTitle; ?>" class="formInput"><span id="title_error" class="error_m"></span></td>
    </tr><tr></tr><tr class="underConstruction">
	<td class="formHead">キャッチ</td><td><input type="text" ID="live_catch" name="キャッチ" value="<?php echo $liveCatch; ?>" class="formInput"><span id="catch_error" class="error_m"></span></td>
	</tr><tr></tr><tr>
	<td class="formHead">内容（必須）</td><td><textarea ID="live_text" name="内容テキスト" class="formInput"><?php echo $liveText; ?></textarea><span id="text_error" class="error_m"></span></td>
	</tr><tr></tr><tr class="underConstruction">
    <td class="formHead">備考</td><td><input type="text" ID="live_text2" name="備考テキスト" value="<?php echo $liveText2; ?>" class="formInput"><span id="text2_error" class="error_m"></span></td>
	</tr><tr></tr><tr class="underConstruction">
    <td class="formHead">住所</td><td><input type="text" ID="live_address" name="住所" value="<?php echo $liveAddress; ?>" class="formInput"><span id="address_error" class="error_m"></span></td>
	</tr><tr></tr><tr class="underConstruction">
	<td class="formHead">電話番号（半角）</td><td><input type="tel" ID="live_tel" name="電話番号" value="<?php echo $liveTel; ?>" class="formInput"><span id="tel_error" class="error_m"></span></td>
	</tr><tr></tr><tr class="underConstruction">
    	<td class="formHead">メールアドレス</td><td><input type="mail" ID="live_mail" name="メールアドレス" value="<?php echo $liveMail; ?>" class="formInput"><span id="mail_error" class="error_m"></span></td>
	</tr><tr></tr><tr class="underConstruction">
	<td class="formHead">GoogleMap座標</td><td><input type="text" ID="live_google" name="GoogleMap位置情報" value="<?php echo $liveGoogle; ?>" class="formInput"><span id="google_error" class="error_m"></span></td>
	</tr><tr></tr><tr class="underConstruction">
    	<td class="formHead">外部リンクURL</td><td><input type="text" ID="live_url" name="外部リンクURL" value="<?php echo $liveUrl; ?>" class="formInput"><span id="url_error" class="error_m"></span></td>
	</tr><tr></tr><tr>
    	<td class="formHead">画像（未選択は変更せず）</td><td><input type="file" ID="live_image1" name="upfile" class="formInput"><span id="image1_error" class="error_m"></span></td>
</tr>

</table>
<br class="split">
<br>
<input type="hidden" name="liveID" value="<?php echo $liveID; ?>">
<input type="hidden" name="liveImg" value="<?php echo $liveImg; ?>">
<div class="content30 textCenter"><button class="linkButton5" type="submit" name="action" value="delete" onClick="return confirm('削除してよろしいですか？');">削　除　す　る</button></div>
<div class="content30 textCenter"><button class="linkButton5" type="button"  onClick="location.href='liveAdd.php'">新規追加へ移動</button></div>
<div class="content30 textCenter"><button class="linkButton5" type="submit" name="action" value="update">上 書 き 修 正</button></div>
</form>
<br>
<br>
<?php
	//ひとつ前のID
	$cmd = 'SELECT live_id FROM live WHERE live_id < '.$liveID.' ORDER BY live_id DESC LIMIT 1 ';
	$result = mysqli_query($db, $cmd);
	$row = mysqli_fetch_assoc($result);
	$back = $row['live_id'];
	
	//ひとつ後ろのID
	$cmd = 'SELECT live_id FROM live WHERE live_id > '.$liveID.' ORDER BY live_id ASC LIMIT 1 ';
	$result = mysqli_query($db, $cmd);
	$row = mysqli_fetch_assoc($result);
	$forward = $row['live_id'];

?>
<div class="content30 textCenter"><button class="linkButton5" type="button"  onClick="location.href='liveEdit.php?ID=<?php echo $back; ?>'">入 力 順 の 前</button></div>
<div class="content30 textCenter"><button class="linkButton5" type="button"  onClick="location.href='index.php'">リアルタイム情報へ戻る</button></div>
<div class="content30 textCenter"><button class="linkButton5" type="button"  onClick="location.href='liveEdit.php?ID=<?php echo $forward; ?>'">入 力 順 の 次</button></div>

</section>
<!-- ▲コンテンツ▲ -->

<!-- ▼フッター▼ -->
<footer>





</footer>
</body>
</html>
