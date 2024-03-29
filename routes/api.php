<?php

use Illuminate\Http\Request;
use Matriphe\Larinfo\LarinfoFacade;

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

Route::get('threads', 'ThreadController@index');
Route::get('threads/{thread}', 'ThreadController@show');

Route::group(['middleware' => 'guest:api'], function () {
	Route::post('login', 'Auth\LoginController@login');
	Route::post('register', 'Auth\RegisterController@register');
	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
	Route::post('password/reset', 'Auth\ResetPasswordController@reset');

	Route::post('oauth/{driver}', 'Auth\OAuthController@redirectToProvider');
	Route::get('oauth/{driver}/callback', 'Auth\OAuthController@handleProviderCallback')->name('oauth.callback');


});

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', 'Auth\LoginController@logout');

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('users', 'UserController@index');
	Route::get('profile/{user}', 'UserController@show');

	Route::patch('settings/profile', 'Settings\ProfileController@update');
    Route::patch('settings/password', 'Settings\PasswordController@update');

	//Route::get('threads', 'ThreadController@index');
	//Route::get('threads/{thread}', 'ThreadController@show');
	Route::post('threads', 'ThreadController@store');
	Route::delete('threads/{thread}', 'ThreadController@destroy');

	Route::post('threads/{thread}/replies', 'ReplyController@store');
	Route::get('replies', 'ReplyController@index');
	Route::delete('replies/{reply}', 'ReplyController@destroy');

	Route::get('dm/{user}', 'DirectMessageController@show');
	Route::get('dm', 'DirectMessageController@index');
	Route::post('dm/{user}', 'DirectMessageController@store');

	Route::get('/serverinfo', 'LarinfoController@show');
	Route::get('/export/threads/xlsx', 'ExportController@threads_xlsx');
	Route::get('/export/users/xlsx', 'ExportController@users_xlsx');
});