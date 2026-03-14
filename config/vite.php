<?php

use craft\helpers\App;

return [
	'useDevServer' => Craft::$app->config->general->devMode,
	'checkDevServer' => true,
	'devServerInternal' => 'http://viteplus:5173/',
	'devServerPublic' => App::env('DEFAULT_SITE_URL') . ':5173',
	'serverPublic' => '/assets/',
	'includeReactRefreshShim' => false,
	'includeModulePreloadShim' => false,
	'manifestPath' => '@webroot/assets/.vite/manifest.json',
];
