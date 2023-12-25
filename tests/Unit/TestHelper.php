<?php
namespace Tests\Unit;

use Sorting\BubbleSort;
use Sorting\Helper;
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

    public static function checkSortedArrayItems(array $array): void
    {
        for ($i=0; $i < count($array); $i++) {
            if (isset($array[$i+1])) {
                if ($array[$i] > $array[$i+1]) {
                    throw new \Exception("Array is not ascending sorted. "
                        . "index " .$i.": ".$array[$i] ." > "
                        . "index ". ($i+1).": ". $array[$i+1]);
                }
            }
        }
    }

    public static function makePHPSortedArray(array $array): array
    {
        $arrayForPHPsort = $array;
        sort($arrayForPHPsort);
        return $arrayForPHPsort;
    }

}