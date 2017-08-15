<?php

class Lannister {
    function sleepWith($sb) {
        if ($sb instanceof Lannister)
            echo 'Not even if I\'m drunk !' . PHP_EOL;
        else
            echo 'Let\'s do this.' . PHP_EOL;
    }
}

?>
