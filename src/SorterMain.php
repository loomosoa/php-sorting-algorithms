<?php
namespace Sorting;

class SorterMain implements Sorter
{

    public function sort(): void
    {
        $this->configureAndSort();
    }

    public function configureAndSort()
    {
        $sorterConfigurator = new SorterConfigurator();
        $sorterConfigurator->configureSorting();

        $sorterConfigurator->getSorter()->sort();
    }
}