<?php

namespace Site;

use Craft;
use craft\base\Event;
use craft\events\RegisterCpNavItemsEvent;
use craft\web\twig\variables\Cp;

class Module extends \yii\base\Module
{
	public function init(): void
	{
		$this->unregisterPluginStoreNavigationItem();
	}

	private function unregisterPluginStoreNavigationItem(): void
	{
		if (Craft::$app->config->general->devMode) {
			return;
		}

		if (Craft::$app->config->general->allowAdminChanges) {
			return;
		}

		Event::on(
			Cp::class,
			Cp::EVENT_REGISTER_CP_NAV_ITEMS,
			function (RegisterCpNavItemsEvent $event) {
				$index = array_search(
					'plugin-store',
					array_column($event->navItems, 'url'),
					true
				);

				if ($index !== false) {
					unset($event->navItems[$index]);
				}
			}
		);
	}
}
