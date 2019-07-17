<?php
namespace hawaii\dao;

require_once $_SERVER["DOCUMENT_ROOT"] . "/AppConfig.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/lib/dao/ResultSet.php";

use configs\AppConfig;
use PDO;
use PDOException;

/**
 * データベースアクセスクラス
 */
class DBManager
{

    /**
     * @var PDO PDOオブジェクト
     */
    private $pdo;

    /**
     * コンストラクタ
     */
    public function init()
    {
        try {
            $dbHost = AppConfig::DB_HOST;
            $dbName = AppConfig::DB_NAME;
            $dbUser = AppConfig::DB_USER;
            $dbPass = AppConfig::DB_PASS;

            $dsn = sprintf("mysql:dbname=%s;host=%s;charset=utf8;", $dbName, $dbHost);

            $this->pdo = new PDO($dsn, $dbUser, $dbPass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            return false;
        }
        return true;
    }

    /**
     * INSERT
     */
    public function insert($sql, $values)
    {
        $resultSet = new ResultSet();

        try {
            //prepareメソッドでSQLをセット
            $sth = $this->pdo->prepare($sql);

            //bindValueメソッドでパラメータをセット
            for ($i = 0; $i < count($values); $i++) {
                $index = $i + 1;
                $sth->bindValue($index, $values[$i]);
            }

            //executeでクエリを実行
            $sth->execute();

            // 件数を取得
            $dataCount = $sth->rowCount();

            // 接続を閉じる
            $sth->closeCursor();
            $sth = null;

            // 結果セットに設定
            $resultSet->setStatus(true);
            $resultSet->setCount($dataCount);
        } catch (PDOException $e) {
            $resultSet->setError($e->getMessage());
            return $resultSet;
        }
        return $resultSet;
    }

    /**
     * SELECT
     */
    public function select($sql, $values)
    {
        $resultSet = new ResultSet();

        try {
            //prepareメソッドでSQLをセット
            $sth = $this->pdo->prepare($sql);

            //bindValueメソッドでパラメータをセット
            for ($i = 0; $i < count($values); $i++) {
                $sth->bindValue($i, $values[$i]);
            }

            //executeでクエリを実行
            $sth->execute();

            // 連想配列に格納
            $dataArry = $sth->fetchAll();
            $dataCount = $sth->rowCount();

            // 接続を閉じる
            $sth->closeCursor();
            $sth = null;

            // 結果セットに設定
            $resultSet->setStatus(true);
            $resultSet->setCount($dataCount);
            $resultSet->setResult($dataArry);
        } catch (PDOException $e) {
            $resultSet->setError($e->getMessage());
            return $resultSet;
        }
        return $resultSet;
    }
}
