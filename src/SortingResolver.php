<?php
namespace Sorting;

class SortingResolver
{

    public function sort(): void
    {
        $this->configureAndSort();
    }

    public function configureAndSort(Options $options = null): void
    {
        $sorterConfigurator = new SorterConfigurator($options);
        $sorterConfigurator->configureSorting();

        $sorterConfigurator->getSorter()->sort();
    }

}