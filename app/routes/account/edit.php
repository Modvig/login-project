<?php
$app->get('/edit', function() use ($app){
	$app->render('account/edit.php');
})->name('account.edit');

$app->post('/edit', function() use ($app) {
	
	$request = $app->request;

	//Grab inputs posted from edit.php
	$email = $request->post('email');
	$firstName = $request->post('first_name');
	$lastName = $request->post('last_name');

	$v = $app->validation;

	//Validate with our validator-class
	$v->validate([
		'email' => [$email, 'required|email'],
		'first_name' => [$firstName, 'alpha|max(50)'],
		'last_name' => [$lastName, 'alpha|max(50)']
	]);

	//If validation passes
	if($v->passes()) {
		$app->auth->update([
			'email' => $email,
			'first_name' => $firstName,
			'last_name' => $lastName,
		]);

		$app->flash('global', 'Your account has been updated successfully.');
		$app->response->redirect($app->urlFor('account.edit'));

	}

	$app->render('/account/edit.php', [
			'errors' => $v->errors(),
			'request' => $request
		]);




})->name('account.edit.post');