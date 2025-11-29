<?php

use TwigCsFixer\Rules\Whitespace\IndentRule;

$ruleset = new TwigCsFixer\Ruleset\Ruleset();
$ruleset->addStandard(new TwigCsFixer\Standard\TwigCsFixer());

$ruleset->overrideRule(new IndentRule(4, true));

$config = new TwigCsFixer\Config\Config();
$config->setRuleset($ruleset);

return $config;
