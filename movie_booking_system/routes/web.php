<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
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

Route::get('/',function(){
    if(session()->getId()){
        return redirect()->intended(RouteServiceProvider::HOME);
    }
    return view('auth.login');
})->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::view('/dashboard','dashboard' )->name('dashboard');
    Route::view('/bookings_history','bookings_history' )->name('bookings_history');
    Route::view('/book','book')->name('book');
    Route::view('/select_movie','select_movie')->name('select_movie');
    Route::view('/select_seat/{data}','select_seat')->name('select_seat');
   
    Route::post('/submit_info',[BookingController::class,'submit_info'])->name('submit_info');
    Route::post('/add_booking',[BookingController::class,'add_booking'])->name('add_booking');

    //add middleware can:isAdmin to authorize
    Route::view('/admin_panel/{movies}','admin_panel' )->middleware('can:isAdmin')->name('admin_panel');
    Route::get('/get_admin_panel',[BookingController::class, 'all_movie'] )->middleware('can:isAdmin')->name('get_admin_panel');
    Route::view('/create_movie','create_movie' )->middleware('can:isAdmin')->name('create_movie');
    Route::post('/insert_movie',[BookingController::class, 'insert_movie'] )->middleware('can:isAdmin')->name('insert_movie');
    Route::get('/delete_movie/{movieid}',[BookingController::class, 'delete_movie'] )->middleware('can:isAdmin')->name('delete_movie');
    Route::get('/show_edit_movie/{movieid}',[BookingController::class, 'show_edit_movie'] )->middleware('can:isAdmin')->name('show_edit_movie');
    Route::view('/edit_movie_view/{movies}','edit_movie_view' )->middleware('can:isAdmin')->name('edit_movie_view');
    Route::post('/edit_movie',[BookingController::class, 'edit_movie'] )->middleware('can:isAdmin')->name('edit_movie');
});



require __DIR__.'/auth.php';

