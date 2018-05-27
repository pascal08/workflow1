<?php

namespace Tests;

use Pascal\Workflow\EqualComparison;
use PHPUnit\Framework\TestCase;

class EqualComparisonTest extends TestCase
{


    /**
     * @test
     * @dataProvider equalValues
     */
    public function compareEqualValues($value1, $value2)
    {
        $worker = new EqualComparison($value1, $value2);
        $this->assertTrue($worker->execute());
    }

    public function equalValues()
    {
        return [
                [0, 'a'],
                ['1', '01'],
                [0, false],
                [1, true],
                [function() { return 100; }, function() { return '1e2'; }]
        ];
    }

    /**
     * @test
     * @dataProvider unequalValues
     */
    public function compareUnequalValues($value1, $value2)
    {
        $worker = new EqualComparison($value1, $value2);
        $this->assertFalse($worker->execute());
    }

    public function unequalValues()
    {
        return [
                [1, 2],
                [2.45, 3.76],
                ['abc', 'abd'],
                [function() { return 1 + 1; }, function() { return 3; }]
        ];
    }


}