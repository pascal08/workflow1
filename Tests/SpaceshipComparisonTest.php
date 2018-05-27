<?php

namespace Tests;

use Pascal\Workflow\SpaceshipComparison;
use PHPUnit\Framework\TestCase;

class SpaceshipComparisonTest extends TestCase
{


    /**
     * @test
     * @dataProvider equalValues
     */
    public function compareEqualValues($value1, $value2)
    {
        $worker = new SpaceshipComparison($value1, $value2);
        $this->assertEquals(0, $worker->execute());
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
     * @dataProvider lessThanValues
     */
    public function compareLessThanValues($value1, $value2)
    {
        $worker = new SpaceshipComparison($value1, $value2);
        $this->assertEquals(-1, $worker->execute());
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
     * @dataProvider greaterThanValues
     */
    public function compareGreaterThanValues($value1, $value2)
    {
        $worker = new SpaceshipComparison($value1, $value2);
        $this->assertEquals(1, $worker->execute());
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


}