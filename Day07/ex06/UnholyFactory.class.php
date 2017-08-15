<?php

class UnholyFactory {

    private $_models = [];

    function absorb($sb) {
        if ($sb instanceof Fighter) {
            if (in_array($sb, $this->_models))
                echo '(Factory already absorbed a fighter of type ' . $sb->class . ')' . PHP_EOL;
            else {
                echo '(Factory absorbed a fighter of type ' . $sb->class . ')' . PHP_EOL;
                $this->_models[] = $sb;
            }
        }
        else
            echo '(Factory can\'t absorb this, it\'s not a fighter)' . PHP_EOL;
    }

    function fabricate($f) {
        foreach ($this->_models as $model) {
            if ($f == $model->class) {
                echo '(Factory fabricates a fighter of type ' . $f . ')' . PHP_EOL;
                return clone $model;
            }
        }
        echo '(Factory hasn\'t absorbed a fighter of type ' . $f . ')' . PHP_EOL;
    }

}

?>
