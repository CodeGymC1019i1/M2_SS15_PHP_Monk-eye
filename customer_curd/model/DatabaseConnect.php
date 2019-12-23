<?php


namespace Model;

use PDO;
use PDOException;

//model tạo class DBConnection  để thực hiện kết nối cơ sở dữ liệu
class DatabaseConnect
{
    public $dataSourceName;
    public $userName;
    public $passWord;

    public function __construct($dataSourceName, $userName, $passWord)
    {
        $this->dataSourceName = $dataSourceName;
        $this->userName = $userName;
        $this->passWord = $passWord;
    }

    public function connect()
    {
        $connect = NUll;
        try {
            $connect = new PDO($this->dataSourceName, $this->userName, $this->passWord);
        } catch (PDOException $exception) {
            $exception->getMessage();
        }
        return $connect;
    }
}