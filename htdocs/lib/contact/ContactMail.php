<?php
namespace hawaii\contact;

require_once $_SERVER["DOCUMENT_ROOT"] . "/lib/dao/ContactMailDao.php";

use hawaii\dao\ContactMailDao;

class ContactMail
{
    // お問い合わせ種別
    private $kind = "";

    // メールフォームアイテム
    private $mailFormItems = array();

    // 送信された日時
    private $sendDate = "";

    // 送信者のIPアドレス
    private $remoteAddress = "";

    // 送信者のホスト名
    private $remoteHost = "";

    // 送信ページURL(お問い合わせページのURL)
    private $httpReferer = "";

    public function __construct($kind, $mailFormItems, $sendDate, $remoteAddress, $remoteHost, $httpReferer)
    {
        $this->kind = $kind;
        $this->mailFormItems = $mailFormItems;
        $this->sendDate = $sendDate;
        $this->remoteAddress = $remoteAddress;
        $this->remoteHost = $remoteHost;
        $this->httpReferer = $httpReferer;
    }

    public function save()
    {
        $dao = new ContactMailDao();
        $ret = $dao->insert(
            $this->kind,
            $this->mailFormItems,
            $this->sendDate,
            $this->remoteAddress,
            $this->remoteHost,
            $this->httpReferer
        );
        return $ret;
    }

    public function getKind()
    {
        return $this->kind;
    }

    public function getMailFormItemCount()
    {
        return count($this->mailFormItems);
    }

    public function getSendDate()
    {
        return $this->sendDate;
    }

    //------------------------------------
    // HTML文字列のエンティティ化
    //------------------------------------
    public function getMailFormItemNameFmt($index)
    {
        return htmlspecialchars($this->mailFormItems[$index]["name"], ENT_QUOTES, 'UTF-8');
    }

    public function getMailFormItemValueFmt($index)
    {
        return nl2br(htmlspecialchars($this->mailFormItems[$index]["value"], ENT_QUOTES, 'UTF-8'));
    }

    public function getRemoteAddressFmt()
    {
        return htmlspecialchars($this->remoteAddress, ENT_QUOTES, 'UTF-8');
    }

    public function getRemoteHostFmt()
    {
        return htmlspecialchars($this->remoteHost, ENT_QUOTES, 'UTF-8');
    }

    public function getHttpRefererFmt()
    {
        return htmlspecialchars($this->httpReferer, ENT_QUOTES, 'UTF-8');
    }
}
