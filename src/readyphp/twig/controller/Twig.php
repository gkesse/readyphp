<?php

declare(strict_types=1);

namespace readyphp\twig\controller;

// cree le controleur twig pour l'application
abstract class Twig
{
    private string $m_template_dir;

    // construit le controleur twig
    public function __construct()
    {
        $this->m_template_dir = __DIR__ . '/../templates';
    }

    // recupere le repertoire des templates twig
    public function getTemplateDir(): string
    {
        return $this->m_template_dir;
    }

    // recupere le fichier du template twig
    abstract public function getTemplateFile(): string;

    /**
     * Recupere les donnees du template twig
     *
     * @return array<string, mixed>
     */
    abstract public function getTemplateData(): array;
}
