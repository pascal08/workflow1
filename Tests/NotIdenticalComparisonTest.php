<?php

namespace Tests;

use Pascal\Workflow\NotIdenticalComparison;
use PHPUnit\Framework\TestCase;

class NotIdenticalComparisonTest extends TestCase
{


    /**
     * @test
     * @dataProvider identicalValues
     */
    public function compareIdenticalValues($value1, $value2)
    {
        $worker = new NotIdenticalComparison($value1, $value2);
        $this->assertFalse($worker->execute());
    }

    public function identicalValues()
    {
        return [
            [2, 2],
            [3.76, 3.76],
            ['abc', 'abc'],
            [function() { return 1 + 1; }, function() { return 2; }]
        ];
    }

    /**
     * @test
     * @dataProvider unidenticalValues
     */
    public function compareUnidenticalValues($value1, $value2)
    {
        $worker = new NotIdenticalComparison($value1, $value2);
        $this->assertTrue($worker->execute());
    }

    public function unidenticalValues()
    {
        return [
            [1, 2],
            [2.45, 3.76],
            ['abc', 'abd'],
            [function() { return 1 + 1; }, function() { return 3; }]
        ];
    }


}