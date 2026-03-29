<?php

use craft\helpers\App;
use craft\helpers\MailerHelper;
use craft\mail\transportadapters\Sendmail;
use modules\site\Module;

return [
	'id' => App::env('CRAFT_APP_ID'),
	'modules' => [
		'site' => modules\site\Module::class,
	],
	'bootstrap' => [
		'site',
	],
	'components' => [
		'projectConfig' => function () {
			$config = craft\helpers\App::projectConfigConfig();
			$config['writeYamlAutomatically'] = Craft::$app->config->general->devMode;
			return Craft::createObject($config);
		},
		'mailer' => function() {
			$config = App::mailerConfig();

			if (Craft::$app->getConfig()->getGeneral()->devMode) {
				$adapter = MailerHelper::createTransportAdapter(
					Sendmail::class,
					[
						'command' => App::env('DEV_EMAIL_SENDMAIL_COMMAND'),
					],
				);

				$config['transport'] = $adapter->defineTransport();
			}

			return Craft::createObject($config);
		},
		'cache' => function () {
			return Craft::createObject([
				'class' => yii\redis\Cache::class,
				'defaultDuration' => Craft::$app->config->general->cacheDuration,
				'redis' => [
					'class' => yii\redis\Connection::class,
					'hostname' => App::env('REDIS_HOSTNAME') ?: 'localhost',
					'port' => App::env('REDIS_PORT') ?: 6379,
					'password' => App::env('REDIS_PASSWORD') ?: null,
					'database' => 0,
				],
			]);
		},
		'session' => function () {
			$config = craft\helpers\App::sessionConfig();

			$config['class'] = yii\redis\Session::class;

			$config['redis'] = [
				'class' => yii\redis\Connection::class,
				'hostname' => App::env('REDIS_HOSTNAME') ?: 'localhost',
				'port' => App::env('REDIS_PORT') ?: 6379,
				'password' => App::env('REDIS_PASSWORD') ?: null,
				'database' => 1,
			];

			return Craft::createObject($config);
		},
		'queue' => function () {
			return Craft::createObject([
				'class' => craft\queue\Queue::class,
				'proxyQueue' => [
					'class' => yii\queue\redis\Queue::class,
					'redis' => [
						'class' => yii\redis\Connection::class,
						'hostname' => App::env('REDIS_HOSTNAME') ?: 'localhost',
						'port' => App::env('REDIS_PORT') ?: 6379,
						'password' => App::env('REDIS_PASSWORD') ?: null,
						'database' => 2,
					],
				],
				'channel' => 'queue',
			]);
		},
		'deprecator' => function () {
			return Craft::createObject([
				'class' => craft\services\Deprecator::class,
				'throwExceptions' => Craft::$app->config->general->devMode,
			]);
		},
	],
];
