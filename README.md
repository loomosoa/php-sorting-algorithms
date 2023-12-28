# Sorting algorithms comparison

Реализация и сравнение быстродействия алгоритмов сортировки.

Создается рандомный массив целых чисел и сортируется в порядке возрастания 
(ascending).

В результате видно время, затраченное на сортировку.

```php
php sorters_benchmark.php --size=500
```

```php
php sorters_benchmark.php --size=2000 --sortersList=bubble,selection,insertion
```

```php
php sorters_benchmark.php --size=2000 --sortersList=bubble,selection,
insertion,quick,phpStandard
```

## Options

- size {int}: Размер массива 
- sortersList {string,}: Используемые сортировщики
- printArray {bool, default false}: Вывод отсортированного массива в шел

## Output

>Sorter №: 1\
>Array size: 2000\
>Sorter type: **BubbleSort**\
>Sorting time, seconds: **15.627**

>Sorter №: 2\
>Array size: 2000\
>Sorter type: **InsertionSort**\
>Sorting time, seconds: **14.12**

>Sorter №: 3\
>Array size: 2000\
>Sorter type: **PhpStandardSort**\
>Sorting time, seconds: **0.123**

>Sorter №: 4\
>Array size: 2000\
>Sorter type: **QuickSort**\
>Sorting time, seconds: **0.218**

>Sorter №: 5\
>Array size: 2000\
>Sorter type: **SelectionSort**\
>Sorting time, seconds: **0.748**
