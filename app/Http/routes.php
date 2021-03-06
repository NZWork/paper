<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	return view('index');
});

Route::get('/test', 'TestController@index');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	Route::get('/login', function () {
		$session = \Illuminate\Support\Facades\Session::get('user');
		if(isset($session->uid) && \App\User::checkMiddleLogin($session->uid, $session->email)){
			return redirect('/center');
		}
		//return view('login');
		return redirect('https://oauth.tiki.im/auth?response_type=code&redirect_uri=https://tiki.im/login/callback&client_id=test&state=1');
	});

	Route::get('/activation', 'UserController@activation');
	Route::get('/login/callback', 'UserController@authCallback');
	Route::post('/set/passwd', 'UserController@setPasswdByToken');
});

/**
 * 登录中间件
 */
Route::group(['middleware' => ['web', 'login']], function () {
	Route::get('/logout', 'UserController@logout');
	Route::get('/center', 'TikiController@index');
	Route::get('/open', 'TikiController@openDir');
	Route::post('/newFile', 'TikiController@newFile');
	Route::post('/deleteFile', 'TikiController@delFile');


	Route::get('/setting', 'UserController@setting');
	Route::post('/nameSetting', 'UserController@nameSetting');
	Route::post('/userSetting', 'UserController@userSetting');

	Route::get('/newOrg', 'TikiController@newOrg');
	Route::post('/createOrg', 'TikiController@createOrg');


	Route::get('/newRepo', 'TikiController@newRepo');
	Route::post('/createRepo', 'TikiController@createRepo');

	Route::get('/project/{id?}', 'TikiController@project');
	Route::get('/projectSetting/{id?}', 'TikiController@projectSetting');
	Route::post('/repoSetting', 'TikiController@repoSetting');
	Route::post('/addRepoUser', 'TikiController@addRepoUser');
	Route::post('/delRepo', 'TikiController@delRepo');
	Route::post('/delRepoUser', 'TikiController@delRepoUser');

	Route::get('/edit/{pid?}/{id?}', 'MarkDownController@getStroageFile');
	Route::get('/read/{org?}/{repo?}', 'MarkDownController@read');

	Route::get('/generate', 'MarkDownController@generateWiki');

	Route::get('/{name?}', 'TikiController@profile');
});

/**
 * 内部接口
 */
Route::group(['middleware' => ['web', 'xauth']], function () {
	Route::post('/api/nz/login', 'UserController@login');
	Route::post('/api/nz/user', 'UserController@userInfo');
	Route::post('/api/nz/save', 'MarkDownController@setStroageFile');
	Route::post('/api/nz/identity', 'MarkDownController@xtokenAuth');
});





