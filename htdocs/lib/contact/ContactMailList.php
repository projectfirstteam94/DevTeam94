<?php
namespace hawaii\contact;

require_once $_SERVER["DOCUMENT_ROOT"] . "/lib/contact/ContactMail.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/lib/dao/ContactMailDao.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/lib/dao/ResultSet.php";

use hawaii\contact\ContactMail;
use hawaii\dao\ContactMailDao;
use hawaii\dao\ResultSet;

class ContactMailList
{
    // メールリスト
    public static function list()
    {
        $dao = new ContactMailDao();
        $contactMails = $dao->list();
        return $contactMails;
    }
}
