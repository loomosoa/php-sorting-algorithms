<?php
declare(strict_types=1);

class InsertionSort
{

    /*
     * допустим первый элемент уже отсортирован,
     * и начинаем перебирать массив со второго
     *
     * */


    public function sort(array $array): array
    {
        $timeStart = microtime(true);

        $sortingArrayLength = count($array);

        for($i = 1; $i < $sortingArrayLength; $i++) {
            $sortedElementIndex = $i - 1;

            while (
                ($sortedElementIndex > -1)
                &&
                ($array[$sortedElementIndex] > $array[$sortedElementIndex + 1])) {

                $temp = $array[$sortedElementIndex];
                $array[$sortedElementIndex] = $array[$sortedElementIndex + 1];
                $array[$sortedElementIndex + 1] = $temp;
                $sortedElementIndex--;
            }
        }

        $timeEnd = microtime(true);
        print_r($timeEnd - $timeStart/60 . "\n");

        return $array;
    }

}

$array = [3,7,4,1,5,8,26,14];
print_r( (new InsertionSort())->sort($array) );


