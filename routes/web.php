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
    return view('welcome');
});

Auth::routes();
Route::middleware('auth')->group(function () {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/customer-group', [App\Http\Controllers\Customer_GroupController::class, 'index'])->name('customer-group');
Route::get('/new-template', [App\Http\Controllers\TemplateController::class, 'create'])->name('new-template');
Route::post('/save-template', [App\Http\Controllers\TemplateController::class, 'store']);
Route::get('/templates', [App\Http\Controllers\TemplateController::class, 'show']);
Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'show']);
Route::post('/customer-upload', [App\Http\Controllers\CustomerController::class, 'store']);
Route::get('/comapanies', [App\Http\Controllers\CompanyController::class, 'create']);
Route::post('/store-company', [App\Http\Controllers\CompanyController::class, 'store']);
Route::get('/new-campaign', [App\Http\Controllers\CampaignController::class, 'index']);
Route::get('/store-campaign', [App\Http\Controllers\CampaignController::class, 'store']);
Route::get('/get-template/{template_id}', [App\Http\Controllers\TemplateController::class, 'getTemplate']);
});