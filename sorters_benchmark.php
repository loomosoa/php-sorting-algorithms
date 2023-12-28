<?php
declare(strict_types=1);

use Sorting\SortersBenchmark;

require 'vendor/autoload.php';

$sortersBenchmark = new SortersBenchmark();
$sortersBenchmark->benchmark();