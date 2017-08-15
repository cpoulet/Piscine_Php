<?php

class NightsWatch {

    private $_army = [];

    function recruit($sb) {
        $this->_army[] = $sb;
    }

    function fight() {
        foreach ($this->_army as $recruit) {
            if ($recruit instanceof IFighter)
                $recruit->fight();
        }
    }
}

?>
