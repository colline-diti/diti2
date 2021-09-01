<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RecieptController;
use App\Http\Controllers\ResProductController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ResCategoryController;
use App\Http\Controllers\ResSalesTableController;

//image upload
use App\Http\Controllers\ImageUploadController;



//Business Procurement 
use App\Http\Controllers\PaymentTypesController;
use App\Http\Controllers\TaxRatesController;
use App\Http\Controllers\RestaurantRequisitionController;
use App\Http\Controllers\RequisitionItemController;
//use App\Http\Controllers\RequisitionDeliveryController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoicesController;

//For Inventory Management
use App\Http\Controllers\UnitController;
use App\Http\Controllers\StockTableController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\ResSectionController;
use App\Http\Controllers\StockDischargeController;
use App\Http\Controllers\Available_stockController;


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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/cafeDashboard', [HomeController::class, 'cafeDashboard'])->name('cafeDashboard');
Route::get('/userDashboard', [HomeController::class, 'userDashboard'])->name('userDashboard');



Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('users', UserController::class);
        Route::resource('stock-tables', StockTableController::class);
        Route::post('store-stock', [StockTableController::class, 'insert']);
        Route::post('store-item', [ItemCategoryController::class, 'insert']);
        Route::post('store-category', [ItemCategoryController::class, 'newCategory']);
        Route::post(' store-department', [ItemCategoryController::class, 'newDepartment']);       
        Route::post('store-unit', [ItemCategoryController::class, 'newUnit']);
        Route::post('store-discharge', [StockTableController::class, 'discharge']);
        Route::post('edit-stockItem', [StockTableController::class, 'editStockItem']);
        Route::resource('res-sales-tables', ResSalesTableController::class);
        Route::get('exports', [Available_stockController::class, 'export']);

        //custom routes
        Route::post('/res-products/pointOfsale', [ResProductController::class, 'pointOfsale'])->name('res-products.pointOfsale');
        Route::get('/res-products/dailyLogs', [ResProductController::class, 'dailyLogs'])->name('res-products.dailyLogs');
        Route::resource('res-products', ResProductController::class);
        Route::resource('res-sections', ResSectionController::class);

        // ImageUploadController Route
        Route::get("image-upload",[ImageUploadController::class,'img_upload'])->name("img.upload");
        Route::post("imgstore",[ImageUploadController::class,'imagestore'])->name("img.store");

        Route::get('/stock-discharges/stockLevels', [StockDischargeController::class, 'stockLevels'])->name('stock-discharges.stockLevels');
        Route::resource('stock-discharges', StockDischargeController::class);
        Route::resource('res-categories', ResCategoryController::class);

        Route::resource('reciepts', RecieptController::class);
        Route::post('store-form', [RecieptController::class, 'insert']);

        Route::get('/item-categories/departments', [ItemCategoryController::class, 'departments'])->name('item-categories.departments');
        Route::get('/item-categories/units', [ItemCategoryController::class, 'units'])->name('item-categories.units');
        Route::get('/item-categories/categories', [ItemCategoryController::class, 'categories'])->name('item-categories.categories');
        Route::resource('item-categories', ItemCategoryController::class);

        Route::resource('all-payment-types', PaymentTypesController::class);
        Route::resource('all-tax-rates', TaxRatesController::class);
        Route::resource('restaurant-requisitions', RestaurantRequisitionController::class);
        Route::resource('requisition-items', RequisitionItemController::class);
        //Route::resource('requisition-deliveries', RequisitionDeliveryController::class);
        Route::resource('units', UnitController::class);
        Route::resource('all-clients', ClientsController::class);

        Route::resource('products', ProductController::class);
        Route::resource('all-invoices', InvoicesController::class);
    });
