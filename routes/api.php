<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('folders')->group(function () {
    // Fetch folders with optional parent folder


    // Create new folder
    // Route::post('/', [DocumentController::class, 'store']);

    // Update folder name
    Route::put('/{id}', [DocumentController::class, 'update']);

    // Delete folder
    Route::delete('/{id}', [DocumentController::class, 'destroy']);
});

Route::post('/upload-files2/{folderId}', [DocumentController::class, 'uploadFiles2']);
// Route::post('/upload-files/{folderId}', [DocumentController::class, 'uploadFiles']);
Route::post('/upload-files/{folderId}', [DocumentController::class, 'uploadFiles'])
    ->name('upload.files');

Route::post('/upload-files-view/{folderId}', [DocumentController::class, 'uploadFilesView'])
    ->name('upload.files.view');

Route::post('/move-file/{fileId}/{folderId}', [DocumentController::class, 'moveFile']);

Route::get('/documents/files/{folderId}', [DocumentController::class, 'showFiles'])->name('documents.files');
Route::post('/upload-files/new', [DocumentController::class, 'uploadFilesNew'])->name('upload.files.new');

