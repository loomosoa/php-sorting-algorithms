<?php
namespace Sorting;

class QuickSort extends AbstractSorter implements Sorter
{

    public function getSortingArray(): array
    {
        return $this->sortingArray;
    }

//    выбираем элемент, относительно которого будут сортироваться другие элементы
//    посередине
//делим длину массива на два и округляем значение вниз
//получившийся элемент - опорный
//создаем два указателя, лефт и райт, на начало и конец массива
//и в циклах начинаем идти с двух сторон на встречу друг другу
//
//задача левого указателя найти элемент, который больше или равен опорному
//элементу
//
//задача правого указателя, найти элемент, который окажется меньше или равен
//опорному

    //TODO: rename sortingArray
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