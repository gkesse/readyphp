<?php
$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/web');

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12'                 => true,
        'psr_autoloading'        => true,
        'array_syntax'           => ['syntax' => 'short'],
        'strict_param'           => true,
        'no_unused_imports'      => true,
        'single_quote'           => true,
        'indentation_type'       => true,
        'binary_operator_spaces' => ['default' => 'align'],
    ])
    ->setRiskyAllowed(true)
    ->setUsingCache(false)
    ->setFinder($finder);
