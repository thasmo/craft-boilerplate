<?php

namespace modules\template;

use Craft;
use craft\base\Event;
use craft\events\RegisterTemplateRootsEvent;
use Craft\helpers\StringHelper;
use craft\web\View;
use yii\base\Module;

class Template extends Module
{
	public function init(): void
	{
		parent::init();

		Craft::setAlias('@modules/template', __DIR__);

		Event::on(
			View::class,
			View::EVENT_REGISTER_SITE_TEMPLATE_ROOTS,
			function(RegisterTemplateRootsEvent $event) {
				$site = Craft::$app->sites->getCurrentSite();
				$group = Craft::$app->sites->getGroupById($site->groupId);

				if ($site) {
					$name = StringHelper::slugify($site->name);

					if ($name) {
						$event->roots[''][] = Craft::getAlias('@templates/context/sites/' . $name . '/');
					}
				}

				if ($group) {
					$name = StringHelper::slugify($group->name);

					if ($name) {
						$event->roots[''][] = Craft::getAlias('@templates/context/groups/' . $name . '/');
					}
				}

				$event->roots[''][] = Craft::getAlias('@templates/context/global/');
			}
		);
	}
}
