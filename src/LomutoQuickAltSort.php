<?php
declare(strict_types=1);
namespace Sorting;

class LomutoQuickAltSort extends AbstractSorter implements Sorter
{

    protected function partOfLomutoQuickSort(array $array, int $start, int
    $end): int
    {
        $left = $start;
        for ($current = $start; $current < $end; $current++) {
            if ($array[$current] <= $array[$end]) {
                $temp = $array[$left];
                $array[$left] = $array[$current];
                $array[$current] = $temp;
                $left++;
            }
        }

        $temp = $array[$left];
        $array[$left] = $array[$end];
        $array[$end] = $temp;
        $this->sortingArray = $array;
        return $left;
    }


    protected function quickSortLomuto(array $array, int $start, int $end): void
    {
        if ($start >= $end) {
            return;
        }
        $rightStart = $this->partOfLomutoQuickSort($array, $start, $end);
        $this->quickSortLomuto($this->sortingArray, $start, $rightStart-1);
        $this->quickSortLomuto($this->sortingArray, $rightStart+1, $end);
    }


    public function sort(): void
    {
        parent::initSorting();

        $end = $this->arraySize-1;
        $this->quickSortLomuto($this->sortingArray, 0, $end);

        parent::finishSorting();
    }
}