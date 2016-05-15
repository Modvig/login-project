<?php

namespace Loginproject\Middleware;

use Exception;
use Slim\Middleware;

class CsrfMiddleware extends Middleware {

	protected $key;

	public function call() {
		$this->key = $this->app->config->get('csrf.key');
		$this->app->hook('slim.before', [$this, 'check']);
		$this->next->call();
	}

	public function check() {

		//Generate a random string, hash it and save as a session
		if(!isset($_SESSION[$this->key])) {
			$_SESSION[$this->key] = $this->app->hash->hash($this->app->randomlib->generateString(128));
		}

		$token = $_SESSION[$this->key];

		if(in_array($this->app->request()->getMethod(), ['POST', 'PUT', 'DELETE'])) {
			$submittedToken = $this->app->request()->post($this->key) ?: '';

			//Compare session-token and input-token, throw error if request forgery
			if(!$this->app->hash->hashCheck($token, $submittedToken)) {
				throw new Exception('CSRF token mismatch');
			}

		}

		$this->app->view()->appendData([
			'csrf_key' => $this->key,
			'csrf_token' => $token
		]);
	}

}