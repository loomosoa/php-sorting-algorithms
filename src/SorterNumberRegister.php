<?php
namespace Sorting;
class SorterNumberRegister
{
    protected static int $sorterNumber = 1;

    public static function getSorterNumber(): int
    {
        return self::$sorterNumber;
    }

    public static function setSorterNumber(int $sorterNumber): void
    {
        self::$sorterNumber = $sorterNumber;
    }


}