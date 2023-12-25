<?php
declare(strict_types=1);

namespace Sorting;

class BubbleSort extends AbstractSorter implements Sorter
{

    /**
     * Move the largest element to the end of the array,
     * one by one
     *
     * @var $arr int[]
     */
    public function sort(): void
    {
        parent::initSorting();

        $array = $this->sortingArray;
        $sortingArrayLength = $this->arraySize;
        $unsortedElementsNumber = $sortingArrayLength;

        while ($unsortedElementsNumber != 0) {

            $maxSortingElementIndex = 0;

            for ($i = 0; $i < $sortingArrayLength - 1; $i++) {
                if ($array[$i] > $array[$i + 1]) {
                    $array = $this->swapElements($array, $i);
                    $maxSortingElementIndex = $i + 1;
                }
            }

            $unsortedElementsNumber = $maxSortingElementIndex;
        }

        $this->sortingArray = $array;
        parent::finishSorting();
    }

    protected function swapElements(array $array, int $i): array
    {
        $largerNumber = $array[$i];
        $array[$i] = $array[$i + 1];
        $array[$i + 1] = $largerNumber;
        return $array;
    }

}
