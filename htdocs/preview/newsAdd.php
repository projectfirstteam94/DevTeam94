<?php
session_start();

//データベース読み込み
require('dbconnect.php');

//エラーチェック
ini_set("display_errors", 1);
error_reporting(E_ALL);

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
		
	$_SESSION['news'] = $_POST;
	$_SESSION['news']['upfile'] = $image;
	
		if (isset($_SESSION['news'])) {			
		header('Location: newsAddChk.php');
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
<title>Hawaiian Sky | お知らせ 新規追加フォーム</title>

<link href="css/hs.css" rel="stylesheet" type="text/css">


<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<script src="js/smart-crossfade.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">	


// 入力内容チェックのための関数
    function input_check(){
    var result = true;
 
// エラー用装飾のためのクラスリセット
    $('#news_title').removeClass("inp_error");
	$('#news_text').removeClass("inp_error");
    $('#news_mail').removeClass("inp_error");
    $('#news_tel').removeClass("inp_error");
    $('#news_image1').removeClass("inp_error");
 
// 入力エラー文をリセット
    $("#title_error").empty();
    $("#text_error").empty();
	$("#mail_error").empty();
    $("#tel_error").empty();
	$("#image1_error").empty();

 
// 入力内容セット
    var title   = $("#news_title").val();
    var text  = $("#news_text").val();
    var mail  = $("#news_mail").val();
    var tel  = $("#news_tel").val().replace(/[━.*‐.*―.*－.*\–.*ー.*\-]/gi,'');
	var image1   = $("#news_image1").val();

// 入力内容チェック
 
// タイトル
    if(title == ""){
        $("#title_error").html("<i class='fa fa-exclamation-circle'></i> タイトルは必須です。");
        $("#news_title").addClass("inp_error");
        result = false;
    }else if(name.length > 20){
        $("#title_error").html("<i class='fa fa-exclamation-circle'></i> タイトルは20文字以内で入力してください。");
        $("#news_title").addClass("inp_error");
        result = false;
    }
	
	// 内容テキスト
    if(text == ""){
        $("#text_error").html("<i class='fa fa-exclamation-circle'></i> 内容は必須です。");
        $("#news_text").addClass("inp_error");
        result = false;
    }

// メールアドレス
    if(mail&&!mail.match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)){
        $('#mail_error').html("<i class='fa fa-exclamation-circle'></i> 正しいメールアドレスを入力してください。");
        $("#news_mail").addClass("inp_error");
        result = false;
    }else if(mail&&mail.length > 255){
        $('#mail_error').html("<i class='fa fa-exclamation-circle'></i> 正しいメールアドレスを入力してください。");
        $("#news_mail").addClass("inp_error");
        result = false;
    }

// 電話番号
	if(tel != ""){
    if((!tel.match(/^[0-9]+$/)) || (tel.length < 10)){
        $('#tel_error').html("<i class='fa fa-exclamation-circle'></i> 正しい電話番号を入力してください。");
        $("#news_tel").addClass("inp_error");
        result = false;
   		}
	}
	
// 画像拡張子
    if(image1 != ""){
		if(!document.getElementById('news_image1').value.toLowerCase().match(/\.(jpg|gif|png)$/i)) {
        $("#image1_error").html("<i class='fa fa-exclamation-circle'></i> 画像の拡張子は jpg gif png のいずれかにしてください。");
        $("#news_image1").addClass("inp_error");
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


<h1 class="underLine2">お知らせ 新規追加フォーム</h1>
<br>

<p class="wrap_pre">以下の必須事項を入力の上、新規追加ボタンをクリックしてください。</p>
<p class="orange"></p>


<form method="post" action="" enctype="multipart/form-data" onsubmit="return input_check()">
	
<table ID="contactForm">
<?php
$dt = new DateTime();
$newsClose = "2099-12-31T23:59:59";
?>
<tr>
	<td class="formHead">情報日時</td><td><input type="datetime-local" ID="news_day" name="日付" class="formInput" value="<?php echo $dt->format('Y-m-d\TH:i') ?>"><span id="day_error" class="error_m"></span></td>
    </tr><tr></tr><tr>
    	<td class="formHead">公開開始</td><td><input type="datetime-local" ID="news_open" name="公開開始" class="formInput" value="<?php echo $dt->format('Y-m-d\TH:i') ?>"><span id="open_error" class="error_m"></span></td>
        </tr><tr></tr><tr>
    <td class="formHead">公開終了（未記入でもOK）</td><td><input type="datetime-local" ID="news_close" name="公開終了" class="formInput" value="<?php echo date( "Y-m-d\TH:i" , strtotime($newsClose) ); ?>"><span id="close_error" class="error_m"></span></td>
    </tr><tr></tr><tr>
    <td class="formHead">重要度（-1は非表示）</td><td><input type="number" ID="news_value" name="重要度" class="formInput" min=-1 value=0><span id="value_error" class="error_m"></span></td>
    </tr><tr></tr><tr>
    <td class="formHead">タイトル（必須）</td><td><input type="text" ID="news_title" name="タイトル" class="formInput"><span id="title_error" class="error_m"></span></td>
    </tr><tr></tr><tr>
	<td class="formHead">キャッチ</td><td><input type="text" ID="news_catch" name="キャッチ" class="formInput"><span id="catch_error" class="error_m"></span></td>
	</tr><tr></tr><tr>
	<td class="formHead">内容（必須）</td><td><textarea ID="news_text" name="内容テキスト" class="formInput"></textarea><span id="text_error" class="error_m"></span></td>
	</tr><tr></tr><tr>
    <td class="formHead">備考</td><td><input type="text" ID="news_text2" name="備考テキスト" class="formInput"><span id="text2_error" class="error_m"></span></td>
	</tr><tr></tr><tr>
    <td class="formHead">住所</td><td><input type="text" ID="news_address" name="住所" class="formInput"><span id="address_error" class="error_m"></span></td>
	</tr><tr></tr><tr>
	<td class="formHead">電話番号（半角）</td><td><input type="tel" ID="news_tel" name="電話番号" class="formInput"><span id="tel_error" class="error_m"></span></td>
	</tr><tr></tr><tr>
    	<td class="formHead">メールアドレス</td><td><input type="mail" ID="news_mail" name="メールアドレス" class="formInput"><span id="mail_error" class="error_m"></span></td>
	</tr><tr></tr><tr>
	<td class="formHead">GoogleMap座標</td><td><input type="text" ID="news_google" name="GoogleMap位置情報" class="formInput"><span id="google_error" class="error_m"></span></td>
	</tr><tr></tr><tr>
    	<td class="formHead">外部リンクURL</td><td><input type="text" ID="news_url" name="外部リンクURL" class="formInput"><span id="url_error" class="error_m"></span></td>
	</tr><tr></tr><tr>
    	<td class="formHead">画像</td><td><input type="file" ID="news_image1" name="upfile" class="formInput"><span id="image1_error" class="error_m"></span></td>
</tr>

</table>
<br class="split">

<input ID="submitButton" type="submit" value="新 規 追 加">
</form>
<br>


<a href="liveAdd.php"><input class="linkButton" type="button" value="リアルタイム情報の新規追加はコチラ"></a>

</section>
<!-- ▲コンテンツ▲ -->

<!-- ▼フッター▼ -->
<footer>





</footer>
</body>
</html>
