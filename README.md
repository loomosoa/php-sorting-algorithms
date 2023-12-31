# Sorting algorithms comparison

Реализация и сравнение быстродействия алгоритмов сортировки.

Создается рандомный массив целых чисел и сортируется в порядке возрастания 
(ascending).

В результате видно время, затраченное на сортировку.

## Options

- size {int}: Размер массива 
- sortersList {string,}: Используемые сортировщики
- printArray {bool, default false}: Вывод отсортированного массива в шел

## Convention

Соглашение об именовании сортировщиков.

(sorter name)Sort.php


```php
php sorters_benchmark.php --size=200 
```

## Output

>Sorter №: 1\
>Array size: 200\
>Sorter type: **BubbleSort**\
>Sorting time, seconds: **0.863**

>Sorter №: 2\
>Array size: 200\
>Sorter type: **InsertionSort**\
>Sorting time, seconds: **0.881**

>Sorter №: 3\
>Array size: 200\
>Sorter type: **PhpStandardSort**\
>Sorting time, seconds: **0.884**

>Sorter №: 4\
>Array size: 200\
>Sorter type: **QuickLomutoSort**\
>Sorting time, seconds: **0.889**

>Sorter №: 5\
>Array size: 200\
>Sorter type: **QuickSort**\
>Sorting time, seconds: **0.898**

>Sorter №: 6\
>Array size: 200\
>Sorter type: **SelectionSort**\
>Sorting time, seconds: **0.906**

```php
php sorters_benchmark.php --size=20000 
```

## Output

>Sorter №: 1\
>Array size: 20000\
>Sorter type: **BubbleSort**\
>Sorting time, seconds: **167.488**

>Sorter №: 2\
>Array size: 20000\
>Sorter type: **InsertionSort**\
>Sorting time, seconds: **71.451**

>Sorter №: 3\
>Array size: 20000\
>Sorter type: **PhpStandardSort**\
>Sorting time, seconds: **0.476**

>Sorter №: 4\
>Array size: 20000\
>Sorter type: **QuickLomutoSort**\
>Sorting time, seconds: **12.138**

>Sorter №: 5\
>Array size: 20000\
>Sorter type: **QuickSort**\
>Sorting time, seconds: **21.364**

>Sorter №: 6\
>Array size: 20000\
>Sorter type: **SelectionSort**\
>Sorting time, seconds: **48.32**
