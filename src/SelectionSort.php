<?php
declare(strict_types=1);

namespace Sorting;
class SelectionSort extends AbstractSorter implements Sorter
{

    /**
     * @param int[]
     * @return int[]
     */
    public function sort(): void
    {
        $startingTime = microtime(true);

        $array = $this->sortingArray;
        $sortingArrayLength = count($array);
        $this->arraySize = $sortingArrayLength;

        for ($i = 0; $i < $sortingArrayLength; $i++) {
            $smallerNumberIndex = $i;

            for ($j = $i + 1; $j < $sortingArrayLength; $j++) {

                if ($array[$smallerNumberIndex] > $array[$j]) {
                    $smallerNumberIndex = $j;
                }
            }

            if ($smallerNumberIndex != $i) {
                $array = $this->swapElements($array, $i, $smallerNumberIndex);
            }
        }

        $endingTime = microtime(true);
        $this->sortingArray = $array;
        static::printSortingTimeMessage($startingTime, $endingTime);
    }

    /**
     * @param $array
     * @param $i
     * @param $smallerNumberIndex
     * @return array
     */
    protected function swapElements($array, $i, $smallerNumberIndex): array
    {
        $smallerNumber = $array[$smallerNumberIndex];
        $array[$smallerNumberIndex] = $array[$i];
        $array[$i] = $smallerNumber;

        return $array;
    }

}
