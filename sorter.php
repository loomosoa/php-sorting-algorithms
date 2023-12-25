<?php
declare(strict_types=1);

use Sorting\SorterConfigurator;

require 'vendor/autoload.php';

//    php sorter.php --type=bubble --size=500 --mode=single

$sorterConfigurator = new SorterConfigurator();
$sorterConfigurator->configureSorting();

$sorterConfigurator->sort();


//TODO benchmark