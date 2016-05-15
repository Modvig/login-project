<?php

namespace Loginproject\User;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent {
	protected $table = 'users';

	protected $fillable = [
		'email',
		'username',
		'first_name',
		'last_name',
		'password',
	];

	public function getFullName() {
		if(!$this->first_name || !$this->last_name) {
			return null;
		}
		return "{$this->first_name} {$this->last_name}";
	}

	public function getFullNameOrUsername() {
		return $this->getFullName() ?: $this->username;
	}
}