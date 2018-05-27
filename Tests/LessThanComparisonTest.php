<?php

namespace Tests;

use Pascal\Workflow\LessThanComparison;
use PHPUnit\Framework\TestCase;

class LessThanComparisonTest extends TestCase
{


    /**
     * @test
     * @dataProvider lessThanValues
     */
    public function compareLessThanValues($value1, $value2)
    {
        $worker = new LessThanComparison($value1, $value2);
        $this->assertTrue($worker->execute());
    }

    public function lessThanValues()
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
     * @dataProvider notLessThanValues
     */
    public function compareNotLessThanValues($value1, $value2)
    {
        $worker = new LessThanComparison($value1, $value2);
        $this->assertFalse($worker->execute());
    }

    public function notLessThanValues()
    {
        return [
            [3, 2],
            [3.76, 2.45],
            ['abc', 'ab'],
            [function() { return 1 + 1; }, function() { return 2; }]
        ];
    }


}