<?php



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api->group(['middleware' => 'api.auth'], function () use ($api) {
	$api->get('/posts', [
		'as'   => 'api.posts.index',
		'uses' => 'PostsController@index'
	]);

	$api->get('/posts/{post}', [
		'as'   => 'api.posts.show',
		'uses' => 'PostsController@show'
	]);
});
