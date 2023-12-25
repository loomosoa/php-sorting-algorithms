<?php
namespace Sorting;

interface Sorter
{
    public function sort(): void;

    public function getSortedArray(): array;
}