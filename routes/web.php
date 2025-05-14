<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DenyController;
use App\Http\Controllers\FlowersController;
use App\Http\Controllers\FlowerTypesController;
use App\Http\Controllers\FrontEnd\FE_HomeController;
use App\Http\Controllers\ProductTypesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\UsersController;


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

Route::middleware(['check.session', 'check.menuAccess'])->group(function () {

    // DASHBOARD ROUTES
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/jsonAllPart', [DashboardController::class, 'jsonAllPart']);
    Route::get('/jsonAllSupplier', [DashboardController::class, 'jsonAllSupplier']);
    Route::get('/jsonTableStock', [DashboardController::class, 'jsonTableStock']);
    Route::get('/jsonStockPart', [DashboardController::class, 'jsonStockPart']);
    Route::get('/jsonGraphStockPart', [DashboardController::class, 'jsonGraphStockPart']);



    // ROLES ROUTES
    Route::get('/roles', [RolesController::class, 'index']);
    Route::get('/jsonRole', [RolesController::class, 'jsonRole']);
    Route::get('/jsonDetailListMenu', [RolesController::class, 'jsonDetailListMenu']);
    Route::post('/jsonCrudRoles', [RolesController::class, 'jsonCrudRoles']);


    // USERS ROUTES 
    Route::get('/users', [UsersController::class, 'index']);
    Route::get('/jsonUsers', [UsersController::class, 'jsonUsers']);
    Route::get('/decryptPassword', [UsersController::class, 'decryptPassword']);
    Route::post('/jsonCrudUser', [UsersController::class, 'jsonCrudUser']);
    Route::get('/jsonListRoles', [UsersController::class, 'jsonListRoles']);
    Route::get('/jsonDetailListUserMenu', [UsersController::class, 'jsonDetailListUserMenu']);



    // FLOWERS MASTER 
    Route::get('/flower', [FlowersController::class, 'index']);
    Route::get('/flowerJson', [FlowersController::class, 'jsonFlowersList']);
    Route::get('/flowerJsonDetail/{id}', [FlowersController::class, 'jsonDetail']);
    Route::post('/jsonCrudFlower', [FlowersController::class, 'jsonCrudFlowers']);
    Route::get('/categories/search', [FlowersController::class, 'searchCategory']);
    Route::post('/categories/store', [FlowersController::class, 'storeCategory']);
    Route::delete('/categories/{id}', [FlowersController::class, 'destroyCategory']);


    // FLOWERS TYPE 
    Route::get('/flowerTypes', [FlowerTypesController::class, 'index']);
    Route::get('/flowerTypes/jsonDataTableList', [FlowerTypesController::class, 'jsonDataTableList']);
    Route::get('/flowerTypes/jsonDetail/{id}', [FlowerTypesController::class, 'jsonDetail']);
    Route::post('/flowerTypes/jsonCrud', [FlowerTypesController::class, 'jsonCrud']);

    // PRODUCT TYPE 
    Route::get('/productTypes', [ProductTypesController::class, 'index']);
    Route::get('/productTypes/jsonDataTableList', [ProductTypesController::class, 'jsonDataTableList']);
    Route::get('/productTypes/jsonDetail/{id}', [ProductTypesController::class, 'jsonDetail']);
    Route::post('/productTypes/jsonCrud', [ProductTypesController::class, 'jsonCrud']);


    // PRODUCT 
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/product/jsonDataTableList', [ProductController::class, 'jsonDataTableList']);
    Route::get('/product/jsonDetail/{id}', [ProductController::class, 'jsonDetail']);
    Route::get('/product/jsonDetailPrice/{id}', [ProductController::class, 'jsonDetailPrice']);
    Route::get('/product/jsonDataTableListPrice', [ProductController::class, 'jsonDataTablePriceList']);
    Route::post('/product/jsonCrud', [ProductController::class, 'jsonCrud']);
    Route::post('/product/jsonCrudPrice', [ProductController::class, 'jsonCrudPrice']);
    Route::get('/product/jsonListPrice', [ProductController::class, 'jsonListPrice']);
    Route::post('/product/jsonCrudCatalog', [ProductController::class, 'jsonCrudCatalog']);
    Route::get('/product/jsonGallery', [ProductController::class, 'jsonGallery']);



    // SHIPPING
    Route::get('/shipping', [ShippingController::class, 'index']);
    Route::get('/shipping/jsonDataTableList', [ShippingController::class, 'jsonDataTableList']);
    Route::get('/shipping/jsonDetail/{id}', [ShippingController::class, 'jsonDetail']);
    Route::post('/shipping/jsonCrud', [ShippingController::class, 'jsonCrud']);

    //ORDER
    Route::get('/order', [OrderController::class, 'index']);
    Route::get('/order/jsonDataTableList', [OrderController::class, 'jsonDataTableList']);
});


Route::middleware('check.sessionLogin')->prefix('/')->group(function () {
    Route::get('/login', [AuthController::class, 'index']);
});




Route::get('/deny', [DenyController::class, 'index'])->middleware('check.session');
Route::post('/auth', [AuthController::class, 'Auth']);
Route::get('/logout', [LogoutController::class, 'index']);





// FRONT END ROUTES
Route::get('/', [FE_HomeController::class, 'index']);
Route::get('/contact', [FE_HomeController::class, 'contact']);
Route::get('/login', [FE_HomeController::class, 'login']);
Route::get('/register', [FE_HomeController::class, 'register']);
Route::get('/about', [FE_HomeController::class, 'about']);
Route::get('/faq', [FE_HomeController::class, 'faq']);
Route::get('/myaccount', [FE_HomeController::class, 'myaccount']);
Route::get('/cart', [FE_HomeController::class, 'cart']);
Route::get('/checkout', [FE_HomeController::class, 'checkout']);
Route::get('/shop', [FE_HomeController::class, 'shop']);
