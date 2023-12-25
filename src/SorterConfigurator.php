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

    public function configureSorting(): void
    {
        $this->makeOptions();
        $this->makeSorter($this->options->type);
    }


    protected function makeOptions(): void
    {
        $defaultOptions = $this->makeDefaultOptions(new Options());
        $argv = $_SERVER["argv"];
        $cliOptions = Helper::parseCliOptions($argv);
        $this->updateOptions($defaultOptions, $cliOptions);
    }

    protected function makeDefaultOptions(Options $options): array
    {
        $options = [
            'type' => $options->getType(),
            'size' => $options->getSize(),
            'printArray' => $options->isPrintArray()
        ];
        return $options;
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
                $this->sorter = new BubbleSort();
                break;
            case "selection":
                $this->sorter = new SelectionSort();
                break;
            case "insertion":
                $this->sorter = new InsertionSort();
                break;
            default:
                throw new \http\Exception\InvalidArgumentException("Unknown sorter");
        endswitch;

        $this->sorter->setSortingArray(Helper::generateArrayForSort($this->options->size));
        $this->sorter->setIsPrintArray($this->options->printArray);
    }

}