<?php

declare(strict_types=1);

use Symplify\EasyCodingStandard\Config\ECSConfig;

return ECSConfig::configure()
	->withPaths([
		__DIR__ . '/config',
		__DIR__ . '/modules',
		__DIR__ . '/web',
	])
	->withRootFiles()
	->withFileExtensions(['php'])
	->withPreparedSets(psr12: true)
	->withEditorConfig()
	->withParallel();
