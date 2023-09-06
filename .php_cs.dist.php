<?php

$finder = PhpCsFixer\Finder::create()
    ->in([__DIR__ . '/tests', __DIR__ . '/public', __DIR__ . '/src']);

$config = new PhpCsFixer\Config();
return $config->setRules([
    '@PSR12' => true,
    '@PhpCsFixer' => true
])
    ->setFinder($finder);
