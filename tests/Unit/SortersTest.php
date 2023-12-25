<?php
declare(strict_types=1);
namespace Tests\Unit;

use Sorting\BubbleSort;
use Sorting\Sorter;

/**
 * @covers \Sorting\BubbleSort
 */
class SortersTest extends \PHPUnit\Framework\TestCase
{

    protected array $unsortedArray;

    protected array $sorters;

    protected array $phpSortedArray;

    protected function setUp(): void
    {
        $sorterSetup = TestHelper::makeSortingSetup(500);

        $this->unsortedArray = $sorterSetup->unsortedArray;
        $this->sorters = $sorterSetup->sorters;

        $this->phpSortedArray = TestHelper::makePHPSortedArray(
            $this->unsortedArray);
    }

    public function testSort(): void
    {
        foreach ($this->sorters as $sorter) {
            $this->assertSame($this->phpSortedArray,
                $sorter->getSortedArray());
        }
    }

    public function testUnsortedArrayNotSameSortedArray(): void
    {
        foreach ($this->sorters as $sorter) {
            $this->assertNotSame($sorter->getSortedArray(), $this->unsortedArray);
        }
    }

    public function testSortDirectly(): void
    {
        foreach ($this->sorters as $sorter) {
            $array = $sorter->getSortedArray();

            $isArraySorted = true;
            try {
                TestHelper::checkSortedArrayItems($array);
            } catch (\Throwable $e) {
                $isArraySorted = false;
                print($e->getMessage());
            }

            $this->assertTrue($isArraySorted);
        }
    }

}