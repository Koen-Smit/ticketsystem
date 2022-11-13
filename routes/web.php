<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\OrdersController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/', [PagesController::class, 'home']) ->name('home');

// Route::get('/events', [EventsController::class, 'index'])->middleware(['auth'])->name('events');

// Route::get('/events/create', [EventsController::class, 'create']) ->middleware(['auth'])->name('create');

// Route::get('/events/{id}', [EventsController::class, 'show'])->middleware(['auth'])->name('show');


// Route::post('/events', [EventsController::class, 'store']) ->name('events.store');

Route::resource('events', EventsController::class)->middleware(['auth']);
Route::get('events/{event}/order', [EventsController::class, 'order'])->name('events.order');
Route::post('events/{event}/order', [EventsController::class, 'storeOrder'])->name('events.storeOrder');

Route::get('tickets/{ticket}/scan', [TicketsController::class, 'scan'])->middleware(['auth'])->name('tickets.scan');
Route::get('scan', [TicketsController::class, 'scan'])->middleware(['auth'])->name('tickets.scan');
Route::get('scan', [TicketsController::class, 'scanView'])->name('scan')->middleware(['auth']);
Route::get('ticket-scanned', [TicketsController::class, 'ticket-scanned'])->name('ticket-scanned')->middleware(['auth']);