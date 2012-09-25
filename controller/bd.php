<?php

class bd extends PDO {

  //  private $dsn = 'mysql:dbname=lpd;host=localhost;port=3306';
    private $dsn = 'mysql:dbname=recurso;host=192.168.0.254;port=3306';
    private $user = 'lpd';
    private $password = 'lpd';
    private static $link = null;

    function __construct() {
        try {
            if (self::$link == null) {
                self::$link = parent::__construct($this->dsn, $this->user, $this->password);
                return self::$link;
            }
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            return false;
        }
    }

    function __destruct() {
        self::$link = NULL;
    }

}

?>
