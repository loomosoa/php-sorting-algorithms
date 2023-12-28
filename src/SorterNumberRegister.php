<?php
declare(strict_types=1);
namespace Sorting;
class SorterNumberRegister
{
    protected static int $sorterNumber = 0;

    public static function incrementSorterNumber(): void
    {
        self::$sorterNumber++;
    }

    public static function getSorterNumber(): int
    {
        return self::$sorterNumber;
    }

}