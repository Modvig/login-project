<?php

$app->get('/login', function() use ($app) {
	$app->render('auth/login.php');
})->name('login');

$app->post('/login', function() use ($app) {
	$request = $app->request;
	$identifier = $request->post('identifier');
	$password = $request->post('password');

	$v = $app->validation;

	//Validate strings
	$v->validate([
		'identifier' => [$identifier, 'required'],
		'password' => [$identifier, 'required']
	]);

	//If validation passes
	if($v->passes()) {
		//Check for either username or email
		$user = $app->user
		->where('username', $identifier)
		->orWhere('email', $identifier)
		->first();

		//If username/email exists and passwords check out then create login-session
		if($user && $app->hash->passwordCheck($password, $user->password)) {
			$_SESSION[$app->config->get('auth.session')] = $user->id;
			$app->flash('global', 'You are now logged in.');

			$app->response->redirect($app->urlFor('home'));
		} else {
			$app->flash('global', 'Could not log you in.');
			$app->response->redirect($app->urlFor('login'));
		}

		

	}

	$app->render('auth/login.php', [
		'errors' => $v->errors(),
		'request' => $request
	]);


})->name('login.post');