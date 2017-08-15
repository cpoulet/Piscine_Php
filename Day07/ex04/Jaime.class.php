<?php

class Jaime extends Lannister {
    function sleepWith($sb) {
        if ($sb instanceof Cersei)
            echo 'With pleasure, but only in a tower in Winterfell, then.' . PHP_EOL;
        else
            parent::sleepWith($sb);
    }
}

?>
