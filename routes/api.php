<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\ProdukController;

use App\Http\Controllers\RoadmapController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('tasks', TaskController::class);

Route::apiResource('produk', ProdukController::class);

Route::post('/calldatatrend', [TaskController::class, 'calldatatrend']);


Route::get('roadmap/export', [RoadmapController::class, 'export']);

Route::get('/webhook/whatsapp', function (Request $request) {
    $verify_token = 'my_verify_token'; // samakan dengan token di Meta webhook

    $mode = $request->input('hub_mode');
    $token = $request->input('hub_verify_token');
    $challenge = $request->input('hub_challenge');

    if ($mode && $token === $verify_token) {
        return response($challenge, 200);
    }

    return response('Unauthorized', 403);
});

Route::post('/webhook/whatsapp', [App\Http\Controllers\WhatsAppController::class, 'receive']);
