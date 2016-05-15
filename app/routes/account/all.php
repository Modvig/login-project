<?php
$app->get('/all', function() use ($app){

	$users = $app->user->get();

	$app->render('account/all.php', [
		'users' => $users
	]);
})->name('account.all');