<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\InfoCartController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoreController;
use App\Models\InfoCart;
use App\Models\Store;

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

Route::get('/test', function () {
    return view('pages/custommer/detailfood');
});
Route::get('/',[UserController::class, 'getDataShowIndex'])->name('index');


// User binh thuong
Route::get('/register', function () {
    return view('pages/custommer/register');
})->name('register');
Route::get('/login', function () {
    return view('pages/custommer/login');
})->name('login');
Route::post('registerprocess', [UserController::class, 'registerUser'])->name('registerprocess');
Route::post('loginprocess', [UserController::class, 'loginUser'])->name('loginprocess');
Route::post('registerstoreprocess', [UserController::class, 'registerStore'])->name('registerstoreprocess');
Route::get('logout',[UserController::class, 'logout'])->name('logout');


// Cua hang
Route::get('/registerstore', function () {
    return view('pages/store/registerstore');
})->name('registerstore');
Route::get('/loginstore', function () {
    return view('pages/store/loginstore');
})->name('loginstore');
Route::get('/createfood', function () {
    return view('pages/store/createfood');
})->name('createfood');

Route::post('loginstoreprocess', [StoreController::class, 'loginUser'])->name('loginstoreprocess');
Route::post('getdatafood', [StoreController::class, 'getFoodById'])->name('getdatafoodbyid');
Route::get('getdatauser/id{id}', [UserController::class, 'getUserById'])->name('getdatauserbyid');

//search foods by name
Route::get('searchFoodByName', [StoreController::class, 'searchFoodByName'])->name('searchFoodByName');

//crud food trong cua hang
Route::get('dashboardstore', [StoreController::class, 'listFoods'])->name('dashboardstore');
Route::post('createfoodprocess', [StoreController::class, 'registerFood'])->name('createfoodprocess');
Route::post('updatefoodprocess', [StoreController::class, 'updateFood'])->name('updatefoodprocess');
Route::post('deletefoodprocess', [StoreController::class, 'deleteFood'])->name('deletefoodprocess');

// admin

Route::get('dashboardadmin', [AdminController::class, 'showDashboardAdmin'])->name('dashboardadmin');

// lay du lieu

Route::post('getdatastorebyid', [AdminController::class, 'getStoreById'])->name('getdatastorebyid');
Route::get('searchstorebyemail', [AdminController::class, 'searchStoreByEmail'])->name('searchstorebyemail');

//chuc nang admin trong cua hang

Route::post('updatestoreprocess', [AdminController::class, 'updateStore'])->name('updatestoreprocess');
Route::post('deletestoreprocess', [AdminController::class, 'deleteStore'])->name('deletestoreprocess');

// show detail store

Route::get('showdetailstore/id{id}',[StoreController::class,'showDetailStore'])->name('showdetailstore');

// Cart
Route::get('showCart',[CartController::class,'showCart'])->name('showCart');
Route::get('registercart/id{id}',[CartController::class,'registerCart'])->name('registercart');
Route::get('showCreateInfoCart',[CartController::class,'showCreateInfoCart'])->name('showCreateInfoCart');

//delete item in cart
Route::post('deleteitemcart', [CartController::class, 'deleteItemCart'])->name('deleteitemcart');

// Info Cart
Route::post('registerInfoCart', [InfoCartController::class, 'registerInfoCart'])->name('registerInfoCart');

// Show infocart confirmed
Route::get('showinfocartconfirm', [CartController::class, 'showInfoCartConfirmed'])->name('showinfocartconfirm');

// Show infocart done
Route::get('showinfocartdone', [CartController::class, 'showInfoCartDone'])->name('showinfocartdone');

// Get data item cart by id
Route::post('getdataitemcartbyid', [CartController::class, 'getDataItemCartById'])->name('getdataitemcartbyid');

// Update item cart 
Route::post('updateitemcart',[CartController::class, 'updateItemCart'])->name('updateitemcart');

// Get all data item info cart
Route::get('getdataiteminfocartconfirmed/id={id}', [CartController::class, 'getDataItemInfoCartConfirmed'])->name('getdataiteminfocartconfirmed');

// Get all data item info cart
Route::get('getdataiteminfocartdone/id={id}', [CartController::class, 'getDataItemInfoCartDone'])->name('getdataiteminfocartdone');

// Create cart with quantity
Route::post('createcartwithquantity', [CartController::class, 'createCartWithQuantity'])->name('createcartwithquantity');

// Get data for detail food
Route::get('getfoodbyidfordetailfood/id={id}', [StoreController::class, 'getFoodByIdForDetailFood'])->name('getfoodbyidfordetailfood');

//send mail
Route::get('send-mail', [MailController::class, 'sendMail'])->name('send-mail');