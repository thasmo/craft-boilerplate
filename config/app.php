<?php

use craft\helpers\App;

return [
	'id' => App::env('CRAFT_APP_ID') ?: 'CraftCMS',
	'modules' => [
		'site' => Site\Module::class,
	],
	'bootstrap' => [
		'site',
	],
	'components' => [
		'deprecator' => [
			'throwExceptions' => App::parseBooleanEnv('$CRAFT_DEV_MODE') ?? false,
		],
	],
];
