<?php
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EmployeeController;
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


Route::get('lang/{locale}', 'LocalizationController@index');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('blog', [BlogController::class, 'index']);//this is the new way to call class
Route::get('employees', [EmployeeController::class, 'index']);//this is the new way to call class
Route::view('employees','employee');
Route::post('emppost', [EmployeeController::class, 'index']);
Route::get('employeelist',[EmployeeController::class, 'employeelist']);
Route::post('update',[EmployeeController::class, 'empEdit']);
Route::get('editdata/{id}',[EmployeeController::class, 'getEmployeeDetail']);
Route::get('deletedata/{id}',[EmployeeController::class, 'deleteEmployeeDetail']);



Route::view('tourists','tourist');
Route::post('touristpost', [EmployeeController::class, 'touristpost']);


Route::group(['middleware'=>['protectedPage']],function(){
	Route::view('users','user');
	Route::view('noaccess','noaccess');
	Route::get('/', function () {
    		return view('welcome');
	});
});