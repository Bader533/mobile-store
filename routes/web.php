<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InstallmentController;
use App\Http\Controllers\MonthyInstallmentController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrackingController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;

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

Route::fallback(function () {
    return view('error-404');
});




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::middleware('guest:branch,admin,employee,customer')->group(function () {
            Route::get('/login', function () {
                return redirect('/customer/login');
            })->name('login');
            Route::get('{guard}/login', [AuthController::class, 'showLogin'])->name('dashboard.login');
            Route::post('login', [AuthController::class, 'login'])->name('login');
            Route::get('{guard}/reset-password', [AuthController::class, 'resetPassword'])->name('reset.password');
            Route::post('new-password', [AuthController::class, 'newPassword'])->name('new.password');
        });


        /* ====================================== customer ====================================== */
        Route::middleware('auth:customer')->group(
            function () {

                Route::get('/customer/contract', [ContractController::class, 'index'])->name('contract-customer.index');
                Route::get('/customer/monthinstallment/{id}', [ContractController::class, 'show'])->name('monthyinstallment-customer.index');
                Route::get('/customer/details/{id}', [MonthyInstallmentController::class, 'edit'])->name('customer-monthyinstallment.edit');
            }
        );

        /* ====================================== customer ====================================== */

        Route::middleware('auth:branch,admin,employee')->group(
            function () {

                Route::get('/', [Controller::class, 'homePage'])->name('home.page');

                /* ====================================== profile ====================================== */
                Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
                Route::get('profile/tracking', [ProfileController::class, 'tracking'])->name('profile.tracking');
                Route::get('setting', [ProfileController::class, 'edit'])->name('setting.edit');
                Route::put('setting', [ProfileController::class, 'updateProfile'])->name('setting.update');
                Route::put('setting/password', [ProfileController::class, 'updatePassword'])->name('setting.update.password');
                /* ====================================== profile ====================================== */


                /* ====================================== employee ====================================== */
                Route::resource('employee', EmployeeController::class);
                Route::get('search/employee', [EmployeeController::class, 'search'])->name('employee.search');
                /* ====================================== employee ====================================== */

                /* ====================================== customer ====================================== */
                Route::resource('customer', CustomerController::class);
                Route::get('search/customer', [CustomerController::class, 'search'])->name('customer.search');
                /* ====================================== customer ====================================== */

                /* ====================================== branch ====================================== */
                Route::resource('branch', BranchController::class);
                Route::get('search/branch', [BranchController::class, 'search'])->name('branch.search');
                /* ====================================== branch ====================================== */

                /* ====================================== product ====================================== */
                Route::resource('product', ProductController::class);
                Route::get('search/product', [ProductController::class, 'search'])->name('product.search');
                /* ====================================== product ====================================== */

                /* ====================================== installment ====================================== */
                Route::resource('installment', InstallmentController::class);
                Route::get('search/installment', [InstallmentController::class, 'search'])->name('installment.search');
                /* ====================================== installment ====================================== */

                /* ====================================== order ====================================== */
                Route::resource('order', OrderController::class);
                Route::get('search/order', [OrderController::class, 'search'])->name('order.search');
                /* ====================================== order ====================================== */

                /* ====================================== contract ====================================== */
                Route::resource('contract', ContractController::class);
                Route::get('contract/create/{id}', [ContractController::class, 'create'])->name('contract.create');
                Route::get('search/contract', [ContractController::class, 'search'])->name('contract.search');
                Route::get('contract/print/{id}', [ContractController::class, 'print'])->name('contract.print');
                Route::get('company/print/{id}', [ContractController::class, 'printCompanyContract'])->name('company.print');
                /* ====================================== contract ====================================== */

                /* ====================================== month installment ====================================== */
                Route::prefix('month-installment')->group(function () {
                    Route::get('', [MonthyInstallmentController::class, 'index'])->name('monthyinstallment.index');
                    Route::get('details/{id}', [MonthyInstallmentController::class, 'edit'])->name('monthyinstallment.edit');
                    Route::put('{id}', [MonthyInstallmentController::class, 'update'])->name('monthyinstallment.update');
                    Route::get('print/{id}', [MonthyInstallmentController::class, 'print'])->name('monthyinstallment.print');
                    Route::get('print-draft/{id}', [MonthyInstallmentController::class, 'printDraft'])->name('monthyinstallment.printDraft');
                    Route::get('search-status', [MonthyInstallmentController::class, 'searchStatus'])->name('month-installment.search.status');
                    Route::get('search', [MonthyInstallmentController::class, 'search'])->name('month-installment.search');
                });
                /* ====================================== month installment ====================================== */

                /* ====================================== check ====================================== */
                Route::get('check/create/{id}', [CheckController::class, 'create'])->name('check.create');
                Route::post('check', [CheckController::class, 'store'])->name('check.store');
                Route::get('check/{id}/edit', [CheckController::class, 'edit'])->name('check.edit');
                Route::put('check/{id}', [CheckController::class, 'update'])->name('check.update');
                Route::delete('check/{id}', [CheckController::class, 'destroy'])->name('check.destroy');
                Route::get('check/print/{id}', [CheckController::class, 'print'])->name('check.print');
                /* ====================================== check ====================================== */

                /* ====================================== note ====================================== */
                Route::resource('note', NoteController::class);
                Route::put('new/{id}', [NoteController::class, 'update']);
                /* ====================================== note ====================================== */

                /* ====================================== tracking ====================================== */
                Route::get('tracking', [TrackingController::class, 'index'])->name('tracking.index');
                /* ====================================== tracking ====================================== */

                /* ====================================== permission ====================================== */
                Route::post('/update-permission', [Controller::class, 'updateRolePermission'])->name('send.message.whats');
                /* ====================================== permission ====================================== */
            }
        );

        /* ====================================== logout ====================================== */

        Route::middleware('auth:branch,admin,employee,customer')->group(
            function () {
                Route::get('logout', [AuthController::class, 'logout'])->name('logout');
            }
        );

        /* ====================================== logout ====================================== */
    }
);
