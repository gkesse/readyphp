<?php

declare(strict_types=1);

namespace readyphp\process;

class Process
{
    public function run()
    {
        $home = new \readyphp\home\controller\Home();
        $twig = new \readyphp\twig\module\Twig($home);
        echo $twig->render();
    }
}
