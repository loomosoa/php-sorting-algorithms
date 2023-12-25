<?php
namespace Sorting;

class Helper
{

    public static function generateArrayForSort(int $elementsNumber = 1000):
    array
    {
        $timeGeneratingStart = microtime(true);
        $array = [];
        for ($i = 0; $i < $elementsNumber; $i++) {
            $array[] = mt_rand(1, 10000);
        }
        $timeGeneratingEnd = microtime(true);
        print("Array generating time: " . $timeGeneratingEnd -
            $timeGeneratingStart."\n");
        return $array;
    }

    public static function parseCliOptions(array $argv): array
    {
        $myArgs = [];
        for ($i = 1; $i < count($argv); $i++) {
            if (preg_match('/^--([^=]+)=(.*)/', $argv[$i], $match)) {
                if(is_string($match[1])) {
                    $match[1] = lcfirst($match[1]);
                }
                $myArgs[$match[1]] = $match[2];
                if(is_numeric($match[2])) {
                    $myArgs[$match[1]] = (int)$match[2];
                }
            }
        }
        return $myArgs;
    }
}