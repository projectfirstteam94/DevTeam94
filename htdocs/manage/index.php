<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/lib/contact/ContactMailList.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/lib/contact/ContactMail.php";

use hawaii\contact\ContactMailList;
use hawaii\contact\ContactMail;

$contactMails = ContactMailList::list();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Hawaiian Sky | ハワイアンスカイ -お問い合わせ履歴</title>

    <!-- ::: CSS / JS ::: -->
    <link rel="stylesheet" href="/common/css/minireset.css">
    <link rel="stylesheet" href="/common/css/layout.css">
    <link rel="stylesheet" href="/common/css/style.css">
    <link rel="stylesheet" href="/manage/css/manage.css">

</head>
<body id="contactMailManage">
<div class="">

    <!-- ::: Main ::: -->
    <div class="ly_main">
        <!-- ::: ▼ Contents Edit Area ▼ ::: -->
        <section class="mainContent">
            <h1 class="underLine2">お問い合わせ履歴</h1>
<?php
foreach ($contactMails as $mail) {
?>
            <article class="un_contactMail cFix">
                <div class="un_contactMailBlock_head">
                    <h2 class="barLine">
                        <?php
                            echo date("Y/m/d H:i", strtotime($mail->getSendDate()));
                            echo "　";
                            echo $mail->getKind() == 1 ? "お問い合わせ" : "プライベートジェット専用お問い合わせ";
                        ?>
                    </h2>
                </div><!-- /.un_contactMailBlock_head -->
                <br>
                <div class="un_contactMailBlock_txt">
<?php
    for ($i = 0; $i < $mail->getMailFormItemCount(); $i++) {
        if ($mail->getMailFormItemNameFmt($i) === "") {
            break;
        }
        echo "<p>【" . $mail->getMailFormItemNameFmt($i) . "】";
        echo $mail->getMailFormItemValueFmt($i) . "</p>";
    }
    echo "----------------";
    echo "<p>送信された日時：" . date("Y/m/d H:i:s", strtotime($mail->getSendDate())) . "</p>";
    echo "<p>送信者のIPアドレス：" . $mail->getRemoteAddressFmt() . "</p>";
    echo "<p>送信者のホスト名：" . $mail->getRemoteHostFmt() . "</p>";
    echo "<p>問い合わせのページURL：" . $mail->getHttpRefererFmt() . "</p>";
?>
                </div><!-- /.un_contactMailBlock_txt -->
            </article>

<?php
}
?>

        </section>


        <!-- ::: ▲ Contents Edit Area ▲ ::: -->
    </div><!-- /.ly_main -->
    <!-- ::: /Main ::: -->

</div><!-- /.ly_wrap -->
</body>
</html>
