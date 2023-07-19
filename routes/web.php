<?php

use App\Http\Controllers\aboutUsController;
use App\Http\Controllers\contactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PartServicesController;
use App\Http\Controllers\ServicesController;
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

Route::get('/', function () {
    return view('pages/welcome');
});
Route::get('/dashboard', function () {
    return view('pages/dashboard');
});


################################################Home################################################
Route::group(['prefix' => 'home'], function () {
    Route::post('/insert', [HomeController::class, 'Insert'])->name('home.content.insert');
    Route::get('/home', [HomeController::class, 'home'])->name('home.content.home');
    Route::get('/tableHome', [HomeController::class, 'tableHome'])->name('home.content.tableHome');
    Route::get('/delete/{id}', [HomeController::class, 'Delete'])->name('home.content.delete');
    Route::get('/delete/all/truncate', [HomeController::class, 'DeleteAllTruncate'])->name('home.content.delete.all.truncate');
});
################################################End Home############################################

########################################Contact Us############################################
Route::group(['prefix' => 'admin'], function () {
    Route::get('/contact-us', [contactUsController::class, 'index'])->name('admin.contact.index');
    Route::post('/insert', [contactUsController::class, 'Insert'])->name('admin.contact.insert');
    Route::get('/tableContactUs', [contactUsController::class, 'tableContactUs'])->name('admin.contact.tableContactUs');
    Route::get('/delete/all', [contactUsController::class, 'DeleteAll'])->name('admin.contact.delete.all');
});
Route::controller(contactUsController::class)->group(function () {
    Route::get('pages/delete/{id}', 'Delete')->name('pages.delete');
    Route::get('page/delete/all/truncate', 'DeleteAllTruncate')->name('page.delete.all.truncate');
});
#########################################End Contact Us#######################################

########################################About Us##############################################
Route::group(['prefix' => 'aboutUs'], function () {
    Route::post('/about-us', [aboutUsController::class, 'add'])->name('aboutUs.about.add');
    Route::get('/about', [aboutUsController::class, 'about'])->name('aboutUs.about.about');
    Route::get('/tableAbouttUs', [aboutUsController::class, 'tableAbouttUs'])->name('aboutUs.about.tableAbouttUs');
    Route::get('/delete/{id}', [aboutUsController::class, 'Delete'])->name('aboutUs.about.Delete');
    Route::get('/edit/{id}', [aboutUsController::class, 'Edit'])->name('aboutUs.about.Edit');
    Route::put('/update/{id}', [aboutUsController::class, 'Update'])->name('aboutUs.about.Update');
    Route::get('/delete/all/truncate', [aboutUsController::class, 'DeleteAllTruncate'])->name('aboutUs.about.delete.all.truncate');
});
##################################################End About Us#################################

##################################################services#######################################
Route::group(['prefix' => 'service'], function () {
    Route::post('/store', [ServicesController::class, 'store'])->name('service.services.store');
    Route::get('/create', [ServicesController::class, 'create'])->name('service.services.create');
    Route::get('/services', [ServicesController::class, 'start'])->name('service.services.start');
    Route::get('/tableServices', [ServicesController::class, 'index'])->name('service.services.tableServices');
    Route::get('/delete/all/truncate', [ServicesController::class, 'DeleteAllTruncate'])->name('service.services.delete.all.truncate');
    Route::get('/delete/{id}', [ServicesController::class, 'Delete'])->name('service.services.Delete');
    Route::get('/edit/{id}', [ServicesController::class, 'Edit'])->name('service.services.Edit');
    Route::put('/update/{id}', [ServicesController::class, 'Update'])->name('service.services.Update');
});
##################################################End services#######################################


################################################## Dashboard #######################################
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/dashboardHome', [LinkController::class, 'index'])->name('dashboard.link.index');
    Route::post('/dashboard', [LinkController::class, 'add'])->name('dashboard.link.add');
    Route::get('/tableLink', [LinkController::class, 'tableLink'])->name('dashboard.link.tableLink');
    Route::get('/delete/{id}', [LinkController::class, 'Delete'])->name('dashboard.link.Delete');
    Route::get('/edit/{id}', [LinkController::class, 'Edit'])->name('dashboard.link.Edit');
    Route::put('/update/{id}', [LinkController::class, 'Update'])->name('dashboard.link.Update');
    Route::get('/delete/all/truncate', [LinkController::class, 'DeleteAllTruncate'])->name('dashboard.link.delete.all.truncate');
});

################################################## End Dashboard #######################################
