<?php

class Targaryen {

    function getBurned() {
        return $this->resistsFire() ? 'emerges naked but unharmed' : 'burns alive';
    }

    function resistsFire() {
        return False;
    }
}

?>
