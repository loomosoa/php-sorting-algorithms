<?php
namespace Sorting;

class SortersBenchmark
{
    protected Options $options;

    public function __construct()
    {
        $this->options = new Options();
    }

    public function benchmark(): void
    {
        try {
            $sortersTypeList = $this->makeSortersTypeList();

            foreach ($sortersTypeList as $sorterType) {
                SorterNumberRegister::incrementSorterNumber();

                $this->options->setType($sorterType);
                $sortingResolver = new SortingResolver();
                $sortingResolver->configureAndSort($this->options);
            }
        } catch (\Throwable $e) {
            print(Helper::makeErrorMessage($e));
        }
    }

    protected function makeSortersTypeList(): array
    {
        $cliOptions = Helper::parseCliOptions();
        $sortersTypesList = $this->getSortersTypesList();

        if (!empty($cliOptions['sortersList'])) {
            $optionSorters = array_map(
                fn($item) => strtolower($item),
                explode(',', $cliOptions['sortersList']));
            $sortersTypesList = array_intersect($optionSorters,
                $sortersTypesList);
        }
        return $sortersTypesList;
    }

    public static function getSortersTypesList(): array
    {
        $files = scandir(__DIR__);
        $sorters = [];
        foreach ($files as $fileName) {
            preg_match('/[a-zA-Z]+Sort\.php$/', $fileName, $matches);
            if (isset($matches[0])) {
                $sorterType = str_replace("Sort.php","",$matches[0]);
                $sorters[] = strtolower($sorterType);
            }
        }

        return $sorters;
    }


}