<?php

// Forward Vercel requests to Laravel in serverless environment
define('LARAVEL_START', microtime(true));

// Prepare writable directories in /tmp for Vercel Serverless environment
$storagePath = '/tmp/storage';
$dirs = [
    $storagePath . '/app/public',
    $storagePath . '/framework/cache/data',
    $storagePath . '/framework/sessions',
    $storagePath . '/framework/views',
    $storagePath . '/logs',
    '/tmp/bootstrap/cache',
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0777, true);
    }
}

// Redirect cache & compiled view paths to writable /tmp
putenv("APP_STORAGE={$storagePath}");
putenv("APP_CONFIG_CACHE=/tmp/bootstrap/cache/config.php");
putenv("APP_EVENTS_CACHE=/tmp/bootstrap/cache/events.php");
putenv("APP_PACKAGES_CACHE=/tmp/bootstrap/cache/packages.php");
putenv("APP_ROUTES_CACHE=/tmp/bootstrap/cache/routes.php");
putenv("APP_SERVICES_CACHE=/tmp/bootstrap/cache/services.php");
putenv("VIEW_COMPILED_PATH={$storagePath}/framework/views");

$_ENV['APP_STORAGE'] = $storagePath;
$_ENV['APP_CONFIG_CACHE'] = '/tmp/bootstrap/cache/config.php';
$_ENV['APP_EVENTS_CACHE'] = '/tmp/bootstrap/cache/events.php';
$_ENV['APP_PACKAGES_CACHE'] = '/tmp/bootstrap/cache/packages.php';
$_ENV['APP_ROUTES_CACHE'] = '/tmp/bootstrap/cache/routes.php';
$_ENV['APP_SERVICES_CACHE'] = '/tmp/bootstrap/cache/services.php';
$_ENV['VIEW_COMPILED_PATH'] = "{$storagePath}/framework/views";

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$app->useStoragePath($storagePath);

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
