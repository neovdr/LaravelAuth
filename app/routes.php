<?php

/*
NON REST IMPLEMENTATION FOR NOW
*/

Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@home'
));

/*
Authenticated Group
*/

Route::group(array('before' => 'auth'), function() {

	//CSRF Protection Group for POSTs
	Route::group(array('before' => 'csrf'), function() {
		/*
		Change Password(POST)
		*/

		Route::post('/account/change-password', array(
			'as' => 'account-change-password-post',
			'uses' => 'AccountController@postChangePassword'
		));
	});

	/*
		Change Password(GET)
	*/

	Route::get('/account/change-password', array(
		'as' => 'account-change-password',
		'uses' => 'AccountController@getChangePassword'
	));

	/*
		Sign Out(GET)
	*/
	Route::get('/account/sign-out', array(
		'as' => 'account-sign-out',
		'uses' => 'AccountController@getSignOut'
	));
});


/*
Unauthenticated Group
*/
Route::group(array('before' => 'guest'), function() {

	//CSRF Protection Group for POSTs
	Route::group(array('before' => 'csrf'), function() {
		/*
		Create account (POST)
		*/
		Route::post('/account/create', array(
			'as' => 'account-create-post',
			'uses' => 'AccountController@postCreate'
		));

		/*
		Sign in (POST)
		*/
		Route::post('/account/sign-in', array(
			'as' => 'account-sign-in-post',
			'uses' => 'AccountController@postSignIn'
		));

		/*
		Forgot password (GET)
		*/
		Route::post('/account/forgot-password', array(
			'as' => 'account-forgot-password-post',
			'uses' => 'AccountController@postForgotPassword'
		));
	});
	
	/*
	Forgot password (GET)
	*/
	Route::get('/account/forgot-password', array(
		'as' => 'account-forgot-password',
		'uses' => 'AccountController@getForgotPassword'
	));

	/*
	Recover password (GET)
	*/
	Route::get('/account/recover/{code}', array(
		'as' => 'account-recover',
		'uses' => 'AccountController@getRecoverPassword'
	));

	/*
	Sign in (GET)
	*/
	Route::get('/account/sign-in', array(
		'as' => 'account-sign-in',
		'uses' => 'AccountController@getSignIn'
	));


	/*
	Create account (GET)
	*/
	Route::get('/account/create', array(
		'as' => 'account-create',
		'uses' => 'AccountController@getCreate'
	));

	Route::get('/account/activate/{code}', array(
		'as' => 'account-activate',
		'uses' => 'AccountController@getActivate'
		));

});
