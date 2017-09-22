<?php

require_once 'Config.php';

abstract class Model {

    protected static function getDB() {
        static $db = null;
        if ($db === null) {
            if (!($db = mysqli_connect(Config::DB_HOST, Config::DB_USER, Config::DB_PASS, Config::DB_NAME))) {
                echo 'Connexion BD Error !';
            }
        }
        return $db;
    }
}

?>
