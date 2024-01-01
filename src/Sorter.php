<?php
declare(strict_types=1);
namespace Sorting;

interface Sorter
{
    public function sort(): void;

    public function getSortedArray(): array;
}