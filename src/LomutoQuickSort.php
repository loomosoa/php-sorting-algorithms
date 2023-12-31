<?php
declare(strict_types=1);
namespace Sorting;

class LomutoQuickSort extends AbstractSorter implements Sorter
{
    public function partOfLomutoQuickSort($array, int $low, int $high): int
    {
        $pivot = $array[$high];
        $i = $low - 1;
        for ($j = $low; $j < $high; $j++){
            if($array[$j] < $pivot){
                $i++;
                $temp = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $temp;
            }
        }

        $temp = $array[$i+1];
        $array[$i+1] = $array[$high];
        $array[$j] = $temp;

        $this->sortingArray = $array;
        return $i + 1;
    }

    protected function lomutoQuickSort(array $array, int $low, int $high)
    {
        if($low < $high){
            $index = $this->partOfLomutoQuickSort($array, $low, $high);
            $this->lomutoQuickSort($this->sortingArray, $low, $index - 1);
            $this->lomutoQuickSort($this->sortingArray, $index + 1, $high);
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