<?php

declare(strict_types=1);

namespace readytests\system\windows;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\RequiresOperatingSystem;

#[RequiresOperatingSystem('Windows')]
class SystemTest extends TestCase
{
    // teste la lecture du repertoire temporaire
    public function test_lecture_repertoire_temporaire()
    {
        // definit le pattern du repertoire temporaire
        $DEF_TMP_DIR_PATTERN = '/^C:\\\\Users\\\\[^\\\\]+\\\\AppData\\\\Local\\\\Temp$/';

        // recupere le repertoire temporaire
        $tmp_dir = sys_get_temp_dir();

        // teste la lecture du repertoire temporaire
        $this->assertMatchesRegularExpression($DEF_TMP_DIR_PATTERN, $tmp_dir);
    }
}
