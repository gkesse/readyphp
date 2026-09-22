<?php

declare(strict_types=1);

namespace readyphp\twig\module;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;

// cree un mock du controleur twig pour les tests
class TwigMock extends \readyphp\twig\controller\Twig
{
    // recupere le repertoire des templates twig
    public function getTemplateDir(): string
    {
        return sys_get_temp_dir() . '/readytests';
    }

    // recupere le fichier du template twig
    public function getTemplateFile(): string
    {
        return 'template.twig';
    }

    /**
     * Recupere les donnees du template twig
     *
     * @return array<string, string>
     */
    public function getTemplateData(): array
    {
        return ['name' => 'MON_NOM'];
    }
}

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

    // teste le rendu du module twig
    public function test_rendu_module_twig(): void
    {
        $DEF_OUTPUT = "Bonjour : MON_NOM !\n";

        $this->initialiser_test();

        $controller = new TwigMock();
        $module     = new Twig($controller);

        $output = $module->render();

        Assert::assertEquals($DEF_OUTPUT, $output);
        $this->nettoyer_test();
    }
}
