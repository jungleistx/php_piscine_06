<?php

	class Color {
		public static $verbose = false;

		public $red;
		public $green;
		public $blue;

		public function __construct( array $args ) {
			if (isset($args['rgb']))
			{
				$this->red = intval($args['rgb']) >> 16 & 255;
				$this->green = intval($args['rgb']) >> 8 & 255;
				$this->blue = intval($args['rgb']) & 255;
			}
			else
			{
				$this->red = intval($args['red']);
				$this->green= intval($args['green']);
				$this->blue = intval($args['blue']);
			}
			if (self::$verbose === true)
				print($this . ' constructed.' . PHP_EOL);
		}

		public function __destruct() {
			if (self::$verbose === true)
				print($this . ' destructed.' . PHP_EOL);
			return;
		}

		public function __toString() {
			$string = sprintf('Color( red: %3d, green: %3d, blue: %3d )', $this->red, $this->green, $this->blue);
			return $string;
		}

		static function doc() {
			if (file_exists('./Color.doc.txt'))
				return (file_get_contents('./Color.doc.txt'));
		}

		public function add( Color $rhs ) {
			$new = new Color ( array(
			'red' => $this->red + $rhs->red,
			'green' => $this->green + $rhs->green,
			'blue' => $this->blue + $rhs->blue
			));
			return $new;
		}

		public function sub( Color $rhs ) {
			$new = new Color ( array(
			'red' => $this->red - $rhs->red,
			'green' => $this->green - $rhs->green,
			'blue' => $this->blue - $rhs->blue
			));
			return $new;
		}

		public function mult( $f ) {
			$new = new Color ( array(
			'red' => $this->red * $f,
			'green' => $this->green * $f,
			'blue' => $this->blue * $f
			));
			return $new;
		}

	}
?>