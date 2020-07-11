<?php

use App\Models\User;
use App\Notifications\UserStageNotification;
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
    return view('welcome');
});

Route::get('/top', 'TopController@index');


Route::get('/mail', function () {
    $user = new User([
        'name'  => 'Test User',
        'point' => 3029,
        'email' => 'test_user@example.com'
    ]);

    $user->notify(new UserStageNotification());
});
