<?php
declare(strict_types=1);
namespace Sorting;

class QuickLomutoSort extends AbstractSorter implements Sorter
{
    public function partOfQuickLomutoSort($array, int $low, int $high): int
    {
        $pivot = $array[$high];
        for ($current = $low; $current < $high; $current++){
            if($array[$current] < $pivot){
                $temp = $array[$low];
                $array[$low] = $array[$current];
                $array[$current] = $temp;
                $low++;
            }
        }

        $temp = $array[$low];
        $array[$low] = $array[$high];
        $array[$high] = $temp;

        $this->sortingArray = $array;
        return $low;
    }

    protected function quickLomutoSort(array $array, int $low, int $high)
    {
        if($low < $high){
            $rightStart = $this->partOfQuickLomutoSort($array, $low, $high);
            $this->quickLomutoSort($this->sortingArray, $low, $rightStart - 1);
            $this->quickLomutoSort($this->sortingArray, $rightStart + 1, $high);
        }
    }

    public function sort(): void
    {
        parent::initSorting();

        $end = $this->arraySize-1;
        $this->quickLomutoSort($this->sortingArray, 0, $end);

        parent::finishSorting();
    }
}