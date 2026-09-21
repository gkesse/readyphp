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

    public function getTitle(): string
    {
        return 'Bonjout tout le monde...';
    }

    public function getContent(): string
    {
        return 'Ce site est en cours de reconstruction...';
    }
}
