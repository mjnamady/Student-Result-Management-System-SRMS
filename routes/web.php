<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\ClassController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// ADMIN ALL ROUTES
Route::controller(AdminController::class)->group(function(){
    Route::get('admin/logout', 'AdminLogout')->name('admin.logout');
    Route::get('admin/profile', 'AdminProfile')->name('admin.profile');
    Route::post('admin/profile/update', 'AdminProfileUpdate')->name('admin.profile.update');
    Route::get('admin/change/password', 'AdminChangePassword')->name('admin.change.password');
    Route::post('admin/update/password', 'AdminUpdatePassword')->name('admin.update.password');
}); // END ADMIN ALL ROUTES

// CLASS ALL ROUTES
Route::controller(ClassController::class)->group(function(){
    Route::get('create/class', 'CreateClass')->name('create.class');
    Route::post('store/class', 'StoreClass')->name('store.class');
    Route::get('manage/classes', 'ManageClasses')->name('manage.classes');
    
}); // END CLASS ALL ROUTES




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





require __DIR__.'/auth.php';
