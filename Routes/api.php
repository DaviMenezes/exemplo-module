<?php

use Modules\Exemplo\Http\Controllers\ExemploController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('exemplo')->group(function () {
    Route::post('/test', [ExemploController::class, 'test']);
});
