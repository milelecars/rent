<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::resource('/', WebsiteController::class);
Route::get('/hot_deals', [WebsiteController::class, 'hotdeals'])->name('website.hot_deals');
Route::get('/faqs', [WebsiteController::class, 'faqs'])->name('website.faqs');
Route::get('/about_us', [WebsiteController::class, 'about_us'])->name('website.about_us');
Route::get('/contact_us', [WebsiteController::class, 'contact_us'])->name('website.contact_us');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
