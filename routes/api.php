<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/companies', 'CompanyController@index');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/tasks/create', 'TaskController@create');