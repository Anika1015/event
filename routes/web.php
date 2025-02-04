<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EventController;

use App\Http\Controllers\PaymentController;

//Route::get('/events', [EventController::class, 'index'])->name('events.index');
//Route::get('/event/{id}/pay', [PaymentController::class, 'showPaymentPage'])->name('payment.page');
//Route::post('/event/{id}/pay', [PaymentController::class, 'processPayment'])->name('payment.process');
//Route::get('/payment/success', function () {
//    return view('payment.success');
//})->name('payment.success');

// Home Route - Show all events
Route::get('/events', [EventController::class, 'index'])->name('events.index');

// Show event details
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

// Show payment form
Route::get('/events/{id}/payment', [PaymentController::class, 'showPaymentForm'])->name('payment.form');

// Process payment
Route::post('/events/{id}/payment', [PaymentController::class, 'processPayment'])->name('payment.process');

// Payment success page
Route::get('/payment/success', function () {
    return view('payment.success');
})->name('payment.success');




// Admin Login Route
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

// Admin Routes with IsAdmin Middleware
Route::middleware(['isAdmin'])->group(function () {
    // Admin Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Admin Settings
    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
    
});

// Admin Logout Route
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');








//Route::get('/events', [EventController::class, 'index']);


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', function () {
    return view('home');
});

//Route::get('/services', function () {
//    return view('services');
//})->name('services');



Route::get('/services', [ServiceController::class, 'index'])->name('services');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
