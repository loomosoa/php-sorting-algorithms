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
        $sortingArrayLength = count($array);

        while ($sortingArrayLength != 0) {

            $maxSortingElementIndex = 0;

            for ($i = 1; $i < $sortingArrayLength; $i++) {
                if ($array[$i-1] > $array[$i]) {
                    $this->swapElements($array, $i);
                    $maxSortingElementIndex = $i;
                }
            }

            $sortingArrayLength = $maxSortingElementIndex;
        }

        return $array;
    }

    protected function swapElements(array $array, int $i): array
    {
        $largerNumber = $array[$i-1];
        $array[$i-1] = $array[$i];
        $array[$i] = $largerNumber;
        return $array;
    }
   

}

$bubbleSort = new BubbleSort();

$array = [3,7,4,1,5,8,26,14];

$newArray = $bubbleSort->sort($array);


print_r($newArray);



?>