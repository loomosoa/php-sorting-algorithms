<?php
namespace Tests\Unit;

use Sorting\BubbleSort;
use Sorting\Helper;
use Sorting\InsertionSort;
use Sorting\LomutoQuickAltSort;
use Sorting\QuickLomutoSort;
use Sorting\PhpStandardSort;
use Sorting\QuickSort;
use Sorting\SelectionSort;
use Sorting\Sorter;
use Sorting\SorterConfigurator;
use Sorting\SortersBenchmark;
use Sorting\SortersFactory;

class TestHelper
{

    public static function makeSortingSetup(int $arraySize):
    \StdClass
    {
            $result = new \StdClass();

            $unsortedArray = Helper::generateArrayForSort($arraySize);
            $sortersList = SortersBenchmark::getSortersTypesList();

            $sorters = [];
            foreach ($sortersList as $sorterType) {
                $sorter = SortersFactory::makeSorter($sorterType);
                $sorter->setSortingArray($unsortedArray);
                $sorter->setIsPrintSortingInformation(false);
                $sorter->sort();
                $sorters[] = $sorter;
            }

            $result->sorters = $sorters;
            $result->unsortedArray = $unsortedArray;

            return $result;
    }

    public static function getSortersClassesList(): array
    {
        return [
            BubbleSort::class,
            SelectionSort::class,
            InsertionSort::class,
            QuickSort::class,
            QuickLomutoSort::class,
            PhpStandardSort::class
        ];
    }

    public static function checkSortedArrayItems(array $array): void
    {
        for ($i=0; $i < count($array); $i++) {
            if (isset($array[$i+1])) {
                if ($array[$i] > $array[$i+1]) {
                    throw new \Exception(PHP_EOL."Array is not ascending sorted. "
                        . "index " .$i.": ".$array[$i] ." > "
                        . "index ". ($i+1).": ". $array[$i+1].PHP_EOL);
                }
            }
        }
    }

    public static function makePHPSortedArray(array $array): array
    {
        sort($array);
        return $array;
    }

}