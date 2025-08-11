<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\ProdukController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// curd todlist dan tampil mengunakan storeposedur router postman ok
Route::apiResource('tasks', TaskController::class); // outer tambah data baru
Route::post('/calldatatrend', [TaskController::class, 'calldatatrend']); // router tampil data
// Route::put('/updatetaks/{id}', [TaskController::class, 'updatetaks']); // router updatedata
// Route::delete('/destroy/{id}',[TaskController::class, 'destroy']); //  untuk delete

//and curd todlist dan tampil mengunakan storeposedur router postman ok

Route::apiResource('produk', ProdukController::class);
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
