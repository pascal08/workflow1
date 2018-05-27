<?php

namespace Tests;

use Pascal\Workflow\NotEqualComparison;
use PHPUnit\Framework\TestCase;

class NotEqualComparisonTest extends TestCase
{


    /**
     * @test
     * @dataProvider equalValues
     */
    public function compareEqualValues($value1, $value2)
    {
        $worker = new NotEqualComparison($value1, $value2);
        $this->assertFalse($worker->execute());
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
        $worker = new NotEqualComparison($value1, $value2);
        $this->assertTrue($worker->execute());
    }

    public function unequalValues()
    {
        return [
            ['a', 'zz'],
            [2.45, 3.76],
            [function() { return false; }, function() { return 'test'; }]
        ];
    }


}