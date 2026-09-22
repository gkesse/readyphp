<?php

declare(strict_types=1);

namespace readyphp\home\controller;

class Home extends \readyphp\twig\controller\Twig
{
    public function getTemplateFile(): string
    {
        return 'home/home.html.twig';
    }

    public function getTemplateData(): array
    {
        return ['home' => $this];
    }

    public function getPageTitle(string $p_title = ''): string
    {
        if ($p_title !== '') {
            $p_title = " | $p_title";
        }
        $titleText = $this->getSiteName() . $p_title;

        return $titleText;
    }

    public function getSiteName(): string
    {
        return 'ReadyDEV';
    }

    public function getPageLanguage(): string
    {
        return 'fr';
    }

    public function getPageEncoding(): string
    {
        return 'UTF-8';
    }

    public function getPageLogoMimeType(): string
    {
        return 'image/png';
    }

    public function getPageLogo(): string
    {
        return '/public/data/img/logo.png';
    }

    public function getPageDescription(): string
    {
        $outputText = <<<_EOF_
        Avec ReadyDEV, apprenez en pratiquant grâce à des cours
        et tutoriels adaptés aux sciences de l'Ingénieur.
        ReadyDEV est une Plateforme de Développement en Continu.
        Produit par Gérard KESSE.
        _EOF_;

        return $outputText;
    }
}
