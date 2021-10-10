<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\H_Doctors\DoctorController;
use App\Http\Controllers\H_Nurses\NursersController;
use App\Http\Controllers\H_Employes\EmployesController;
use App\Http\Controllers\Admins\AdminsController;
use App\Http\Controllers\H_Departments\DepartmentsController;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


###############################DoctorsRoute##############################
Route::group(
	[
		'middleware' => ['auth:doctors']
	], function(){
		Route::get('/dashboard/doctors', function () {
			return view('pages.backend.h_doctors.dashboard');
		})->name('dashboard.doctors');
       Route::resource('doctors',DoctorController::class);

	});

###############################NursesRoute##############################
Route::group(
	[
		'middleware' => ['auth:nurses']
	], function(){
		Route::get('/dashboard/nurses', function () {
			return view('pages.backend.h_nurses.dashboard');
		})->name('dashboard.nurses');

		Route::resource('nurses',NursersController::class);

	});
	
###############################EmployesRoute##############################
Route::group(
	[
		'middleware' => ['auth:employes']
	], function(){
		Route::get('/dashboard/employes', function () {
			return view('pages.backend.h_employes.dashboard');
		})->name('dashboard.employes');
		Route::resource('employes',EmployesController::class);

	});
	
###############################AdminsRoute##############################
Route::group(
	[
		'middleware' => ['auth:admins']
	], function(){

		Route::get('/dashboard/admins', function () {
			return view('pages.backend.admins.dashboard');
		})->name('dashboard.admins');
        Route::resource('admins',AdminsController::class);
		
		###################################Depatments################################
		Route::group(['namespace'=>'H_Departments'],function(){
			Route::get('showdepartments',[DepartmentsController::class,'index'])->name('showdepartments');
			Route::post('storedepartments',[DepartmentsController::class,'store'])->name('storedepartments');
			Route::get('editdepatment/{id}',[DepartmentsController::class,'edit'])->name('editdepatment');
			Route::patch('updatedepatment',[DepartmentsController::class,'update'])->name('updatedepatment');
			Route::get('deletedepatment/{id}',[DepartmentsController::class,'destroy'])->name('deletedepatment');

			
		});
	###################################Nurses################################
	Route::group(['namespace'=>'H_Nurses'],function(){
		Route::get('showNurses',[NursersController::class,'index'])->name('showNurses');
		Route::post('storenurses',[NursersController::class,'store'])->name('storenurses');
		Route::get('editnurses/{id}',[NursersController::class,'edit'])->name('editnurses');
		// Route::patch('updatenurses',[NursersController::class,'update'])->name('updatenurses');
		Route::patch('updatenurses',[NursersController::class,'update'])->name('updatenurses');

		Route::get('deletenurses/{id}',[NursersController::class,'destroy'])->name('deletenurses');

	});

	##################################Employess################################
	Route::group(['namespace'=>'H_Employes'],function(){
		Route::get('showemployes',[EmployesController::class,'index'])->name('showemployes');
		Route::post('storeemployes',[EmployesController::class,'store'])->name('storeemployes');
		Route::get('deleteemployes/{id}',[EmployesController::class,'destroy'])->name('deleteemployes');
		Route::get('editemployes/{id}',[EmployesController::class,'edit'])->name('editemployes');
		Route::patch('updateemployes',[EmployesController::class,'update'])->name('updateemployes');

		
	});

		// Route::resource('departments/{$id ??}',DepartmentsController::class);
	});
	#######################################EndAdminRoutes############################

require __DIR__.'/auth.php';
