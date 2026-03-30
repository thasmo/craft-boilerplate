<?php

return [
	'useDevServer' => Craft::$app->config->general->devMode,
	'checkDevServer' => Craft::$app->config->general->devMode,
	'devServerInternal' => 'http://viteplus:5173/',
	'devServerPublic' => 'https://' . parse_url(Craft::$app->sites->currentSite->baseUrl, PHP_URL_HOST) . ':5173',
	'serverPublic' => '/assets/',
	'includeReactRefreshShim' => false,
	'includeModulePreloadShim' => false,
	'includeScriptOnloadHandler' => false,
	'manifestPath' => '@webroot/assets/.vite/manifest.json',
];
