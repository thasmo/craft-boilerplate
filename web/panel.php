<?php

const CRAFT_CP = true;

require dirname(__DIR__) . '/bootstrap.php';

$app = require CRAFT_VENDOR_PATH . '/craftcms/cms/bootstrap/web.php';
$app->run();
