<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AuthController;
use App\http\Controllers\admin\DashboardController;
use App\http\Controllers\admin\AdminController;
use App\http\Controllers\admin\KategoriController;
use App\http\Controllers\admin\SubKategoriController;
use App\http\Controllers\admin\produkController;
use App\http\Controllers\admin\brandController;
use App\http\Controllers\admin\colorController;
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
Route::get('admin', [AuthController::class, 'login_admin']); 
Route::post('admin', [AuthController::class, 'auth_login_admin']);
Route::post('admin/logout', [AuthController::class, 'logout_admin']);

route::group(['middleware' => 'admin'], function () {
    
    
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('admin/admin/list', [adminController::class, 'list']);
    Route::get('admin/admin/add', [adminController::class, 'create']);
    Route::post('admin/admin/add', [adminController::class, 'store']);
    Route::get('admin/admin/edit/{id}', [adminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}', [adminController::class, 'update']);
    Route::delete('admin/admin/delete/{id}', [AdminController::class, 'destroy']);
    
    Route::get('admin/kategori/list', [kategoriController::class, 'list']);
    Route::get('admin/kategori/add', [kategoriController::class, 'create']);
    Route::post('admin/kategori/add', [kategoriController::class, 'store']);
    Route::get('admin/kategori/edit/{id}', [kategoriController::class, 'edit']);
    Route::post('admin/kategori/edit/{id}', [kategoriController::class, 'update']);
    Route::delete('admin/kategori/delete/{id}', [kategoriController::class, 'destroy']);

    Route::get('admin/sub_kategori/list', [subkategoriController::class, 'list']);
    Route::get('admin/sub_kategori/add', [subkategoriController::class, 'create']);
    Route::post('admin/sub_kategori/add', [subkategoriController::class, 'store']);
    Route::get('admin/sub_kategori/edit/{id}', [subkategoriController::class, 'edit']);
    Route::post('admin/sub_kategori/edit/{id}', [subkategoriController::class, 'update']);
    Route::delete('admin/sub_kategori/delete/{id}', [subkategoriController::class, 'destroy']);
    Route::post('admin/get_sub_kategori', [subkategoriController::class, 'get_sub_kategori']);

    Route::get('admin/produk/list', [produkController::class, 'list']);
    Route::get('admin/produk/add', [produkController::class, 'create']);
    Route::post('admin/produk/add', [produkController::class, 'store']);
    Route::get('admin/produk/edit/{id}', [produkController::class, 'edit']);
    Route::post('admin/produk/edit/{id}', [produkController::class, 'update']);
    Route::post('admin/produk_image_sortable', [produkController::class, 'produk_image_sortable']);
    Route::get('admin/produk/image_delete/{id}', [produkController::class, 'image_delete']);
    Route::delete('admin/produk/delete/{id}', [produkController::class, 'destroy']);

    Route::get('admin/brand/list', [brandController::class, 'list']);
    Route::get('admin/brand/add', [brandController::class, 'create']);
    Route::post('admin/brand/add', [brandController::class, 'store']);
    Route::get('admin/brand/edit/{id}', [brandController::class, 'edit']);
    Route::post('admin/brand/edit/{id}', [brandController::class, 'update']);
    Route::delete('admin/brand/delete/{id}', [brandController::class, 'destroy']);

    Route::get('admin/color/list', [colorController::class, 'list']);
    Route::get('admin/color/add', [colorController::class, 'create']);
    Route::post('admin/color/add', [colorController::class, 'store']);
    Route::get('admin/color/edit/{id}', [colorController::class, 'edit']);
    Route::post('admin/color/edit/{id}', [colorController::class, 'update']);
    Route::delete('admin/color/delete/{id}', [colorController::class, 'destroy']);
    
    // Route::get('/admin/dashboard', function () {
    //     return view('admin.dashboard');
    // });
    // Route::get('/admin/admin/list', function () {
    //     $data['header_tittle'] = 'Admin';
    //     return view('admin.admin.list',$data);
    // });
});


Route::get('', function () {
    return view('frontside.index');
});






