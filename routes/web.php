<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route for admin (Back-end) pannel
Route::any('/admin/index',[UserController::class,'index_admin']);
Route::any('/admin/dashboard',[UserController::class,'dashboard'])->middleware('login_chk');

Route::any('/admin/add-slider',[UserController::class,'add_slider'])->middleware('login_chk');
Route::any('/admin/view-slider',[UserController::class,'view_slider'])->middleware('login_chk');
Route::any('/admin/view-slider/{id}',[UserController::class,'delete_slider'])->middleware('login_chk');
Route::any('/admin/edit-slider/{id}',[UserController::class,'edit_slider'])->middleware('login_chk');
Route::post('/admin/edit-slider/{id}',[UserController::class,'submit_edit_slider'])->middleware('login_chk');

Route::any('/admin/add-services',[UserController::class,'add_services'])->middleware('login_chk');
Route::any('/admin/view-services',[UserController::class,'view_services'])->middleware('login_chk');
Route::any('/admin/view-services/{id}',[UserController::class,'delete_services'])->middleware('login_chk');
Route::any('/admin/edit-services/{id}',[UserController::class,'edit_services'])->middleware('login_chk');
Route::post('/admin/edit-services/{id}',[UserController::class,'submit_edit_service'])->middleware('login_chk');

Route::any('/admin/add-client',[UserController::class,'add_client'])->middleware('login_chk');
Route::any('/admin/view-client',[UserController::class,'view_client'])->middleware('login_chk');
Route::any('/admin/view-client/{id}',[UserController::class,'delete_client'])->middleware('login_chk');
Route::any('/admin/edit-client/{id}',[UserController::class,'edit_client'])->middleware('login_chk');
Route::post('/admin/edit-client/{id}',[UserController::class,'submit_edit_client'])->middleware('login_chk');

Route::any('/admin/add-blog',[UserController::class,'add_blog'])->middleware('login_chk');
Route::any('/admin/view-blog',[UserController::class,'view_blog'])->middleware('login_chk');
Route::any('/admin/view-blog/{id}',[UserController::class,'delete_blog'])->middleware('login_chk');
Route::any('/admin/edit-blog/{id}',[UserController::class,'edit_blog'])->middleware('login_chk');
Route::post('/admin/edit-blog/{id}',[UserController::class,'submit_edit_blog'])->middleware('login_chk');

Route::any('/admin/add-thought',[UserController::class,'add_thought'])->middleware('login_chk');
Route::any('/admin/view-thought',[UserController::class,'view_thought'])->middleware('login_chk');
Route::any('/admin/view-thought/{id}',[UserController::class,'delete_thought'])->middleware('login_chk');
Route::any('/admin/edit-thought/{id}',[UserController::class,'edit_thought'])->middleware('login_chk');
Route::post('/admin/edit-thought/{id}',[UserController::class,'submit_edit_thought'])->middleware('login_chk');


Route::any('/admin/add-photos',[UserController::class,'add_photos'])->middleware('login_chk');
Route::any('/admin/view-photos',[UserController::class,'view_photos'])->middleware('login_chk');
Route::any('/admin/view-photos/{id}',[UserController::class,'delete_photos'])->middleware('login_chk');
Route::any('/admin/edit-photos/{id}',[UserController::class,'edit_photos'])->middleware('login_chk');
Route::post('/admin/edit-photos/{id}',[UserController::class,'submit_edit_photos'])->middleware('login_chk');

Route::any('/admin/view-contacts',[UserController::class,'view_contacts'])->middleware('login_chk');

Route::any('/admin/log-out',[UserController::class,'logout_admin']);


// Route for fround-end pannel
// Route::any('/',[UserController::class,'index']);
Route::any('/', [UserController::class, 'index'])->name('home');
Route::any('/services', [UserController::class, 'services'])->name('services');
Route::any('/clients', [UserController::class, 'clients'])->name('clients');
Route::any('/about', [UserController::class, 'about'])->name('about');
Route::any('/blog', [UserController::class, 'blog'])->name('blog');
Route::any('/blog-single', [UserController::class, 'blog_single'])->name('blog.single');
Route::any('/work-3columns', [UserController::class, 'photos'])->name('work.3columns');
Route::any('/contact', [UserController::class, 'contact'])->name('contact');