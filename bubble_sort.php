<?php
declare(strict_types=1);

class BubbleSort {

    /**
     * Move the largest element to the end of the array, 
     * one by one 
     * 
    * @var $arr int[]
    */
    public function sort(array $array): array
    {
        $timeStart = microtime(true);

        $sortingArrayLength = count($array);
        $unsortedElementsNumber = $sortingArrayLength;

        while ($unsortedElementsNumber != 0) {

            $maxSortingElementIndex = 0;

            for ($i = 0; $i < $sortingArrayLength-1; $i++) {
                if ($array[$i] > $array[$i+1]) {
                    $array = $this->swapElements($array, $i);
                    $maxSortingElementIndex = $i+1;
                }
            }

            $unsortedElementsNumber = $maxSortingElementIndex;
        }


        $timeEnd = microtime(true);
        print_r($timeEnd - $timeStart/60 . "\n");

        return $array;
    }

    protected function swapElements(array $array, int $i): array
    {
        $largerNumber = $array[$i];
        $array[$i] = $array[$i+1];
        $array[$i+1] = $largerNumber;
        return $array;
    }
   

}

$bubbleSort = new BubbleSort();

$array = [3,7,4,1,5,8,26,14];

$newArray = $bubbleSort->sort($array);

print_r($newArray);
