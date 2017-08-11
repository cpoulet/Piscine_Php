<?php

require_once 'Color.class.php';
require_once 'Vertex.class.php';

Class Vector {

	private $_x = 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private $_w = 0.0;
	public static $verbose = False;

	function getX() { return $this->_x; }
	function getY() { return $this->_y; }
	function getZ() { return $this->_z; }
	function getW() { return $this->_w; }

	function __construct( array $kwargs ) {
        $_dest = $kwargs['dest'];
		$_orig = (array_key_exists('orig', $kwargs)) ? $kwargs['orig']
                : new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0 ) );
		$this->_x = $_dest->getX() - $_orig->getX();
		$this->_y = $_dest->getY() - $_orig->getY();
		$this->_z = $_dest->getZ() - $_orig->getZ();
		$this->_w = 0;
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
		return sprintf( "Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->getX(), $this->getY(), $this->getZ(), $this->getW() );
	}

	static function doc() {
		return file_get_contents ( 'Vector.doc.txt' );
	}

	function magnitude() {
		return sqrt(pow($this->getX(), 2) + pow($this->getY(), 2) + pow($this->getZ(), 2));
	}

	function normalize() {
        $m = $this->magnitude();
		return new Vector( array( 'dest' => new Vertex( array( 'x' => $this->getX() / $m, 'y' => $this->getY() / $m, 'z' => $this->getZ() / $m) ) ) );
	}

	function add(Vector $rhs) {
		return new Vector( array( 'dest' => new Vertex( array( 'x' => $this->getX() + $rhs->getX(), 'y' => $this->getY() + $rhs->getY(), 'z' => $this->getZ() + $rhs->getZ()) ) ) );
	}

	function sub(Vector $rhs) {
		return new Vector( array( 'dest' => new Vertex( array( 'x' => $this->getX() - $rhs->getX(), 'y' => $this->getY() - $rhs->getY(), 'z' => $this->getZ() - $rhs->getZ()) ) ) );
	}

	function opposite() {
		return new Vector( array( 'dest' => new Vertex( array( 'x' => $this->getX() * -1, 'y' => $this->getY() * -1, 'z' => $this->getZ() * -1) ) ) );
	}

	function scalarProduct( $k ) {
		return new Vector( array( 'dest' => new Vertex( array( 'x' => $this->getX() * $k, 'y' => $this->getY() * $k, 'z' => $this->getZ() * $k) ) ) );
	}

	function dotProduct(Vector $rhs) {
		return $this->getX() * $rhs->getX() + $this->getY() * $rhs->getY() + $this->getZ() * $rhs->getZ();
	}

	function cos(Vector $rhs) {
		return $this->dotProduct($rhs) / ($this->magnitude() * $rhs->magnitude());
	}

	function crossProduct(Vector $rhs) {
		return new Vector( array( 'dest' => new Vertex( array( 'x' => $this->getY() * $rhs->getZ() - $this->getZ() * $rhs->getY(), 'y' => $this->getZ() * $rhs->getX() - $this->getX() * $rhs->getZ(), 'z' => $this->getX() * $rhs->getY() - $this->getY() * $rhs->getX()) ) ) );
	}

}

?>
