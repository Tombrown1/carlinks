<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\ManageCarController;

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

require __DIR__.'/auth.php';
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/', [AdminController::class, 'index'])->name('welcome');
// Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
// Route::get('/add-vehicle', [AdminController::class, 'addvehicle'])->middleware(['auth'])->name('view.vehicle');
// This route Display Add Car Owner Page
Route::get('/addowner', [AdminController::class, 'show'])->middleware(['auth'])->name('add.owner');
Route::post('/add-owner', [AdminController::class, 'create'])->middleware(['auth'])->name('new.owner');

Route::get('/managecar', [ManageCarController::class, 'managecar'])->middleware(['auth'])->name('managecar');
Route::post('/admin/add-car', [ManageCarController::class, 'store'])->middleware(['auth'])->name('add.vehicle');
// Update Car info route
Route::post('/edit-car-record/{id}', [ManageCarController::class, 'update'])->middleware(['auth'])->name('edit.vehicle');
Route::get('/view-single-car/{id}', [ManageCarController::class, 'single_vehicle'])->middleware(['auth'])->name('single.vehicle');

//Manage Customer Route
Route::get('/manage-customer', [AdminController::class, 'managecustomer'])->middleware(['auth'])->name('manage.customer');
//Add Customer Route
Route::post('/add-customer', [AdminController::class, 'addcustomer'])->middleware(['auth'])->name('add.customer');

//Rent Vehicle Route
Route::post('/rent-vehicle', [RentalController::class, 'rent'])->middleware(['auth'])->name('rent.vehicle');
//Manage Rental Route
Route::get('/manage-rental', [RentalController::class, 'managerental'])->middleware(['auth'])->name('manage.rental');

//Route to view Vehicle rented 
Route::get('/vehicle-rented/{id}', [RentalController::class, 'vehicle_rented'])->middleware(['auth'])->name('vehicle.rented');




