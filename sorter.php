<?php
declare(strict_types=1);

use Sorting\SortingResolver;

require 'vendor/autoload.php';

//php sorter.php --type=bubble --size=500 --printArray=false

$sortingResolver = new SortingResolver();
$sortingResolver->sort();
