<?php

declare(strict_types=1);

namespace readytests\system\linux;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\RequiresOperatingSystem;

#[RequiresOperatingSystem("Linux")]
class SystemTest extends TestCase
{
    // teste la lecture du repertoire temporaire
    public function test_Lecture_Repertoire_Temporaire()
    {
        // definit le repertoire temporaire
        $DEF_TEMP_DIR = '/tmp';

        // recupere le repertoire temporaire
        $tmp_dir = sys_get_temp_dir();

        // teste la lecture du repertoire temporaire
        $this->assertSame($DEF_TEMP_DIR, $tmp_dir);
    }
}
