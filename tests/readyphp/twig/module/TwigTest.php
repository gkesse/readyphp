<?php

declare(strict_types=1);

namespace readyphp\twig\module;

use PHPUnit\Framework\TestCase;

// cree un mock du controleur twig pour les tests
class TwigMock extends \readyphp\twig\controller\Twig
{
    // recupere le repertoire des templates twig
    public function getTemplateDir()
    {
        return sys_get_temp_dir() . '/readytests';
    }

    // recupere le fichier du template twig
    public function getTemplateFile(): string
    {
        return 'template.twig';
    }

    // recupere les donnees du template twig
    public function getTemplateData(): array
    {
        return ['name' => 'MON_NOM'];
    }
}

class TwigTest extends TestCase
{
    private $m_template_dir;
    private $m_template_file;
    private $m_template_path;

    // initialise le test
    private function initialiser_test()
    {
        // recupere le repertoire temporaire
        $tmp_dir = sys_get_temp_dir();
        // definit le repertoire temporaire pour les tests
        $this->m_template_dir  = "$tmp_dir/readytests";
        // definit le fichier du template twig pour les tests
        $this->m_template_file = 'template.twig';
        // definit le chemin complet du fichier du template twig pour les tests
        $this->m_template_path = "$this->m_template_dir/$this->m_template_file";

        // cree le repertoire temporaire pour les tests
        if (!is_dir($this->m_template_dir)) {
            mkdir($this->m_template_dir, 0777, true);
        }

        // cree le template twig pour les tests
        $this->initialiser_template_twig();
    }

    // initialise le template twig
    private function initialiser_template_twig()
    {
        // cree le contenu du template twig
        $template_content = "Bonjour : {{ name }} !\n";
        // cree le fichier du template twig
        file_put_contents($this->m_template_path, $template_content);
    }

    // nettoie le test
    private function nettoyer_test()
    {
        // supprime le fichier du template twig
        if (file_exists($this->m_template_path)) {
            unlink($this->m_template_path);
        }

        // supprime le repertoire temporaire pour les tests
        if (is_dir($this->m_template_dir)) {
            rmdir($this->m_template_dir);
        }
    }

    // teste le rendu du module twig
    public function test_rendu_module_twig()
    {
        // definit le resultat attendu
        $DEF_OUTPUT = "Bonjour : MON_NOM !\n";

        // initialise le test
        $this->initialiser_test();

        // cree le controller et le module twig
        $controller = new TwigMock();
        $module     = new Twig($controller);

        // execute le module twig
        $output = $module->render();

        // teste le rendu du module twig
        $this->assertEquals($DEF_OUTPUT, $output);

        // nettoie le test
        $this->nettoyer_test();
    }
}
