<?php

declare(strict_types=1);

namespace readytests\twig;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;

require __DIR__ . '/../../../vendor/autoload.php';

class TwigTest extends TestCase
{
    private string $m_template_dir;
    private string $m_template_file;
    private string $m_template_path;

    // initialise le test
    private function initialiser_test(): void
    {
        $tmp_dir               = sys_get_temp_dir();
        $this->m_template_dir  = "$tmp_dir/readytests";
        $this->m_template_file = 'template.twig';
        $this->m_template_path = "$this->m_template_dir/$this->m_template_file";

        if (!is_dir($this->m_template_dir)) {
            mkdir($this->m_template_dir, 0777, true);
        }

        $this->initialiser_template_twig();
    }

    // initialise le template twig
    private function initialiser_template_twig(): void
    {
        $template_content = "Bonjour : {{ name }} !\n";
        file_put_contents($this->m_template_path, $template_content);
    }

    // nettoie le test
    private function nettoyer_test(): void
    {
        if (file_exists($this->m_template_path)) {
            unlink($this->m_template_path);
        }

        if (is_dir($this->m_template_dir)) {
            rmdir($this->m_template_dir);
        }
    }

    // teste l'execution du process
    public function test_execution_process(): void
    {
        $DEF_OUTPUT = "Bonjour : MON_NOM !\n";

        $this->initialiser_test();

        $loader = new \Twig\Loader\FilesystemLoader($this->m_template_dir);
        $twig   = new \Twig\Environment($loader);

        $output = $twig->render($this->m_template_file, ['name' => 'MON_NOM']);

        Assert::assertEquals($DEF_OUTPUT, $output);
        $this->nettoyer_test();
    }
}
