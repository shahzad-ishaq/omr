<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\InstituteClassesController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ClassGroupController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TestTypeController;
use App\Http\Controllers\AnswerKeyController;
use App\Http\Controllers\ResultController;
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
Route::get('/getInstitute', [InstituteController::class, 'showAll']);
Route::post('/getInstituteClass', [InstituteClassesController::class, 'showAll']);
Route::post('/getSession', [SessionController::class, 'showAll']);
Route::post('/getClassGroup', [ClassGroupController::class, 'show']);
Route::post('/getSubject', [SubjectController::class, 'show']);
Route::post('/getTest', [TestTypeController::class, 'show']);
Route::post('/addAnswerKey', [AnswerKeyController::class, 'create']);
Route::post('/updateAnswerKey', [AnswerKeyController::class, 'update']);
Route::post('/getAnswer', [AnswerKeyController::class, 'show']);
Route::post('/getAnswerKeyImg', [AnswerKeyController::class, 'showImg']);
Route::post('/uploadImg', [ResultController::class, 'storeImg']);
Route::post('/compileResult', [ResultController::class, 'compileResult']);


/*Route::get('/getInstitute', function () {
    return 'Hello World';
});*/
Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
Route::post('/update-profile', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');


//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

