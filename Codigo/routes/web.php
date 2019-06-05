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

//Route::get('/', function () {
//    return view('welcome');
//}); 
Auth::routes();

Route::get('/', function() {
	return view('login');
});

//Route::get('/login', function() {
//	return view('login');
//});

/*
Route::group(['middleware' => 'auth'], function() {
	Route::get('/dashboard', function() {
	    return view('dashboard.dashboard');
	});

    Route::get('/viatura', function() {
        return view('dashboard.viatura');
	});
	// Route Diario
    Route::get('/diario', 'DiarioController@show');
    Route::get('/diario/create', 'DiarioController@create');

    // Route Espaco
    //Route::get('/espaco', 'EspacoController@show');
    //Route::get('/espaco/create', 'EspacoController@create');
    // Route Mensal
    Route::get('/mensal', 'MensalController@show');
    Route::get('/mensal/create', 'MensalController@create');         
    
});

*/

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', function() {
	    return view('dashboard.dashboard');
    });

    Route::get('/viatura', function() {
        return view('dashboard.viatura');
    });

    // Route Mensal
    Route::get('/mensal', 'MensalController@show');
    Route::get('/mensal/create', 'MensalController@create'); 

    Route::resource('funcionario', 'FuncionarioController');
    Route::resource('espaco', 'EspacoController');
    Route::resource('viatura', 'ViaturaController');     
    Route::resource('clienteDiario', 'ClienteDiarioController');
});



