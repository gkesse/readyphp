<?php

declare(strict_types=1);

namespace readytests\path;

use PHPUnit\Framework\TestCase;

class PathTest extends TestCase
{
    // teste le repertoire temporaire windows
    public function test_Repertoire_Temporaire_Windows()
    {
        // definit le repertoire temporaire
        $DEF_TEMP_DIR = 'C:\\Users\\.*\\AppData\\Local\\Temp';

        // teste le repertoire temporaire windows
        $this->assertMatchesRegularExpression(
            '/^C:\\\\Users\\\\[^\\\\]+\\\\AppData\\\\Local\\\\Temp$/',
            $DEF_TEMP_DIR
        );
    }

    // teste la creation d'un repertoire de tests
    public function test_Creation_Repertoire_Tests()
    {
        // recupere le repertoire temporaire
        $TMP_DIR = sys_get_temp_dir();

        // definit le repertoire de tests
        $TEST_DIR = $TMP_DIR . '/readytests';

        // teste la creation du repertoire de tests
        if (!is_dir($TEST_DIR)) {
            mkdir($TEST_DIR);
        }

        // teste la creation du repertoire de tests
        $this->assertTrue(is_dir($TEST_DIR));

        // supprime le repertoire de tests
        rmdir($TEST_DIR);
    }
}
