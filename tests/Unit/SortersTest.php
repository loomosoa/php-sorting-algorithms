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

    protected static ?\StdClass $sortersSetup;

    protected static ?array $phpSortedArray;

    //TODO: добавить проверку классов сортировщиков вручную

    public static function setUpBeforeClass(): void
    {
        self::$sortersSetup = TestHelper::makeSortingSetup(500);
        self::$phpSortedArray = TestHelper::makePHPSortedArray(
            self::$sortersSetup->unsortedArray);
    }

    protected function setUp(): void
    {
        $this->unsortedArray = self::$sortersSetup->unsortedArray;
        $this->sorters = self::$sortersSetup->sorters;
    }

    public function testSort(): void
    {
        foreach ($this->sorters as $sorter) {
            $this->assertSame(self::$phpSortedArray, $sorter->getSortedArray());
        }
    }

    public function testPhpSortedArrayDifferFromUnsortedArray()
    {
        $this->assertNotSame(self::$phpSortedArray, $this->unsortedArray);
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
                print(PHP_EOL."Sorter: ".$sorter::class.PHP_EOL);
                print($e->getMessage());
            }

            $this->assertTrue($isArraySorted);
        }
    }

    public static function tearDownAfterClass(): void
    {
        self::$sortersSetup = null;
        self::$phpSortedArray = null;
    }

}