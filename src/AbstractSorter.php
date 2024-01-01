<?php
declare(strict_types=1);
namespace Sorting;

abstract class AbstractSorter
{
    protected int $arraySize;

    protected array $sortingArray;

    protected bool $isPrintArray = false;

    protected float $startingTime;

    protected int $sorterNumber = 1;

    protected bool $isPrintSortingInformation = true;

    public function isPrintSortingInformation(): bool
    {
        return $this->isPrintSortingInformation;
    }

    public function setIsPrintSortingInformation(bool $isPrintSortingInformation): void
    {
        $this->isPrintSortingInformation = $isPrintSortingInformation;
    }

    public function getSorterNumber(): int
    {
        return $this->sorterNumber;
    }

    public function setSorterNumber(int $sorterNumber): void
    {
        $this->sorterNumber = $sorterNumber;
    }

    public function setSortingArray(array $sortingArray): void
    {
        $this->sortingArray = $sortingArray;
    }

    public function getSortedArray(): array
    {
        return $this->sortingArray;
    }

    protected function countArraySize(): void
    {
        $this->arraySize = count($this->sortingArray);
    }

    protected function printSorterInfoMessage()
    {

        if ($this->isPrintSortingInformation) {
            print("\n");
            print("Sorter №: ".static::getSorterNumber()."\n");
            $sorterReflection = new \ReflectionClass(static::class);
            $shortName = $sorterReflection->getShortName();
            print("Array size: ".$this->arraySize."\n");
            print("Sorter type: "."\e[34m".$shortName."\e[0m \n");
        }
    }

    public function printSortingTimeMessage(float $startingTime,
                                            float $endingTime): void
    {
        if ($this->isPrintSortingInformation) {
            print("Sorting time, seconds: "
                ."\e[32m". (round(($endingTime - $startingTime), 3). "\e[0m").
            "\n");
            if ($this->isPrintArray) {
                print_r($this->sortingArray);
            }
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

    protected function initSorting(): void
    {
        static::countArraySize();
        static::printSorterInfoMessage();
        $this->startingTime = microtime(true);
    }

    protected function finishSorting(): void
    {
        $endingTime = microtime(true);
        static::printSortingTimeMessage($this->startingTime, $endingTime);
    }
}