<?php

Class Color {

	public $red = 0;
	public $green = 0;
	public $blue = 0;
	public static $verbose = False;

	function __construct( array $kwargs ) {

		if ( array_key_exists( 'rgb', $kwargs ) ) {
			$this->red = ( $kwargs['rgb'] >> 16 ) & 0xff;
			$this->green = ( $kwargs['rgb'] >> 8 ) & 0xff;
			$this->blue = $kwargs['rgb'] & 0xff ;
		}
		else {
			if ( array_key_exists( 'red', $kwargs ) )
				$this->red = (int) $kwargs['red'];
			else
				$this->red = 0;

			if ( array_key_exists( 'green', $kwargs ) )
				$this->green = (int) $kwargs['green'];
			else
				$this->green = 0;

			if ( array_key_exists( 'blue', $kwargs ) )
				$this->blue = (int) $kwargs['blue'];
			else
				$this->blue = 0;
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
		return sprintf( "Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
	}

	static function doc() {
		return file_get_contents ( 'Color.doc.txt' );
	}

	function add( Color $instance) {
	 	return new Color( array( 'red' => $this->red + $instance->red, 'green' => $this->green + $instance->green, 'blue' => $this->blue + $instance->blue ) );
	}

	function sub( Color $instance) {
	 	return new Color( array( 'red' => $this->red - $instance->red, 'green' => $this->green - $instance->green, 'blue' => $this->blue - $instance->blue ) );
	}

	function mult( $fact) {
	 	return new Color( array( 'red' => $this->red * $fact, 'green' => $this->green * $fact, 'blue' => $this->blue * $fact ) );
	}

}

?>
