<?php

use App\Http\Controllers\IslamControll;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', App\Http\IslamicController\Welcome::class)->name('/welcome');
Route::get('/newpost', App\Http\IslamicController\Newpost::class)->name('/newpost');
Route::get('/', App\Http\IslamicController\Search::class)->name('/');
Route::get('/article/{id}', App\Http\IslamicController\Article::class)->name('article');
Route::get('/last', 'App\Http\Controllers\IslamControll@last')->name("last");
Route::get('/random', 'App\Http\Controllers\IslamControll@random')->name("random");
Route::get('/hifz', App\Http\IslamicController\Hifz::class)->name('/hifz');
Route::get('/quran/{id}', App\Http\IslamicController\Quran::class)->name('/quran');
Route::get('/test', App\Http\IslamicController\Test::class)->name('/test');


// Route::post('/postdata', App\Http\IslamicController\postdata::class)->name('/postdata');


