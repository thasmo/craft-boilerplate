<?php

use craft\helpers\App;
use modules\site\Module;

return [
	'id' => App::env('CRAFT_APP_ID') ?: 'CraftCMS',
	'modules' => [
		'site' => modules\site\Module::class,
	],
	'bootstrap' => [
		'site',
	],
	'components' => [
		'projectConfig' => function() {
			$config = craft\helpers\App::projectConfigConfig();
			$config['writeYamlAutomatically'] = Craft::$app->config->general->allowAdminChanges;
			return Craft::createObject($config);
		},
		'cache' => function() {
			return Craft::createObject([
				'class' => yii\redis\Cache::class,
				'defaultDuration' => Craft::$app->config->general->cacheDuration,
				'redis' => [
					'hostname' => App::env('REDIS_HOSTNAME') ?: 'localhost',
					'port' => App::env('REDIS_PORT') ?: 6379,
					'password' => App::env('REDIS_PASSWORD') ?: null,
					'database' => 0,
				],
			]);
		},
		'session' => function() {
			$config = craft\helpers\App::sessionConfig();

			$config['class'] = yii\redis\Session::class;

			$config['redis'] = [
				'hostname' => App::env('REDIS_HOSTNAME') ?: 'localhost',
				'port' => App::env('REDIS_PORT') ?: 6379,
				'password' => App::env('REDIS_PASSWORD') ?: null,
				'database' => 1,
			];

			return Craft::createObject($config);
		},
		'queue' => function() {
			return Craft::createObject( [
				'class' => craft\queue\Queue::class,
				'proxyQueue' => [
					'class' => yii\queue\redis\Queue::class,
					'redis' => [
						'hostname' => App::env('REDIS_HOSTNAME') ?: 'localhost',
						'port' => App::env('REDIS_PORT') ?: 6379,
						'password' => App::env('REDIS_PASSWORD') ?: null,
						'database' => 2,
					],
				],
				'channel' => 'queue',
			]);
		},
		'deprecator' => function() {
			return Craft::createObject([
				'class' => craft\services\Deprecator::class,
				'throwExceptions' => Craft::$app->config->general->devMode,
			]);
		},
	],
];
