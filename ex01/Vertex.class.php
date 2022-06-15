<?php
require_once 'Color.class.php';

class Vertex {
	private $_x;
	private $_y;
	private $_z;
	private $_w = 1.0;
	private $_color;
	public static $verbose = false;

	public function __construct (array $args) {
		if (isset($args['x']) && isset($args['y']) && isset($args['z']))
		{
			$this->_x = $args['x'];
			$this->_y = $args['y'];
			$this->_z = $args['z'];
		}
		if (isset($args['w']))
			$this->_w = $args['w'];
		if (isset($args['color']))
			$this->_color = $args['color'];
		else
			$this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
		if (self::$verbose === true)
			print($this . ' constructed' . PHP_EOL);
	}

	public function __toString() {
		$strvertex = sprintf('Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f', $this->_x, $this->_y, $this->_z, $this->_w);
		$strcolor = sprintf('%s', $this->_color);
		if (self::$verbose === true)
			return ($strvertex . ', ' . $strcolor . ' )');
		else
			return ($strvertex . ' )');
	}

	public function __destruct() {
		if (self::$verbose === true)
			print($this . ' destructed' . PHP_EOL);
		return;
	}

	static function doc() {
		if (file_exists('./Vertex.doc.txt'))
			return (file_get_contents('./Vertex.doc.txt'));
	}

	public function getX() {
		return $this->_x;
	}

	public function getY() {
		return $this->_y;
	}

	public function getZ() {
		return $this->_z;
	}

	public function getW() {
		return $this->_w;
	}

	public function getColor() {
		return $this->_color;
	}

	public function setX($value) {
		$this->_x = $value;
	}

	public function setY($value) {
		$this->_y = $value;
	}

	public function setZ($value) {
		$this->_z = $value;
	}

	public function setW($value) {
		$this->_w = $value;
	}

	public function setColor($value) {
		$this->_color = $value;
	}
}
?>