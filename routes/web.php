<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('index');
});


require __DIR__.'/auth.php';


Route::get('/home', function (){
    return view('index');
})->name('home');
Route::get('/post', function (){
    return view('frontend.pages.post');
})->name('post');
Route::get('/contact', function (){
    return view('frontend.pages.contact');
})->name('contact');

Route::get('/about', function (){
    return view('frontend.pages.about');
})->name('about');
