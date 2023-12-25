<?php
namespace Sorting;
class Options
{

    protected string $type = 'bubble';

    protected int $size = 1500;

    protected bool $printArray = false;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    public function isPrintArray(): bool
    {
        return $this->printArray;
    }

    public function setPrintArray(bool $printArray): void
    {
        $this->printArray = $printArray;
    }


}