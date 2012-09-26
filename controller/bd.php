<?php

class bd extends PDO {

    //private $dsn = 'mysql:dbname=dietsmar_topicos2;host=50.31.138.79;port=3306';
    private $dsn = 'mysql:dbname=dietsmar_topicos2;host=127.0.0.1;port=3306';
    //private $user = 'dietsmar_topico2';
    private $user = 'root';
    //private $password = '123mudar';
    private $password = '';
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
