<?php

declare(strict_types=1);

namespace readyphp\twig\controller;

use PHPUnit\Framework\TestCase;

// cree un mock du controleur twig pour les tests
class TwigMock extends Twig
{
    // recupere le repertoire des templates twig
    public function getTemplateFile(): string
    {
        return 'template.twig';
    }

    // recupere les donnees du template twig
    public function getTemplateData(): array
    {
        return [];
    }
}

class TwigTest extends TestCase
{
    // teste le controleur twig
    public function test_controller_twig()
    {
        // definit le repertoire des templates twig
        $DEF_TEMPLATE_DIR = realpath(__DIR__ . '/../../../../src/readyphp/twig/templates');

        // cree le controleur twig
        $controller = new TwigMock();

        // teste le controleur twig
        $this->assertInstanceOf(Twig::class, $controller);
        $this->assertIsString($controller->getTemplateFile());
        $this->assertIsArray($controller->getTemplateData());
        $this->assertSame($DEF_TEMPLATE_DIR, realpath($controller->getTemplateDir()));
    }
}
