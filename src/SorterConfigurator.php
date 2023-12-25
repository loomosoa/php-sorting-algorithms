<?php
namespace Sorting;

class SorterConfigurator
{

    protected \stdClass $options;

    protected Sorter $sorter;

    public function getSorter(): Sorter
    {
        return $this->sorter;
    }


    public function sort()
    {


    }

    public function configureSorting(): void
    {
        $this->makeOptions();
        $this->makeSorter($this->options->type);
    }


    protected function makeOptions(): void
    {
        $defaultOptions = $this->makeDefaultOptions();
        $argv = $_SERVER["argv"];
        $cliOptions = Helper::parseCliOptions($argv);
        $this->updateOptions($defaultOptions, $cliOptions);
    }

    protected function makeDefaultOptions(): array
    {
        return [
            'type' => 'bubble',
            'size' => 500,
            'printArray' => false,
            'mode' => 'single'
        ];
    }

    protected function updateOptions(array $defaultOptions, array
    $cliOptions): void
    {
        $options = new \stdClass();
        foreach ($defaultOptions as $optionName => $optionValue) {
            if (isset($cliOptions[$optionName])){
                $options->{$optionName} = $cliOptions[$optionName];
            } else {
                $options->{$optionName} = $optionValue;
            }
        }
        $this->options = $options;
    }

    protected function makeSorter(string $sorterType): void
    {
        switch($sorterType):
            case "bubble":
                $sorter = new BubbleSort();
                break;
            case "selection":
                $sorter = new SelectionSort();
                break;
            case "insertion":
                $sorter = new InsertionSort();
                break;
            default:
                throw new \http\Exception\InvalidArgumentException("Unknown sorter");
        endswitch;

        $this->sorter = $sorter;
        $this->sorter->setSortingArray(Helper::generateArrayForSort($this->options->size));
        $this->sorter->setIsPrintArray($this->options->printArray);
    }

}