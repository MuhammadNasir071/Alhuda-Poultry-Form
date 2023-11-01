<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CompanyController;
use App\Http\Controllers\Backend\SalesController;
use App\Http\Controllers\Backend\MortalityController;
use App\Http\Controllers\Backend\ExpenseController;
use App\Http\Controllers\Backend\ShedsController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\ExpenseTypeController;
use App\Http\Controllers\Backend\FeedsController;
use App\Http\Controllers\Backend\ReportsController;
use App\Http\Controllers\Backend\HistoryController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function ()
{
    if(auth()->user())
    {
        return redirect()->route('home');
    }
    else
    {
        return redirect()->route('login');
    }
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// START: Backend Routs
Route::middleware(['auth'])->group(function ()
{
    Route::prefix('admin')->name('admin.')->group(function()
    {
        Route::get('index', [AdminController::class, 'index'])->name('dashboard');
        Route::get('view_profile/{id}', [AdminController::class, 'viewProfile'])->name('view.profile');
        Route::get('edit_profile/{id}', [AdminController::class, 'editProfile'])->name('edit.profile');
        Route::put('update_profile/{id}', [AdminController::class, 'updateProfile'])->name('update.profile');

        Route::resource('/sheds', ShedsController::class);
        Route::resource('/feeds', FeedsController::class);
        Route::resource('/feeds', FeedsController::class);
        Route::get('/get_avg_weight/{company_id}/{shed_id}',[FeedsController::class,'getAvgWeights']);
        Route::get('feeds/add/avg_weight',[FeedsController::class,'addAvgWeight'])->name('feeds.add.avg_weight');
        Route::post('/add/avg_weight',[FeedsController::class,'storeAvgWeights'])->name('add.average.weight');
        Route::resource('/companies', CompanyController::class);
        Route::get('sheds/view_sheds/{id}',[ShedsController::class,'viewSheds'])->name('view.sheds');
        Route::resource('/mortalities', MortalityController::class);

        Route::get('/get_company/shed/{id}',[MortalityController::class,'getCompanySheds']);
        Route::get('/get_company/sheds/{id}',[MortalityController::class,'getCompanyShed_history']);
        Route::resource('/expenses', ExpenseController::class);
        Route::resource('/expensetype', ExpenseTypeController::class);
        Route::resource('/clients', ClientController::class);
        Route::resource('/sales', SalesController::class);

        Route::middleware(['admin'])->group(function ()
        {
            Route::resource('/users', UserController::class);
            //Reports
            Route::get('reports/mortality/weekly_report', [ReportsController::class, 'getMortalityWeeklyReport'])->name('mortality.weekly_report');
            Route::post('reports/mortality/weekly/report', [ReportsController::class, 'showMortalityWeeklyReport'])->name('mortality.view.report');

            Route::get('reports/feeds/weekly_report', [ReportsController::class, 'getFeedWeeklyReport'])->name('feeds.weekly_report');
            Route::post('reports/feeds/weekly/report', [ReportsController::class, 'showFeedWeeklyReport'])->name('feeds.view.report');

            Route::get('reports/expense/weekly_report', [ReportsController::class, 'getExpenseWeeklyReport'])->name('expense.weekly_report');
            Route::post('reports/expense/weekly/report', [ReportsController::class, 'showExpenseWeeklyReport'])->name('expense.view.report');

            Route::get('reports/sales/total_report', [ReportsController::class, 'getSalesTotalReport'])->name('sales.total_report');
            Route::post('reports/sales/total/report', [ReportsController::class, 'showSalesTotalReport'])->name('sales.view.report');

            //History
            Route::get('history/mortality/weekly_history', [HistoryController::class, 'getMortalityWeeklyHistory'])->name('mortality.weekly_history');
            Route::post('history/mortality/weekly/history', [HistoryController::class, 'showMortalityWeeklyHistory'])->name('mortality.view.history');

            Route::get('history/feeds/weekly_history', [HistoryController::class, 'getFeedWeeklyHistory'])->name('feeds.weekly_history');
            Route::post('history/feeds/weekly/history', [HistoryController::class, 'showFeedWeeklyHistory'])->name('feeds.view.history');

            Route::get('history/expense/weekly_history', [HistoryController::class, 'getExpenseWeeklyHistory'])->name('expense.weekly_history');
            Route::post('history/expense/weekly/history', [HistoryController::class, 'showExpenseWeeklyHistory'])->name('expense.view.history');

            Route::get('history/sales/total_history', [HistoryController::class, 'getSalesTotalHistory'])->name('sales.total_history');
            Route::post('history/sales/total/history', [HistoryController::class, 'showSalesTotalHistory'])->name('sales.view.history');
        });

    });
});

