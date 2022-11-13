<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\OrganisationsController;

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
Route::get('/', [PagesController::class, 'home']) ->name('home');
Route::resource('events', EventsController::class, 'index')->middleware(['auth']);
Route::get('events/{event}/order', [EventsController::class, 'order'])->name('events.order');
Route::post('events/{event}/order', [EventsController::class, 'storeOrder'])->name('events.storeOrder');
Route::get('login', [EventsController::class, 'login'])->name('login');
Route::get('register', [EventsController::class, 'register'])->name('register');

Route::get('orders/{ticket}/confirm', [TicketsController::class, 'confirm'])->middleware(['auth'])->name('orders.confirm');

Route::get('organisations', [OrganisationsController::class, 'index'])->name('organisations.index');
Route::get('organisations/create', [OrganisationsController::class, 'create'])->name('organisations.create');
Route::post('organisations', [OrganisationsController::class, 'store'])->name('organisations.store');
require __DIR__.'/auth.php';