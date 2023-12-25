<?php
declare(strict_types=1);

namespace Sorting;
class InsertionSort extends AbstractSorter implements Sorter
{

    public function sort(): void
    {
        $startingTime = microtime(true);

        $array = $this->sortingArray;
        $sortingArrayLength = count($array);
        $this->arraySize = $sortingArrayLength;

        for ($i = 1; $i < $sortingArrayLength; $i++) {
            $sortedElementIndex = $i - 1;

            while (
                ($sortedElementIndex > -1)
                &&
                ($array[$sortedElementIndex] > $array[$sortedElementIndex + 1])) {
                $array = $this->swapElements($array, $sortedElementIndex);
                $sortedElementIndex--;
            }
        }

        $endingTime = microtime(true);
        $this->sortingArray = $array;
        static::printSortingTimeMessage($startingTime, $endingTime);
    }

    protected function swapElements(array $array, int $sortedElementIndex):
    array
    {
        $temp = $array[$sortedElementIndex];
        $array[$sortedElementIndex] = $array[$sortedElementIndex + 1];
        $array[$sortedElementIndex + 1] = $temp;
        return $array;
    }

}
