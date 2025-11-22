<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    GuestController,
    RoomTypeController,
    RoomController,
    ReservationController,
    HousekeepingTaskController,
    MaintenanceTicketController,
    FolioController,
    FolioTransactionController,
    FeedbackController,
    UserController,
    Auth\LoginController
};

// Welcome / Homepage
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authentication Routes (manual setup)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected routes (only for authenticated users)
Route::middleware(['auth'])->group(function () {

    // Guests
    Route::resource('guests', GuestController::class);

    // Users
    Route::resource('users', UserController::class);

    // Room Types
    Route::resource('room_types', RoomTypeController::class);

    // Rooms
    Route::resource('rooms', RoomController::class);

    // Reservations
    Route::resource('reservations', ReservationController::class);

    // Housekeeping Tasks
    Route::resource('housekeeping_tasks', HousekeepingTaskController::class);

    // Maintenance Tickets
    Route::resource('maintenance_tickets', MaintenanceTicketController::class);

    // Folios
    Route::resource('folios', FolioController::class);

    // Folio Transactions
    Route::resource('folio_transactions', FolioTransactionController::class);

    // Feedback
    Route::resource('feedback', FeedbackController::class);

    // Dashboard
    Route::get('/dashboard', function () {
        return view('welcome'); // or a dedicated dashboard view
    })->name('dashboard');
});
