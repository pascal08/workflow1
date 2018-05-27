<?php

namespace Tests;

use Pascal\Workflow\GreaterThanOrEqualComparison;
use PHPUnit\Framework\TestCase;

class GreaterThanOrEqualComparisonTest extends TestCase
{

    /**
     * @test
     * @dataProvider greaterThanOrEqualValues
     */
    public function compareGreaterThanOrEqualValues($value1, $value2)
    {
        $worker = new GreaterThanOrEqualComparison($value1, $value2);
        $this->assertTrue($worker->execute());
    }

    public function greaterThanOrEqualValues()
    {
        return [
            [3, 2],
            [3.76, 2.45],
            ['abc', 'ab'],
            [function() { return 1 + 2; }, function() { return 3; }]
        ];
    }

    /**
     * @test
     * @dataProvider notGreaterThanOrEqualValues
     */
    public function compareNotGreaterThanOrEqualValues($value1, $value2)
    {
        $worker = new GreaterThanOrEqualComparison($value1, $value2);
        $this->assertFalse($worker->execute());
    }

    public function notGreaterThanOrEqualValues()
    {
        return [
            [1, 2],
            [1.76, 3.76],
            ['ab', 'abc'],
            [function() { return 1 + 1; }, function() { return 3; }]
        ];
    }


}