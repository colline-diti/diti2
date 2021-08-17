<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SaleController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\RecieptController;
use App\Http\Controllers\Api\ClientsController;
use App\Http\Controllers\Api\TaxRatesController;
use App\Http\Controllers\Api\PettyCashController;
use App\Http\Controllers\Api\StockTableController;
use App\Http\Controllers\Api\ResProductController;
use App\Http\Controllers\Api\ResSectionController;
use App\Http\Controllers\Api\AssetTypesController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\ResCategoryController;
use App\Http\Controllers\Api\ItemCategoryController;
use App\Http\Controllers\Api\ClientsSalesController;
use App\Http\Controllers\Api\PaymentTypesController;
use App\Http\Controllers\Api\ResSalesTableController;
use App\Http\Controllers\Api\StockDischargeController;
use App\Http\Controllers\Api\AssetsAccountsController;
use App\Http\Controllers\Api\Expeses_ResturantController;
use App\Http\Controllers\Api\PaymentTypesSalesController;
use App\Http\Controllers\Api\ResProductRecieptsController;
use App\Http\Controllers\Api\RestaurantRequisitionController;
use App\Http\Controllers\Api\ResCategoryResProductsController;
use App\Http\Controllers\Api\ItemCategoryStockTablesController;
use App\Http\Controllers\Api\ResProductResSalesTablesController;
use App\Http\Controllers\Api\StockTableStockDischargesController;
use App\Http\Controllers\Api\ResSectionStockDischargesController;
use App\Http\Controllers\Api\AssetTypesAllAssetsAccountsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource('users', UserController::class);

        Route::apiResource('stock-tables', StockTableController::class);

        // StockTable Stock Discharges
        Route::get('/stock-tables/{stockTable}/stock-discharges', [
            StockTableStockDischargesController::class,
            'index',
        ])->name('stock-tables.stock-discharges.index');
        Route::post('/stock-tables/{stockTable}/stock-discharges', [
            StockTableStockDischargesController::class,
            'store',
        ])->name('stock-tables.stock-discharges.store');

        Route::apiResource('res-sales-tables', ResSalesTableController::class);

        Route::apiResource('res-products', ResProductController::class);

        // ResProduct Res Sales Tables
        Route::get('/res-products/{resProduct}/res-sales-tables', [
            ResProductResSalesTablesController::class,
            'index',
        ])->name('res-products.res-sales-tables.index');
        Route::post('/res-products/{resProduct}/res-sales-tables', [
            ResProductResSalesTablesController::class,
            'store',
        ])->name('res-products.res-sales-tables.store');

        // ResProduct Reciepts
        Route::get('/res-products/{resProduct}/reciepts', [
            ResProductRecieptsController::class,
            'index',
        ])->name('res-products.reciepts.index');
        Route::post('/res-products/{resProduct}/reciepts', [
            ResProductRecieptsController::class,
            'store',
        ])->name('res-products.reciepts.store');

        Route::apiResource('res-sections', ResSectionController::class);

        // ResSection Stock Discharges
        Route::get('/res-sections/{resSection}/stock-discharges', [
            ResSectionStockDischargesController::class,
            'index',
        ])->name('res-sections.stock-discharges.index');
        Route::post('/res-sections/{resSection}/stock-discharges', [
            ResSectionStockDischargesController::class,
            'store',
        ])->name('res-sections.stock-discharges.store');

        Route::apiResource('stock-discharges', StockDischargeController::class);

        Route::apiResource('res-categories', ResCategoryController::class);

        // ResCategory Res Products
        Route::get('/res-categories/{resCategory}/res-products', [
            ResCategoryResProductsController::class,
            'index',
        ])->name('res-categories.res-products.index');
        Route::post('/res-categories/{resCategory}/res-products', [
            ResCategoryResProductsController::class,
            'store',
        ])->name('res-categories.res-products.store');

        Route::apiResource('reciepts', RecieptController::class);

        Route::apiResource('item-categories', ItemCategoryController::class);

        // ItemCategory Stock Tables
        Route::get('/item-categories/{itemCategory}/stock-tables', [
            ItemCategoryStockTablesController::class,
            'index',
        ])->name('item-categories.stock-tables.index');
        Route::post('/item-categories/{itemCategory}/stock-tables', [
            ItemCategoryStockTablesController::class,
            'store',
        ])->name('item-categories.stock-tables.store');

        Route::apiResource('all-tax-rates', TaxRatesController::class);

        Route::apiResource(
            'restaurant-requisitions',
            RestaurantRequisitionController::class
        );

        Route::apiResource('petty-cashes', PettyCashController::class);

        Route::apiResource(
            'expeses-resturants',
            Expeses_ResturantController::class
        );

        Route::apiResource('sales', SaleController::class);

        Route::apiResource('all-clients', ClientsController::class);

        // Clients Sales
        Route::get('/all-clients/{clients}/sales', [
            ClientsSalesController::class,
            'index',
        ])->name('all-clients.sales.index');
        Route::post('/all-clients/{clients}/sales', [
            ClientsSalesController::class,
            'store',
        ])->name('all-clients.sales.store');

        Route::apiResource('all-payment-types', PaymentTypesController::class);

        // PaymentTypes Sales
        Route::get('/all-payment-types/{paymentTypes}/sales', [
            PaymentTypesSalesController::class,
            'index',
        ])->name('all-payment-types.sales.index');
        Route::post('/all-payment-types/{paymentTypes}/sales', [
            PaymentTypesSalesController::class,
            'store',
        ])->name('all-payment-types.sales.store');

        Route::apiResource(
            'all-assets-accounts',
            AssetsAccountsController::class
        );

        Route::apiResource('all-asset-types', AssetTypesController::class);

        // AssetTypes All Assets Accounts
        Route::get('/all-asset-types/{assetTypes}/all-assets-accounts', [
            AssetTypesAllAssetsAccountsController::class,
            'index',
        ])->name('all-asset-types.all-assets-accounts.index');
        Route::post('/all-asset-types/{assetTypes}/all-assets-accounts', [
            AssetTypesAllAssetsAccountsController::class,
            'store',
        ])->name('all-asset-types.all-assets-accounts.store');
    });
