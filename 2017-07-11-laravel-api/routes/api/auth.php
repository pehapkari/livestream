<?php

$api->post('/login', [
	'as'   => 'auth.login',
	'uses' => 'AuthController@authenticate',
]);
