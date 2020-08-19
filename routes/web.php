<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Spatie\QueryBuilder\QueryBuilder;
use App\User;

Route::get('/', function () {
	$result = QueryBuilder::for(User::class)
	->allowedFilters('name')
	->get();
	return $result;
    return view('welcome');
});

// Route::get('api/books', 'BooksController@getCollection')->name('books');
Auth::routes();

Route::group(['prefix' => 'api/v1', 
	'middleware' => 'auth:api',
    'middleware' => 'auth.admin'
], function () {
	Route::get('/admin', function () {
	    return view('admin.index');
	});
   Route::get('api/books', 'BooksController@getCollection')
        ->name('books');
   Route::post('/api/books', 'BooksController@post');

});


Route::get('/home', 'HomeController@index')->name('home');
