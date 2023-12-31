<?php
declare(strict_types=1);
namespace Sorting;

class LomutoQuickSort extends AbstractSorter implements Sorter
{
    public function partOfLomutoQuickSort($array, int $low, int $high): int
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

    protected function lomutoQuickSort(array $array, int $low, int $high)
    {
        if($low < $high){
            $rightStart = $this->partOfLomutoQuickSort($array, $low, $high);
            $this->lomutoQuickSort($this->sortingArray, $low, $rightStart - 1);
            $this->lomutoQuickSort($this->sortingArray, $rightStart + 1, $high);
        }
    }

    public function sort(): void
    {
        parent::initSorting();

        $end = $this->arraySize-1;
        $this->lomutoQuickSort($this->sortingArray, 0, $end);

        parent::finishSorting();
    }
}