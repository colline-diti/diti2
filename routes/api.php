<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\RecieptController;
use App\Http\Controllers\Api\StockTableController;
use App\Http\Controllers\Api\ResProductController;
use App\Http\Controllers\Api\ResSectionController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\ResCategoryController;
use App\Http\Controllers\Api\ItemCategoryController;
use App\Http\Controllers\Api\ResSalesTableController;
use App\Http\Controllers\Api\StockDischargeController;
use App\Http\Controllers\Api\ResProductRecieptsController;
use App\Http\Controllers\Api\ResCategoryResProductsController;
use App\Http\Controllers\Api\ItemCategoryStockTablesController;
use App\Http\Controllers\Api\ResProductResSalesTablesController;
use App\Http\Controllers\Api\StockTableStockDischargesController;
use App\Http\Controllers\Api\ResSectionStockDischargesController;

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
    });
