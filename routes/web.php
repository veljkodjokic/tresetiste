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

Auth::routes();

Route::get('/', 'PagesController@getNaslovna');
Route::get('/home', 'PagesController@getHome');
Route::get('/pravilnik', 'PagesController@getPravilnik');
Route::get('/rezervacija', 'PagesController@getRezervacija');
Route::get('/jezero', 'PagesController@getJezero');
Route::get('/cenovnik', 'PagesController@getCenovnik');
Route::get('/istorija/{godina}', 'PagesController@getIstorija'); 
Route::get('/ekologija', 'PagesController@getEkologija'); 
Route::get('/objava/{id}', 'PagesController@getObjava'); 

//Reservation routes
Route::post('/rezervacija_mesta', 'ReservationController@postMesta'); 
Route::post('/rezervacija', 'ReservationController@postRezervacija'); 

//Galerry routes
Route::get('/galerija', 'GalleryController@getFoto');
Route::get('/galerija/{id}', 'GalleryController@getPics');

//Administrator routes
Route::middleware('auth')->group(function () {
	Route::get('/admin/nova-objava', 'ArticleController@getNovaObjava'); 
	Route::post('/admin/nova-objava', 'ArticleController@postNovaObjava'); 
	Route::post('/admin/del-objava', 'ArticleController@postDelObjava'); 
	Route::get('/admin/alt-objava/{id}', 'ArticleController@getAltObjava'); 
	Route::post('/admin/alt-objava', 'ArticleController@postAltObjava'); 
	Route::post('/admin/nov-album', 'GalleryController@postNovAlbum'); 
	Route::post('/galerija/add_pic', 'GalleryController@postNovPic'); 
	Route::post('/admin/del-pic', 'GalleryController@postDelPic'); 
	Route::post('/admin/edit-album', 'GalleryController@postEditAlbum'); 
	Route::post('/admin/del-album', 'GalleryController@postDelAlbum'); 
});

//Image
Route::get('/mnt/galerija/{filename}', function ($filename)
{
    $path = '/mnt/galerija' . '/' . $filename;

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});