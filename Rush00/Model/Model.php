<?php

require_once 'Config.php';
error_reporting(E_ERROR);

abstract class Model {

    protected static function getDB() {
        static $db = null;
        if ($db === null)
            ($db = mysqli_connect(Config::DB_HOST, Config::DB_USER, Config::DB_PASS, Config::DB_NAME)) or die('<br /><strong>You should install the database first!<strong>');
        return $db;
    }
}

?>
