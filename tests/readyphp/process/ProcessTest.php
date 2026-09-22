<?php

declare(strict_types=1);

namespace readyphp\process;

use PHPUnit\Framework\TestCase;

class ProcessTest extends TestCase
{
    // teste l'execution du process
    public function test_execution_process(): void
    {
        $this->expectOutputRegex('/.+/');
        $process = new Process();
        $process->run();
    }
}
