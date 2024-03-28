<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\FilterController;
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

require __DIR__.'/auth.php';
//Admin Dashbord route
Route::namespace('App\Http\Controllers\Admin')->prefix('/admin')->group(function(){
    Route::match(['get','post'],'login','AdminController@login');
    Route::group(['middleware'=>['admin']],function(){
        Route::get('dashboard','AdminController@dashboard');
        Route::get('logout','AdminController@logout');
        Route::match(['get','post'],'update-admin-password','AdminController@updateAdminPassword');
        Route::match(['get','post'],'update-admin-details','AdminController@updateAdmindetails');
        Route::post('check-current-password','AdminController@checkCurrentPassword');
        Route::match(['get','post'],'update-vendor-details/{slug}','AdminController@updateVendordetails'); //..v18
        Route::get('admins/{type?}','AdminController@admins');  //..........admin/subadmin/vendor url..........v21
        Route::post('update-admin-status','AdminController@updateAdminStatus');  //.........admin_status.......v22
        Route::match(['get','post'],'view-vendor-details/{id}','AdminController@vVd');  //.....admin_status....v22
        //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>Section<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        Route::get('section','SectionController@section');                             //......................v26
        Route::post('update-section-status','SectionController@updateSectionStatus'); //........section_status.v22
        Route::match(['get','post'],'add-edit-section/{id?}','SectionController@addEditSection'); //  .........v27
        Route::get('delete-section/{id}','SectionController@deleteSection');           //......................v28
        //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>Category<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        Route::get('category','CategoryController@category');  
        Route::post('update-category-status','CategoryController@updateCategoryStatus'); //.....section_status.v31
        Route::get('delete-category/{id}','CategoryController@deleteCategory');           //...................v28
        Route::match(['get','post'],'add-edit-category/{id?}','CategoryController@addEditCategory'); //........v32
        Route::post('append-categories-level','CategoryController@appendCategoriesLevel');  //.................v32
        //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>Course<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        Route::get('courses',[CourseController::class,'view_course'])->name('course.views'); 
        Route::any('add-edit-course/{id?}',[CourseController::class,'add_edit_course'])->name('addEdit.course');
        Route::post('update-course-status',[CourseController::class,'updateCourseStatus'])->name('course.status'); 
        Route::get('delete-course/{id}',[CourseController::class,'deleteStatus'])->name('course.delete');
        //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>Filter<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        Route::get('filter',[FilterController::class,'filters'])->name('filter.views');
        Route::any('add-edit-filter/{id?}',[FilterController::class,'add_edit_filter'])->name('addEdit.filter');
        Route::post('update-filter-status',[FilterController::class,'updatefilterStatus'])->name('filter.status'); 
        Route::get('delete-filter/{id}',[FilterController::class,'deleteStatus'])->name('filter.delete');
        //filter value................
        Route::get('filters-Value',[FilterController::class,'filtersValues'])->name('filtersValues.views');
        Route::any('add-edit-filters-Value/{id?}',[FilterController::class,'add_edit_filter_value'])->name('addEdit.filtersValue');
        Route::post('update-filters-Value-status',[FilterController::class,'updatefilterValueStatus'])->name('filtersValue.status'); 
        Route::get('delete-filtersValue/{id}',[FilterController::class,'deleteStatus'])->name('filtersValue.delete');
        //........filter lode file v-74
        Route::post('category-filters',[FilterController::class,'lodeFilter'])->name('category.filter'); 
    });
});