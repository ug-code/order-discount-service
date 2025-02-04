<?php


use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {

    /**
     * Trading
     */
    Route::get('/hello', function () {
        return 'Hello World';
    });

    Route::controller(OrderController::class)->group(function () {

        Route::post('/add', 'add');
        Route::delete('/delete', 'delete');
        Route::get('/list', 'list');
        Route::post('/checkDiscount', 'checkDiscount');

    });


});



