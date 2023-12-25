<?php
declare(strict_types=1);
namespace Sorting;

class SortersFactory
{

    public static function makeSorter(string $sorterType): Sorter
    {
        switch($sorterType):
            case "bubble":
                $sorter = new BubbleSort();
                break;
            case "selection":
                $sorter = new SelectionSort();
                break;
            case "insertion":
                $sorter = new InsertionSort();
                break;
            case "quick":
                $sorter = new QuickSort();
                break;
            case "phpstandard":
                $sorter = new PhpStandardSort();
                break;
            default:
                throw new \http\Exception\InvalidArgumentException("Unknown sorter");
        endswitch;
        return $sorter;
    }
}