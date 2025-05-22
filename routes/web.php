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
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);
    Route::get('/admin/jsonAllPart', [DashboardController::class, 'jsonAllPart']);
    Route::get('/admin/jsonAllSupplier', [DashboardController::class, 'jsonAllSupplier']);
    Route::get('/admin/jsonTableStock', [DashboardController::class, 'jsonTableStock']);
    Route::get('/admin/jsonStockPart', [DashboardController::class, 'jsonStockPart']);
    Route::get('/admin/jsonGraphStockPart', [DashboardController::class, 'jsonGraphStockPart']);



    // ROLES ROUTES
    Route::get('/admin/roles', [RolesController::class, 'index']);
    Route::get('/admin/jsonRole', [RolesController::class, 'jsonRole']);
    Route::get('/admin/jsonDetailListMenu', [RolesController::class, 'jsonDetailListMenu']);
    Route::post('/admin/jsonCrudRoles', [RolesController::class, 'jsonCrudRoles']);


    // USERS ROUTES 
    Route::get('/admin/users', [UsersController::class, 'index']);
    Route::get('/admin/jsonUsers', [UsersController::class, 'jsonUsers']);
    Route::get('/admin/decryptPassword', [UsersController::class, 'decryptPassword']);
    Route::post('/admin/jsonCrudUser', [UsersController::class, 'jsonCrudUser']);
    Route::get('/admin/jsonListRoles', [UsersController::class, 'jsonListRoles']);
    Route::get('/admin/jsonDetailListUserMenu', [UsersController::class, 'jsonDetailListUserMenu']);



    // FLOWERS MASTER 
    Route::get('/admin/flower', [FlowersController::class, 'index']);
    Route::get('/admin/flowerJson', [FlowersController::class, 'jsonFlowersList']);
    Route::get('/admin/flowerJsonDetail/{id}', [FlowersController::class, 'jsonDetail']);
    Route::post('/admin/jsonCrudFlower', [FlowersController::class, 'jsonCrudFlowers']);
    Route::get('/admin/categories/search', [FlowersController::class, 'searchCategory']);
    Route::post('/categories/store', [FlowersController::class, 'storeCategory']);
    Route::delete('/admin/categories/{id}', [FlowersController::class, 'destroyCategory']);


    // FLOWERS TYPE 
    Route::get('/admin/flowerTypes', [FlowerTypesController::class, 'index']);
    Route::get('/admin/flowerTypes/jsonDataTableList', [FlowerTypesController::class, 'jsonDataTableList']);
    Route::get('/admin/flowerTypes/jsonDetail/{id}', [FlowerTypesController::class, 'jsonDetail']);
    Route::post('/admin/flowerTypes/jsonCrud', [FlowerTypesController::class, 'jsonCrud']);

    // PRODUCT TYPE 
    Route::get('/admin/productTypes', [ProductTypesController::class, 'index']);
    Route::get('/admin/productTypes/jsonDataTableList', [ProductTypesController::class, 'jsonDataTableList']);
    Route::get('/admin/productTypes/jsonDetail/{id}', [ProductTypesController::class, 'jsonDetail']);
    Route::post('/admin/productTypes/jsonCrud', [ProductTypesController::class, 'jsonCrud']);


    // PRODUCT 
    Route::get('/admin/product', [ProductController::class, 'index']);
    Route::get('/admin/product/jsonDataTableList', [ProductController::class, 'jsonDataTableList']);
    Route::get('/admin/product/jsonDetail/{id}', [ProductController::class, 'jsonDetail']);
    Route::get('/admin/product/jsonDetailPrice/{id}', [ProductController::class, 'jsonDetailPrice']);
    Route::get('/admin/product/jsonDataTableListPrice', [ProductController::class, 'jsonDataTablePriceList']);
    Route::post('/admin/product/jsonCrud', [ProductController::class, 'jsonCrud']);
    Route::post('/admin/product/jsonCrudPrice', [ProductController::class, 'jsonCrudPrice']);
    Route::get('/admin/product/jsonListPrice', [ProductController::class, 'jsonListPrice']);
    Route::post('/admin/product/jsonCrudCatalog', [ProductController::class, 'jsonCrudCatalog']);
    Route::get('/admin/product/jsonGallery', [ProductController::class, 'jsonGallery']);



    // SHIPPING
    Route::get('/admin/shipping', [ShippingController::class, 'index']);
    Route::get('/admin/shipping/jsonDataTableList', [ShippingController::class, 'jsonDataTableList']);
    Route::get('/admin/shipping/jsonDetail/{id}', [ShippingController::class, 'jsonDetail']);
    Route::post('/admin/shipping/jsonCrud', [ShippingController::class, 'jsonCrud']);

    //ORDER
    Route::get('/admin/order', [OrderController::class, 'index']);
    Route::get('/admin/order/jsonDataTableList', [OrderController::class, 'jsonDataTableList']);
});


Route::middleware('check.sessionLogin')->prefix('/')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'index']);
});




Route::get('/deny', [DenyController::class, 'index'])->middleware('check.session');
Route::post('/auth', [AuthController::class, 'Auth']);
Route::get('/admin/logout', [LogoutController::class, 'index']);





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
Route::get('/get-products', [FE_HomeController::class, 'getProducts'])->name('get.products');
Route::get('/recent-products', [FE_HomeController::class, 'recentProduct']);
Route::get('/detail-products', [FE_HomeController::class, 'productDetail']);
Route::post('/cart/add', [FE_HomeController::class, 'addToCart']);
Route::get('/cart/get', [FE_HomeController::class, 'getCart']);
Route::get('/cart/clear', [FE_HomeController::class, 'clearCart']);
Route::post('/cart/remove', [FE_HomeController::class, 'removeFromCart']);
Route::post('/cart/update', [FE_HomeController::class, 'updateCart']);
