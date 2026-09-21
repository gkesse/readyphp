<?php

declare(strict_types=1);

namespace readytests\twig;

use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../../vendor/autoload.php';

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

    // teste l'execution du process
    public function test_execution_process()
    {
        // definit le resultat attendu
        $DEF_OUTPUT = "Bonjour : MON_NOM !\n";

        // initialise le test
        $this->initialiser_test();

        // cree le loader et l'environnement Twig
        $loader = new \Twig\Loader\FilesystemLoader($this->m_template_dir);
        $twig   = new \Twig\Environment($loader);

        // execute le rendu du template Twig
        $output = $twig->render($this->m_template_file, ['name' => 'MON_NOM']);

        // teste l'execution du process
        $this->assertEquals($DEF_OUTPUT, $output);

        // nettoie le test
        $this->nettoyer_test();
    }
}
