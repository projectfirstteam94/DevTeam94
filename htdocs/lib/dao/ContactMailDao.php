<?php
namespace hawaii\dao;

require_once $_SERVER["DOCUMENT_ROOT"] . "/lib/dao/DBManager.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/lib/dao/ResultSet.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/lib/contact/ContactMail.php";

use hawaii\dao\DBManager;
use hawaii\dao\ResultSet;
use hawaii\contact\ContactMail;

/**
 * 項目リストDAO
 */
class ContactMailDao
{
    // 登録
    private const INSERT = <<<EOD
            INSERT INTO contact_mail (
                  no
                , kind
                , item_01_name
                , item_01_value
                , item_02_name
                , item_02_value
                , item_03_name
                , item_03_value
                , item_04_name
                , item_04_value
                , item_05_name
                , item_05_value
                , item_06_name
                , item_06_value
                , item_07_name
                , item_07_value
                , item_08_name
                , item_08_value
                , item_09_name
                , item_09_value
                , item_10_name
                , item_10_value
                , send_date
                , remote_address
                , remote_host
                , http_referer
                , updated_at
                ) VALUES (
                    NULL
                    , ?
                    , ?
                    , ?
                    , ?
                    , ?
                    , ?
                    , ?
                    , ?
                    , ?
                    , ?
                    , ?
                    , ?
                    , ?
                    , ?
                    , ?
                    , ?
                    , ?
                    , ?
                    , ?
                    , ?
                    , ?
                    , ?
                    , ?
                    , ?
                    , ?
                    , CURRENT_TIMESTAMP
                    )
EOD;

    private const SELECT = "SELECT * FROM contact_mail ORDER BY send_date DESC";

    /**
     * 登録
     *
     * @return true:登録成功、false：登録失敗
     */
    public function insert($kind, $mailFormItems, $sendDate, $remoteAddress, $remoteHost, $httpReferer)
    {
        $ret = false;

        $dbMng = new DBManager();
        if ($dbMng->init()) {
            $values = array();
            $values[] = $kind;
            for ($i = 0; $i < count($mailFormItems); $i++) {
                $values[] = $mailFormItems[$i]["name"];
                $values[] = $mailFormItems[$i]["value"];
            }
            for ($i = count($mailFormItems); $i < 10; $i++) {
                $values[] = "";
                $values[] = "";
            }
            $values[] = $sendDate;
            $values[] = $remoteAddress;
            $values[] = $remoteHost;
            $values[] = $httpReferer;

            $resultSet = $dbMng->insert(self::INSERT, $values);
            $ret = $resultSet->getCount() == 1 ? true : false;
        }
        return $ret;
    }
    
    /**
     * 検索
     *
     * @return ContactMailオブジェクトの配列
     */
    public function list()
    {
        $mails = array();

        $dbMng = new DBManager();
        if ($dbMng->init()) {
            $resultSet = $dbMng->select(self::SELECT, array());
            if ($resultSet->getStatus()) {
                // 検索成功
                for ($i = 0; $i < $resultSet->getCount(); $i++) {
                    $record = $resultSet->getRecord($i);
        
                    $kind = $record["kind"];
                    $mailFormItems = array();
                    $mailFormItems[] = array(
                        "name" => $record["item_01_name"],
                        "value" => $record["item_01_value"]);
                    $mailFormItems[] = array(
                        "name" => $record["item_02_name"],
                        "value" => $record["item_02_value"]);
                    $mailFormItems[] = array(
                        "name" => $record["item_03_name"],
                        "value" =>  $record["item_03_value"]);
                    $mailFormItems[] = array(
                        "name" => $record["item_04_name"],
                        "value" =>  $record["item_04_value"]);
                    $mailFormItems[] = array(
                        "name" => $record["item_05_name"],
                        "value" =>  $record["item_05_value"]);
                    $mailFormItems[] = array(
                        "name" => $record["item_06_name"],
                        "value" =>  $record["item_06_value"]);
                    $mailFormItems[] = array(
                        "name" => $record["item_07_name"],
                        "value" =>  $record["item_07_value"]);
                    $mailFormItems[] = array(
                        "name" => $record["item_08_name"],
                        "value" =>  $record["item_08_value"]);
                    $mailFormItems[] = array(
                        "name" => $record["item_09_name"],
                        "value" =>  $record["item_09_value"]);
                    $mailFormItems[] = array(
                        "name" => $record["item_10_name"],
                        "value" => $record["item_10_value"]);
                    $sendDate = $record["send_date"];
                    $remoteAddress = $record["remote_address"];
                    $remoteHost = $record["remote_host"];
                    $httpReferer = $record["http_referer"];

                    $mails[] = new ContactMail(
                        $kind,
                        $mailFormItems,
                        $sendDate,
                        $remoteAddress,
                        $remoteHost,
                        $httpReferer
                    );
                }
            }
        }

        return $mails;
    }
}
