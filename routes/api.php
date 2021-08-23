<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UnitController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\RecieptController;
use App\Http\Controllers\Api\ClientsController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\InvoicesController;
use App\Http\Controllers\Api\TaxRatesController;
use App\Http\Controllers\Api\PettyCashController;
use App\Http\Controllers\Api\ResProductController;
use App\Http\Controllers\Api\AssetTypesController;
use App\Http\Controllers\Api\StockTableController;
use App\Http\Controllers\Api\ResSectionController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\ResCategoryController;
use App\Http\Controllers\Api\PaymentTypesController;
use App\Http\Controllers\Api\ItemCategoryController;
use App\Http\Controllers\Api\ResSalesTableController;
use App\Http\Controllers\Api\AssetsAccountsController;
use App\Http\Controllers\Api\StockDischargeController;
use App\Http\Controllers\Api\RequisitionItemController;
use App\Http\Controllers\Api\UnitStockTablesController;
use App\Http\Controllers\Api\Expeses_ResturantController;
use App\Http\Controllers\Api\ResProductRecieptsController;
use App\Http\Controllers\Api\ClientsAllInvoicesController;
use App\Http\Controllers\Api\ProductParticularsController;
use App\Http\Controllers\Api\UserStockDischargesController;
use App\Http\Controllers\Api\RequisitionDeliveryController;
use App\Http\Controllers\Api\UnitStockDischargesController;
use App\Http\Controllers\Api\TaxRatesAllInvoicesController;
use App\Http\Controllers\Api\RestaurantRequisitionController;
use App\Http\Controllers\Api\ResCategoryResProductsController;
use App\Http\Controllers\Api\ItemCategoryStockTablesController;
use App\Http\Controllers\Api\ResProductResSalesTablesController;
use App\Http\Controllers\Api\StockTableStockDischargesController;
use App\Http\Controllers\Api\ResSectionStockDischargesController;
use App\Http\Controllers\Api\AssetTypesAllAssetsAccountsController;
use App\Http\Controllers\Api\ProductAllProductParticularsController;
use App\Http\Controllers\Api\RequisitionItemRequisitionDeliveriesController;
use App\Http\Controllers\Api\RestaurantRequisitionRequisitionItemsController;

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

        // User Stock Discharges
        Route::get('/users/{user}/stock-discharges', [
            UserStockDischargesController::class,
            'index',
        ])->name('users.stock-discharges.index');
        Route::post('/users/{user}/stock-discharges', [
            UserStockDischargesController::class,
            'store',
        ])->name('users.stock-discharges.store');

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

        Route::apiResource('petty-cashes', PettyCashController::class);

        Route::apiResource(
            'expeses-resturants',
            Expeses_ResturantController::class
        );

        Route::apiResource('all-payment-types', PaymentTypesController::class);

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

        Route::apiResource(
            'requisition-items',
            RequisitionItemController::class
        );

        // RequisitionItem Requisition Deliveries
        Route::get(
            '/requisition-items/{requisitionItem}/requisition-deliveries',
            [RequisitionItemRequisitionDeliveriesController::class, 'index']
        )->name('requisition-items.requisition-deliveries.index');
        Route::post(
            '/requisition-items/{requisitionItem}/requisition-deliveries',
            [RequisitionItemRequisitionDeliveriesController::class, 'store']
        )->name('requisition-items.requisition-deliveries.store');

        Route::apiResource('stock-discharges', StockDischargeController::class);

        Route::apiResource('units', UnitController::class);

        // Unit Stock Tables
        Route::get('/units/{unit}/stock-tables', [
            UnitStockTablesController::class,
            'index',
        ])->name('units.stock-tables.index');
        Route::post('/units/{unit}/stock-tables', [
            UnitStockTablesController::class,
            'store',
        ])->name('units.stock-tables.store');

        // Unit Stock Discharges
        Route::get('/units/{unit}/stock-discharges', [
            UnitStockDischargesController::class,
            'index',
        ])->name('units.stock-discharges.index');
        Route::post('/units/{unit}/stock-discharges', [
            UnitStockDischargesController::class,
            'store',
        ])->name('units.stock-discharges.store');

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

        Route::apiResource(
            'restaurant-requisitions',
            RestaurantRequisitionController::class
        );

        // RestaurantRequisition Requisition Items
        Route::get(
            '/restaurant-requisitions/{restaurantRequisition}/requisition-items',
            [RestaurantRequisitionRequisitionItemsController::class, 'index']
        )->name('restaurant-requisitions.requisition-items.index');
        Route::post(
            '/restaurant-requisitions/{restaurantRequisition}/requisition-items',
            [RestaurantRequisitionRequisitionItemsController::class, 'store']
        )->name('restaurant-requisitions.requisition-items.store');

        Route::apiResource('all-clients', ClientsController::class);

        // Clients All Invoices
        Route::get('/all-clients/{clients}/all-invoices', [
            ClientsAllInvoicesController::class,
            'index',
        ])->name('all-clients.all-invoices.index');
        Route::post('/all-clients/{clients}/all-invoices', [
            ClientsAllInvoicesController::class,
            'store',
        ])->name('all-clients.all-invoices.store');

        Route::apiResource('products', ProductController::class);

        // Product All Product Particulars
        Route::get('/products/{product}/all-product-particulars', [
            ProductAllProductParticularsController::class,
            'index',
        ])->name('products.all-product-particulars.index');
        Route::post('/products/{product}/all-product-particulars', [
            ProductAllProductParticularsController::class,
            'store',
        ])->name('products.all-product-particulars.store');

        Route::apiResource('all-invoices', InvoicesController::class);

        Route::apiResource('all-tax-rates', TaxRatesController::class);

        // TaxRates All Invoices
        Route::get('/all-tax-rates/{taxRates}/all-invoices', [
            TaxRatesAllInvoicesController::class,
            'index',
        ])->name('all-tax-rates.all-invoices.index');
        Route::post('/all-tax-rates/{taxRates}/all-invoices', [
            TaxRatesAllInvoicesController::class,
            'store',
        ])->name('all-tax-rates.all-invoices.store');
    });
