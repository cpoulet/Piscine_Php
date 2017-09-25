<?php

require_once 'Model/Model.php';

class Project extends Model {

    public static function getAll() {
        $db =static::getDB();
        $out = array();
        $rslt = mysqli_query($db, 'SELECT * FROM projects');
        while($data = mysqli_fetch_assoc($rslt))
            array_push($out, $data);
        return $out;
    }

}

?>
