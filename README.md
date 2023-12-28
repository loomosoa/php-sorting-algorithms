# Sorting algorithms comparison

Реализация и сравнение быстродействия алгоритмов сортировки.

Создается рандомный массив целых чисел и сортируется в порядке возрастания.

В результате видно время, затраченное на сортировку

`php sorters_benchmark.php --size=500`

`php sorters_benchmark.php --size=1500 --sortersList=bubble,selection,insertion`

`php sorters_benchmark.php --size=1500 --sortersList=bubble,selection,insertion,quick,phpStandard`


## Output

>Sorter №: 1
>Array size: 2000
>Sorter type: BubbleSort
>Sorting time, seconds: 15.07560801506

Sorter №: 2
Array size: 2000
Sorter type: InsertionSort
Sorting time, seconds: 13.360831022263

Sorter №: 3
Array size: 2000
Sorter type: PhpStandardSort
Sorting time, seconds: 0.36351990699768

Sorter №: 4
Array size: 2000
Sorter type: QuickSort
Sorting time, seconds: 0.4583740234375

Sorter №: 5
Array size: 2000
Sorter type: SelectionSort
Sorting time, seconds: 1.0960779190063
`