<?php

namespace Pascal\Workflow;

class SpaceshipComparison extends IfWorker
{

    /**
     * @return int
     */
    public function execute()
    {
        // Doing this the PHP5.x way for backwards compatibility. The PHP7 spaceship
        // operator is marginally faster, but we do not bother to distinguish the
        // PHP version to select the comparison operator to use.
        $value1 = $this->evaluate($this->value1);
        $value2 = $this->evaluate($this->value2);

        return ($value1 == $value2) ? 0 : (($value1 < $value2) ? -1 : 1);
    }
}
