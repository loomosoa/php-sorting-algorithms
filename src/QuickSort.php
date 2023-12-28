<?php
namespace Sorting;

class QuickSort extends AbstractSorter implements Sorter
{

    public function getSortingArray(): array
    {
        return $this->sortingArray;
    }

    protected function partOfQuickSort(array $array, int $left, int
    $right)
    {
        $pivot = $array[($left + $right)/2];
        while ($left <= $right) {
            while ($array[$left] < $pivot) {
                $left++;
            }
            while ($array[$right] > $pivot) {
                $right--;
            }

            if ($left <= $right) {
                $temp = $array[$left];
                $array[$left] = $array[$right];
                $array[$right] = $temp;
                $left++;
                $right--;
            }
        }
        $this->sortingArray = $array;
        return $left;
    }

    protected function quickSortHoara(array $array, int $start, int
    $end): void
    {
        if ($start >= $end) {
            return;
        }
        $rightStart = $this->partOfQuickSort($array, $start, $end);
        $this->quickSortHoara($this->sortingArray, $start,
        $rightStart-1);
        $this->quickSortHoara($this->sortingArray, $rightStart, $end);
    }

    public function sort(): void
    {
        parent::initSorting();

        $end = $this->arraySize - 1;
        $this->quickSortHoara($this->sortingArray, 0, $end);

        parent::finishSorting();
    }

}