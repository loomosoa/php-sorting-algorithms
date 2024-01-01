<?php
declare(strict_types=1);
namespace Sorting;

class SortingResolver
{

    public function configureAndSort(Options $options = null): void
    {
        $sorterConfigurator = new SorterConfigurator($options);
        $sorterConfigurator->configureSorting();

        $sorterConfigurator->getSorter()->sort();
    }

}