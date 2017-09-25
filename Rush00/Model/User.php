<?php

require_once 'Model/Model.php';

class User extends Model {

#    function __construct($data) {
#        foreach($data as $key => $value) {
#            $this->$key = $value;
#        }
#    }

    function add($login, $mdp) {
        if ($this->exist($login)) {
            print("Error: This login already exists.");
            return False;
        }
        $db =static::getDB();
        $req_pre = mysqli_prepare($db, 'INSERT INTO users (login, mdp) VALUES (?, ?)');
        $hash = password_hash($mdp, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($req_pre, "ss", $login, $hash);
        mysqli_stmt_execute($req_pre);
        return True;
    }

    function exist($login) {
        $db =static::getDB();
        $req_pre = mysqli_prepare($db, 'SELECT * FROM users WHERE login = ?');
        mysqli_stmt_bind_param($req_pre, "s", $login);
        mysqli_stmt_execute($req_pre);
        return (bool) mysqli_stmt_fetch($req_pre);
    }

    function login($login, $mdp) {
        $db =static::getDB();
        $req_pre = mysqli_prepare($db, 'SELECT mdp FROM users WHERE login = ?');
        mysqli_stmt_bind_param($req_pre, "s", $login);
        mysqli_stmt_execute($req_pre);
        mysqli_stmt_bind_result($req_pre, $hash);
        mysqli_stmt_fetch($req_pre);
        return password_verify($mdp, $hash);
    }
}

?>
