<?php

declare(strict_types=1);

namespace readyphp\twig\controller;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;

// cree un mock du controleur twig pour les tests
class TwigMock extends Twig
{
    // recupere le repertoire des templates twig
    public function getTemplateFile(): string
    {
        return 'template.twig';
    }

    /**
     * Recupere les donnees du template twig
     *
     * @return array<string, mixed>
     */
    public function getTemplateData(): array
    {
        return [];
    }
}

class TwigTest extends TestCase
{
    // teste le controleur twig
    public function test_controller_twig(): void
    {
        $DEF_TEMPLATE_DIR = realpath(__DIR__ . '/../../../../src/readyphp/twig/templates');

        $controller = new TwigMock();

        Assert::assertInstanceOf(Twig::class, $controller);
        Assert::assertSame($DEF_TEMPLATE_DIR, realpath($controller->getTemplateDir()));
    }
}
