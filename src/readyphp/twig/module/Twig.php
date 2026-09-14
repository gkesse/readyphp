<?php

declare(strict_types=1);

namespace readyphp\twig\module;

require __DIR__ . '/../../../../vendor/autoload.php';

// cree le module twig pour l'application
class Twig
{
    private \readyphp\twig\controller\Twig $m_controller;
    private \Twig\Loader\FilesystemLoader $m_loader;
    private \Twig\Environment $m_twig;

    // construit le module twig
    public function __construct(\readyphp\twig\controller\Twig $p_controller)
    {
        $this->m_controller = $p_controller;
        $this->m_loader     = new \Twig\Loader\FilesystemLoader($this->m_controller->getTemplateDir());
        $this->m_twig       = new \Twig\Environment($this->m_loader);
    }

    // recupere le rendu du template twig
    public function render()
    {
        $output = $this->m_twig->render($this->m_controller->getTemplateFile(), $this->m_controller->getTemplateData());
        return $output;
    }
}
