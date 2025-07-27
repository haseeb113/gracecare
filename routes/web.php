<?php
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\AuthController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\InvoiceController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard/admin', function () {
        return view('dashboards.admin');
    })->name('dashboard.admin');

    Route::get('/dashboard/doctor', function () {
        return view('dashboards.doctor');
    })->name('dashboard.doctor');

    Route::get('/dashboard/receptionist', function () {
        return view('dashboards.receptionist');
    })->name('dashboard.receptionist');
});

Route::middleware(['auth', 'canAccessPatient'])->group(function () {
    Route::resource('patients', PatientController::class);
});
Route::get('/logout', function () {
    auth()->logout();
    return redirect('/login')->with('success', 'Logged out successfully.');
})->name('logout');
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('doctors', DoctorController::class);
});
Route::middleware(['auth','canAppoint'])->group(function(){
    Route::resource('appointments', AppointmentController::class);
});
Route::middleware(['auth','isDoctor'])->group(function(){
    Route::resource('prescriptions', PrescriptionController::class);
});


Route::middleware(['auth','canBill'])->group(function(){
    Route::resource('invoices', InvoiceController::class);
});