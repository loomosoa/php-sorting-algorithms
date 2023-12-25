<?php
namespace Sorting;

class SortersBenchmark
{
    protected \stdClass $options;

    protected array $sortersList = [
        'bubble',
        'insertion',
        'selection'
    ];

//    список сортировщиков
//    доступ к дефолтным данным из бенчмарка
//    возможность менять разброс чисел

    public function benchmark(): void
    {
        foreach ($this->sortersList as $sorterType) {

        }
    }


}