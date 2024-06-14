<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\JasaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\bookingController;
use App\Http\Controllers\CustController;
use App\Http\Controllers\RiwayatController;

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
// auth
Route::get('/', function () {
    return view('login');
})->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register-cust', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// customer
Route::get('/menu', function () {
    return view('user/home');
})->name('cust_menu');

Route::get('/edit-akun', function () {
    return view('user/editAkun');
});
Route::get('/edit-account', [CustController::class, 'editAccount'])->name('editAccount');
Route::post('/update-account', [CustController::class, 'updateAccount'])->name('updateAccount');

Route::get('/booking', function () {
    return view('user/booking');
});
Route::get('/form-booking/{id}', [bookingController::class, 'formBooking'])->name('formBooking');
Route::post('/tambah-booking/{id}', [bookingController::class, 'tambahBooking'])->name('tambahBooking');
Route::get('/pesanan-cust', [bookingController::class, 'cekPesanan'])->name('cekPesanan');

Route::get('/about', function () {
    return view('user/about');
});
Route::get('/getAbout', [AboutController::class, 'getAbout'])->name('getAbout');

// Admin
Route::get('/menu-admin', function () {
    return view('admin/daftarBooking');
})->name('admin_menu');
Route::get('/readBooking', [bookingController::class, 'read'])->name('getDaftarBooking');
Route::post('/konfirmasi-booking/{id}', [bookingController::class, 'konfirmasiBooking'])->name('konfirmasiBooking');
Route::delete('/delete-booking/{id}', [BookingController::class, 'deleteBooking'])->name('deleteBooking');


Route::get('/kelola-jasa', function () {
    return view('admin/kelolaJasa');
});
Route::get('/read', [JasaController::class, 'read'])->name('read_jasa');
Route::post('/insert', [JasaController::class, 'insert'])->name('insert_jasa');
Route::get('/update-jasa/{id}', [JasaController::class, 'edit'])->name('edit_jasa');
Route::post('/update-jasa/{id}', [JasaController::class, 'update'])->name('update_jasa');
Route::delete('/delete-jasa/{id}', [JasaController::class, 'deleteJasa'])->name('delete_jasa');

Route::get('/kelola-akun', function () {
    return view('admin/kelolaAkun');
});
Route::get('/readAkun', [CustController::class, 'read'])->name('getDaftarAkun');
Route::get('/get-customer/{id}', [CustController::class, 'getCustomerById'])->name('getCustomerById');
Route::delete('/delete-akun/{id}', [CustController::class, 'deleteAkun'])->name('deleteAkun');
Route::put('/update-customer', [CustController::class, 'updateCustomer'])->name('updateCustomer');

Route::get('/riwayat', function () {
    return view('admin/riwayat');
});
Route::get('/riwayat-transaksi', [RiwayatController::class, 'getRiwayatTransaksi'])->name('getRiwayatTransaksi');

Route::get('/about-admin', function () {
    return view('admin/about');
});
Route::post('/update-about', [AboutController::class, 'updateAbout'])->name('updateAbout');
