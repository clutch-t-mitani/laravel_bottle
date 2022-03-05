<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CreateCustomerController;
use App\Http\Controllers\EditController;
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
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    Route::controller(HomeController::class)->group (function () {
        //一覧画面表示
        Route::get('/', 'index')->name('index');
    });

    Route::controller(CreateCustomerController::class)->group (function () {
        //顧客登録画面
        Route::get('/create_customer', 'create_customer')->name('create_customer');
        //顧客登録⇨DB登録
        Route::post('/store_customer', 'store_customer')->name('store_customer');
    });

    Route::controller(EditController::class)->group (function () {
        //顧客編集画面表示
        Route::get('/edit/{id}', 'edit')->name('edit_index');
        //顧客編集画面表示
        Route::POST('/edit/update', 'update')->name('edit_update');
    });


});
require __DIR__.'/auth.php';
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
