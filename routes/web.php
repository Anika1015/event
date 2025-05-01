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

use App\Http\Controllers\StripeController;
use App\Http\Controllers\PDFController;

use App\Http\Controllers\VenueController;
use App\Http\Controllers\LightingThemeController;
use App\Http\Controllers\DishPackageController;

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;




Auth::routes(['verify' => true]);

Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');


Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');

Route::get('/events/manage', [EventController::class, 'manage'])->name('events.manage');
Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::post('/events/{id}', [EventController::class, 'update'])->name('events.update');

Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');

Route::get('/events/create', [EventController::class, 'create'])->name('events.create'); 
Route::post('/events', [EventController::class, 'store'])->name('events.store'); 

Route::get('/stripe', [StripeController::class, 'validate']);

Route::resource('events', EventController::class);

Route::resource('venues', VenueController::class);

Route::resource('dish-packages', DishPackageController::class);

Route::resource('lighting-themes', LightingThemeController::class);


Route::get('/stripe/{booking_id}', [StripeController::class, 'index'])->name('stripe.index');
Route::post('/stripe/charge', [StripeController::class, 'charge'])->name('stripe.charge');


Route::get('/payment/error', [StripeController::class, 'paymentError'])->name('payment.error');


Route::get('/payment/success/{id}', [StripeController::class, 'paymentSuccess'])->name('payment.success');

use App\Http\Controllers\InvoiceController;

Route::get('/invoice/download/{id}', [PDFController::class, 'download'])->name('invoice.download');


Route::middleware(['auth'])->group(function () {
    Route::get('/book/{event_id?}', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/book/{event_id}', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/admin', [AdminBookingController::class, 'index'])->name('admin.index');
    Route::post('/admin/bookings/{id}/accept', [AdminBookingController::class, 'accept'])->name('admin.booking.accept');
    Route::post('/admin/bookings/{id}/reject', [AdminBookingController::class, 'reject'])->name('admin.booking.reject');

  


});

Route::get('/status', [BookingController::class, 'status'])->name('status');

Route::get('/admin/payments', [StripeController::class, 'index'])->name('admin.payments.index');
Route::get('/admin/payments/{id}', [StripeController::class, 'show'])->name('admin.payments.show');


Route::get('/events/request', [EventRequestController::class, 'create'])->name('events.request.create');
Route::post('/events/request', [EventRequestController::class, 'store'])->name('events.request.store');

// Routes for admin approval
Route::get('/admin/requests', [AdminController::class, 'eventRequests'])->name('admin.requests');
Route::post('/admin/approve/{id}', [AdminController::class, 'approve'])->name('admin.approve');
Route::post('/admin/reject/{id}', [AdminController::class, 'reject'])->name('admin.reject');


Route::get('/messages', [ContactController::class, 'showUserMessages'])->name('messages')->middleware('auth');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');



Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'usercheck'])->name('admin.dashboard');
    Route::post('/admin/contact/update/{id}', [AdminController::class, 'updateContactStatus'])->name('admin.contact.update');
});


// Show all events
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');





Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');



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

Route::get('/dashboard', function () {
   return view('dashboard'); 
})->middleware(['auth']);


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



