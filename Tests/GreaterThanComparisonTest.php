<?php

namespace Tests;

use Pascal\Workflow\GreaterThanComparison;
use PHPUnit\Framework\TestCase;

class GreaterThanComparisonTest extends TestCase
{

    /**
     * @test
     * @dataProvider greaterThanValues
     */
    public function compareGreaterThanValues($value1, $value2)
    {
        $worker = new GreaterThanComparison($value1, $value2);
        $this->assertTrue($worker->execute());
    }

    public function greaterThanValues()
    {
        return [
            [3, 2],
            [3.76, 2.45],
            ['abc', 'ab'],
            [function() { return 1 + 2; }, function() { return 2; }]
        ];
    }

    /**
     * @test
     * @dataProvider notGreaterThanValues
     */
    public function compareNotGreaterThanValues($value1, $value2)
    {
        $worker = new GreaterThanComparison($value1, $value2);
        $this->assertFalse($worker->execute());
    }

    public function notGreaterThanValues()
    {
        return [
            [1, 2],
            [1.76, 3.76],
            ['ab', 'abc'],
            [function() { return 1 + 1; }, function() { return 3; }]
        ];
    }


}