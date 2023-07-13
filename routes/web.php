<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\TimetableController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/auth/{provider}/redirect',[ProviderController::class,'redirect']);

Route::get('/auth/{provider}/callback',[ProviderController::class,'callback']);
Route::get('/admin', [AdminController::class, 'admin']);
Route::post('/add-subjects',[AdminController::class,'add_subjects'])->name('add-subjects');
Route::get('/members',[MembersController::class,'show']);
Route::get('delete/{id}',[MembersController::class,'delete']);
Route::get('edit/{id}',[MembersController::class,'edit']);
Route::post('edit',[MembersController::class,'update']);
Route::get('/timetable',[TimetableController::class,'show_timetables']);
Route::get('delete/{id}',[TimetableController::class,'delete_timetables']);
Route::get('update/{id}',[TimetableController::class,'edit_timetables']);
Route::post('try',[TimetableController::class,'update_timetables']);
Route::get('/adminDashboard',function(){
    return view('adminDashboard');
});
//Route::get('/members',function(){
//    return view('list');
//});


Route::get('/booking', function () {
    return view('booking');
});

Route::get('/rooms', function () {
    return view('rooms');
});


Route::get('/contacts', function () {
    return view('contacts');

});

require __DIR__.'/auth.php';
