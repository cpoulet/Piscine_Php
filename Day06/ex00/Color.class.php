<?php

Class Color {

	private $_red = 0;
	private $_green = 0;
	private $_blue = 0;
	public static $verbose = False;

	function __construct( array $kwargs ) {

		if ( array_key_exists( 'rgb', $kwargs ) ) {
			$this->_red = ( $kwargs['rgb'] >> 16 ) & 0xff;
			$this->_green = ( $kwargs['rgb'] >> 8 ) & 0xff;
			$this->_blue = $kwargs['rgb'] & 0xff ;
		}
		else {
			if ( array_key_exists( 'red', $kwargs ) )
				$this->_red = (int) $kwargs['red'];
			else
				$this->_red = 0;

			if ( array_key_exists( 'green', $kwargs ) )
				$this->_green = (int) $kwargs['green'];
			else
				$this->_green = 0;

			if ( array_key_exists( 'blue', $kwargs ) )
				$this->_blue = (int) $kwargs['blue'];
			else
				$this->_blue = 0;
		}
		if (self::$verbose)
			print( $this . ' constructed.' . PHP_EOL );
		return;
	}

	function __destruct() {
		if (self::$verbose)
			print($this . ' destructed.' . PHP_EOL );
		return;
	}

	function __toString() {
		return sprintf( "Color( red: %3d, green: %3d, blue: %3d )", $this->_red, $this->_green, $this->_blue);
	}

	static function doc() {
		return file_get_contents ( 'Color.doc.txt' );
	}

	function add( Color $instance) {
	 	return new Color( array( 'red' => $this->_red + $instance->_red, 'green' => $this->_green + $instance->_green, 'blue' => $this->_blue + $instance->_blue ) );
	}

	function sub( Color $instance) {
	 	return new Color( array( 'red' => $this->_red - $instance->_red, 'green' => $this->_green - $instance->_green, 'blue' => $this->_blue - $instance->_blue ) );
	}

	function mult( $fact) {
	 	return new Color( array( 'red' => $this->_red * $fact, 'green' => $this->_green * $fact, 'blue' => $this->_blue * $fact ) );
	}

}

?>
