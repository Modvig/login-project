<?php
use Slim\Slim;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Noodlehaus\Config;
use RandomLib\Factory as RandomLib;
use Loginproject\Helpers\Hash;
use Loginproject\Middleware\BeforeMiddleware;
use Loginproject\Middleware\CsrfMiddleware;
use Loginproject\User\User;
use Loginproject\Validation\Validator;

//Enable sessions
session_cache_limiter(false);
session_start();

//Enable display_errors
ini_set('display_errors', 'On');

//Define ROOT-folder
define('INC_ROOT', dirname(__DIR__));

//Autoload dependencies
require INC_ROOT . '/vendor/autoload.php';

//Create Slim Instance
$app = new Slim([
	'mode' => file_get_contents(INC_ROOT . '/mode.php'),
	'view' => new Twig(),
	'templates.path' => INC_ROOT . '/app/views'
]);

$app->auth = false;

//Create middleware instances
$app->add(new BeforeMiddleware);
$app->add(new CsrfMiddleware);

//Load our config-class depending on mode.php (development/production)
$app->configureMode($app->config('mode'), function() use ($app) {
	$app->config = Config::load(INC_ROOT . "/app/config/{$app->mode}.php");
});

require 'database.php';
require 'routes.php';

$app->container->set('user', function() {
	return new User;
});

//Create hash instance
$app->container->singleton('hash', function() use ($app) {
	return new Hash($app->config);
});

//Create validator instance
$app->container->singleton('validation', function() use ($app) {
	return new Validator($app->user);
});

//Create randomlib instance
$app->container->singleton('randomlib', function() {
	$factory = new RandomLib;
	return $factory->getMediumStrengthGenerator();
});

//Create our view
$view = $app->view();

//Enable errormessages in view
$view->parserOptions = [
	'debug' => $app->config->get('twig.debug')
];

$view->parserExtensions = [
	new TwigExtension
];

