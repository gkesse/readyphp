<?php

declare(strict_types=1);

namespace readyphp\process;

use PHPUnit\Framework\TestCase;

class ProcessTest extends TestCase
{
    // teste l'execution du process
    public function test_execution_process()
    {
        // teste l'execution du process
        $this->expectOutputRegex('/.+/');
        // cree le process
        $process = new Process();
        // execute le process
        $process->run();
    }
}
