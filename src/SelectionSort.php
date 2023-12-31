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
        parent::initSorting();

        $array = $this->sortingArray;
        $sortingArrayLength = $this->arraySize;

        for ($i = 0; $i < $sortingArrayLength; $i++) {
            $smallerNumberIndex = $i;

            for ($j = $i + 1; $j < $sortingArrayLength; $j++) {

                if ($array[$smallerNumberIndex] > $array[$j]) {
                    $smallerNumberIndex = $j;
                }
            }

            if ($smallerNumberIndex != $i) {
                $smallerNumber = $array[$smallerNumberIndex];
                $array[$smallerNumberIndex] = $array[$i];
                $array[$i] = $smallerNumber;
            }
        }

        $this->sortingArray = $array;
        parent::finishSorting();
    }

}
