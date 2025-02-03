<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;


Route::get('/',[FrontendController::class,'index'])->name('front.index');
Route::get('student-login',[FrontendController::class, 'studentLogin'])->name('studentLogin');
Route::get('student-registration',[FrontendController::class, 'studentRegistration'])->name('studentregister');
Route::get('admin-login',[FrontendController::class, 'adminLogin'])->name('adminLogin');
Route::get('csit',[FrontendController::class, 'csit'])->name('csit');
Route::get('feedback',[FrontendController::class, 'feedback'])->name('feedback');
Route::get('librarian',[FrontendController::class, 'librarian'])->name('librarian');
Route::get('bca',[FrontendController::class, 'bca'])->name('bca');
Route::get('back',[FrontendController::class, 'back'])->name('back');



Route::get('login',[AuthController::class,'loginpage'])->name('loginpage');
Route::post('login',[AuthController::class,'login'])->name('login');
Route::get('logout',[AuthController::class,'logout'])->name('logout');


Route::get('/books/category/{bookCategory}', [FrontendController::class, 'showByCategory'])->name('books.by.category');



