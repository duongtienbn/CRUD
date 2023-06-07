<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\apply_department;
use App\Http\Controllers\staffController;
use Illuminate\Support\Facades\Route;


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


Route::get('/login', function () {
    return view('login.login');
});

Route::get('/testphp', function () {
    return view('login.test');
});
    
    
    Route::get('/', function () {
        return view('welcome');
        //return redirect(route('student.index'));
    });
    Route::resource('/student',StudentController::class); 
    Route::resource('/skill', SkillController::class);
    
    Route::get('/restore', [studentController::class, 'restore'])->name('STUDENT.restore')->middleware('convert_spaces');
    
    
Route::post('/getData',[StudentController::class, 'getData']);

// Route::get('/testphp', function () {
//     return view('login/test');
// });

// Route::post('/search', [StudentController::class,'seasrch'])->name('STUDENT.search');

Route::get('/skills', [StudentController::class, 'getSkills']);


Route::get('/getCountry', [CountryController::class,'index']);
Route::post('/storeCountry', [CountryController::class,'storeCountry']);
Route::post('/delCountry',[CountryController::class, 'destroy'])->name('countries.destroy');

Route::get('/getApply', [apply_department::class,'index']);
Route::post('/newApply', [apply_department::class,'store_department']);


Route::get('/getStaff', [staffController::class,'index']);
Route::post('/newStaff', [staffController::class,'storeStaff']);

Route::get('/breakpoint', function() {
    return view('workport.index');
});