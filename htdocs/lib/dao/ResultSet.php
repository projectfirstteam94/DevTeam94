<?php
namespace hawaii\dao;

/**
 * データベースアクセス結果セットクラス
 */
class ResultSet {

    /**
     * @var string DBアクセス結果(TRUE：成功、FALSE：失敗)
     */
    private $status = false;

    /**
     * @var integer 検索件数または更新(追加および削除)件数
     */
    private $count = 0;

    /**
     * @var array 検索結果
     */
    private $result = array();

    /**
     *
     * @var string エラー内容
     */
    private $error = "";

    /**
     * コンストラクタ
     */
    function __construct() {}

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getCount() {
        return $this->count;
    }

    public function setCount($count) {
        $this->count = $count;
    }

    public function getResult() {
        return $this->result;
    }

    public function getRecord($index) {
        if ($index >= $this->count) {
            echo "エラー";
        }
        return $this->result[$index];
    }

    public function setResult($result) {
        $this->result = $result;
    }

    public function getError() {
        return $this->error;
    }

    public function setError($error) {
        $this->error = $error;
    }
}
