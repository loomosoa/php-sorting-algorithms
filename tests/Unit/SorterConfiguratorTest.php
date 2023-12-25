<?php
declare(strict_types=1);
namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Sorting\Sorter;
use Sorting\SorterConfigurator;
use Sorting\SorterNumberRegister;

/**
 * @covers \Sorting\SorterConfigurator
 */
class SorterConfiguratorTest extends TestCase
{
    public function testSorterWasMade()
    {
        $sorterConfigurator = new SorterConfigurator();
        SorterNumberRegister::setSorterNumber(1);
        $sorterConfigurator->configureSorting();

        $this->assertInstanceOf(Sorter::class,
            $sorterConfigurator->getSorter());
    }

}