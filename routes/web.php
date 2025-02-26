<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EventController;

use App\Http\Controllers\PaymentController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\ContactController;

use App\Http\Controllers\EventRequestController;

use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminBookingController;

Route::middleware(['auth'])->group(function () {
    Route::get('/book/{event_id?}', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/book/{event_id}', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/admin', [AdminBookingController::class, 'index'])->name('admin.index');
    Route::post('/admin/bookings/{id}/accept', [AdminBookingController::class, 'accept'])->name('admin.booking.accept');
    Route::post('/admin/bookings/{id}/reject', [AdminBookingController::class, 'reject'])->name('admin.booking.reject');



});

Route::get('/status', [BookingController::class, 'status'])->name('status');








// Routes in web.php

Route::get('/events/request', [EventRequestController::class, 'create'])->name('events.request.create');
Route::post('/events/request', [EventRequestController::class, 'store'])->name('events.request.store');

// Routes for admin approval
Route::get('/admin/requests', [AdminController::class, 'eventRequests'])->name('admin.requests');
Route::post('/admin/approve/{id}', [AdminController::class, 'approve'])->name('admin.approve');
Route::post('/admin/reject/{id}', [AdminController::class, 'reject'])->name('admin.reject');



Route::get('/messages', [ContactController::class, 'showUserMessages'])->name('messages')->middleware('auth');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/payments', [PaymentController::class, 'index'])->name('admin.payments.index');
    Route::get('/payments/{id}', [PaymentController::class, 'show'])->name('admin.payments.show');
});


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');



Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'usercheck'])->name('admin.dashboard');
    Route::post('/admin/contact/update/{id}', [AdminController::class, 'updateContactStatus'])->name('admin.contact.update');
});





Route::get('/events/manage', [EventController::class, 'manage'])
    ->name('events.manage')
    ->middleware(['auth', 'admin']);

Route::post('/events/store', [EventController::class, 'store'])
    ->name('events.store')
    ->middleware(['auth', 'admin']);

Route::post('/events/update/{id}', [EventController::class, 'update'])
    ->name('events.update')
    ->middleware(['auth', 'admin']);

    
Route::post('/events/delete/{id}', [EventController::class, 'destroy'])
    ->name('events.delete');
    





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


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::get('/home', function () {
   return view('home');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes();


