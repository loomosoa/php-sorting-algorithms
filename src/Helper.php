<?php
declare(strict_types=1);
namespace Sorting;

class Helper
{

    public static function generateArrayForSort(int $elementsNumber = 1000):
    array
    {
        $array = [];
        for ($i = 0; $i < $elementsNumber; $i++) {
            $array[] = mt_rand(1, 10000);
        }

        return $array;
    }

    public static function parseCliOptions(): array
    {
        $argv = $_SERVER["argv"];

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

    public static function getSortersClasses()
    {
        $files = scandir(__DIR__);
        $sorters = [];
        foreach ($files as $fileName) {
            preg_match('/[a-zA-Z]*Sort\.php$/', $fileName, $matches);
            if (isset($matches[0])) {
                preg_match('/[a-zA-Z]*[^\.php]/', $matches[0],
                    $anotherMatches);
                $sorters[] = $anotherMatches[0];
            }
        }
        return $sorters;
    }

    public static function makeErrorMessage(\Throwable $e): string
    {
        return PHP_EOL."Exception: ".
            $e->getMessage()."|".$e->getFile()."|".$e->getLine().PHP_EOL;
    }
}