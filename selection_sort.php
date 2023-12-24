<?php
declare(strict_types=1);

class SelectionSort {

    /**
     * @param int[]
     * @return int[]
     */
    public function sort(array $array): array
    {
        $timeStart = microtime(true);

        $sortingArrayLength = count($array);

        for ($i = 0; $i < $sortingArrayLength; $i++) {
            $smallerNumberIndex = $i;
                            
            for ($j = $i+1; $j < $sortingArrayLength; $j++) {

                if ($array[$smallerNumberIndex] > $array[$j]) {
                    $smallerNumberIndex = $j;
                }
            }

            if ($smallerNumberIndex != $i) {
               $array = $this->swapElements($array, $i, $smallerNumberIndex);
            }
        }

        $timeEnd = microtime(true);
        print_r($timeEnd - $timeStart/60 . "\n");

        return $array;
    }

    /**
     * @param $array
     * @param $i
     * @param $smallerNumberIndex
     * @return array
     */
    protected function swapElements($array, $i, $smallerNumberIndex): array
    {
        $smallerNumber = $array[$smallerNumberIndex];
        $array[$smallerNumberIndex] = $array[$i];
        $array[$i] = $smallerNumber;

        return $array;
    }
   

}

$selectionSort = new SelectionSort();

$array = [14,7,4,26,5,8,21,1];

$newArray = $selectionSort->sort($array);

print_r($newArray);
