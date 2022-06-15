<?php

require_once 'Color.class.php';
require_once 'Vertex.class.php';

class Vector {
	private $_x;
	private $_z;
	private $_y;
	private $_w = 0.0;
	public static $verbose = false;

	public function __construct (array $args) {
		if (isset($args['orig']))
			$orig = $args['orig'];
		else
			$orig = new Vertex(array('x' => 0, 'y' => 0, 'y' => 0, 'w' => 0));

		if (isset($args['dest']))
		{
			$dest = $args['dest'];
			$this->_x = $dest.getX() - $orig.getX();
			$this->_y = $dest.getY() - $orig.getY();
			$this->_z = $dest.getZ() - $orig.getZ();
		}
		else
			exit;
		if (self::$verbose === true)
			print($this . ' constructed' . PHP_EOL);
	}

	public function __destruct() {
		if (self::$verbose === true)
			print($this . ' destructed' . PHP_EOL);
		return;
	}

	public function __toString() {
		$strvertex = sprintf('Vector( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )' , $this->_x, $this->_y, $this->_z, $this->_w);
		if (self::$verbose === true)
			return ($strvertex);
	}

	static function doc() {
		if (file_exists('./Vector.doc.txt'))
			return (file_get_contents('./Vector.doc.txt'));
	}

	public function magnitude() {
		return (sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2)));
	}

	public function  normalize() {
		$magn = $this->magnitude();

		// return normalized version of vector
		// or fresh copy
	}

	public function  add(Vector $rhs ) {
		$new = new Vector(array(
			'x' => $this->_x + $rhs->getX(),
			'y' => $this->_y + $rhs->getY(),
			'z' => $this->_x + $rhs->getZ(),
		));
		return $new;
	}

	public function  sub(Vector $rhs ) {
		$new = new Vector(array(
			'x' => $this->_x - $rhs->getX(),
			'y' => $this->_y - $rhs->getY(),
			'z' => $this->_x - $rhs->getZ(),
		));
		return $new;
	}
	public function  opposite() {
		$new = new Vector(array(
			'x' => $this->_x * -1,
			'y' => $this->_y * -1,
			'z' => $this->_x * -1,
		));
		return $new;
	}

	public function  scalarProduct($k) {

		// return  returns the multiplication of the vector with a scalar.
	}
	public function  dotProduct(Vector $rhs) {

		// return  returns the scalar	multiplication of both vectors.
	}
	public function  cos(Vector $rhs) {

		// return  returns the anglesAppendix cosine between both vectors.
	}
	public function  crossProduct(Vector $rhs) {

		// return  returns the cross multiplication of both vectors (right-hand mark!)
	}
}
?>