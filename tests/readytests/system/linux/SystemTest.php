<?php

declare(strict_types=1);

namespace readytests\system\linux;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\RequiresOperatingSystem;
use PHPUnit\Framework\Assert;

#[RequiresOperatingSystem('Linux')]
class SystemTest extends TestCase
{
    // teste la lecture du repertoire temporaire
    public function test_lecture_repertoire_temporaire(): void
    {
        $DEF_TMP_DIR = '/tmp';
        $tmp_dir     = sys_get_temp_dir();
        Assert::assertSame($DEF_TMP_DIR, $tmp_dir);
    }
}
