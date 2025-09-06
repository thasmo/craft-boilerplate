<?php

namespace Site;

use Craft;
use craft\base\Event;
use craft\events\RegisterComponentTypesEvent;
use craft\events\RegisterCpNavItemsEvent;
use craft\services\Dashboard;
use craft\services\Utilities;
use craft\web\twig\variables\Cp;

class Module extends \yii\base\Module
{
	public function init(): void
	{
		if (Craft::$app->config->general->devMode) {
			return;
		}

		if (!Craft::$app->config->general->allowAdminChanges) {
			$this->unregisterPluginStoreNavigationItem();
		}

		if (!Craft::$app->config->general->allowUpdates) {
			$this->unregisterUpdateUtility();
			$this->unregisterUpdateWidget();
		}
	}

	private function unregisterPluginStoreNavigationItem(): void
	{
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

	private function unregisterUpdateUtility(): void
	{
		Event::on(
			Utilities::class,
			Utilities::EVENT_REGISTER_UTILITIES,
			function (RegisterComponentTypesEvent $event) {
				$index = array_search(
					'craft\utilities\Updates',
					$event->types,
					true
				);

				if ($index !== false) {
					unset($event->types[$index]);
				}
			}
		);
	}

	private function unregisterUpdateWidget(): void
	{
		Event::on(
			Dashboard::class,
			Dashboard::EVENT_REGISTER_WIDGET_TYPES,
			function (RegisterComponentTypesEvent $event) {
				$index = array_search(
					'craft\widgets\Updates',
					$event->types,
					true
				);

				if ($index !== false) {
					unset($event->types[$index]);
				}
			}
		);
	}
}
