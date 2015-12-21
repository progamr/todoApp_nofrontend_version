<?php



/**
 * No front-end version
 */
Route::get('/', 'todosController@index');
Route::get('/todos/create', 'todosController@create');
Route::get('/todos/{id}', 'todosController@show');
Route::delete('/todos/{id}', 'todosController@delete');
Route::post('/todos/create', 'todosController@store');
Route::get('/todos/{id}/edit', 'todosController@edit');
Route::put('/todos/{id}/update', 'todosController@update');


