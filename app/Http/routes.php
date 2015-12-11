<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// Route::get('/','WelcomeController@index');
Route::get('/',function(){
	return redirect()->route('admin.index');
});
Route::get('home', 'WelcomeController@index');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::model('department', 'App\Department');
Route::model('staff', 'App\User');
Route::model('level', 'App\Level');
Route::model('manager', 'App\Manager');
Route::model('leader', 'App\Leader');
Route::model('review','App\Review');
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){	
	Route::get('index',['as'=>'admin.index','uses'=>'HomeController@index']);		
	Route::get('create-manager','HomeController@getCreateManager');
	Route::post('create-manager','HomeController@postCreateManager');
	Route::get('create-leader','HomeController@getCreateLeader');
	Route::post('create-leader','HomeController@postCreateLeader');
	Route::group(['prefix'=>'team'],function(){
		Route::resource('manager','ManagerController');
		Route::resource('leader','LeaderController');	
		Route::get('leader/delete/{id}','LeaderController@delete');
		Route::get('leader/add/{id}','LeaderController@getAdd');
		Route::post('leader/add/{id}','LeaderController@postAdd');
		Route::get('leader/{id}/{user}/delete','LeaderController@destroy');
	});
	// Route::resource('review','ReviewController');	
	Route::get('review/{id}','ReviewController@getReview');
	Route::post('review/{id}','ReviewController@postReview');
	Route::post('review/content','ReviewController@store');
	Route::resource('team','TeamController');
	Route::get('profile','StaffController@getProfile');	
	Route::post('profile','StaffController@postProfile');
	Route::get('changepassword','HomeController@getChangePassword');	
	Route::post('changepassword','HomeController@postChangePassword');	
	Route::resource('department', 'DepartmentController');
	Route::resource('level', 'LevelController');
	Route::get('level/{level}/delete','LevelController@destroy');		
	Route::post('level/clear','LevelController@clear');			
	Route::get('department/{department}/delete','DepartmentController@destroy');		
	Route::post('department/clear','DepartmentController@clear');			
	Route::resource('staff', 'StaffController');
	Route::get('staff/{staff}/delete','StaffController@destroy');		
	Route::get('staff/getlevel/{id}','StaffController@getLevel');	
});
