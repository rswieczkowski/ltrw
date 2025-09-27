<?php

declare(strict_types=1);

namespace App\Controllers;

use Generator;

class GeneratorExampleController
{
	public function __construct()
	{
	}

	public function index(): void
	{
		$numbers = $this->lazyRange(1, 1000);
		$numberList = [];
		foreach ($numbers as $key => $number) {
			$numberList[$key] = $number;
		}

		echo '<pre>';
		print_r($numberList);
		echo '<pre>';
//
//		echo $numbers->current();
//
//		$numbers->next();
//
//		echo $numbers->current();
//
//		$numbers->next();
//
//		echo $numbers->getReturn();

	}

	private function lazyRange(int $start, int $end): Generator
	{
		for ($i = $start; $i <= $end; $i++) {
			yield $i * 5 => $i;
		}
	}

}