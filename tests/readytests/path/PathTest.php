<?php

declare(strict_types=1);

namespace readytests\path;

use PHPUnit\Framework\TestCase;

class PathTest extends TestCase
{
    // teste la structure du repertoire temporaire windows
    public function test_structure_repertoire_temporaire_windows()
    {
        // definit la structure du repertoire temporaire pour Windows
        $DEF_TEMP_DIR = 'C:\\Users\\.*\\AppData\\Local\\Temp';

        // teste la structure du repertoire temporaire pour Windows
        $this->assertMatchesRegularExpression(
            '/^C:\\\\Users\\\\[^\\\\]+\\\\AppData\\\\Local\\\\Temp$/',
            $DEF_TEMP_DIR
        );
    }

    // teste la creation d'un repertoire de tests
    public function test_creation_repertoire_tests()
    {
        // recupere le repertoire temporaire
        $tmp_dir = sys_get_temp_dir();

        // definit le repertoire de tests
        $test_dir = "$tmp_dir/readytests";

        // cree le repertoire de tests si il n'existe pas
        if (!is_dir($test_dir)) {
            mkdir($test_dir);
        }

        // teste la creation du repertoire de tests
        $this->assertTrue(is_dir($test_dir));

        // supprime le repertoire de tests
        rmdir($test_dir);
    }
}
