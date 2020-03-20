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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/','PertanyaanController@list')->name('pertanyaan.list');
Route::get('/create','PertanyaanController@create')->name('pertanyaan.create')->middleware('auth');
Route::post('/store', 'PertanyaanController@store')->name('pertanyaan.store')->middleware('auth');;
Route::get('/pertanyaan/{id}/edit','PertanyaanController@edit')->name('pertanyaan.edit')->middleware('auth');;
Route::put('/pertanyaan/{id}' , 'PertanyaanController@update')->name('pertanyaan.update')->middleware('auth');;
Route::delete('/pertanyaan/{id}', 'PertanyaanController@delete')->name('pertanyaan.delete')->middleware('auth');;
Route::get('/show/{id}', 'PertanyaanController@show')->name('pertanyaan.show');
Route::post('/pertanyaan/upvote/{user_id}/{tanya_id}', 'PertanyaanController@upvote')->name('pertanyaan.upvote')->middleware('auth');;
Route::post('/pertanyaan/downvote/{user_id}/{tanya_id}', 'PertanyaanController@downvote')->name('pertanyaan.downvote')->middleware('auth');;

Route::post('/jawaban/store/{id}', 'JawabanController@store')->name('jawaban.store')->middleware('auth');;
Route::get('jawaban/{id}/edit','JawabanController@edit')->name('jawaban.edit')->middleware('auth');;
Route::put('/{id}', 'JawabanController@update')->name('jawaban.update')->middleware('auth');;
Route::delete('/jawaban/{id}', 'JawabanController@delete')->name('jawaban.delete')->middleware('auth');;
Route::post('/upvote/{user_id}/{tanya_id}/{answer_id}', 'JawabanController@upvote')->name('jawaban.upvote')->middleware('auth');;
Route::post('/downvote/{user_id}/{tanya_id}', 'JawabanController@downvote')->name('jawaban.downvote')->middleware('auth');;
Route::post('/palingtepat/{user_id}/{tanya_id}/{answer_id}', 'JawabanController@palingtepat')->name('jawaban.palingtepat')->middleware('auth');;

Route::post('komentar/store/{tanya_id}/{jawab_id}/{kategori}', 'KomentarController@store')->name('komentar.store')->middleware('auth');;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
