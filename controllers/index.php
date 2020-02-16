<?php

class Index extends Controller
{

	const SMALL = 7;
	const MEDIUM = 7;
	const LARGE = 11;

	function __construct()
	{
		parent::__construct();
	}
	/**
	 * index 
	 *
	 * @return void
	 */
	function index()
	{
		$this->view->string = '';
		$this->printTriangle(self::SMALL);
		$this->printSnow(self::SMALL);
		$this->view->render('index/index');
	}
	/**
	 * printSnow 
	 * prints the shapes of snow with passed interger
	 *
	 * @param integer $selected
	 * @return void
	 */
	function printSnow(int $selected)
	{
		$hash = $selected + 2;
		$spaces = $hash - 2;

		$this->view->string .= str_repeat(' ', $spaces) . "+\n";
		$pyramid_rev = [];
		$key_for_delete = 0;
		for ($i = 1; $i < $hash + 1; $i + 4) {
			if ($i % 2) {
				if ($i + 4 >= $hash + 1) {
					$this->view->string .= str_repeat(' ', $spaces - 1) . "+" . str_repeat('#', $i) . "+" . "\n";
				} else {
					$this->view->string .= str_repeat(' ', $spaces) .  str_repeat('#', $i) . "\n";
				}
				$pyramid_rev[$i] = $spaces;
				$key_for_delete = $i;
				$spaces -= 2;
				$i += 4;
			}
		}
		asort($pyramid_rev);
		unset($pyramid_rev[$key_for_delete]);

		$spaces += 4;
		foreach ($pyramid_rev as $key => $value) {
			$this->view->string .= str_repeat(' ', $value) .  str_repeat('#', $key) . "\n";
			$spaces = $value;
		}

		$this->view->string .= str_repeat(' ', $spaces) . "+\n";
	}

	/**
	 * printTriangle
	 * prints cristmas tree with passed interger
	 *
	 * @param integer $selected
	 * @return void
	 */
	function printTriangle(int $selected)
	{
		$hash = $selected + 2;
		$spaces = $hash - 3;

		$this->view->string .= str_repeat(' ', $spaces) . "+\n";

		for ($i = 1; $i < $hash + 3; $i++) {
			if ($i % 2) {
				$this->view->string .= str_repeat(' ', $spaces) .  str_repeat('#', $i) . "\n";
				$spaces--;
			}
		}
	}
}
