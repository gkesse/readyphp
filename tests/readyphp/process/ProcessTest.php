<?php

namespace readyphp\process;

use PHPUnit\Framework\TestCase;

class ProcessTest extends TestCase
{
    // teste l'execution du process
    public function test_Execution_Process()
    {
        $this->expectOutputRegex('/.+/');
        $process = new Process();
        $process->run();
    }
}
