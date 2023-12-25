<?php
declare(strict_types=1);

use Sorting\SorterMain;

require 'vendor/autoload.php';

//php sorter.php --type=bubble --size=500 --printArray=false

$sorter = new SorterMain();
$sorter->sort();

