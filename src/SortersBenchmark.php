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
        $sortersTypeList = $this->makeSortersTypeList();

        foreach ($sortersTypeList as $k => $sorterType) {
            SorterNumberRegister::setSorterNumber($k+1);

            $this->options->setType($sorterType);
            $sortingResolver = new SortingResolver();
            $sortingResolver->configureAndSort($this->options);
        }
    }

    protected function makeSortersTypeList(): array
    {
        $cliOptions = Helper::parseCliOptions();
        $sortersTypesList = $this->getSortersTypesList();

        if (!empty($cliOptions['sortersList'])) {
            $optionSorters = explode(',',$cliOptions['sortersList']);
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
            preg_match('/[a-zA-Z]*Sort\.php$/', $fileName, $matches);
            if (isset($matches[0])) {
                preg_match('/[a-zA-Z]*[^Sort\.php]/', $matches[0],
                    $anotherMatches);
                $sorters[] = strtolower($anotherMatches[0]);
            }
        }

        return $sorters;
    }


}