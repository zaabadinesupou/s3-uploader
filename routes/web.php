<?php

use App\Http\Controllers\Controller;
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

Route::post('/gh', function () {
    shell_exec('cd /home/ubuntu/htdocs; git remote update; git checkout -f; git pull origin main; composer install; php artisan cache:clear; php artisan migrate --force;');
    return 'OK';
});

Route::post('/', [Controller::class, 'welcome']);

Route::get('/{any}', [Controller::class, 'redirect']);