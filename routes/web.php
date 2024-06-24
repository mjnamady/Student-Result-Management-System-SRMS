<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\ClassController;
use App\Http\Controllers\backend\SubjectController;
use App\Http\Controllers\backend\StudentController;
use App\Http\Controllers\backend\ResultController;

Route::get('/', function () {
    return view('welcome');
});

// ADMIN GROUP MIDDLEWARE....
Route::middleware('auth')->group(function(){

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
    Route::get('edit/class/{id}', 'EditClass')->name('edit.class');
    Route::post('update/class', 'UpdateClass')->name('update.class');
    Route::get('delete/class/{id}', 'DeleteClass')->name('delete.class');
}); // END CLASS ALL ROUTES

// SUBJECT ALL ROUTES
Route::controller(SubjectController::class)->group(function(){
    Route::get('create/subject', 'CreateSubject')->name('create.subject');
    Route::post('store/subject', 'StoreSubject')->name('store.subject');
    Route::get('manage/subjects', 'ManageSubject')->name('manage.subjects');
    Route::get('edit/subject/{id}', 'EditSubject')->name('edit.subject');
    Route::post('update/subject', 'UpdateSubject')->name('update.subject');
    Route::get('delete/subject/{id}', 'DeleteSubject')->name('delete.subject');

    Route::get('add/subject/combination', 'AddSubjectCombination')->name('add.subject.combination');
    Route::post('store/subject/combination', 'StoreSubjectCombination')->name('store.subject.combination');
    Route::get('manage/subject/combination', 'ManageSubjectCombination')->name('manage.subject.combination');
    Route::get('deactivate/subject/combination/{id}', 'DeactivateSubjectCombination')->name('deactivate.subject.combination');
}); // END SUBJECT ALL ROUTES

// STUDENT'S ALL ROUTES
Route::controller(StudentController::class)->group(function(){
    Route::get('add/student', 'AddStudent')->name('add.student');
    Route::post('store/student', 'StoreStudent')->name('store.student');
    Route::get('manage/student', 'ManageStudent')->name('manage.student');
    Route::get('edit/student/{id}', 'EditStudent')->name('edit.student');
    Route::post('update/student', 'UpdateStudent')->name('update.student');
    Route::get('delete/student/{id}', 'DeleteStudent')->name('delete.student');
}); 


// RESULT'S ALL ROUTES
Route::controller(ResultController::class)->group(function(){
    Route::get('add/result', 'AddResult')->name('add.result');
    Route::post('store/result', 'StoreResult')->name('store.result');
    Route::get('manage/result', 'ManageResult')->name('manage.result');
    Route::get('edit/result/{id}', 'EditResult')->name('edit.result');
    Route::post('update/result', 'UpdateResult')->name('update.result');
    Route::get('delete/result/{id}', 'DeleteResult')->name('delete.result');
    Route::get('view/result/{id}', 'ViewResult')->name('view.result');

    // ajax request routes
    Route::get('fetch/student', 'FetchStudent')->name('fetch.student');
    Route::get('check/student/result', 'CheckStudentResult')->name('check.student.result');
  
}); 


});
// END ADMIN GROUP MIDDLEWARE....

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





require __DIR__.'/auth.php';
