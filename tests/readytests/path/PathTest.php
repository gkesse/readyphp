<?php

declare(strict_types=1);

namespace readytests\path;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;

class PathTest extends TestCase
{
    // teste la structure du repertoire temporaire windows
    public function test_structure_repertoire_temporaire_windows(): void
    {
        $DEF_TEMP_DIR = 'C:\\Users\\.*\\AppData\\Local\\Temp';
        Assert::assertMatchesRegularExpression(
            '/^C:\\\\Users\\\\[^\\\\]+\\\\AppData\\\\Local\\\\Temp$/',
            $DEF_TEMP_DIR
        );
    }

    // teste la creation d'un repertoire de tests
    public function test_creation_repertoire_tests(): void
    {
        $tmp_dir  = sys_get_temp_dir();
        $test_dir = "$tmp_dir/readytests";

        if (!is_dir($test_dir)) {
            mkdir($test_dir);
        }

        Assert::assertTrue(is_dir($test_dir));
        rmdir($test_dir);
    }
}
