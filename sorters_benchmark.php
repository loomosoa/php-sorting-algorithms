<?php
declare(strict_types=1);

use Sorting\SortersBenchmark;

require 'vendor/autoload.php';

//php sorters_benchmark.php --size=500 --sortersList=bubble,selection,insertion

$sortersBenchmark = new SortersBenchmark();
$sortersBenchmark->benchmark();