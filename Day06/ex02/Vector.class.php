<?php

require_once 'Color.class.php';
require_once 'Vector.class.php';

Class Vector {

	private $_x = 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private $_w = 1.0;
	public static $verbose = False;

	function getX() { return $this->_x; }
	function getY() { return $this->_y; }
	function getZ() { return $this->_z; }
	function getW() { return $this->_w; }

	function __construct( array $kwargs ) {
		if ( array_key_exists( 'orig', $kwargs ) ) {
			$this->_x = $kwargs['dest']->x - $kwargs['orig']->x;
			$this->_y = $kwargs['dest']->y - $kwargs['orig']->y;
			$this->_z = $kwargs['dest']->z - $kwargs['orig']->z;
			$this->_w = $kwargs['dest']->w - $kwargs['orig']->w; #A checker
		}
		else {
			$this->_x = $kwargs['dest']->x;
			$this->_y = $kwargs['dest']->y;
			$this->_z = $kwargs['dest']->z;
			$this->_w = $kwargs['dest']->w - 1; # Probablement faux
		}
		if (self::$verbose)
			print($this . ' constructed' . PHP_EOL );
		return;
	}

	function __destruct() {
		if (self::$verbose)
			print($this . ' destructed' . PHP_EOL );
		return;
	}

	function __toString() {
		return sprintf( "Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w );
	}

	static function doc() {
		return file_get_contents ( 'Vector.doc.txt' );
	}

	function magnitude() {
		return sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2));
	}

}

?>
