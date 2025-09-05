<?php

const CRAFT_BASE_PATH = __DIR__;
const CRAFT_VENDOR_PATH = CRAFT_BASE_PATH . '/vendor';

require_once CRAFT_VENDOR_PATH . '/autoload.php';

if (class_exists(Dotenv\Dotenv::class)) {
	Dotenv\Dotenv::createUnsafeMutable(CRAFT_BASE_PATH)->safeLoad();
}
