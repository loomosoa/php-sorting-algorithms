<?php
namespace Sorting;

abstract class AbstractSorter
{
    protected int $arraySize;

    protected array $sortingArray;

    protected bool $isPrintArray = false;

    public function setSortingArray(array $sortingArray): void
    {
        $this->sortingArray = $sortingArray;
    }

    public function printSortingTimeMessage($startingTime, $endingTime): void
    {
        print("Array size: ".$this->arraySize."\n");
        print("Sorter type: ".static::class."\n");
        print("Sorting time: ".($endingTime - $startingTime) . "\n");
        if ($this->isPrintArray) {
            print_r($this->sortingArray);
        }
    }

    public function isPrintArray(): bool
    {
        return $this->isPrintArray;
    }

    public function setIsPrintArray(bool $isPrintArray): void
    {
        $this->isPrintArray = $isPrintArray;
    }


}