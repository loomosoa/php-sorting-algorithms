<?php
namespace Sorting;

class SorterConfigurator
{

    protected Options $options;

    protected Sorter $sorter;


    public function __construct(Options $options = null)
    {
        if (!$options) {
            $this->options = new Options();
        } else {
            $this->options = $options;
        }
    }

    public function getSorter(): Sorter
    {
        return $this->sorter;
    }

    public function configureSorting(): void
    {
        $this->updateOptions();
        $this->makeSorter($this->options->getType());
        $this->sorter->setSorterNumber(SorterNumberRegister::getSorterNumber());

        $generatedSortingArray = Helper::generateArrayForSort(
            $this->options->getSize());
        $this->sorter->setSortingArray($generatedSortingArray);
        $this->sorter->setIsPrintArray($this->options->isPrintArray());
    }

    protected function updateOptions (): void
    {
        $cliOptions = Helper::parseCliOptions();
        $defaultOptionsClassProperties =
            $this->makeDefaultOptionClassProperties();

        foreach ($defaultOptionsClassProperties as $optionName) {
            if (isset($cliOptions[$optionName])){
                $propertyName = "set".ucfirst($optionName);
                $this->options->{$propertyName}($cliOptions[$optionName]);
            }
        }
    }

    protected function makeDefaultOptionClassProperties(): array
    {
        $optionsReflection = new \ReflectionClass($this->options);
        $properties = $optionsReflection->getProperties();
        $optionsClassProperties = [];
        /**
         * @var \ReflectionProperty $property
         */
        foreach ($properties as $property) {
            $optionsClassProperties[] = $property->getName();
        }
        return $optionsClassProperties;
    }

    protected function makeSorter(string $sorterType): void
    {
        $this->sorter = SortersFactory::makeSorter($sorterType);
    }

}