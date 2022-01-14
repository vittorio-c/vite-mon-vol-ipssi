<?php
//site name
const SITE_NAME = 'ViteMonVol';

//App Root
define('APP_ROOT', dirname(__FILE__, 2));
const URL_ROOT = '/';
const URL_SUBFOLDER = '';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

