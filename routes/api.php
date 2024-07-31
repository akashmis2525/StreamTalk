<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\StreamController;

Route::post('/start-call', [StreamController::class, 'startCall']);
Route::post('/join-call', [StreamController::class, 'joinCall']);
Route::post('/end-call', [StreamController::class, 'endCall']);

