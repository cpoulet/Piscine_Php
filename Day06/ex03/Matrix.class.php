<?php

require_once 'Vertex.class.php';
require_once 'Vector.class.php';

Class Matrix {

    const IDENTITY      = 0;
    const SCALE         = 1;
    const RX            = 2;
    const RY            = 3;
    const RZ            = 4;
    const TRANSLATION   = 5;
    const PROJECTION    = 6;
    const LABEL         = ['IDENTITY', 'SCALE', 'Ox ROTATION', 'Oy ROTATION', 'Oz ROTATION', 'TRANSLATION', 'PROJECTION'];
    const MX_ID         =  [[1, 0, 0, 0],
                            [0, 1, 0, 0],
                            [0, 0, 1, 0],
                            [0, 0, 0, 1]];
    public static $verbose = False;
    private $_matrix = self::MX_ID;

    function getMatrix() { return $this->_matrix; }

	function __construct( array $kwargs ) {
        $op = $kwargs['preset'];
        switch ($op) {
            case 0:
                $_matrix = self::MX_ID;
                break;
            case 1:
                $this->_matrix = [[$kwargs['scale'], 0, 0, 0],
                                  [0, $kwargs['scale'], 0, 0],
                                  [0, 0, $kwargs['scale'], 0],
                                  [0, 0, 0, 1]];
                break;
            case 2:
                $this->_matrix = [[1, 0, 0, 0],
                                  [0, cos($kwargs['angle']), -1 * sin($kwargs['angle']), 0],
                                  [0, sin($kwargs['angle']), cos($kwargs['angle']), 0],
                                  [0, 0, 0, 1]];
                break;
            case 3:
                $this->_matrix = [[cos($kwargs['angle']), 0, sin($kwargs['angle']), 0],
                                  [0, 1, 0, 0],
                                  [-1 * sin($kwargs['angle']), 0, cos($kwargs['angle']), 0],
                                  [0, 0, 0, 1]];
                break;
            case 4:
                $this->_matrix = [[cos($kwargs['angle']), -1 * sin($kwargs['angle']), 0, 0],
                                  [sin($kwargs['angle']), cos($kwargs['angle']), 0, 0],
                                  [0, 0, 1, 0],
                                  [0, 0, 0, 1]];
                break;
            case 5:
                $this->_matrix = self::MX_ID;
                $this->_matrix[0][3] = $kwargs['vtc']->getX();
                $this->_matrix[1][3] = $kwargs['vtc']->getY();
                $this->_matrix[2][3] = $kwargs['vtc']->getZ();
                break;
            case 6:
				$scale = 1 / tan($kwargs['fov'] * 0.5 * M_PI / 180);
				$this->_matrix = [[$scale / $kwargs['ratio'], 0, 0, 0],
								  [0, $scale, 0, 0],
								  [0, 0, -($kwargs['far'] + $kwargs['near']) / ($kwargs['far'] - $kwargs['near']), (-2 * $kwargs['far'] * $kwargs['near']) / ($kwargs['far'] - $kwargs['near'])],
								  [0, 0, -1, 0]];
                break;
        }
		if (self::$verbose)
			print('Matrix ' . self::LABEL[$op] . ' preset instance constructed' . PHP_EOL );
		return;
	}

	function __destruct() {
		if (self::$verbose)
			print('Matrix instance destructed' . PHP_EOL );
		return;
	}

	function __toString() {
		$string = 'M | vtcX | vtcY | vtcZ | vtxO' . PHP_EOL . str_repeat("-", 29) . PHP_EOL;
        $string .= sprintf( "x | %.2f | %.2f | %.2f | %.2f", $this->_matrix[0][0], $this->_matrix[0][1], $this->_matrix[0][2], $this->_matrix[0][3] ) . PHP_EOL;
        $string .= sprintf( "y | %.2f | %.2f | %.2f | %.2f", $this->_matrix[1][0], $this->_matrix[1][1], $this->_matrix[1][2], $this->_matrix[1][3] ) . PHP_EOL;
        $string .= sprintf( "z | %.2f | %.2f | %.2f | %.2f", $this->_matrix[2][0], $this->_matrix[2][1], $this->_matrix[2][2], $this->_matrix[2][3] ) . PHP_EOL;
        $string .= sprintf( "w | %.2f | %.2f | %.2f | %.2f", $this->_matrix[3][0], $this->_matrix[3][1], $this->_matrix[3][2], $this->_matrix[3][3] );
		return ($string);
	}

	static function doc() {
		return file_get_contents ( 'Matrix.doc.txt' );
	}
    public function mult(Matrix $rhs) {
        $new_matrix = clone $this;
        $new_matrix->_matrix = [   [  $this->getMatrix()[0][0] * $rhs->getMatrix()[0][0] + $this->getMatrix()[0][1] * $rhs->getMatrix()[1][0] + $this->getMatrix()[0][2] * $rhs->getMatrix()[2][0] + $this->getMatrix()[0][3] * $rhs->getMatrix()[3][0],
                                        $this->getMatrix()[0][0] * $rhs->getMatrix()[0][1] + $this->getMatrix()[0][1] * $rhs->getMatrix()[1][1] + $this->getMatrix()[0][2] * $rhs->getMatrix()[2][1] + $this->getMatrix()[0][3] * $rhs->getMatrix()[3][1],
                                        $this->getMatrix()[0][0] * $rhs->getMatrix()[0][2] + $this->getMatrix()[0][1] * $rhs->getMatrix()[1][2] + $this->getMatrix()[0][2] * $rhs->getMatrix()[2][2] + $this->getMatrix()[0][3] * $rhs->getMatrix()[3][2],
                                        $this->getMatrix()[0][0] * $rhs->getMatrix()[0][3] + $this->getMatrix()[0][1] * $rhs->getMatrix()[1][3] + $this->getMatrix()[0][2] * $rhs->getMatrix()[2][3] + $this->getMatrix()[0][3] * $rhs->getMatrix()[3][3] ],
                                [  $this->getMatrix()[1][0] * $rhs->getMatrix()[0][0] + $this->getMatrix()[1][1] * $rhs->getMatrix()[1][0] + $this->getMatrix()[1][2] * $rhs->getMatrix()[2][0] + $this->getMatrix()[1][3] * $rhs->getMatrix()[3][0],
                                        $this->getMatrix()[1][0] * $rhs->getMatrix()[0][1] + $this->getMatrix()[1][1] * $rhs->getMatrix()[1][1] + $this->getMatrix()[1][2] * $rhs->getMatrix()[2][1] + $this->getMatrix()[1][3] * $rhs->getMatrix()[3][1],
                                        $this->getMatrix()[1][0] * $rhs->getMatrix()[0][2] + $this->getMatrix()[1][1] * $rhs->getMatrix()[1][2] + $this->getMatrix()[1][2] * $rhs->getMatrix()[2][2] + $this->getMatrix()[1][3] * $rhs->getMatrix()[3][2],
                                        $this->getMatrix()[1][0] * $rhs->getMatrix()[0][3] + $this->getMatrix()[1][1] * $rhs->getMatrix()[1][3] + $this->getMatrix()[1][2] * $rhs->getMatrix()[2][3] + $this->getMatrix()[1][3] * $rhs->getMatrix()[3][3] ],
                                [  $this->getMatrix()[2][0] * $rhs->getMatrix()[0][0] + $this->getMatrix()[2][1] * $rhs->getMatrix()[1][0] + $this->getMatrix()[2][2] * $rhs->getMatrix()[2][0] + $this->getMatrix()[2][3] * $rhs->getMatrix()[3][0],
                                        $this->getMatrix()[2][0] * $rhs->getMatrix()[0][1] + $this->getMatrix()[2][1] * $rhs->getMatrix()[1][1] + $this->getMatrix()[2][2] * $rhs->getMatrix()[2][1] + $this->getMatrix()[2][3] * $rhs->getMatrix()[3][1],
                                        $this->getMatrix()[2][0] * $rhs->getMatrix()[0][2] + $this->getMatrix()[2][1] * $rhs->getMatrix()[1][2] + $this->getMatrix()[2][2] * $rhs->getMatrix()[2][2] + $this->getMatrix()[2][3] * $rhs->getMatrix()[3][2],
                                        $this->getMatrix()[2][0] * $rhs->getMatrix()[0][3] + $this->getMatrix()[2][1] * $rhs->getMatrix()[1][3] + $this->getMatrix()[2][2] * $rhs->getMatrix()[2][3] + $this->getMatrix()[2][3] * $rhs->getMatrix()[3][3] ],
                                [  $this->getMatrix()[3][0] * $rhs->getMatrix()[0][0] + $this->getMatrix()[3][1] * $rhs->getMatrix()[1][0] + $this->getMatrix()[3][2] * $rhs->getMatrix()[2][0] + $this->getMatrix()[3][3] * $rhs->getMatrix()[3][0],
                                        $this->getMatrix()[3][0] * $rhs->getMatrix()[0][1] + $this->getMatrix()[3][1] * $rhs->getMatrix()[1][1] + $this->getMatrix()[3][2] * $rhs->getMatrix()[2][1] + $this->getMatrix()[3][3] * $rhs->getMatrix()[3][1],
                                        $this->getMatrix()[3][0] * $rhs->getMatrix()[0][2] + $this->getMatrix()[3][1] * $rhs->getMatrix()[1][2] + $this->getMatrix()[3][2] * $rhs->getMatrix()[2][2] + $this->getMatrix()[3][3] * $rhs->getMatrix()[3][2],
                                        $this->getMatrix()[3][0] * $rhs->getMatrix()[0][3] + $this->getMatrix()[3][1] * $rhs->getMatrix()[1][3] + $this->getMatrix()[3][2] * $rhs->getMatrix()[2][3] + $this->getMatrix()[3][3] * $rhs->getMatrix()[3][3]] ];
        return ($new_matrix);
    }

	public function transformVertex(Vertex $vtx) {
        return new Vertex([ 'x' => $this->_matrix[0][0] * $vtx->getX() + $this->_matrix[0][1] * $vtx->getY() + $this->_matrix[0][2] * $vtx->getZ() + $this->_matrix[0][3] * $vtx->getW(), 
                            'y' => $this->_matrix[1][0] * $vtx->getX() + $this->_matrix[1][1] * $vtx->getY() + $this->_matrix[1][2] * $vtx->getZ() + $this->_matrix[1][3] * $vtx->getW(), 
                            'z' => $this->_matrix[2][0] * $vtx->getX() + $this->_matrix[2][1] * $vtx->getY() + $this->_matrix[2][2] * $vtx->getZ() + $this->_matrix[2][3] * $vtx->getW(),
                            'w' => $this->_matrix[3][0] * $vtx->getX() + $this->_matrix[3][1] * $vtx->getY() + $this->_matrix[3][2] * $vtx->getZ() + $this->_matrix[3][3] * $vtx->getW(),
                            'color' => $vtx->getColor()]);
    }

}

?>
