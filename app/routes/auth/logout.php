<?php

$app->get('/logout', function() use ($app) {

	//Unset session on logout
	unset($_SESSION[$app->config->get('auth.session')]);

	$app->flash('global', 'You are now logged out.');
	$app->response->redirect($app->urlFor('home'));

})->name('logout');