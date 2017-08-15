<?php

abstract class Fighter {

    public $class;

    function __construct($c) {
        $this->class = $c;
    }
    
    abstract function fight($target);

}

?>
