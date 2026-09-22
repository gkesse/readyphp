<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests')
    ->in(__DIR__ . '/web')
    ->exclude('var')
    ->exclude('cache')
    ->files()
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true)
;

return (new Config())
    ->setRiskyAllowed(true)
    ->setUsingCache(false)
    ->setRules([
        '@PSR12' => true,

        // Syntaxe moderne
        'array_syntax' => ['syntax' => 'short'],
        'single_quote' => true,

        // Imports
        'no_unused_imports'           => true,
        'ordered_imports'             => false,
        'class_reference_name_casing' => false,

        // Espaces & opérateurs
        'binary_operator_spaces' => [
            'operators' => [
                '='  => 'align',
                '=>' => 'align',
            ],
        ],
        'concat_space'          => ['spacing' => 'one'],
        'indentation_type'      => true,
        'method_argument_space' => ['on_multiline' => 'ensure_fully_multiline'],

        // Paramètres stricts
        'strict_param' => true,

        // PSR‑12 avancé
        'blank_line_before_statement' => [
            'statements' => ['return', 'throw', 'try', 'if'],
        ],
        'no_multiple_statements_per_line' => true,
        'no_trailing_comma_in_singleline' => true,
        'no_extra_blank_lines'            => [
            'tokens' => ['extra'],
        ],

        // Autoloading PSR
        'psr_autoloading' => true,

        // Améliorations ReadyPHP
        'class_attributes_separation' => [
            'elements' => [
                'method'   => 'one',
                'property' => 'none',
                'const'    => 'one',
            ],
        ],
        'phpdoc_trim'                                   => true,
        'phpdoc_trim_consecutive_blank_line_separation' => true,
        'phpdoc_align'                                  => ['align' => 'vertical'],
        'phpdoc_order'                                  => true,
        'phpdoc_separation'                             => true,
        'phpdoc_indent'                                 => true,
        'phpdoc_no_empty_return'                        => true,
        'phpdoc_no_useless_inheritdoc'                  => true,
        'phpdoc_single_line_var_spacing'                => true,
        'phpdoc_var_annotation_correct_order'           => true,
        'phpdoc_to_return_type'                         => true,

        // Nettoyage
        'no_whitespace_in_blank_line' => true,
        'no_empty_comment'            => true,
        'no_empty_phpdoc'             => true,
        'no_superfluous_phpdoc_tags'  => true,
    ])
    ->setFinder($finder)
;
