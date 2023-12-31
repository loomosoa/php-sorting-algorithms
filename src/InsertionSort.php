<?php
declare(strict_types=1);

namespace Sorting;

class InsertionSort extends AbstractSorter implements Sorter
{

    public function sort(): void
    {
        parent::initSorting();

        $array = $this->sortingArray;
        $sortingArrayLength = $this->arraySize;

        for ($i = 1; $i < $sortingArrayLength; $i++) {
            $sortedElementIndex = $i - 1;

            while (
                ($sortedElementIndex > -1)
                &&
                ($array[$sortedElementIndex] > $array[$sortedElementIndex + 1])) {

                $temp = $array[$sortedElementIndex];
                $array[$sortedElementIndex] = $array[$sortedElementIndex + 1];
                $array[$sortedElementIndex + 1] = $temp;

                $sortedElementIndex--;
            }
        }

        $this->sortingArray = $array;
        parent::finishSorting();
    }

}
