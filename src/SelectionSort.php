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
                $array = $this->swapElements($array, $i, $smallerNumberIndex);
            }
        }

        $this->sortingArray = $array;
        parent::finishSorting();
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
