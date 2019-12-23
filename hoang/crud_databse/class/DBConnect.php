<?php


class DBConnect
{
    protected $dns;
    protected $username;
    protected $password;
    
    public function __construct($dns, $username, $password)
    {
        $this->dns = $dns;
        $this->username = $username;
        $this->password = $password;
    }
    
    public function connect()
    {
        $connect = null;
        try {
            $connect = new PDO($this->dns,$this->username,$this->password);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
        return $connect;
    }
}