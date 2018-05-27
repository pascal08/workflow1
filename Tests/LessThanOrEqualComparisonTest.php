<?php

namespace Tests;

use Pascal\Workflow\LessThanOrEqualComparison;
use PHPUnit\Framework\TestCase;

class LessThanOrEqualComparisonTest extends TestCase
{


    /**
     * @test
     * @dataProvider lessThanOrEqualValues
     */
    public function compareLessThanOrEqualValues($value1, $value2)
    {
        $worker = new LessThanOrEqualComparison($value1, $value2);
        $this->assertTrue($worker->execute());
    }

    public function lessThanOrEqualValues()
    {
        return [
            [1, 2],
            [1.76, 3.76],
            ['ab', 'abc'],
            [function() { return 1 + 1; }, function() { return 3; }]
        ];
    }

    /**
     * @test
     * @dataProvider notLessThanOrEqualValues
     */
    public function compareNotLessThanOrEqualValues($value1, $value2)
    {
        $worker = new LessThanOrEqualComparison($value1, $value2);
        $this->assertFalse($worker->execute());
    }

    public function notLessThanOrEqualValues()
    {
        return [
            [3, 2],
            [3.76, 2.45],
            ['abc', 'ab'],
            [function() { return 1 + 2; }, function() { return 2; }]
        ];
    }


}