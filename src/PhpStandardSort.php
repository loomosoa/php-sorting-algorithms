<?php
declare(strict_types=1);
namespace Sorting;

class PhpStandardSort extends AbstractSorter implements Sorter
{

    public function sort(): void
    {
        parent::initSorting();

        sort($this->sortingArray);

        parent::finishSorting();
    }
}