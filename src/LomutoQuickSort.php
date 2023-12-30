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
                $array = $this->swapArrayItems($array, $i, $j);
            }
        }

        $this->sortingArray = $this->swapArrayItems($array, $i + 1, $high);
        return $i + 1;
    }

    protected function swapArrayItems(array $array, int $param1, int $param2):
    array
    {
        $temp = $array[$param1];
        $array[$param1] = $array[$param2];
        $array[$param2] = $temp;
        return $array;
    }

    protected function lomutoQuickSort(array $array, int $low, int $high)
    {
        print(PHP_EOL."Recursion depth: ".\Ev::depth().PHP_EOL);

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