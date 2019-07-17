<?php
namespace hawaii\contact;

require_once $_SERVER["DOCUMENT_ROOT"] . "/lib/contact/ContactMail.php";

use hawaii\contact\ContactMail;

class GeneralContactMail extends ContactMail
{
    // お問い合わせ種別
    private const KIND_PARAM = 1;

    public function __construct($mailFormItems, $sendDate, $remoteAddress, $remoteHost, $httpReferer)
    {
        parent::__construct(self::KIND_PARAM, $mailFormItems, $sendDate, $remoteAddress, $remoteHost, $httpReferer);
    }
}
