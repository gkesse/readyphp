<?php

declare(strict_types=1);

namespace readytests\system\windows;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\RequiresOperatingSystem;
use PHPUnit\Framework\Assert;

#[RequiresOperatingSystem('Windows')]
class SystemTest extends TestCase
{
    // teste la lecture du repertoire temporaire
    public function test_lecture_repertoire_temporaire(): void
    {
        $DEF_TMP_DIR_PATTERN = '/^C:\\\\Users\\\\[^\\\\]+\\\\AppData\\\\Local\\\\Temp$/';
        $tmp_dir             = sys_get_temp_dir();
        Assert::assertMatchesRegularExpression($DEF_TMP_DIR_PATTERN, $tmp_dir);
    }
}
