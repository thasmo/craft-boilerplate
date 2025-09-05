<?php

use craft\config\GeneralConfig;

return GeneralConfig::create()
	->defaultWeekStartDay(1)
	->omitScriptNameInUrls()
	->preloadSingles()
	->preventUserEnumeration()
	->headlessMode()
	->allowUpdates(false)
	->allowAdminChanges(false)
	->runQueueAutomatically(false)
	->sendPoweredByHeader(false)
	->disallowRobots()
	->useEmailAsUsername()
	->cpTrigger(null)
	->aliases([
		'@webroot' => dirname(__DIR__) . '/web',
	])
	->resourceBasePath('@webroot/assets/')
;
