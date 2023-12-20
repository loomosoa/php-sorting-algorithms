<?php
declare(strict_types=1);


class SelectionSort {


    /**
     * Move the smallest element to the beginning of the array
     * 
    * @var $arr int[]
    */
    public function sort(array $arr): array
    {

        $arrLength = count($arr);

        for ($i = 0; $i < $arrLength-1; $i++) {
            $smallestNumberPosition = $i;            
                            
            for ($j = $i+1; $j < $arrLength; $j++) {

                if ($arr[$smallestNumberPosition] > $arr[$j]) {
                    $smallestNumberPosition = $j;
                }
            }

            if ($smallestNumberPosition != $i) {
                $smallestNumber = $arr[$smallestNumberPosition];
                $arr[$smallestNumberPosition] = $arr[$i];
                $arr[$i] = $smallestNumber;            
            }

        }
        

        return $arr;
    }
   

}

$selectionSort = new SelectionSort();

$array = [3,7,4,1,5,8,26,14,18,11,19,9,6];

$newArray = $selectionSort->sort($array);


print_r($newArray);
