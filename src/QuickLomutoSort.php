<?php
declare(strict_types=1);
namespace Sorting;

class QuickLomutoSort extends AbstractSorter implements Sorter
{

    public function sort(): void
    {
        parent::initSorting();



        parent::finishSorting();
    }
}