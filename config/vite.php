<?php

use craft\helpers\App;

return [
	'useDevServer' => Craft::$app->config->general->devMode,
	'checkDevServer' => true,
	'devServerInternal' => 'http://localhost:3000/',
	'devServerPublic' => App::env('DEFAULT_SITE_URL') . ':3000',
	'serverPublic' => '/assets/',
	'includeReactRefreshShim' => false,
	'includeModulePreloadShim' => false,
	'manifestPath' => '@webroot/assets/.vite/manifest.json',
];
